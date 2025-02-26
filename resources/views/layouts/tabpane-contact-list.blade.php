@foreach ($contacts as $user => $key)
    <div class="p-3 font-weight-bold text-primary text-uppercase">{{ $user }}</div>
    <ul class="list-unstyled contact-list">
        @foreach ($key as $contact)
            <li class="user" id="{{ $contact->id }}">
                <div class="media align-items-center d-flex justify-content-between">
                    <div class="media-body">
                        <h5 class="font-size-14 m-0 chat-user-click" user-id="{{ $contact->id }}">
                            {{ $contact->name }}</h5>
                    </div>
                    <div class="dropdown">
                        <a href="#" class="text-muted text-decoration-none" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="ri-more-2-fill"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#">{{ __('Share') }} <i class="ri-share-line float-start text-muted pe-2"></i></a>
                            <a class="dropdown-item" href="#">{{ __('Block') }} <i class="ri-forbid-line float-start text-muted pe-2"></i></a>
                            <button class="dropdown-item" wire:click='deleteContact({{ $contact->id }})' id="deleteContact" type="submit" data-id="{{ $contact->id }}">
                                {{ __('Remove') }} <i class="ri-delete-bin-line float-start text-muted"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
@endforeach
