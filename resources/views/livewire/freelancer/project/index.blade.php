@section('title', 'Freelancer Dashboard')
@section('header')
    @include('layouts.navigation-freelancer')
@endsection
<main class="container d-flex col-12 py-4 gap-2" x-data="{
    open: false,
    findTeam: false,
    teamOpen: false,
    current: { id: 'selectTeam' },
    sections: [
        { id: 'selectTeam' },
        { id: 'coverLetter' },
        { id: 'proposeBudget' },
        { id: 'monthlyBudget' },
        { id: 'review' },
    ]
}">
    <style>
        aside.list-unstyled>li:hover {
            background-color: #eee;
            cursor: pointer;
        }

        .list>li:hover {
            background-color: #eee;
        }

        .list>li:not(:last-child) {
            border-bottom: 1px solid #ccc;
        }

        .active-side {
            background-color: #eee;
        }

        .rotate-180 {
            transform: rotate(180deg);
        }

        dialog::backdrop {
            background-color: rgba(0, 0, 0, 0.3);
            z-index: 9999;
        }

    </style>
    <aside class="col-3">
        <ul class="list-unstyled border rounded-3  list m-0 bg-white">
            <li class="p-2 active-side">create project</li>
            <li class="p-2">Applied projects</li>
            <li class="p-2">Ongoing projects</li>
            <li class="p-2">Offers & Proposal</li>
            <li class="p-2">Projects invitations</li>
            <li class="p-2">completed projects</li>
            <li class="p-2">clients</li>
            <li class="p-2">discover</li>
            <li class="p-2">Recently viewed</li>
        </ul>
    </aside>
    <section id="content" class="d-flex flex-column col-9">
        <ul class="list list-unstyled d-flex flex-column w-100 border rounded-3">
            @foreach ($projects as $item)
                <li class="p-3 d-flex flex-column w-100 gap-3">
                    <div class="d-flex justify-content-between">
                        <div>{{ $item->title }}</div>
                        <div>applied by you (team owner)</div>
                        <div>Proposed Budget: ${{ $item->total_budget }}</div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div class="flex gap-3">
                            <i class="fas fa-image"></i>
                            <span>Team name</span>
                        </div>
                        <div>Cover letter</div>
                        <div>Portfolio showcase:</div>
                    </div>
                    <div>
                        5 payment verified Members
                    </div>
                    <div class="d-flex flex-end">
                        <button type="button" class="btn btn-primary"
                            x-on:click="$wire.selectProject({{ $item }}); open= true">apply process</button>
                    </div>
                </li>
            @endforeach
        </ul>
    </section>
    {{-- ! dialog --}}
    <dialog open x-show="open" class="position-fixed top-0 end-0 start-0 h-100 w-100 shadow-md z-1">
        <form wire:submit.prevent='submit'
            class="bg-white w-50 mx-auto position-absolute top-50 end-50 start-50 translate-middle rounded-4 shadow-md">
            {{-- selectTeam 0 --}}
            <article x-show="current.id === 'selectTeam'" class="flex-column p-4 position-relative">
                <i  @click="open=false"
                    class="fas fa-times position-absolute top-0 end-0 p-2 m-1 text-danger btn-circle bg-light rounded-pill"></i>
                <div class="mb-5">
                    <h5 class="mb-4">
                        apply to the project post: <strong>{{ $project_selected['title'] ?? 'title' }}</strong>
                    </h5>
                    <label for="search-team" class="m-2">
                        select a team that you are the owner / project manager of
                    </label>
                    <div class="position-relative dropdown col-auto">
                        <div class="position-relative dropdown-toggle no-content " data-bs-toggle="dropdown">
                            <input type="text" @click="teamOpen = true" @click.outside="teamOpen = false"
                                id="search-team" class="form-control"
                                value="{{ $team_selected->name ?? 'choose a team' }}" placeholder="choose a team">
                            <ul id="team-list" x-show="teamOpen"
                                class="overflow-hidden position-absolute mt-5 top-0 shadow-sm start-0 bg-white rounded-4 list list-unstyled w-100">
                                @foreach ($teams as $item)
                                    <li class="p-2" wire:click="selectTeam({{ $item->id }})">
                                        <article class="flex-column gap-2 px-2">
                                            <article class="gap-3 align-items-center">
                                                <article class="btn-circle bg-primary p-4 bg-gradient"
                                                    style="--bs-bg-opacity: 0.5;">
                                                    <i
                                                        class="fas fa-users fs-4 bg-primary background-clip bg-gradient"></i>
                                                </article>
                                                <b>{{ $item->name }}</b>
                                                <div>{{ $item->category->name ?? ''}}</div>
                                                <div>Skills</div>
                                            </article>
                                            <article class="gap-3 small">
                                                <b class="small">
                                                    {{ $item->payment_verified_members }} Payment verified members
                                                </b>
                                                <div class="small">
                                                    {{ $item->project_completed }} Projects completed
                                                </div>
                                                <div class="small">
                                                    {{ $item->ownership->name ?? 'name' }}
                                                </div>
                                            </article>
                                        </article>
                                    </li>
                                    {{-- <li value="{{ $item->id }}" class="p-3"
                                        wire:click="selectTeam({{ $item }})">{{ $item->name }}</option> --}}
                                @endforeach
                            </ul>
                            <span class="position-absolute fas fa-chevron-down top-0 my-1 end-0 no-content p-2"></span>
                        </div>
                    </div>
                </div>
                <article class="justify-content-between mt-3 flex-grow-1">
                    <button class="btn btn-outline-gray" @click="open = false">
                        cancle
                    </button>
                    <button class="btn btn-primary" type="button" @click="current = sections[1]">
                        Next <i class="fas ms-2 fa-chevron-right"></i>
                    </button>
                </article>
            </article>
            {{-- cover letter 1 --}}
            <article x-show="current.id === 'coverLetter'" class="flex-column p-4 position-relative">
                <i @click="open=false"
                    class="fas fa-times position-absolute top-0 end-0 p-2 m-1 text-danger btn-circle bg-light rounded-pill"></i>
                <h5 class="mb-4">apply to the project post: <strong>{{ $project_selected['title'] ?? 'title' }}</strong></h5>
                <div class="mb-5 ">
                    <label for="search-team my-3">selected team:</label>
                    <article class="flex-column gap-2 p-3 border rounded-3 mt-2 rounded-4">
                        <article class="gap-3 align-items-center">
                            <article class="btn-circle bg-primary p-4 bg-gradient" style="--bs-bg-opacity: 0.5;">
                                <i class="fas fa-users fs-4 bg-primary background-clip bg-gradient"></i>
                            </article>
                            <b>{{ $team_selected->name ?? '' }}</b>
                            <div>{{ $team_selected->category->name ?? '' }}</div>
                            <div>Skills</div>
                        </article>
                        <article class="gap-3 small">
                            <b>{{ $team_selected->payment_verified_members ?? '' }} Payment verified members</b>
                            <div>{{ $team_selected->project_completed ?? '' }} Projects completed</div>
                            <div>You are its owner</div>
                        </article>
                    </article>
                </div>
                <article class="gap-3 align-items-start">
                    <div class="row col-6">
                        <label for="cover-letter" class="form-label">Cover Letter(Optional):</label>
                        <textarea rows="5" wire:model="cover_letter"  class="form-control"></textarea>
                    </div>
                    <div class="col-6 px-2 gap-3">
                        <div>Show Case(Optional):</div>
                        <article class="align-items-center">
                            <article class="btn-circle rounded-3 bg-primary p-4 bg-gradient m-1"
                                style="--bs-bg-opacity: 0.5;">
                                <i class="fas fa-image fs-4 bg-primary background-clip bg-gradient"></i>
                            </article>
                            <div class="flex-fill">Project Name</div>
                            <i class="fas fa-times p-3 bg-white-o"></i>
                        </article>
                        <article class="align-items-center">
                            <article class="btn-circle rounded-3 bg-primary p-4 bg-gradient m-1"
                                style="--bs-bg-opacity: 0.5;">
                                <i class="fas fa-image fs-4 bg-primary background-clip bg-gradient"></i>
                            </article>
                            <div class="flex-fill ">Project Name</div>
                            <i class="fas fa-times p-3 bg-white-o"></i>
                        </article>
                        <button class="btn btn-primary d-flex gap-2">
                            <i class="fas fa-images"></i>
                            <div class="fs-8">select projects from Team's portfolio</div>
                        </button>
                    </div>
                </article>
                <article class="justify-content-between mt-3">
                    <button class="btn btn-outline-gray" @click="current = sections[0]">
                        <i class="fas me-2 fa-chevron-left"></i> Back
                    </button>
                    <button class="btn btn-primary" type="button" @click="current = sections[2]">
                        Next <i class="fas ms-2 fa-chevron-right"></i>
                    </button>
                </article>
            </article>
            {{-- proposeBudget 2 --}}
            <article x-show="current.id === 'proposeBudget'" class="flex-column p-4 position-relative">
                <i @click="open=false"
                    class="fas fa-times position-absolute top-0 end-0 p-2 m-1 text-danger btn-circle bg-light rounded-pill"></i>
                <h5 class="mb-4">apply to the project post: <strong>{{ $project_selected['title'] ?? 'title' }}</strong></h5>
                <div class="mb-5 ">
                    <label for="search-team my-3">selected team:</label>
                    <article class="flex-column gap-2 p-3 border rounded-3 mt-2 rounded-4">
                        <article class="gap-3 align-items-center">
                            <article class="btn-circle bg-primary p-4 bg-gradient" style="--bs-bg-opacity: 0.5;">
                                <i class="fas fa-users fs-4 bg-primary background-clip bg-gradient"></i>
                            </article>
                            <b>{{ $team_selected->name ?? '' }}</b>
                            <div>{{ $team_selected->category->name ?? '' }}</div>
                            <div>Skills</div>
                        </article>
                        <article class="gap-3 small">
                            <b>{{ $team_selected->payment_verified_members ?? '' }} Payment verified members</b>
                            <div>{{ $team_selected->project_completed ?? '' }} Projects completed</div>
                            <div>You are its owner</div>
                        </article>
                    </article>
                </div>
                <div class="row pb-3">
                    <label for="propose-budget" class="form-label">Propose a budget(Optional):</label>
                    <div class="position-relative col-6">
                        <span class="position-absolute top-0 start-0 p-2 mx-3">$</span>
                        <input type="text" wire:model="propose_budget" class="form-control px-4" id="propose-budget">
                        <span class="position-absolute top-0 end-0 p-2 mx-3">monthly</span>
                    </div>
                    <div class="col align-self-center text-primary">Use the client's estimated budget</div>
                </div>
                <div class="py-3">
                    <div>select the team's service offering as reference (Optional):</div>
                    <button class="btn btn-primary fs-8">
                        <i class="fas fa-images"></i> select projects from Team's portfolio
                    </button>
                </div>
                <article class="justify-content-between mt-3">
                    <button class="btn btn-outline-gray" @click="current = sections[1]">
                        <i class="fas me-2 fa-chevron-left"></i> Back
                    </button>
                    <button class="btn btn-primary" type="button" @click="current = sections[3]">
                        Next <i class="fas ms-2 fa-chevron-right"></i>
                    </button>
                </article>
            </article>
            {{-- monthlyBudget 3 --}}
            <article x-show="current.id === 'monthlyBudget'" class="flex-column p-4 position-relative">
                <i @click="open=false"
                    class="fas fa-times position-absolute top-0 end-0 p-2 m-1 text-danger btn-circle bg-light rounded-pill"></i>

                <h5 class="mb-4">apply to the project post: <strong>{{ $project_selected['title'] ?? 'title' }}</strong></h5>

                <div class="mb-5 ">
                    <label for="search-team my-3">selected team:</label>
                    <article class="flex-column gap-2 p-3 border rounded-3 mt-2 rounded-4">
                        <article class="gap-3 align-items-center">
                            <article class="btn-circle bg-primary p-4 bg-gradient" style="--bs-bg-opacity: 0.5;">
                                <i class="fas fa-users fs-4 bg-primary background-clip bg-gradient"></i>
                            </article>
                            <b>{{ $team_selected->name ?? '' }}</b>
                            <div>{{ $team_selected->category->name ?? '' }}</div>
                            <div>Skills</div>
                        </article>
                        <article class="gap-3 small">
                            <b>{{ $team_selected->payment_verified_members ?? '' }} Payment verified members</b>
                            <div>{{ $team_selected->project_completed ?? '' }} Projects completed</div>
                            <div>You are its owner</div>
                        </article>
                    </article>
                </div>

                <div class="row pb-3">
                    <label for="propose-budget" class="form-label">Propose a budget(Optional):</label>
                    <div class="position-relative col-6">
                        <span class="position-absolute top-0 start-0 p-2 mx-3">$</span>
                        <input type="text" wire:model="propose_budget_monthly" class="form-control px-4" id="propose-budget">
                        {{-- <span class="position-absolute top-0 end-0 p-2 mx-3">monthly</span> --}}
                    </div>
                    <div class="col align-self-center text-primary">Use the client's estimated budget</div>
                </div>

                <div class="py-3">
                    <div>select the team's service offering as reference (Optional):</div>
                    <button class="btn btn-primary fs-8">
                        <i class="fas fa-images"></i>
                        select projects from Team's portfolio
                    </button>
                </div>

                <article class="justify-content-between mt-3">
                    <button class="btn btn-outline-gray" @click="current = sections[1]">
                        <i class="fas me-2 fa-chevron-left"></i> Back
                    </button>
                    <button class="btn btn-primary" type="button" @click="current = sections[4]">
                        Next <i class="fas ms-2 fa-chevron-right"></i>
                    </button>
                </article>

            </article>
            {{-- review 4 --}}
            <article x-show="current.id === 'review'" class="flex-column p-4 position-relative">

                <i @click="open=false"
                    class="fas fa-times position-absolute top-0 end-0 p-2 m-1 text-danger btn-circle bg-light rounded-pill"></i>

                <h5 class="mb-4">apply to the project post: <strong>{{ $project_selected['title'] ?? 'title' }}</strong></h5>

                <div class="mb-5 ">
                    <label for="search-team my-3">selected team:</label>
                    <article class="flex-column gap-2 p-3 border rounded-3 mt-2 rounded-4">
                        <article class="gap-3 align-items-center">
                            <article class="btn-circle bg-primary p-4 bg-gradient" style="--bs-bg-opacity: 0.5;">
                                <i class="fas fa-users fs-4 bg-primary background-clip bg-gradient"></i>
                            </article>
                            <b>{{ $team_selected->name ?? '' }}</b>
                            <div>{{ $team_selected->category->name ?? '' }}</div>
                            <div>Skills</div>
                        </article>
                        <article class="gap-3 small">
                            <b>{{ $team_selected->payment_verified_members ?? '' }} Payment verified members</b>
                            <div>{{ $team_selected->project_completed ?? '' }} Projects completed</div>
                            <div>You are its owner</div>
                        </article>
                    </article>
                </div>

                <div>cover letter: {{ $cover_letter }}<span class="fas fa-pen-to-square ps-5"></span></div>
                <div>portfolio showcase: {{ $showcase }}<span class="fas fa-pen-to-square ps-5"></span></div>
                <div>proposed budget: {{ $propose_budget }}<span class="fas fa-pen-to-square ps-5"></span></div>
                <div>referred team's service offering {{ $referred_team }}<span class="fas fa-pen-to-square ps-5"></span></div>

                <article class="justify-content-between mt-3">
                    <button class="btn btn-outline-gray" @click="current = sections[3]">
                        <i class="fas me-2 fa-chevron-left"></i> Back
                    </button>
                    <button class="btn btn-primary" type="submit">
                        apply project <i class="fas ms-2 fa-chevron-right"></i>
                    </button>
                </article>
            </article>
        </form>
    </dialog>

</main>
