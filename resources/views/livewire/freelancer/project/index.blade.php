@section('title', 'Freelancer Dashboard')
@section('header')
    @include('layouts.navigation-freelancer')
@endsection
<div>
    list project
    <a type="btn" class="btn" href='{{ route("freelancer.create.project") }}'>create project</a>
</div>
