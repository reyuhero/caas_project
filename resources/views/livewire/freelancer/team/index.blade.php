@section('title', 'Team | Freelancer')
<section class="d-flex">
    @include('livewire.freelancer.team.aside')
    <section class="container d-block flex-column col py-3" x-data="{ open: false, current: 1 }">
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
                <li>{{ $team->name }}</li>
            @endforeach
        </ul>
    </section>
</section>
