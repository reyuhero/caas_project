@section('title', 'create project')

@section('header')
    @include('layouts.navigation-freelancer')
@endsection
<main class="container">
    <style>
        aside>* {
            padding: 0;
            margin: 0;
        }

        .list {
            list-style-type: none;
        }

        .list>li {
            position: relative;
            padding-left: 30px;
            padding-block: 10px;
            font-weight: normal;
            transition: font-weight 0.3s ease-in-out;
        }

        .list>li::after {
            content: attr(aria-label);
            background-color: hsl(216, 98%, 80%);
            color: #fff;
            font-size: 10px;
            display: grid;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            top: 50%;
            left: 0;
            transform: translate(-50%, -50%);
            position: absolute;
            align-content: space-around;
            justify-content: center;
            justify-items: center;
            align-items: center;
            transition: all 0.3s ease-in-out;
        }

        .list>li.active-step {
            font-weight: bold;
            transition: font-weight 0.3s ease-in-out;
        }

        .list>li.active-step::after {
            background-color: var(--bs-primary);
            width: 30px;
            height: 30px;
            transition: all 0.3s ease-in-out;
        }

        .list>li::before {
            content: "";
            position: absolute;
            background-color: var(--bs-primary);
            top: 50%;
            left: -1px;
            height: 100%;
            width: 1px;
        }

        .list>li:last-child::before {
            content: none !important;
        }

    </style>
    <script>
        document.addEventListener('alpine:init', function() {
            Alpine.store("data", {
                skills: @js($skills),
                skill_open: false,
                budget2: false,
                skills_grouped: function() {
                    const data = @json($skills);
                    var grouped = data.reduce((dictionary, p) => {
                        dictionary[p.category.name] = dictionary[p.category.name] || [];
                        dictionary[p.category.name].push(p);
                        return dictionary;
                    }, {})
                    console.log('grouped', grouped)
                    return grouped;
                },
                post_review: false,
                current: {
                    id: 'started',
                    title: 'get started',
                    progress: '5%',
                    status: false,
                },
                steps: [{
                        id: 'started',
                        title: 'get started',
                        progress: '5%',
                        status: false,
                    },
                    {
                        id: 'timeline',
                        title: 'timeline & method',
                        progress: '25%',
                        status: false,
                    },
                    {
                        id: 'category',
                        progress: '40%',
                        title: 'category',
                        status: false,
                    },
                    {
                        id: 'skills',
                        progress: '50%',
                        title: 'skills',
                        status: false,
                    },
                    {
                        id: 'budget',
                        progress: '65%',
                        title: 'budget',
                        status: false,
                    },
                    {
                        id: 'scope',
                        progress: '85%',
                        title: 'scope',
                        status: false,
                    },
                    {
                        id: 'post',
                        progress: '100%',
                        title: 'post details',
                        status: false,
                    }
                ]
            })
        })
    </script>
    <form x-data="{ store: $store.data }" class="d-flex" x-data wire:submit.prevent='submit'>
        <aside class="d-flex col-3 flex-row bg-white rounded-4 gap-2 p-4 h-100">
            <ul class="list">
                <template x-for="(step, index) in store.steps">
                    <li :aria-label="index" :key="step.id" type="button" :disabled="step.status" :id="step.id"
                        :class="{'active-step': store.current.id === step.id}" @click="store.current.id = step.id">
                        <div x-text="step.title"></div>
                    </li>
                </template>
            </ul>
        </aside>
        {{-- started --}}
        <article x-show="store.current.id === 'started'"
            class="col-9 flex-column bg-white align-content-center p-4 rounded-4">
            <div class="fs-2 fw-bold my-6">
                Get Started
            </div>
            <div class="py-3">please tell us more about your project</div>
            <article class="flex-wrap gap-4 mt-3">

                <div class="col-5">
                    <label for="project-duration" class="form-label">project duration</label>
                    <select class="form-control" class="form-control" wire:model="form.duration"
                        id="project-duration">
                        <option>Select duration</option>
                        <option value="less than 1 month">less than 1 month</option>
                        <option value="1 - 3 months">1 - 3 months</option>
                        <option value="3 months +">3 months + </option>
                    </select>
                </div>
                <div class=" col-5">
                    <label for="start_date" class="form-label">start date</label>
                    <select type="date" class="form-control" wire:model="form.start_date" id="start_date">
                        <option>Select start date</option>
                        <option value="ASAP">ASAP</option>
                        <option value="within 2 weeks">within 2 weeks</option>
                        <option value="more than 2 weeks from now">more than 2 weeks from now</option>
                    </select>
                </div>
            </article>
            <article class="justify-content-between mt-auto">
                <button type="button" class="btn btn-outline-primary">reuse a previous project post</button>
                <article class="gap-3">
                    <button type="button" class="btn btn-ouline-light">cancel</button>
                    <button type="button" class="btn btn-primary" @click="store.current = store.steps[1]">next: timeline
                        & method</button>
                </article>
            </article>
        </article>
        {{-- timeline --}}
        <article x-show="store.current.id === 'timeline'"
            class="col-9 flex-column bg-white align-content- p-4 rounded-4 ">
            <div class="fs-2 fw-bold my-6">
                Timeline
            </div>
            <div class="py-3">please tell us more about the duration and timeline of your project</div>
            <article class="flex-wrap gap-4 mt-3">
                <div class="col-5">
                    <label for="project-duration1" class="form-label">project duration</label>
                    <input type="text" wire:model="form.duration" class="form-control" id="project-duration1">
                </div>
                <div class=" col-5">
                    <label for="start-date1" class="form-label">start date</label>
                    <input type="text" class="form-control" wire:model="form.start_date" id="start-date1">
                </div>
                <div class="col-auto">
                    <div class="fw-bold">Method</div>
                    <div>How do you like to work with independent talents and Klabo teams of your project. <i
                            class="fas fa-question-circle text-primary"></i></div>
                </div>
                <div class="d-flex flex-row gap-3">
                    <article
                        class="col-5 flex-column p-4 justify-content-center align-items-center position-relative border-2 bg-light rounded-4 shadow-md">
                        <input type="radio" id="method1" wire:model="form.method" name="method"
                            value="milestone-based fixed price"
                            class="position-absolute top-0 start-0 m-3 text-black-50">
                        <label for="method1" class="text-center form-label" type="button">
                            <div class="fw-bold fs-6 mb-2 mt-2">milestone-based fixed price</div>
                            <div class="fs-7 mb-3">milestone-based fixed price</div>
                        </label>
                    </article>

                    <article
                        class="col-5 flex-column p-4 justify-content-center align-items-center position-relative border-2 bg-light rounded-4 shadow-md">
                        <input type="radio" id="method2" wire:model="form.method" name="method"
                            value="Staff Augumentetion" class="position-absolute top-0 start-0 m-3 text-black-50">
                        <label for="method2" class="text-center form-label" type="button">
                            <div class="fw-bold fs-6 mb-2 mt-2">Staff Augumentetion</div>
                            <div class="fs-7 mb-3 text-center">Best for designated long-term work or to integrate the
                                freelance
                                team into your organisation.</div>
                        </label>
                    </article>

                </div>

            </article>
            <article class="justify-content-between mt-4">
                <button type="button" class="btn btn-outline-primary">reuse a previous project post</button>
                <article class="gap-3">
                    <button type="button" class="btn btn-ouline-light">cancel</button>
                    <button type="button" class="btn btn-primary" @click="store.current = store.steps[2]">next:
                        category</button>
                </article>
            </article>
        </article>
        {{-- category --}}
        <article x-show="store.current.id === 'category'"
            class="col-9 flex-column bg-white align-content- p-4 rounded-4">
            <div class="fs-2 fw-bold my-6">
                Category
            </div>
            <div class="py-3">Select and search the category you need.</div>
            <article class="flex-wrap gap-4 mt-3">
                <article class="w-100 row ">
                    <div class="form-label pe-3">selected</div>
                    <article class="flex-row bg-light py-2 px-3 rounded-3 gap-2 border flex-wrap">
                        @foreach ($selected_categories as $key => $item)
                            <button type="button" class="btn btn-warning p-0 m-0 rounded-pill"
                                wire:click="removeCategory({{ $key }})">
                                <small class="pe-2 ps-3">{{ $item['name'] }}</small>
                                <span class="badge bg-danger btn rounded-pill m-0">&times;</span>
                            </button>
                        @endforeach
                    </article>
                </article>
                <div class="d-flex gap-2 mt-3 col-12 flex-wrap">
                    @foreach ($categories as $item)
                        <button type="button" wire:click="addCategory({{ $item }})"
                            class="btn bg-gradient d-flex bg-light rounded-4 p-3 border flex-column col-3 shadow-sm align-items-center text-center">
                            <i class=" fs-2 mb-3 text-warning {{ $item->icon }}"></i>
                            <small class="text-center">{{ $item->name }}</small>
                        </button>
                    @endforeach
                </div>
            </article>
            <article class="justify-content-between mt-4">
                <button type="button" class="btn btn-outline-primary">view full category list</button>
                <article class="gap-3">
                    <button type="button" class="btn btn-ouline-light">back</button>
                    <button type="button" class="btn btn-primary"
                        @click="store.current = store.steps[3]">Continue</button>
                </article>
            </article>
        </article>
        {{-- skills --}}
        <article x-show="store.current.id === 'skills' " class="col-9 flex-column bg-white p-4 rounded-4">
            <div class="fs-2 fw-bold my-6">
                Skills
            </div>
            <div class="py-3">what main skills does your project require</div>
            <article class="flex-column gap-1 mt-1">
                <div class="d-flex flex-column px-3 position-relative">
                    <label for="search-skills" class="form-label">Search skills or add your own</label>
                    <input type="text" class="form-control" x-on:click="store.skill_open = true"
                        x-on:click.outside="store.skill_open = false">
                    <ul :class=" store.skill_open ? 'd-flex' : 'd-none'"
                        class="position-absolute start-0 m-3 list-unstyled bg-white border rounded-4 flex-column overflow-hidden shodow-md"
                        style="top: 60px;z-index: 10;">
                        @foreach ($skills as $item)
                            <li type="button" class="dropdown-item" wire:click="addSkill({{ $item }})">
                                {{ $item->name }}</li>
                        @endforeach
                    </ul>
                    <span class="fas fa-search position-absolute bottom-0 end-0 w-auto me-3 my-2 pb-1"></span>
                </div>

                <article class="w-100 row px-3 pb-3">
                    <article class="flex-column p-3 gap-2 col-6">
                        <div>selected skills</div>
                        <article>
                            <article class="gap-3 flex-wrap">
                                @foreach ($selected_skills as $key => $item)
                                    <button type="button" class="btn btn-primary p-0 m-0 rounded-pill position-relative"
                                        wire:click="removeSkill({{ $key }})">
                                        <small class="pe-4 ps-3">{{ $item['name'] }}</small>
                                        <span class="badge bg-danger rounded-pill m-0 p-0 position-absolute"
                                            style="width: 26px; height: 26px; font-size: 25px; right:-5px; top: -1px;">&times;</span>
                                    </button>
                                @endforeach
                                {{-- <template x-for="skill in store.skills_selected">
                                    <button :key="skill.id" type="button"
                                        class="btn btn-primary p-0 m-0 rounded-pill position-relative"
                                        x-on:click="$wire.removeSkill(index)">
                                        <small x-text="skill.name" class="pe-4 ps-3"></small>
                                        <span class="badge bg-danger rounded-pill m-0 p-0 position-absolute"
                                            style="width: 26px; height: 26px; font-size: 25px; right:-5px; top: -1px;">&times;</span>
                                    </button>
                                </template> --}}
                            </article>
                        </article>
                    </article>
                    <article class="flex-column gap-2 col-6 p-3">
                        <div>suggested</div>
                        <article class="flex-wrap gap-2">
                            @foreach ($suggested_skills as $key => $item)
                                <button :key="skill.id" type="button"
                                    class="btn btn-primary p-0 m-0 rounded-pill position-relative"
                                    wire:click="removeSkill({{ $key }})">
                                    <small class="pe-4 ps-3">{{ $item['name'] }}</small>
                                    <span class="badge bg-danger rounded-pill m-0 p-0 position-absolute"
                                        style="width: 26px; height: 26px; font-size: 25px; right:-5px; top: -1px;">&plus;</span>
                                </button>
                            @endforeach
                        </article>
                        {{-- <template x-for="item in store.suggestedSkills">
                            <article :key="item.id" class="gap-3 flex-wrap">
                                <button type="button"
                                    class="btn btn-warning pe-2 p-0 m-0 rounded-pill position-relative"
                                    @click="store.addToSkillSelected(item)">
                                    <span class="badge bg-danger rounded-pill m-0 p-0 position-absolute"
                                        style="width: 26px; height: 26px; font-size: 25px; left:-5px; top: -1px;">&plus;</span>
                                    <small class="ps-4" x-text="item.name"></small>
                                </button>
                            </article>
                        </template> --}}
                    </article>
                </article>
                <article column class="gap-3">
                    <article class="gap-2 flex-wrap">
                        {{-- @foreach ($grouped_skills as $key => $items)
                            <div class="py-2 border-top w-100">{{ $key }}</div>
                            @foreach ($items as $item)
                                <button type="button"
                                    class="btn btn-primary p-0 pe-2 m-0 rounded-pill position-relative"
                                    wire:click="addSkill({{ $item }})">
                                    <small class="ps-4">{{ $item->name }}</small>
                                    <span class="badge bg-danger rounded-pill m-0 p-0 position-absolute"
                                        style="width: 26px; height: 26px; font-size: 25px; left:-5px; top: -1px;">&plus;</span>
                                </button>
                            @endforeach
                        @endforeach --}}
                    </article>
                    <template x-for="(items, index) in store.skills_grouped" :key="index">
                        <article column>
                            <div x-text="index" class="py-2 border-top w-100"></div>
                            <article class="gap-2 flex-wrap">
                                <template x-for="item in items">
                                    <button type="button"
                                        class="btn btn-primary p-0 pe-2 m-0 rounded-pill position-relative"
                                        @click="$wire.addSkill(item)">
                                        <small x-text="item.name" class="ps-4"></small>
                                        <span class="badge bg-danger rounded-pill m-0 p-0 position-absolute"
                                            style="width: 26px; height: 26px; font-size: 25px; left:-5px; top: -1px;">&plus;</span>
                                    </button>
                                </template>
                            </article>
                        </article>
                    </template>
                </article>
            </article>
            <article class="justify-content-between mt-4">
                <button type="button" class="btn btn-outline-primary">Edit Selected Category</button>
                <article class="gap-3">
                    <button type="button" class="btn btn-ouline-light">back</button>
                    <button type="button" class="btn btn-primary" @click="store.current = store.steps[4]">Next</button>
                </article>
            </article>

        </article>
        {{-- budget --}}
        <article x-show="store.current.id === 'budget' && store.budget2 === false"
            class="flex-column bg-white p-4 rounded-4">
            <div class="fs-2 fw-bold my-6">
                Budget
            </div>
            <article class="flex-column gap-1 mt-1">
                <div class="row px-3 position-relative col-5">
                    <label for="budget" class="form-label">Estimated Total Budget <i
                            class="fas fa-question-circle text-primary"></i></label>
                    <input wire:model="form.total_budget" type="text" name="budget" class="form-control ps-4"
                        id="budget">
                    <span class=" position-absolute bottom-0 start-0 w-auto ms-3 my-2">$</span>
                </div>
                <small>There will be the options to divide your project into milestone to be more management for
                    you</small>
            </article>
            <article class="justify-content-between mt-auto">
                <button type="button" class="btn btn-outline-primary">Cannot determine the budget yet</button>
                <article class="gap-3">
                    <button type="button" class="btn btn-ouline-light">back</button>
                    <button type="button" class="btn btn-primary" @click="store.budget2 = true">Next
                        Scope
                    </button>
                </article>
            </article>

        </article>
        {{-- budget 2 --}}
        <article x-show="store.budget2" class="flex-column bg-white p-4 rounded-4">
            <h2 class="fs-2 fw-bold my-6">
                Budget
            </h2>
            <p class="fs-7">By choosing staff Augumentation, you can integrate the freelance team into your
                organization and have the options to pay them</p>
            <article class="flex-column gap-1 mt-1">
                <div class="row px-3 position-relative col-6">
                    <label for="budget" class="form-label">Estimated monthly/weekly budget <i
                            class="fas fa-question-circle text-primary"></i></label>
                    <input type="text" name="budget" class="form-control px-3" id="budget">
                    <span class=" position-absolute bottom-0 start-0 w-auto ms-4 my-2">$</span>
                    <span class=" position-absolute bottom-0 end-0 w-auto me-4 my-2">
                        monthly 1 ⏷
                    </span>
                </div>
                <div class="row mt-3 col-6">
                    <label for="duration" class="form-label">duration <i
                            class="fas fa-question-circle text-primary"></i></label>
                    <div class="d-flex flex-row col-6 gap-3 align-items-center">
                        <input type="text" id="duration" class="form-control">
                        <span>month</span>
                    </div>
                </div>
                <div class="row mt-3">
                    <div>total budget for the staff Augumentation</div>
                    <b>$0</b>
                </div>
                <article class="fs-7 justify-content-end my-2">
                    <div class="col-4">
                        You will be able to choose how many talents you need in the next step.
                    </div>
                </article>
            </article>
            <article class="justify-content-between mt-auto">
                <button class="btn btn-outline-primary">Cannot determine the budget yet</button>
                <article class="gap-3">
                    <button class="btn btn-ouline-light">back</button>
                    <button class="btn btn-primary" @click="store.current = store.steps[5]">Next Scope</button>
                </article>
            </article>

        </article>
        {{-- scope --}}
        <article x-show="store.current.id === 'scope' " class="span flex-column bg-white p-4 rounded-4 ">
            <h2 class="fs-2 fw-bold my-6">
                scope
            </h2>
            <p class="fs-7">Estimated scope of your work</p>
            <article class="flex-column gap-2 mt-1">
                <article class="flex-wrap ">
                    <article class="col-3 p-1">
                        <article
                            class="text-center flex-column p-3 justify-content-center align-items-center position-relative border-2 bg-light rounded-4 shadow-md">
                            <input type="radio" id="small" wire:model="form.scope" name="scope" value="small"
                                class="position-absolute top-0 start-0 m-3 text-black-50">
                            <label for="small" class="form-label text-center" type="button">
                                <div class="fw-bold fs-6 mb-2 mt-2">Small</div>
                                <div class="fs-7">Quick and Straightforward tasks</div>
                            </label>
                        </article>
                    </article>
                    <article class="col-3 p-1 d-flex">
                        <article
                            class="text-center w-100 flex-column p-3 justify-content-center align-items-center position-relative border-2 bg-light rounded-4 shadow-md">
                            <input type="radio" id="medium" wire:model="form.scope" name="scope" value="medium"
                                class="position-absolute top-0 start-0 m-3 text-black-50">
                            <label for="medium" class="form-label text-center" type="button">
                                <div class="fw-bold fs-6  mb-2 mt-2">Medium</div>
                                <div class="fs-7 ">Well-define projects</div>
                            </label>
                        </article>
                    </article>
                    <article class="col-3 p-1">
                        <article
                            class="text-center flex-column p-3 justify-content-center align-items-center position-relative border-2 bg-light rounded-4 shadow-md">
                            <input type="radio" id="large" wire:model="form.scope" name="scope" value="large"
                                class="position-absolute top-0 start-0 m-3 text-black-50">
                            <label for="large" class="text-center form-label" type="button">
                                <div class="fw-bold fs-6  mb-2 mt-2">Large</div>
                                <div class="fs-7 ">Complex projects and initiatives</div>
                            </label>
                        </article>
                    </article>
                    <article class="col-3 p-1">
                        <article
                            class=" text-center flex-column p-3 justify-content-center align-items-center position-relative border-2 bg-light rounded-4 shadow-md">
                            <input type="radio" id="mega" wire:model="form.scope" name="scope" value="mega"
                                class="position-absolute top-0 start-0 m-3 text-black-50">
                            <label for="mega" class="form-label text-center" type="button">
                                <div class="fw-bold fs-6  mb-2 mt-2">Mega</div>
                                <div class="fs-7 ">Megaprojects require vast skillsets and management</div>
                            </label>
                        </article>
                    </article>
                </article>

                <div class="row px-3 position-relative col-7 my-3">
                    <label for="person" class="form-label">size of the freelance team you'd like to work with <i
                            class="fas fa-question-circle text-primary"></i></label>
                    <select name="person" class="form-select w-50" wire:model="form.team_size" id="person">
                        <option>Select your team size</option>
                        <option value="1">1 person</option>
                        <option value="1-5">1-5 people</option>
                        <option value="5-10">5-10 people</option>
                        <option value="10+">10+ people</option>
                    </select>
                </div>
            </article>
            <article class="justify-content-between mt-auto">
                <button type="button" class="btn btn-outline-primary">Cannot determine the budget yet</button>
                <article class="gap-3">
                    <button type="button" class="btn btn-ouline-light">back</button>
                    <button type="button" class="btn btn-primary" @click="store.current = store.steps[6]">Next: Post
                        Details</button>
                </article>
            </article>

        </article>
        {{-- post --}}
        <article x-show=" store.current.id === 'post'" class="span flex-column bg-white p-4 rounded-4 ">
            <h2 class="fs-2 fw-bold my-6">
                Details for the post
            </h2>
            <article class="flex-column gap-3">
                <article class="row col-5">
                    <label for="title" class="form-label">Title for your project post</label>
                    <input type="text" wire:model='form.title' class="form-control" placeholder="web3 design"
                        id="title" name="title">
                </article>
                <div class="row">
                    <label for="description" class="form-label">description</label>
                    <textarea rows="7" wire:model='form.description' class="form-control" id="description"></textarea>
                </div>
                <article><button type="button" class="btn btn-primary">🗎 attach file</button></article>
            </article>
            <article class="justify-content-end mt-auto">
                <article class="gap-3">
                    <button type="button" class="btn btn-ouline-light">back</button>
                    <button type="button" class="btn btn-primary"
                        @click="store.post_review = true; store.current = null;">Review
                        post</button>
                </article>
            </article>

        </article>
        {{-- review --}}
        <article x-show=" store.post_review " class="span flex-column bg-white p-4 rounded-4">
            <h2 class="fs-2 fw-bold my-6">
                Review & Post
            </h2>
            <article class="flex-column gap-3">
                <article class="row col-8 btn-icon">
                    <label for="title" class="form-label mb-0 fw-bold">Title for your project post</label>
                    <input disabled type="text" wire:model="form.title" class="form-control border-0" id="title"
                        name="title">
                    <span class="fas fa-pencil btn me-3 pb-2 d-none"></span>
                </article>
                <div class="row col-8 btn-icon">
                    <label for="description" class="form-label mb-0 fw-bold">description</label>
                    <input disabled class="form-control border-0" wire:model="form.description" id="description">
                    <span class="fas fa-pencil btn me-3 pb-2 d-none"></span>
                </div>
                <div class="row col-8 btn-icon">
                    <label for="method" class="form-label mb-0 fw-bold">method</label>
                    <input disabled class="form-control border-0" wire:model="form.method" id="method">
                    <span class="fas fa-pencil btn me-3 pb-2 d-none"></span>
                </div>
                <div class="row col-8 btn-icon">
                    <label for="timeline-data" class="form-label mb-0 fw-bold">timeline</label>
                    <input disabled class="form-control border-0" wire:model="form.duration" id="timeline-data">
                    <span class="fas fa-pencil btn me-3 pb-2 d-none"></span>
                </div>
                <div class="row col-8 btn-icon">
                    <label for="category-data" class="form-label mb-0 fw-bold">category</label>
                    <article class="gap-2">
                        @foreach ($selected_categories as $item)
                            <button type="button"
                                class="badge btn-primary rounded-pill btn">{{ $item['name'] }}</button>
                        @endforeach
                    </article>
                    <span class="fas fa-pencil btn me-3 pb-2 d-none"></span>
                </div>
                <div class="row col-8 btn-icon">
                    <label for="skills-data" class="form-label mb-0 fw-bold">skills</label>
                    <article class="gap-2">
                        @foreach ($selected_skills as $item)
                            <button type="button"
                                class="badge btn-primary rounded-pill btn">{{ $item['name'] }}</button>
                        @endforeach
                    </article>
                    <span class="fas fa-pencil btn me-3 pb-2 d-none"></span>
                </div>
                <div class="row col-8 btn-icon">
                    <label for="budget-data" class="form-label mb-0 fw-bold">budget</label>
                    <input disabled class="form-control border-0" wire:model="form.total_budget" id="budget-data">
                    <span class="fas fa-pencil btn me-3 pb-2 d-none"></span>
                </div>
                <div class="row col-8 btn-icon">
                    <label for="scope-data" class="form-label mb-0 fw-bold">scope</label>
                    <input disabled class="form-control border-0" wire:model="form.scope" id="scope-data">
                    <span class="fas fa-pencil btn me-3 pb-2 d-none"></span>
                </div>
            </article>
            <article class="justify-content-end mt-auto">
                <article class="gap-3">
                    <button type="button" class="btn btn-ouline-light">back</button>
                    <button type="button" class="btn btn-outline-primary">Save Draft</button>
                    <button class="btn btn-primary" type="submit">post now</button>
                </article>
            </article>

        </article>
    </form>
</main>
