@section('title', 'Teams | Freelancer')

<main class="container d-flex w-100 my-3" x-data="{ open: false, current: 1,
    bannerFile: function(e){
        let f = e.target.files[0];
        console.log(f);
        let filename = f.name;
        let filesize = f.size;
        let dot = filename.lastIndexOf('.');
        let name = filename.slice(0, dot);
        let ext = filename.slice(dot+1);
        return {
            name: name,
            ext: ext,
            size: filesize
        };
    },
    fileName: function(e) {
        let f = e.target.files[0];
        console.log(f);
        let filename = f.name;
        let filesize = f.size;
        let dot = filename.lastIndexOf('.');
        let name = filename.slice(0, dot);
        let ext = filename.slice(dot+1);
        return {
            name: name,
            ext: ext,
            size: filesize
        };
} }">
    <aside class="col-3 pe-4 d-flex flex-column gap-2">
        <div class="btn-group-vertical w-100" role="group" aria-label="Basic checkbox toggle button group">
            @foreach ($asideMenu as $item)
                <input type="radio" class="btn-check" id="{{ $item['id'] }}" name="teams" @checked($item['id'] == 'menu1')/>
                <label class="btn btn-outline-success text-start fs-7"
                    for="{{ $item['id'] }}">{{ $item['title'] }}</label>
            @endforeach
        </div>
        <a href="#" @click="open=true" class="btn btn-success text-decoration-none w-100 d-flex px-3 py-2 fs-7">
            &#65291; Create a team
        </a>
        <ul class="d-flex btn-group flex-column p-0 unstyled-list border rounded-3 overflow-hidden">
            <li class="d-flex col">
                <a href="#"
                    class="btn btn-outline-success border-0 rounded-0 border-bottom text-decoration-none w-100 d-flex px-3 py-2 fs-7">
                    Find teams to join
                </a>
            </li>
            <li class="d-flex col">
                <a href="#"
                    class="btn btn-outline-success border-0 rounded-0 border-bottom text-decoration-none w-100 d-flex px-3 py-2 fs-7">
                    Find talents for your teams
                </a>
            </li>
            <li class="d-flex col">
                <a href="#"
                    class="btn btn-outline-success border-0 rounded-0 border-bottom text-decoration-none w-100 d-flex px-3 py-2 fs-7">
                    Saved teams
                </a>
            </li>
        </ul>
    </aside>
    <section class="d-flex col-9">
        <ul class="d-flex flex-column p-0 m-0 w-100">
            @foreach ($teams as $team)
                <li class="d-flex p-3 border">
                    {{-- first col --}}
                    <div class="col d-flex">
                        {{-- logo --}}
                        <div class="bg-white border rounded-3 p-1">
                            <img class="square contain" style="--size: 80px" src="{{ $team->logoUrl() }}" alt=" {{ $team->logo->name }}">
                        </div>
                        {{-- team name --}}
                        <div class="col ps-3">
                            <div class="h4 text-capitalize">{{ $team->name }}</div>
                            <div>
                                @php
                                    $cats = $team->categories;
                                @endphp
                                @foreach ($cats as $category)
                                    <span class="badge bg-warning text-dark rounded-pill">{{ $category->name }}</span>
                                @endforeach
                            </div>
                        </div>
                        {{-- categories --}}
                    </div>
                    {{-- 2 col --}}
                    <div class="border-start d-flex flex-column gap-3 ps-3">
                        {{-- view team profile --}}
                        {{-- go to team dashboard --}}
                        <button class="btn">view team profile</button>
                        <a href="{{ route('freelancer.team', $team->id) }}" class="btn btn-success">go to dashboard</a>
                    </div>
                    <div>
                        <button class="btn btn-outline-danger rounded-pill" wire:click="delete({{ $team->id }})"><i class="fas fa-trash"></i></button>
                    </div>
                </li>
            @endforeach
        </ul>
    </section>
    <dialog :class="{ 'd-block': open }" class="position-fixed top-0 end-0 start-0 h-100 w-100 shadow-md z-1">
        <livewire:freelancer.team.create>
    </dialog>
</main>
