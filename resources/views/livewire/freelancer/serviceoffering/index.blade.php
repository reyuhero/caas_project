@section('title', 'Team Members list')
<section class="d-flex gap-3 py-3" x-data="{ open: false }">
    <x-aside team-id="{{ $teamId }}" member-id="9" />
    <article class="flex-column gap-3 col mx-3">
        <article class="ms-auto">
            <a href="{{ route("freelancer.serviceoffering.create", $teamId) }}" class="btn btn-success" >+ post service offering</a>
        </article>
        <article class="flex-column">
            @foreach ($serviceOfferings as $item)
                <article class="p-3 gap-3 border">
                    <article class="flex-column col">
                        <h5><strong>Title:</strong> {{ $item->title }}</h5>
                        <h6><strong>Description:</strong> {{ $item->description }}</h6>
                    </article>
                    <article class="flex-column ms-auto col-auto">
                        <div>Fixed cost: {{ $item->pricing }}</div>
                        <div>timeline: {{ $item->timeline }}</div>
                        <button class="btn btn-primary">view detail</button>
                    </article>
                    <article class="flex-column gap-1">
                        <button class="btn btn-outline-danger rounded-pill">
                            <i class="fas fa-trash"></i>
                        </button>
                        <button class="btn btn-outline-success rounded-pill">
                            <i class="fas fa-pencil"></i>
                        </button>
                    </article>
                </article>
            @endforeach
        </article>
    </article>
</section>
