@section('title', 'Team Notices')
<section class="d-flex gap-3 py-3" x-data="{ open: false }">
    <x-aside team-id="{{ $teamId }}" />
    <article class="flex-column col">
        <div class="mx-auto">
            <div class="btn-group" role="group">
                <button class="btn btn-success">team notice</button>
                <button class="btn btn-outline-secondary">project notice</button>
                <button class="btn btn-outline-secondary">system notice</button>
            </div>
        </div>
        <div class="px-3">
            <button class="btn btn-success float-end" @click="open = true">&#65291; post a notice</button>
        </div>
        <ul class="m-3 rounded-3 border p-0 ul">
            @foreach ($notices as $notice)
               <li class="d-flex p-3 flex-column position-relative" style="height: 150px">
                <h5>{{ $notice->title }}</h5>
                <div>{{ $notice->description }}</div>
                <div class="d-flex justify-content-between mt-auto">
                    <article class="align-items-center gap-1">
                        <span class="icon-fa bg-dark text-white p-1 rounded-pill" style="--s: 30px"><i class="fas fa-user "></i></span>
                        <div>{{ $notice->member->user->name }}</div>
                    </article>
                    <div>
                        <span><i class="fas fa-clock"></i> 10 min ago</span>
                    </div>
                </div>
                <div class="position-absolute top-0 end-0 m-3 d-flex gap-2">
                    <button type="button" wire:click="delete({{ $notice->id }})" class="border-0 bg-light p-1 icon-fa rounded-3" style="--s: 30px"><i class="fas fa-trash text-danger"></i></button>
                    <button type="button" class="border-0 bg-light p-1 icon-fa rounded-3" style="--s: 30px"><i class="fas fa-pencil text-success"></i></button>
                </div>
               </li>
            @endforeach
        </ul>
    </article>
    <dialog :class="{ 'd-block': open }" class="position-fixed top-0 end-0 start-0 h-100 w-100 shadow-md z-1">
        <livewire:freelancer.notice.create team-id="{{ $teamId }}" member-id="9">
    </dialog>
</section>
