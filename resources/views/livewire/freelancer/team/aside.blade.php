<aside class="col-3 d-flex flex-column gap-2 py-3 ps-3">
    <details class="bg-white rounded-4 shadow-sm">
        <summary class="py-2 px-3">
            <i class="fab fa-adn icon-fa"></i>
            <span>Team Name</span>
        </summary>
        <article class="flex-column">
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
        </article>
    </details>
    <details class="bg-white rounded-4 shadow-sm">
        <summary class="py-2 px-3">
            <i class="fas fa-comments icon-fa"></i>
            <span>Message & files</span>
        </summary>
    </details>
    <details class="bg-white rounded-4 shadow-sm">
        <summary class="py-2 px-3">
            <i class="fas fa-calendar-day icon-fa"></i>
            <span>Schedule management</span>
        </summary>
    </details>
    <details class="bg-white rounded-4 shadow-sm">
        <summary class="py-2 px-3">
            <i class="fas fa-note-sticky icon-fa"></i>
            <span>Notice</span>
        </summary>
    </details>
    <details class="bg-white rounded-4 shadow-sm">
        <summary class="py-2 px-3">
            <i class="fas fa-users-rectangle icon-fa"></i>
            <span>Members</span>
        </summary>
    </details>
    <details class="bg-white rounded-4 shadow-sm">
        <summary class="py-2 px-3">
            <i class="fas fa-clipboard-check icon-fa"></i>
            <span>My Milestones & tasks</span>
        </summary>
    </details>
    <details class="bg-white rounded-4 shadow-sm">
        <summary class="py-2 px-3">
            <i class="fas fa-users icon-fa"></i>
            <span>Team Management</span>
        </summary>
        <article class="flex-column">
            <a href="#">Team Information</a>
            <a href="#">Goals</a>
            <a href="#">Service offering</a>
            <a href="#">Talent Recruitment</a>
            <a href="#">Team Reports</a>
            <a href="#">Invite Talents</a>
        </article>
    </details>
    <details class="bg-white rounded-4 shadow-sm">
        <summary class="py-2 px-3">
            <i class="fab fa-product-hunt icon-fa"></i>
            <span>Project</span>
        </summary>
        <article class="flex-column">
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
        </article>
    </details>
    <details class="bg-white rounded-4 shadow-sm">
        <summary class="py-2 px-3">
            <i class="fas fa-users icon-fa"></i>
            <span>Appliances</span>
        </summary>
        <article class="flex-column">
            <a href="#">Issues Management</a>
            <a href="#">LucidChart</a>
            <a href="#">Klabo Center</a>
            <a href="#">KDS</a>
            <a href="#">Guidebooks</a>
        </article>
    </details>
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
@push('scripts')
<script>

</script>
@endpush
