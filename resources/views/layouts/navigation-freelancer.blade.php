<nav class="z-3 sticky-top px-4 bg-white align-items-center position-relative text-center p-2 W-100 mb-2 d-flex justify-content-between shadow-md"
    style="font-family: serif !important;">
    <article class="align-items-center ">
        <div class="px-2 fw-bold fs-2 pe-5">CAAS</div>
        <section class="cols-3 flow-column gap-2">
            <a href="{{ route('freelancer.dashboard') }}" class="btn btn-circle btn-outline-gray rounded-pill border-0 text-dark" data-bs-toggle="tooltip"
                data-bs-placement="bottom" title="Dashboard"><i class="fas fa-house-user"></i></a>
            <a href="{{ route('freelancer.project') }}" class="btn btn-circle btn-outline-gray rounded-pill border-0 text-dark" data-bs-toggle="tooltip"
                data-bs-placement="bottom" title="Projects"><i class="fas fa-file-invoice"></i></a>
            <a href="{{ route('freelancer.teams') }}" class="btn btn-circle btn-outline-gray rounded-pill border-0 text-dark" data-bs-toggle="tooltip"
                data-bs-placement="bottom" title="Team"><i class="fas fa-users"></i></a>
            <a href="#" class="btn btn-circle btn-outline-gray rounded-pill border-0 text-dark" data-bs-toggle="tooltip"
                data-bs-placement="bottom" title="Reports"><i class="fas fa-scroll"></i></a>
            <a href="#" class="btn btn-circle btn-outline-gray rounded-pill border-0 text-dark fs-7 fw-bold"
                data-bs-toggle="tooltip" data-bs-placement="bottom" title="KDS">KDS</a>
            <a href="#" class="btn btn-circle btn-outline-gray rounded-pill border-0 text-dark" data-bs-toggle="tooltip"
                data-bs-placement="bottom" title="Opportunities"><i class="fas fa-briefcase"></i></a>
            <a href="#" class="btn btn-circle btn-outline-gray rounded-pill border-0 text-dark" data-bs-toggle="tooltip"
                data-bs-placement="bottom" title="Messages"><i class="fas fa-comment-dots"></i></a>
        </section>
    </article>
    <article class="gap-2">
        <button class="btn btn-outline-secondary rounded-pill px-3">
            <i class="fas fa-wallet pe-2"></i>
            $0.00
        </button>
        <button class="btn btn-outline-secondary btn-circle">
            <i class="fas fa-bookmark"></i>
        </button>
        <div class="dropdown">
            <button
                class="btn btn-circle btn-outline-secondary rounded-pill border-0 cubic-bezier    "
                data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-bell"></i>
            </button>
            <ul class="dropdown-menu shadow-md mt-3 rounded-5 border-0 p-0" aria-labelledby="profile-dropdown">
                <li class="fs-8 px-3 py-3">
                    <div class="fw-bold">Mohammad Reza Yousofi</div>
                    <div class="text-black-50">yousofimreza@gmail.com</div>
                </li>
                <li class="border"><a href="#" class="dropdown-item py-2"><i
                            class="fas fa-city me-2 fs-4 text-black-50 bg-warning gradient background-clip"></i>Switch
                        to Hiring</a></li>
                <li><a href="#" class="dropdown-item py-2"><i
                            class="fas fa-cog me-2 fs-4 text-black-50"></i>Settings</a></li>
                <li><a href="#" class="dropdown-item py-2"><i class="fas fa-envelope me-2 fs-4 text-black-50"></i>Email
                        preferences</a></li>
                <li><a href="#" class="dropdown-item py-2"><i
                            class="fas fa-question-circle me-2 fs-4 text-black-50"></i>Help</a></li>
                <li><a href="#" class="dropdown-item py-2"><i
                            class="fas fa-sign-out-alt me-2 fs-4 text-black-50"></i>Log out</a></li>
            </ul>

        </div>
        <input type="text" name="search" id="search" placeholder="search"
            class="1 border border-secondary px-3 rounded-pill">
        <div class="dropdown" x-data="{ open: false }">
            <button class="btn btn-outline-gray p-0 rounded-pill border-0" @click="open = !open">
                <i class="rounded-pill fas fa-image    "
                    style="width: 35px;" ></i>
            </button>
            <div id="profile-dropdown"
                class="btn rounded-pill overflow-hidden p-0    "
                data-bs-toggle="dropdown"
                aria-expanded="false"
                @click="open = !open">
                <i class="fas fa-angle-down text-black-50"></i>
            </div>
            <ul x-show="open" class="show-menu" >
                <li class="fs-8 px-3 py-3">
                    <div class="fw-bold ">Mohammad Reza Yousofi</div>
                    <div class="text-black-50">yousofimreza@gmail.com</div>
                </li>
                <li class="border"><a href="#" class="dropdown-item py-2"><i
                            class="fas fa-city me-2 fs-4 text-black-50 bg-warning gradient background-clip"></i>Switch
                        to Hiring</a></li>
                <li><a href="#" class="dropdown-item py-2"><i
                            class="fas fa-cog me-2 fs-4 text-black-50"></i>Settings</a></li>
                <li><a href="#" class="dropdown-item py-2"><i class="fas fa-envelope me-2 fs-4 text-black-50"></i>Email
                        preferences</a></li>
                <li><a href="#" class="dropdown-item py-2"><i
                            class="fas fa-question-circle me-2 fs-4 text-black-50"></i>Help</a></li>
                <li><a href="#" class="dropdown-item py-2"><i
                            class="fas fa-sign-out-alt me-2 fs-4 text-black-50"></i><livewire:logout /></a></li>
            </ul>
        </div>
    </article>
</nav>

