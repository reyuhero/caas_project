@section('title','Team Members list')
<section class="d-flex gap-3 py-3" x-data="{ open: false, roles: @js($roles) }">
    <x-aside team-id="{{ $teamId }}" member-id="9"/>
    <article class="flex-column col px-3">
        <article class="gap-2 justify-content-end">
            <button class="btn btn-success float-end">Application to join</button>
            <button class="btn btn-primary">Manage members</button>
        </article>
        <ul class="d-flex border rounded-3 p-0 ul m-3 flex-column">
            @foreach ($members as $member)
                <li class="d-flex p-3 col flex-column gap-3">
                    <div class="d-flex gap-1 align-items-center justify-content-between w-100">
                        <article class="gap-1 align-items-center col-8">
                            <div class="d-flex align-items-center gap-3 col-4">
                                <div class="icon-fa bg-dark text-white rounded-pill" style="--s: 30px"><i class="fas fa-user"></i></div>
                                <span class="">{{ $member->user->name }}</span>
                            </div>
                                <select id="roles" name="roles" class="form-select w-50" x-on:change="$wire.updateRole(role)">
                                    <template x-for="role in roles">
                                        <option :value="role.id" x-text="role.name"></option>
                                    </template>
                                </select>
                            <span class="text-primary col-3">({{ $member->role->name }})</span>
                        </article>
                        <article class="col-4">
                            Member since: {{ $member->created_at->diffForHumans() }}
                        </article>
                    </div>
                    <article class="justify-content-between">
                        <div>{{ $member->user->profile->location }}</div>
                        <div><button class="btn btn-primary">view profile</button></div>
                    </article>
                </li>
            @endforeach
        </ul>
    </article>
</section>
