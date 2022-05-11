@section('title', 'Team | Freelancer')
<section class="d-flex">
    <x-aside teamId="11"/>
    <section class="container d-block flex-column col py-3"
    x-data="{ open: false, current: 1, files: null,
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
    }
 }">
        <button @click="open = true" class="btn btn-primary">
            create team
        </button>
        <a href="{{ route('freelancer.portfolio.create') }}" class="btn btn-primary">
            create project portfolio
        </a>
        <a href="{{ route('freelancer.serviceoffering.create') }}" class="btn btn-primary">
            create service offering
        </a>
        <a href="{{ route('freelancer.talentrecruitment.create') }}" class="btn btn-primary">
            create talent recruitment
        </a>
        <dialog :class="{ 'd-block': open }" class="position-fixed top-0 end-0 start-0 h-100 w-100 shadow-md z-1">
            <livewire:freelancer.team.create>
        </dialog>
        <ul>
            @foreach ($teams as $team)
                <li class="d-flex p-3 align-items-center gap-3">
                    <div class="bg-light rounded-3">
                        <img class="square contain" style="--size: 80px" src="{{ $team->logoUrl() }}" alt=" {{ $team->logo->name }}">
                    </div>
                    {{ $team->name }}
                    {{ $team->ownership->name }}
                </li>
            @endforeach
        </ul>
    </section>
</section>
