@section('title', 'dashboard')
@section('header')
<nav class="z-3 sticky-top px-4 bg-white align-items-center position-relative text-center p-2 W-100 mb-2 d-flex justify-content-between shadow-md"
    style="font-family: serif !important;">
    <article class="align-items-center ">
        <div class="px-2 fw-bold fs-2 pe-5">CAAS</div>
        <section class="cols-3 flow-column gap-2">
            <button class="btn btn-circle btn-outline-gray rounded-pill border-0 text-dark" data-bs-toggle="tooltip"
                data-bs-placement="bottom" title="Dashboard"><i class="fas fa-house-user"></i></button>
            <button class="btn btn-circle btn-outline-gray rounded-pill border-0 text-dark" data-bs-toggle="tooltip"
                data-bs-placement="bottom" title="Projects"><i class="fas fa-file-invoice"></i></button>
            <button class="btn btn-circle btn-outline-gray rounded-pill border-0 text-dark" data-bs-toggle="tooltip"
                data-bs-placement="bottom" title="Team"><i class="fas fa-users"></i></button>
            <button class="btn btn-circle btn-outline-gray rounded-pill border-0 text-dark" data-bs-toggle="tooltip"
                data-bs-placement="bottom" title="Reports"><i class="fas fa-scroll"></i></button>
            <button class="btn btn-circle btn-outline-gray rounded-pill border-0 text-dark fs-7 fw-bold"
                data-bs-toggle="tooltip" data-bs-placement="bottom" title="KDS">KDS</button>
            <button class="btn btn-circle btn-outline-gray rounded-pill border-0 text-dark" data-bs-toggle="tooltip"
                data-bs-placement="bottom" title="Opportunities"><i class="fas fa-briefcase"></i></button>
            <button class="btn btn-circle btn-outline-gray rounded-pill border-0 text-dark" data-bs-toggle="tooltip"
                data-bs-placement="bottom" title="Messages"><i class="fas fa-comment-dots"></i></button>
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
                class="btn btn-circle btn-outline-secondary rounded-pill border-0 cubic-bezier dropdown-toggle no-content"
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
        <div class="dropdown">
            <button class="btn btn-outline-gray p-0 rounded-pill border-0">
                <img src="/public/images/img.jpg" class=" rounded-pill dropdown-toggle no-content"
                    style="width: 35px;" />
            </button>
            <div id="profile-dropdown" class="btn rounded-pill  overflow-hidden p-0 dropdown-toggle no-content"
                data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-angle-down text-black-50"></i>
            </div>
            <ul class="dropdown-menu shadow-md mt-3 rounded-5 border-0 p-0" aria-labelledby="profile-dropdown">
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
                            class="fas fa-sign-out-alt me-2 fs-4 text-black-50"></i>Log out</a></li>
            </ul>
        </div>

    </article>
</nav>
@endsection

<main class="d-flex flex-column justify-content-center position-relative mx-3 p-3">
    <!-- container -->
    <div class="z-3">
        <section class="grid flow-row gap-4">
            <div class="span" style="--span: 12;">
                <button class="btn btn-warning fw-bold rounded-pill px-4">Discover</button>
            </div>
            <article class="rounded-5 flex-column bg-white span p-4 overflow-hidden" style="--span: 12;">
                <article class="flex justify-content-between pb-2">
                    <div>Recent Projects</div>
                    <a href="#" class="btn fw-bold btn-light shadow-sm px-3 rounded-pill fs-9">View All Projects</a>
                </article>
                <section class="flex-row gap-3 flex-wrapper">
                    <!-- danger project -->
                    <article class="position-relative bg-light rounded-3 shadow-sm p-3 bl-danger flex-column span"
                        style="--span:3">
                        <i class="fas fa-ellipsis-h text-black-50 position-absolute top-0 end-0 m-2"></i>
                        <article class="flex-row gap-2 mb-2 align-items-center">
                            <article class="align-items-center justify-contet-center">
                                <div class="bg-success btn-circle text-success"
                                    style="--size: 40px; --bs-bg-opacity: 0.3">
                                    <i class="fas fa-code"></i>
                                </div>
                            </article>
                            <article class="flex-column">
                                <div class="fw-bold fs-8">Product Preview...</div>
                                <div class="fs-8 text-black-50">Iconspace Team</div>
                            </article>
                        </article>

                        <article class="flex-column pt-1 gap-1 fs-8">
                            <article class="justify-content-between">
                                <div>Remain Milestone</div>
                                <b>2</b>
                            </article>
                            <article class="justify-content-between gap-3">
                                <div>Project Deadline</div>
                                <b>6 weeks later</b>
                            </article>
                            <article class="justify-content-between gap-3">
                                <div>Assigned to me</div>
                                <b>2</b>
                            </article>
                            <article class="w-100 flex-column align-items-end">
                                <b>70%</b>
                                <progress id="sss" max="100" class=" w-100" role="progressbar"
                                    value="80">70%</progress>
                            </article>
                            <hr class="my-2 text-black-50">
                            <article class="align-items-center justify-content-between">
                                <div>My Task</div>
                                <i class="fas fa-chevron-down text-black-50"></i>
                            </article>
                        </article>
                    </article>
                    <!-- warning project -->
                    <article class="position-relative bg-light rounded-3 shadow-sm p-3 bl-warning flex-column span"
                        style="--span:3">
                        <i class="fas fa-ellipsis-h text-black-50 position-absolute top-0 end-0 m-2"></i>
                        <article class="flex-row gap-2 mb-2 align-items-center">
                            <article class="align-items-center justify-contet-center">
                                <div class="bg-success btn-circle text-success"
                                    style="--size: 40px; --bs-bg-opacity: 0.3">
                                    <i class="fas fa-code"></i>
                                </div>
                            </article>
                            <article class="flex-column">
                                <div class="fw-bold fs-8">Product Previews...</div>
                                <div class="fs-8 text-black-50">Iconspace Team</div>
                            </article>
                        </article>

                        <article class="flex-column pt-1 gap-1 fs-8">
                            <article class="justify-content-between">
                                <div>Proposed Milestone</div>
                                <b>2</b>
                            </article>
                            <article class="justify-content-between gap-3">
                                <div>Estimated Payment</div>
                                <b>$ 1567</b>
                            </article>
                            <article class="justify-content-between gap-3">
                                <div>Assigned to me</div>
                                <b>2</b>
                            </article>
                            <article class="w-100 flex-column align-items-end">
                                <b>70%</b>
                                <progress id="project" max="100" class="progressbar w-100" value="80">70%</progress>
                            </article>
                            <hr class="my-2 text-black-50">
                            <article class="align-items-center justify-content-between">
                                <div>Proposed Project Plan</div>
                                <i class="fas fa-chevron-down text-black-50"></i>
                            </article>
                        </article>
                    </article>
                    <!-- success project -->
                    <article class="position-relative bg-light rounded-3 shadow-sm p-3 bl-success flex-column span"
                        style="--span:3">
                        <i class="fas fa-ellipsis-h text-black-50 position-absolute top-0 end-0 m-2"></i>
                        <article class="align-items-center gap-2 mb-2 ">
                            <article class="align-items-center justify-contet-center">
                                <div class="bg-primary btn-circle text-primary"
                                    style="--size: 40px; --bs-bg-opacity: 0.3">
                                    <i class="fab fa-codepen"></i>
                                </div>
                            </article>
                            <article class="flex-column">
                                <div class="fw-bold fs-8">Product Preview...</div>
                                <div class="fs-8 text-black-50">Iconspace Team</div>
                            </article>
                        </article>
                        <article class="flex-column pt-1 gap-1 fs-8">
                            <article class="justify-content-between">
                                <div>Completed Milestone</div>
                                <b>2</b>
                            </article>
                            <article class="justify-content-between gap-3">
                                <div>Project Payment</div>
                                <b>$1567</b>
                            </article>
                            <article class="justify-content-between gap-3">
                                <div>Assigned to me</div>
                                <b>2</b>
                            </article>
                            <article class="w-100 flex-column align-items-end">
                                <b>70%</b>
                                <progress id="ssd" max="100" class="progressbar w-100" value="80">70%</progress>
                            </article>
                            <hr class="my-2 text-black-50">
                            <article class="align-items-center justify-content-between">
                                <div>My Tasks</div>
                                <i class="fas fa-chevron-down text-black-50"></i>
                            </article>
                        </article>
                    </article>

                    <!-- start project -->
                    <article class="position-relative bg-light rounded-3 shadow-sm p-3 bl-primary flex-column span"
                        style="--span:3">
                        <i class="fas fa-ellipsis-h text-black-50 position-absolute top-0 end-0 m-2"></i>

                        <article class="align-items-center gap-2 mb-2 ">
                            <article class="align-items-center justify-contet-center">
                                <div class="bg-danger btn-circle text-danger"
                                    style="--size: 40px; --bs-bg-opacity: 0.3">
                                    <i class="fas fa-terminal"></i>
                                </div>
                            </article>
                            <article class="flex-column">
                                <div class="fw-bold fs-8">Product Preview & Mock up...</div>
                                <div class="fs-8 text-black-50">Iconspace Team</div>
                            </article>
                        </article>

                        <article class="flex-column pt-1 gap-1 fs-8">
                            <article class="justify-content-between">
                                <div>Required Milestone</div>
                            </article>
                            <article class="justify-content-between gap-3">
                                <div>Estimated Payment</div>
                            </article>
                            <article class="justify-content-between gap-3">
                                <div>Project Deadline</div>
                            </article>
                        </article>
                    </article>

                </section>


            </article>
            <article class="span gap-3 align-items-start" style="--span: 12;">
                <article class="col flex-column bg-white  rounded-4 shadow-sm p-1 h-auto">
                    <article class="col justify-content-between align-items-start p-4 pb-0">
                        <div>My team</div>
                        <i class="fas fa-ellipsis-h text-black-50"></i>
                    </article>
                    <!-- card team -->
                    <article class="bg-light p-3 mt-2 rounded-4 flex-column gap-2">
                        <article class="align-items-center justify-content-between col">
                            <article class="align-items-center gap-2 ">
                                <div class="bg-success btn-circle text-success"
                                    style="--size: 40px; --bs-bg-opacity: 0.3">
                                    <i class="fas fa-code"></i>
                                </div>
                                <div>Code Studio</div>
                            </article>
                            <div class="fas fa-ellipsis-h text-black-50"></div>
                        </article>
                        <article class="gap-2">
                            <i class="fas fa-user btn-circle bg-danger text-danger" style="--bs-bg-opacity: 0.2;"></i>
                            <i class="fas fa-user btn-circle bg-success text-success"
                                style="--bs-bg-opacity: 0.2;"></i>
                            <i class="fas fa-user btn-circle bg-primary text-primary"
                                style="--bs-bg-opacity: 0.2;"></i>
                            <i class="fas fa-user btn-circle bg-danger text-danger" style="--bs-bg-opacity: 0.2;"></i>
                        </article>
                    </article>
                    <!-- end card team -->
                    <!-- card team -->
                    <article class="bg-light p-3 mt-2 rounded-4 flex-column gap-2">
                        <article class="align-items-center justify-content-between col">
                            <article class="align-items-center gap-2 ">
                                <div class="bg-primary btn-circle text-primary"
                                    style="--size: 40px; --bs-bg-opacity: 0.3">
                                    <i class="fas fa-code"></i>
                                </div>
                                <div>Regrowup Devs</div>
                            </article>
                            <div class="fas fa-ellipsis-h text-black-50"></div>
                        </article>
                        <article class="gap-2">
                            <i class="fas fa-user btn-circle bg-danger text-danger" style="--bs-bg-opacity: 0.2;"></i>
                            <i class="fas fa-user btn-circle bg-success text-success"
                                style="--bs-bg-opacity: 0.2;"></i>
                            <i class="fas fa-user btn-circle bg-primary text-primary"
                                style="--bs-bg-opacity: 0.2;"></i>
                            <i class="fas fa-user btn-circle bg-danger text-danger" style="--bs-bg-opacity: 0.2;"></i>
                        </article>
                    </article>
                    <!-- end card team -->
                </article>
                <!-- chartjs -->
                <article class="col bg-white p-4 rounded-4 shadow-sm flex-column">
                    <div>KDS headline</div>
                    <canvas id="myChart" width="300" height="200"></canvas>
                </article>
                <article class="col bg-white p-4 rounded-4 shadow-sm flex-column gap-3
          ">
                    <article class="justify-content-between w-100">
                        <div class="fw-bold">
                            Best march
                        </div>
                        <a href="#" class="btn p-0 fs-9 text-primary">view more <i class="fas fa-angle-right"></i></a>
                    </article>
                    <div>Terms to join</div>
                    <article class="gap-3">
                        <div class="col border border-2 rounded-3 border-dark" style="height: 60px;"></div>
                        <div class="col border border-2 rounded-3 border-dark" style="height: 60px;"></div>
                    </article>
                    <div>Talent Recruitment</div>
                    <div>Projects</div>
                    <div>Talent to invite to your team</div>
                </article>
            </article>
        </section>
    </div>
</main>
