<?php

namespace App\Http\Livewire\Freelancer\Chat;

use App\Models\Group;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Pusher\Pusher;
use Illuminate\Support\Str;

class Index extends Component
{
    public $teamId, $AttachedFiles, $groupdata, $contacts, $users;
    public function mount($teamId)
    {
        $id = Auth::id();

        $collection = User::orderBy('name')->where('id', '!=', $id)->get();
        $this->contacts = $collection->groupBy(function ($item) {
            return substr(Str::lower($item->name), 0, 1);
        })->toBase();
        // dd($this->contacts);
        $this->teamId = $teamId;
        // Recent Chat Users -> Last send Messages users Display in first
        $this->users = DB::select("SELECT chatdata.*, users.id, users.name, users.avatar
        FROM
        (
            SELECT t1.*,
            CASE WHEN t1.from_user != $id THEN t1.from_user ELSE t1.to_user END AS userid ,
            (SELECT SUM(is_read=0) AS unread
            FROM messages
            WHERE messages.to_user=$id AND messages.from_user=userid
            GROUP BY messages.from_user
        ) AS unread
        FROM messages AS t1
        INNER JOIN
        (
            SELECT
                LEAST(`from_user`, `to_user`) AS sender_id,
                GREATEST(`from_user`, `to_user`) AS receiver_id,
                MAX(id) AS max_id
            FROM messages
            GROUP BY
                LEAST(sender_id, receiver_id),
                GREATEST(sender_id, receiver_id)
        ) AS t2
            ON LEAST(t1.`from_user`, t1.`to_user`) = t2.sender_id AND
            GREATEST(t1.`from_user`, t1.`to_user`) = t2.receiver_id AND
            t1.id = t2.max_id
            WHERE t1.`from_user` =$id OR t1.`to_user` =$id) chatdata
            JOIN users ON users.id=userid
            WHERE users.id != $id
            ORDER BY chatdata.id DESC");
        $user_id = Auth::id();
        $this->AttachedFiles = Message::where(function ($query) use ($user_id) {
            $query->where('from_user', $user_id)->orWhere('to_user', $user_id);
        })->whereNotNull('file')->get();
        $this->groupdata = Group::with(['users' => function($qq) use($user_id){
            $qq->select('group_id', 'is_read')->where('user_id', $user_id);
        }])->whereHas('groupUsers', function($qr) use($user_id){
            $qr->where('user_id', '=', $user_id);
        })->get();
    }
    public function deleteContact($id)
    {
        User::destroy($id);
    }
    public function getMessage($user_id)
    {
        $my_id = Auth::id();
        // Make read all unread
        Message::where(['from_user' => $user_id, 'to_user' => $my_id])->update(['is_read' => 1]);
        // Get all message from selected user
        $messages = Message::where(function ($query) use ($user_id, $my_id) {
            $query->where('from_user', $user_id)->where('to_user', $my_id);
        })->orWhere(function ($query) use ($user_id, $my_id) {
            $query->where('from_user', $my_id)->where('to_user', $user_id);
        })->get();
        // Get Receiver user Detail
        $chatUser = User::find($user_id);

        return [
            'view1' => view('layouts.chat-message-data')->with(['messages' => $messages])->with(['chatUser' => $chatUser])->render(),
            'view2' => view('layouts.user-profile-details')->with(['messages' => $messages])->with(['chatUser' => $chatUser])->render()
        ];
    }

    public function getLastMessage($user_id)
    {
        $my_id = Auth::id();
        // Make read all unread message
        Message::where(['from_user' => $user_id, 'to_user' => $my_id])->update(['is_read' => 1]);
        // Get all message from selected user
        $messages = Message::where(function ($query) use ($user_id, $my_id) {
            $query->where('from_user', $user_id)->where('to_user', $my_id);
        })->orWhere(function ($query) use ($user_id, $my_id) {
            $query->where('from_user', $my_id)->where('to_user', $user_id);
        })->orderBy('id', 'DESC')->limit(1)->get();

        $chatUser = User::find($user_id);

        return view('layouts.message-conversation')->with(['messages' => $messages])->with(['chatUser' => $chatUser]);
    }

    // Send Messages using pusher
    public function sendMessage(Request $request)
    {
        $from = Auth::id();
        $to = $request->receiver_id;
        $message = $request->message;
        $file = $request->file;

        $data = new Message();
        $data->from_user = $from;
        $data->to_user = $to;
        $data->message = $message;
        if ($file != Null) {
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $filepath = public_path('/Upload/');
            $file->move($filepath, $filename);
            $data->file = 'Upload/' . $filename;
        }
        $data->is_read = 0; // message will be unread when sending message
        $data->save();
        // pusher
        $options = array(
            'cluster' => 'ap2',
            'useTLS' => true
        );
        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );
        $data = ['from_user' => $from, 'to_user' => $to]; // sending from and to user id when pressed enter
        $pusher->trigger('my-channel', 'my-event', $data);
        return $data;
    }

    // File size convert bytes to mb,gb,...
    public static function bytesToHuman($bytes)
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB', 'PB'];
        for ($i = 0; $bytes > 1024; $i++) {
            $bytes /= 1024;
        }
        return round($bytes, 2) . ' ' . $units[$i];
    }

    // Delete only selected message
    public function deleteMessage($id)
    {
        Message::where('id', $id)->delete();
    }

    // Delete selected users All messages(Conversation)
    public function deleteConversation($user_id)
    {
        $my_id = Auth::id();
        // Get all message from selected user
        $messages = Message::where(function ($query) use ($user_id, $my_id) {
            $query->where('from_user', $user_id)->where('to_user', $my_id);
        })->orWhere(function ($query) use ($user_id, $my_id) {
            $query->where('from_user', $my_id)->where('to_user', $user_id);
        })->delete();
    }

    // Send Typing using Pusher
    public function sendTyping(Request $request)
    {
        $from = Auth::id();
        $to = $request->receiver_id;
        $options = array(
            'cluster' => 'ap2',
            'useTLS' => true
        );
        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );
        $data = ['from_user' => $from, 'to_user' => $to, 'typing' => true]; // showing typing notification when a user is typing a message
        $pusher->trigger('my-channel', 'my-event', $data);
    }
    public function render()
    {
        return view('livewire.freelancer.chat.index')->extends('layouts.freelancer')->section('content');
    }
}
