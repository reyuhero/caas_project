@section('title', 'create project')

@section('header')
    @include('layouts.navigation-freelancer')
@endsection
<main>

    <script>
        document.addEventListener('alpine:init', function() {
            Alpine.store('step', {
                skill_open: false,
                categories: @js($categories),
                selected_categories: function(){
                    const data = @js($selected_categories);
                    console.log('selected categories', data);
                    return data;
                },
                skills_selected: [],
                addToCategoryList: function(item) {
                    var res = this.selected_categories.includes(item);
                    if (!res) this.selected_categories.push(item);
                },
                removeCategory: function(item) {
                    this.selected_categories = this.selected_categories.filter(i => i.id !== item.id);
                },
                addToSkillSelected: function(item) {
                    var res = this.skills_selected.includes(item)
                    if (!res) this.skills_selected.push(item);
                },
                search_skill: '',
                skills: function() {
                    const data = @json($skills);
                    return data;
                },
                removeItem: function(item) {
                    this.skills_selected = this.skills_selected.filter(i => i.id !== item.id)
                },
                skills_grouped: function() {
                    const data = @json($skills);
                    var grouped = data.reduce((dictionary, p) => {
                        dictionary[p.category.name] = dictionary[p.category.name] || [];
                        dictionary[p.category.name].push(p);
                        return dictionary;
                    }, {})
                    return grouped;
                },
                submit: function(){

                },
                current: {
                    id: 'started',
                    title: 'get started',
                    progress: '5%',
                    status: false,
                },
                items: [{
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
                    },
                    {
                        id: 'review',
                        progress: '100%',
                        title: 'post review',
                        status: false,
                    },
                ]
            })
        })
    </script>
    <form class="gap-3 grid" x-data wire:submit.prevent='submit'>

        <!-- aside -->
        <aside class="d-flex span flex-row bg-white rounded-4 gap-2 p-4 h-100" style="--span: 3; ">
            <article class="col-1">
                <div class="progress vertical-progress-bar mx-3">
                    <div class="progress-bar" role="progressbar" :style="{width: $store.step.current.progress}"
                        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </article>
            <article class="flex-column gap-4">
                <template x-for="step in $store.step.items">
                    <input class="btn btn-none p-0" type="button" :value="step.title" :key="step.id"
                        :disabled="step.status" :id="step.id"
                        :class="{'fw-bold' : $store.step.current.id === step.id, 'd-none': step['id'] === 'review'}"
                        @click="$store.step.current = step" />
                </template>
            </article>
        </aside>
        {{-- started --}}
        <article x-show=" $store.step.current.id === 'started'"
            class=" span flex-column bg-white align-content-center p-4 rounded-4" style="--span: 9;">
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
                    <button type="button" class="btn btn-primary"
                        @click="$store.step.current = $store.step.items[1]">next: timeline &
                        method</button>
                </article>
            </article>
        </article>
        {{-- timeline --}}
        <article x-show=" $store.step.current.id === 'timeline'"
            class="span flex-column bg-white align-content- p-4 rounded-4 " style="--span: 9;">
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
                    <button type="button" class="btn btn-primary"
                        @click="$store.step.current = $store.step.items[2]">next:
                        category</button>
                </article>
            </article>
        </article>
        {{-- category --}}
        <article x-show="$store.step.current.id === 'category'"
            class="span flex-column bg-white align-content- p-4 rounded-4 " style="--span: 9;">
            <div class="fs-2 fw-bold my-6">
                Category
            </div>
            <div class="py-3">Select and search the category you need.</div>
            <article class="flex-wrap gap-4 mt-3">
                <article class="w-100 row " x-show="$store.step.selected_categories.length > 0">
                    <div class="form-label pe-3">selected</div>
                    <article class="flex-row bg-light py-2 px-3 rounded-3 gap-2 border flex-wrap">
                        @foreach ($selected_categories as $item)
                            <button type="button" class="btn btn-warning p-0 m-0 rounded-pill">
                                <small class="pe-2 ps-3">{{ $item['name'] }}</small>
                                <span class="badge bg-danger btn rounded-pill m-0">&times;</span>
                            </button>
                        @endforeach
                        <template x-for="item in $store.step.selected_categories">
                            <button type="button" x-on:click='$wire.addCategory(item)'
                                class="btn btn-warning p-0 m-0 rounded-pill" :key="item.id">
                                <small class="pe-2 ps-3" x-text="item.name"></small>
                                <span class="badge bg-danger btn rounded-pill m-0">&times;</span>
                            </button>
                        </template>
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
                        @click="$store.step.current = $store.step.items[3]">Continue</button>
                </article>
            </article>
        </article>
        {{-- skills --}}
        <article x-show=" $store.step.current.id === 'skills' " class="span flex-column bg-white p-4 rounded-4 "
            style="--span: 9;">
            <div class="fs-2 fw-bold my-6">
                Skills
            </div>
            <div class="py-3">what main skills does your project require</div>
            <article class="flex-column gap-1 mt-1">
                <div class="d-flex flex-column px-3 position-relative">
                    <label for="search-skills" class="form-label">Search skills or add your own</label>
                    <input type="text" class="form-control" x-on:click="$store.step.skill_open = true"
                        :value="$store.step.search_skill"
                        x-on:change="$store.step.search_skill && $store.step.skills.filter(item => item.name == $store.step.search_skill)"
                        x-on:click.outside="$store.step.skill_open = false">
                    <ul flex x-show="$store.step.skill_open"
                        class="position-absolute start-0 m-3 list-unstyled bg-white border rounded-4 flex-column overflow-hidden shodow-md"
                        style="top: 60px;z-index: 10;">
                        <template x-for="skill in $store.step.skills">
                            <li :key="skill.id" class="dropdown-item"
                                :class="{'d-none': $store.step.skills_selected.includes(skill) }" x-text="skill.name"
                                @click="$store.step.addToSkillSelected(skill)"></li>
                        </template>
                    </ul>
                    <span class="fas fa-search position-absolute bottom-0 end-0 w-auto me-3 my-2 pb-1"></span>
                </div>

                <article class="w-100 row px-3 pb-3">
                    <article class="flex-column p-3 gap-2 col-6">
                        <div>selected skills</div>
                        <article>
                            <article class="gap-3 flex-wrap">
                                <template x-for="skill in $store.step.skills_selected">
                                    <button :key="skill.id" type="button"
                                        class="btn btn-primary p-0 m-0 rounded-pill position-relative"
                                        @click="$store.step.removeItem(skill)">
                                        <small x-text="skill.name" class="pe-4 ps-3"></small>
                                        <span class="badge bg-danger rounded-pill m-0 p-0 position-absolute"
                                            style="width: 26px; height: 26px; font-size: 25px; right:-5px; top: -1px;">&times;</span>
                                    </button>
                                </template>
                            </article>
                        </article>
                    </article>
                    <article class="flex-column gap-2 col-6 p-3">
                        <div>suggested</div>
                        <template x-for="item in $store.step.suggestedSkills">
                            <article :key="item.id" class="gap-3 flex-wrap">
                                <button type="button"
                                    class="btn btn-warning pe-2 p-0 m-0 rounded-pill position-relative"
                                    @click="$store.step.addToSkillSelected(item)">
                                    <span class="badge bg-danger rounded-pill m-0 p-0 position-absolute"
                                        style="width: 26px; height: 26px; font-size: 25px; left:-5px; top: -1px;">&plus;</span>
                                    <small class="ps-4" x-text="item.name"></small>
                                </button>
                            </article>
                        </template>
                    </article>
                </article>
                <article column class="gap-3">
                    <template x-for="(items, index) in $store.step.skills_grouped" :key="index">
                        <article column>
                            <div x-text="index" class="py-2 border-top w-100"></div>
                            <article class="gap-2 flex-wrap">
                                <template x-for="item in items">
                                    <button type="button"
                                        class="btn btn-primary p-0 pe-2 m-0 rounded-pill position-relative"
                                        @click="$store.step.addToSkillSelected(item)">
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
                    <button type="button" class="btn btn-primary"
                        @click="$store.step.current = $store.step.items[4]">Next</button>
                </article>
            </article>

        </article>
        {{-- budget --}}
        <article x-show=" $store.step.current.id === 'budget' " class="span flex-column bg-white p-4 rounded-4 "
            style="--span: 9;">
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
                    <button type="button" class="btn btn-primary"
                        @click="$store.step.current = $store.step.items[5]">Next
                        Scope</button>
                </article>
            </article>

        </article>
        {{-- scope --}}
        <article x-show=" $store.step.current.id === 'scope' " class="span flex-column bg-white p-4 rounded-4 "
            style="--span: 9;">
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
                    <button type="button" class="btn btn-primary"
                        @click="$store.step.current = $store.step.items[6]">Next: Post
                        Details</button>
                </article>
            </article>

        </article>
        {{-- post --}}
        <article x-show=" $store.step.current.id === 'post' " class="span flex-column bg-white p-4 rounded-4 "
            style="--span: 9;">
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
                        @click="$store.step.current = $store.step.items[7]">Review
                        post</button>
                </article>
            </article>

        </article>
        {{-- post detail review --}}
        <article x-show=" $store.step.current.id === 'review' " class="span flex-column bg-white p-4 rounded-4 "
            style="--span: 9;">
            <h2 class="fs-2 fw-bold my-6">
                Review & Post
            </h2>
            <article class="flex-column gap-3">
                <article class="row col-8 btn-icon">
                    <label for="title" class="form-label mb-0 fw-bold">Title for your project post</label>
                    <input disabled type="text" wire:model="form.title" class="form-control border-0" id="title"
                        name="title">
                    <span class="fas fa-pencil btn me-3 pb-2"></span>
                </article>
                <div class="row col-8 btn-icon">
                    <label for="description" class="form-label mb-0 fw-bold">description</label>
                    <input disabled class="form-control border-0" wire:model="form.description" id="description">
                    <span class="fas fa-pencil btn me-3 pb-2"></span>
                </div>
                <div class="row col-8 btn-icon">
                    <label for="method" class="form-label mb-0 fw-bold">method</label>
                    <input disabled class="form-control border-0" wire:model="form.method" id="method">
                    <span class="fas fa-pencil btn me-3 pb-2"></span>
                </div>
                <div class="row col-8 btn-icon">
                    <label for="timeline-data" class="form-label mb-0 fw-bold">timeline</label>
                    <input disabled class="form-control border-0" wire:model="form.duration" id="timeline-data">
                    <span class="fas fa-pencil btn me-3 pb-2"></span>
                </div>
                <div class="row col-8 btn-icon">
                    <label for="category-data" class="form-label mb-0 fw-bold">category</label>
                    <article class="gap-2">
                        <template x-for="item in $store.step.selected_categories">
                            <button type="button" class="badge btn-primary rounded-pill btn" x-text="item.name"
                                :key="item.id"></button>
                        </template>
                    </article>
                    <span class="fas fa-pencil btn me-3 pb-2"></span>
                </div>
                <div class="row col-8 btn-icon">
                    <label for="skills-data" class="form-label mb-0 fw-bold">skills</label>
                    <article class="gap-2">
                        <template x-for="item in $store.step.skills_selected">
                            <button type="button" class="badge btn-primary rounded-pill btn" x-text="item.name"
                                :key="item.id"></button>
                        </template>
                    </article>
                    <span class="fas fa-pencil btn me-3 pb-2"></span>
                </div>
                <div class="row col-8 btn-icon">
                    <label for="budget-data" class="form-label mb-0 fw-bold">budget</label>
                    <input disabled class="form-control border-0" wire:model="form.total_budget" id="budget-data">
                    <span class="fas fa-pencil btn me-3 pb-2"></span>
                </div>
                <div class="row col-8 btn-icon">
                    <label for="scope-data" class="form-label mb-0 fw-bold">scope</label>
                    <input disabled class="form-control border-0" wire:model="form.scope" id="scope-data">
                    <span class="fas fa-pencil btn me-3 pb-2"></span>
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
