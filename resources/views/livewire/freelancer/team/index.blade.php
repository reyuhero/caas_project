@section('title','Team | Freelancer')
<main class="container" x-data="{
        open: false,
        current: 1
    }">
    {{-- Stop trying to control. --}}
    <div>
    this is team page list
    </div>
    <button @click="open = true" class="btn btn-primary">
        create team
    </button>
    <a href="{{ route('freelancer.portfolio.create') }}" class="btn btn-primary">
        create project portfolio
    </a>
    <a href="{{ route('freelancer.serviceoffering.create') }}" class="btn btn-primary">
        create project portfolio
    </a>
    <dialog :class="{'d-block' : open}" class="position-fixed top-0 end-0 start-0 h-100 w-100 shadow-md z-1">
        <livewire:freelancer.team.create>
    </dialog>
    <ul>
        @foreach ($teams as $team)
            <li>{{ $team->name }}</li>
        @endforeach
    </ul>
</main>
