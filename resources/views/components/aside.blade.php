<aside class="col-3 d-flex flex-column gap-2 py-3 ps-3">

    <x-aside-link name="Team name" icon="fab fa-adn" class="pointer-events-none">
        <a href="#">Created By You:</a>
        <ul class="bg-light p-0 m-0">
            <li class="align-items-center d-flex py-0"><a class="w-100 ps-4" href="#">team title</a></li>
        </ul>
        <a href="#">Managed By You:</a>
        <ul class="bg-light p-0 m-0">
            <li class="align-items-center d-flex py-0"><a class="w-100 ps-4" href="#">team title</a></li>
        </ul>
        <a href="#">You are member of:</a>
        <ul class="bg-light p-0 m-0">
            <li class="align-items-center d-flex py-0"><a class="w-100 ps-4" href="#">team title</a></li>
            <li class="align-items-center d-flex py-0"><a class="w-100 ps-4" href="#">team 2 title</a></li>
        </ul>
        <a href="#">
            <i class="fas fa-border-all"></i> Everything
        </a>
        <article class="justify-content-between gap-2 py-3 px-1">
            <button class="btn btn-primary"><i class="fas fa-magnifying-glass"></i> Find Team</button>
            <button class="btn btn-primary"><i class="fas fa-plus"></i> Create Team</button>
        </article>
    </x-aside-link>

    <x-aside-link name="Message & files" href="{{ route('freelancer.dashboard') }}" icon="fas fa-comments"/>

    <x-aside-link name="Schedule management" href="{{ route('freelancer.dashboard') }}" icon="fas fa-calendar-day"/>

    <x-aside-link name="Notices" href="{{ route('freelancer.notice', $teamId) }}" icon="fas fa-note-sticky"/>

    <x-aside-link name="Members" href="{{ route('freelancer.member', $teamId) }}" icon="fas fa-users-rectangle"/>

    <x-aside-link name="My Milestones & tasks" href="{{ route('freelancer.dashboard') }}" icon="fas fa-clipboard-check"/>

    <x-aside-link name="Team Management" class="pointer-events-none" icon="fas fa-users">
        <a href="#">Team Information</a>
        <a href="#">Goals</a>
        <a href="#">Service offering</a>
        <a href="#">Talent Recruitment</a>
        <a href="#">Team Reports</a>
        <a href="#">Invite Talents</a>
    </x-aside-link>

    <x-aside-link name="Project" href="#" class="pointer-events-none" icon="fab fa-product-hunt">
        <a href="#">Ongoing Project</a>
            <ul class="bg-light p-0 m-0">
                <li class="align-items-center d-flex py-0"><a class="w-100 ps-4" href="#">project title</a></li>
                <li class="align-items-center d-flex py-0"><a class="w-100 ps-4" href="#">project title2</a></li>
            </ul>
            <a href="#">Applied Project</a>
            <ul class="bg-light p-0 m-0">
                <li class="align-items-center d-flex py-0"><a class="w-100 ps-4" href="#">project title5</a></li>
                <li class="align-items-center d-flex py-0"><a class="w-100 ps-4" href="#">project title4</a></li>
            </ul>
            <a href="#">Invalid Project</a>
            <a href="#">Client Offers</a>
            <ul class="bg-light p-0 m-0">
                <li class="align-items-center d-flex py-0"><a class="w-100 ps-4" href="#">project title7</a></li>
            </ul>
            <a href="#">All participated projects</a>
            <a href="#" class="btn btn-primary">Discover project</a>
    </x-aside-link>

    <x-aside-link name="Appliances" class="pointer-events-none" icon="fas fa-users">
        <a href="#">Issues Management</a>
            <a href="#">LucidChart</a>
            <a href="#">Klabo Center</a>
            <a href="#">KDS</a>
            <a href="#">Guidebooks</a>
    </x-aside-link>

    <article class="py-3 align-items-center">
        <span class="fs-8">Online Members:</span>
        <article class="gap-2 px-2">
            @for ($i = 0; $i < 3; $i++)
                <div class="icon-fa text-white bg-light rounded-pill" style="--s: 2rem">
                    <i class="fas fa-user text-dark" ></i>
                </div>
            @endfor
        </article>
    </article>
</aside>
