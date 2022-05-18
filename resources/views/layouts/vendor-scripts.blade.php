<!-- JAVASCRIPT -->
<script src="{{ asset('/assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('/assets/libs/node-waves/node-waves.min.js') }}"></script>
<script src="{{ asset('/js/app.js') }}"></script>
<script src="{{ asset('/vendor/emoji-picker/lib/js/config.js') }}"></script>
<script src="{{ asset('/vendor/emoji-picker/lib/js/util.js') }}"></script>
<script src="{{ asset('/vendor/emoji-picker/lib/js/jquery.emojiarea.js') }}"></script>
<script src="{{ asset('/vendor/emoji-picker/lib/js/emoji-picker.js') }}"></script>

@yield('script')
<!-- App js -->

<!-- Magnific Popup-->
<script src="{{ asset('assets/libs/magnific-popup/magnific-popup.min.js') }}"></script>
<!-- owl.carousel js -->
<script src="{{ asset('assets/libs/owl.carousel/owl.carousel.min.js') }}"></script>
<!-- page init -->
<script src="{{ asset('assets/js/pages/index.init.js') }}"></script>

<script>
    // global app configuration object
    var my_id = "{{ Auth::id() }}";
    var config = {
        routes: {
            nameupdate: "{{ route('nameupdate') }}",
            updateavatar: "{{ route('updateavatar') }}",
            groups: "{{ route('groups') }}",
            url: "{{ asset('') }}",
            search_user: "{{ route('user.search') }}",
            user_search_recent: "{{ route('user.search.recent') }}",
            user_search_message: "{{ route('user.search.message') }}",
            group_search: "{{ route('group.search') }}",
            group_search_message: "{{ route('group.search.message') }}",
            group_message: "{{ route('group.message', '') }}",
            group_message_send: "{{ route('group.message.send') }}",
            group_message_last: "{{ route('group.message.last', '') }}",
            group_message_delete: "{{ route('group.message.delete', '') }}",
            message_send: "{{ route('message.send') }}",
            message_delete: "{{ route('message.delete', '') }}",
            message_typing: "{{ route('message.typing') }}",
            message_last: "{{ route('message.last', '') }}",
            conversation_delete: "{{ route('conversation.delete', '') }}",
        }
    };
</script>

@yield('script-bottom')
