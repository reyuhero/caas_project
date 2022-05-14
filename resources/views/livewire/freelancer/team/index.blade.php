@section('title', 'Team | Freelancer')
<section class="d-flex">
    <x-aside team-id="{{ $teamId }}" member-id="9"/>
    <section class="container d-block flex-column col py-3 ps-3"
    x-data="{ open: false, current: 1, files: null,
        fileName: function(e) {
            let f = e.target.files[0];
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
        {{-- <a href="{{ route('freelancer.portfolio.create') }}" class="btn btn-primary">
            create project portfolio
        </a> --}}
        {{-- <a href="{{ route('freelancer.serviceoffering.create') }}" class="btn btn-primary">
            create service offering
        </a> --}}
        {{-- <a href="{{ route('freelancer.talentrecruitment.create') }}" class="btn btn-primary">
            create talent recruitment
        </a> --}}
        <article class="flex-column capitalize gap-2">
            <article class="gap-3">
                <div class="rounded-3 bg-light p-1">
                    <img class="square" src="{{ $team->logoUrl() }}" alt="{{ $team->logo->name }}">
                </div>
                <article class="flex-column">
                    <div><strong>team name:</strong> {{ $team->name }}</div>
                    <div><strong>tag line:</strong> {{ $team->tagline }}</div>
                    <div><strong>service category:</strong>
                        @foreach ($team->categories as $item)
                            {{ $item->name }},
                        @endforeach
                    </div>
                    <div><strong>team profile url:</strong> <a href="/{{ $team->url }}" target="_blank" rel="noopener noreferrer">http://caas.regrowup.xyz/{{ $team->url }}</a></div>
                </article>
                <article class="flex-column">
                    <article class="gap-3">
                        <button class="btn btn-primary">preview</button>
                        <button class="btn btn-success">edit</button>
                    </article>
                    @if($team->badge)
                        <article class="align-items-center">
                            <div class="d-grid position-relative icon-fa" style="--s: 70px">
                                <i class="pentagon" style="--b: {{ $team->badge->color }};"></i>
                                <div class="z-1 fw-bold">{{ $team->badge->name }}</div>
                            </div>
                            <div class="fs-8 fw-bold text-primary">
                                Learn more about team level badges
                                <div class="fas fa-question-circle"></div>
                            </div>
                        </article>
                    @endif
                </article>
            </article>
            <article>
                <strong>description: </strong> {{ $team->description }}
            </article>
            <div >
                <strong>team banner:</strong>
                <div class="w-100 bg-light" style="height: 150px">
                    <img class="contain h-100" class="height: 150px" src="{{ $team->bannerUrl() }}" alt="{{ $team->banner->name }}">
                </div>
            </div>
            <article>
                <button class="btn btn-primary">add or Edit project portfolio: <i class="fas fa-pencil"></i></button>
            </article>
            <article>
                <button class="btn btn-primary">manage service offering: <i class="fas fa-pencil"></i></button>
            </article>
            <article>

            </article>
        </article>
        <dialog :class="{ 'd-block': open }" class="position-fixed top-0 end-0 start-0 h-100 w-100 shadow-md z-1">
            <livewire:freelancer.team.create>
        </dialog>
    </section>
</section>
