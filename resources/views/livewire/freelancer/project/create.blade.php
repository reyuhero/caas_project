<script>
    document.addEventListener('alpine:init',function(){
        Alpine.store('step', {
            current: {
        id: 'started',
        title: 'get started',
        progress: '5%',
        status: false,
    },
            items:  [
        {
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
<section class="gap-3" x-data>
    <!-- aside -->
    <aside class="d-flex span flex-row bg-white rounded-4 gap-2 p-4" style="--span: 3; ">
        <article class="col-1">
            <div class="progress vertical-progress-bar mx-3" >
                <div class="progress-bar" role="progressbar" :style="{width: $store.step.current.progress}" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </article>
        <article class="flex-column gap-4">
            <template x-for="step in $store.step.items">
                <input class="btn btn-none p-0" type="button" :value="step.title" :disabled="step.status" :id="step.id"  :class="{'fw-bold' : $store.step.current.id === step.id}" @click="$store.step.current = step"/>
            </template>
        </article>
    </aside>
    {{-- started --}}
    <article x-show=" $store.step.current.id === 'started'" class=" span flex-column bg-white align-content-center p-4 rounded-4" style="--span: 9;">
        <div class="fs-2 fw-bold my-6">
            Get Started
        </div>
        <div class="py-3">please tell us more about your project</div>
        <article class="flex-wrap gap-4 mt-3">
            <div class="col-5">
                <label for="project-duration" class="form-label">project duration</label>
                <input type="text" class="form-control" wire:model="form.duration" id="project-duration">
            </div>
            <div class=" col-5">
                <label for="start-date" class="form-label">start date</label>
                <input type="date" class="form-control" wire:model="form.start_date" id="start-date">
            </div>
            <div class="col-5">less than 1 month</div>
            <div class="col-5">ASAP</div>
            <div class="col-5">1 - 3 months</div>
            <div class="col-5">within 2 weeks</div>
            <div class="col-5">3 months + </div>
            <div class="col-5">more than 2 weeks from now</div>
        </article>
        <article class="justify-content-between mt-3">
            <button class="btn btn-outline-primary">reuse a previous project post</button>
            <article class="gap-3">
                <button class="btn btn-ouline-light">cancel</button>
                <button class="btn btn-primary" @click="$store.step.current = $store.step.items[1]">next: timeline & method</button>
            </article>
        </article>
    </article>
    {{-- timeline --}}
    <article x-show=" $store.step.current.id === 'timeline'" class="span flex-column bg-white align-content- p-4 rounded-4 " style="--span: 9;">
        <div class="fs-2 fw-bold my-6">
            Timeline
        </div>
        <div class="py-3">please tell us more about the duration and timeline of your project</div>
        <article class="flex-wrap gap-4 mt-3">
            <div class="col-5">
                <label for="project-duration" class="form-label">project duration</label>
                <input type="text"  wire:model="form.duration" class="form-control" name="project-duration" id="project-duration" placeholder="1-3 months">
            </div>
            <div class=" col-5">
                <label for="start-date" class="form-label">start date</label>
                <input type="date" class="form-control"  wire:model="form.start_date" id="start-date" placeholder="ASAP">
            </div>
            <div class="col-auto">
                <div class="fw-bold">Method</div>
                <div>How do you like to work with independent talents and Klabo teams of your project. <i class="fas fa-question-circle text-primary"></i></div>
            </div>
            <article class="col-5 flex-column p-4 justify-content-center align-items-center position-relative border border-2 bg-light rounded-4 shadow-md">
                <input type="radio" id="method1" wire:model="form.method" name="method" class="position-absolute top-0 start-0 m-3 text-black-50">
                <label for="method1" class="text-center form-label" type="button">
                    <div  class="fw-bold fs-6 mb-2 mt-2">milestone-based fixed price</div>
                    <div class="fs-7 mb-3">milestone-based fixed price</div>
                </label>

            </article>
            <article class="col-5 flex-column p-4 justify-content-center align-items-center position-relative border border-2 bg-light rounded-4 shadow-md">
                <input type="radio" id="method2" wire:model="form.method" name="method" class="position-absolute top-0 start-0 m-3 text-black-50">
                <label for="method2" class="text-center form-label" type="button">
                   <div class="fw-bold fs-6 mb-2 mt-2">Staff Augumentetion</div>
                   <div class="fs-7 mb-3 text-center">Best for designated long-term work or to integrate the freelance team into your organisation.</div>
                </label>
            </article>

        </article>
        <article class="justify-content-between mt-4">
            <button class="btn btn-outline-primary">reuse a previous project post</button>
            <article class="gap-3">
                <button class="btn btn-ouline-light">cancel</button>
                <button class="btn btn-primary" @click="$store.step.current = $store.step.items[2]">next: category</button>
            </article>
        </article>
    </article>
    {{-- category --}}
    <article x-show=" $store.step.current.id === 'category' " class="span flex-column bg-white align-content- p-4 rounded-4 " style="--span: 9;">
        <div class="fs-2 fw-bold my-6">
            Category
        </div>
        <div class="py-3">Select and search the category you need.</div>
        <article class="flex-wrap gap-4 mt-3">
            <article class="w-100 row ">
                <label for="project-duration" class="form-label pe-3">selected</label>
                <article class="flex-row bg-light py-2 px-3 rounded-3 gap-2 border">
                        <button class="btn btn-warning p-0 m-0 rounded-pill">
                            <small class="pe-2 ps-3">web3</small>
                            <span class="badge bg-danger btn rounded-pill m-0" >&times;</span>
                        </button>
                        <button class="btn btn-warning p-0 m-0 rounded-pill">
                            <small class="pe-2 ps-3">Design & creative</small>
                            <span class="badge bg-danger btn rounded-pill m-0" >&times;</span>
                        </button>
                        <button class="btn btn-warning p-0 m-0 rounded-pill">
                            <small class="pe-2 ps-3">wen, mobile & software Dev</small>
                            <span class="badge bg-danger btn rounded-pill m-0" >&times;</span>
                        </button>
                </article>
            </article>
            <article class="gap-2 mt-3 col-12 flex-wrap">
                <button class="btn bg-gradient d-flex bg-light rounded-4 p-3 border flex-column col-3 shadow-sm align-items-center text-center">
                    <i class="fas fa-code fs-2 mb-3 text-warning"></i>
                    <small class="text-center">Web, Mobile & software Dev</small>
                </button>
                <button class="btn bg-gradient d-flex bg-light rounded-4 p-3 border flex-column col-3 shadow-sm align-items-center text-center">
                    <i class="fas fa-building-columns fs-2 mb-3 text-warning"></i>
                    <small class="text-center">Accounting & consulting</small>
                </button>
                <button class="btn bg-gradient d-flex bg-light rounded-4 p-3 border flex-column col-3 shadow-sm align-items-center text-center">
                    <i class="fas fa-user fs-2 mb-3 text-warning"></i>
                    <small class="text-center">Admin support</small>
                </button>
                <button class="btn bg-gradient d-flex bg-light rounded-4 p-3 border flex-column col-3 shadow-sm align-items-center text-center">
                    <i class="fas fa-user fs-2 mb-3 text-warning"></i>
                    <small class="text-center">Customer Service</small>
                </button>
                <button class="btn bg-gradient d-flex bg-light rounded-4 p-3 border flex-column col-3 shadow-sm align-items-center text-center">
                    <i class="fas fa-coins fs-2 mb-3 text-warning"></i>
                    <small class="text-center">Data Science & Analytics</small>
                </button>
                <button class="btn bg-gradient d-flex bg-light rounded-4 p-3 border flex-column col-3 shadow-sm align-items-center text-center">
                    <i class="fas fa-palette fs-2 mb-3 text-warning"></i>
                    <small class="text-center">Design & Creative</small>
                </button>
                <button class="btn bg-gradient d-flex bg-light rounded-4 p-3 border flex-column col-3 shadow-sm align-items-center text-center">
                    <i class="fas fa-code fs-2 mb-3 text-warning"></i>
                    <small class="text-center">Engineering & Architecture</small>
                </button>
                <button class="btn bg-gradient d-flex bg-light rounded-4 p-3 border flex-column col-3 shadow-sm align-items-center text-center">
                    <i class="fas fa-code fs-2 mb-3 text-warning"></i>
                    <small class="text-center">IT & Networking</small>
                </button>
                <button class="btn bg-gradient d-flex bg-light rounded-4 p-3 border flex-column col-3 shadow-sm align-items-center text-center">
                    <i class="fas fa-gavel fs-2 mb-3 text-warning"></i>
                    <small class="text-center">Legal</small>
                </button>
                <button class="btn bg-gradient d-flex bg-light rounded-4 p-3 border flex-column col-3 shadow-sm align-items-center text-center">
                    <i class="fas fa-code fs-2 mb-3 text-warning"></i>
                    <small class="text-center">Sales & Marketing</small>
                </button>
                <button class="btn bg-gradient d-flex bg-light rounded-4 p-3 border flex-column col-3 shadow-sm align-items-center text-center">
                    <i class="fas fa-language fs-2 mb-3 text-warning"></i>
                    <small class="text-center">Translation</small>
                </button>
                <button class="btn bg-gradient d-flex bg-light rounded-4 p-3 border flex-column col-3 shadow-sm align-items-center text-center">
                    <i class="fas fa-pencil fs-2 mb-3 text-warning"></i>
                    <small class="text-center">Writing</small>
                </button>
                <button class="btn bg-gradient d-flex bg-light rounded-4 p-3 border flex-column col-3 shadow-sm align-items-center text-center">
                    <i class="fab fa-internet-explorer fs-2 mb-3 text-warning"></i>
                    <small class="text-center">Web3</small>
                </button>
                <button class="btn bg-gradient d-flex bg-light rounded-4 p-3 border flex-column col-3 shadow-sm align-items-center text-center">
                    <i class="fas fa-film fs-2 mb-3 text-warning"></i>
                    <small class="text-center">Video & Animation</small>
                </button>
            </article>

        </article>
        <article class="justify-content-between mt-4">
            <button class="btn btn-outline-primary">view full category list</button>
            <article class="gap-3">
                <button class="btn btn-ouline-light">back</button>
                <button class="btn btn-primary"  @click="$store.step.current = $store.step.items[3]">Continue</button>
            </article>
        </article>
    </article>
    {{-- skills --}}
    <article x-show=" $store.step.current.id === 'skills' " class="span flex-column bg-white p-4 rounded-4 " style="--span: 9;">
        <div class="fs-2 fw-bold my-6">
            Skills
        </div>
        <div class="py-3">what main skills does your project require</div>
        <article class="flex-column gap-1 mt-1">
            <div class="row px-3 position-relative">
                <label for="search-skills" class="form-label">Search skills or add your own</label>
                <input type="text" name="search-skills" class="form-control" id="search-skills">
                <span class="fas fa-search position-absolute bottom-0 end-0 w-auto me-3 my-2 pb-1"></span>
            </div>

            <article class="w-100 row px-3 pb-3">
                <label for="skills" class="form-label">selected</label>
                <input type="text" class="form-control" id="selected-skills">
                <article class="flex-column p-3 gap-2 col-6">
                    <div>selected skills</div>
                    <article>
                        <article class="gap-3  flex-wrap">
                            <button class="btn btn-primary p-0 m-0 rounded-pill">
                                <small class="pe-2 ps-3">web3</small>
                                <span class="badge bg-danger btn rounded-pill m-0" >&times;</span>
                            </button>
                            <button class="btn btn-primary p-0 m-0 rounded-pill">
                                <small class="pe-2 ps-3">Design & creative</small>
                                <span class="badge bg-danger btn rounded-pill m-0" >&times;</span>
                            </button>
                            <button class="btn btn-primary p-0 m-0 rounded-pill">
                                <small class="pe-2 ps-3">web, mobile & software Dev</small>
                                <span class="badge bg-danger btn rounded-pill m-0" >&times;</span>
                            </button>
                        </article>
                    </article>
                </article>
                <article class="flex-column gap-2 col-6 p-3">
                    <div>suggested</div>
                    <article class="gap-3 flex-wrap">
                        <button class="btn btn-warning p-0 m-0 rounded-pill">
                            <span class="badge bg-danger btn rounded-pill m-0" >+</span>
                            <small class="pe-2 ps-3">Graphic Design</small>
                        </button>
                    </article>
                </article>
            </article>
            <article class="gap-2 col-12 flex-wrap pb-3">
                <div class="py-2 border-top border-bottom w-100" >web3</div>
                <button class="btn btn-primary p-0 m-0 rounded-pill">
                    <span class="badge bg-danger btn rounded-pill m-0" >&plus;</span>
                    <small class="pe-2 pe-3">Blockchain & Engineering</small>
                </button>
                <button class="btn btn-primary p-0 m-0 rounded-pill">
                    <span class="badge bg-danger btn rounded-pill m-0" >&plus;</span>
                    <small class="pe-2 pe-3">NFT</small>
                </button>
                <button class="btn btn-primary p-0 m-0 rounded-pill">
                    <span class="badge bg-danger btn rounded-pill m-0" >&plus;</span>
                    <small class="pe-2 pes-3">Solidity Engineering</small>
                </button>
                <button class="btn btn-primary p-0 m-0 rounded-pill">
                    <span class="badge bg-danger btn rounded-pill m-0" >&plus;</span>
                    <small class="pe-2 pe-3">Metaverse</small>
                </button>
            </article>
            <div class="py-2 border-top w-100">Design & Creative</div>
            <div class="py-2 border-top border-bottom w-100" >web, mobile & software Dev</div>
        </article>
        <article class="justify-content-between mt-4">
            <button class="btn btn-outline-primary">Edit Selected Category</button>
            <article class="gap-3">
                <button class="btn btn-ouline-light">back</button>
                <button class="btn btn-primary"  @click="$store.step.current = $store.step.items[4]">Next</button>
            </article>
        </article>

    </article>
    {{-- budget --}}
    <article x-show=" $store.step.current.id === 'budget' " class="span flex-column bg-white p-4 rounded-4 " style="--span: 9;">
        <div class="fs-2 fw-bold my-6">
            Budget
        </div>
        <article class="flex-column gap-1 mt-1">
            <div class="row px-3 position-relative col-5">
                <label for="budget" class="form-label">Estimated Total Budget <i class="fas fa-question-circle text-primary"></i></label>
                <input type="text" name="budget" class="form-control px-3" id="budget">
                <span class=" position-absolute bottom-0 start-0 w-auto ms-4 my-2" >$</span>
            </div>
            <small>There will be the options to divide your project into milestone to be more management for you</small>
        </article>
        <article class="justify-content-between mt-auto">
            <button class="btn btn-outline-primary">Cannot determine the budget yet</button>
            <article class="gap-3">
                <button class="btn btn-ouline-light">back</button>
                <button class="btn btn-primary"  @click="$store.step.current = $store.step.items[5]">Next Scope</button>
            </article>
        </article>

    </article>
    {{-- scope --}}
    <article x-show=" $store.step.current.id === 'scope' " class="span flex-column bg-white p-4 rounded-4 " style="--span: 9;">
        <h2 class="fs-2 fw-bold my-6">
            scope
        </h2>
        <p class="fs-7">Estimated scope of your work</p>
        <article class="flex-column gap-2 mt-1">
            <article class="flex-wrap ">
                <article class="col-3 p-1">
                    <article class="text-center flex-column p-3 justify-content-center align-items-center position-relative border border-2 bg-light rounded-4 shadow-md">
                        <i class="fas fa-circle-check text-success position-absolute top-0 start-0 m-3"></i>
                        <div class="fw-bold fs-6 mb-2 mt-2">Small</div>
                        <div class="fs-7 ">Quick and Straightforward tasks</div>
                    </article>
                </article>
                <article class="col-3 p-1 d-flex">
                    <article class="text-center w-100 flex-column p-3 justify-content-center align-items-center position-relative border border-2 bg-light rounded-4 shadow-md">
                        <i class="fas fa-circle text-black-50 position-absolute top-0 start-0 m-3"></i>
                        <div class="fw-bold fs-6  mb-2 mt-2">Medium</div>
                        <div class="fs-7 ">Well-define projects</div>
                    </article>
                </article>
                <article class="col-3 p-1">
                    <article class=" text-center flex-column p-3 justify-content-center align-items-center position-relative border border-2 bg-light rounded-4 shadow-md">
                        <i class="fas fa-circle text-black-50 position-absolute top-0 start-0 m-3"></i>
                        <div class="fw-bold fs-6  mb-2 mt-2">Large</div>
                        <div class="fs-7 ">Complex projects and initiatives</div>
                    </article>
                </article>
                <article class="col-3 p-1">
                    <article class=" text-center flex-column p-3 justify-content-center align-items-center position-relative border border-2 bg-light rounded-4 shadow-md">
                        <i class="fas fa-circle text-black-50 position-absolute top-0 start-0 m-3"></i>
                        <div class="fw-bold fs-6  mb-2 mt-2">Mega</div>
                        <div class="fs-7 ">Megaprojects require vast skillsets and management</div>
                    </article>
                </article>
            </article>

            <div class="row px-3 position-relative col-7 my-3">
                <label for="person" class="form-label">size of the freelance team you'd like to work with <i class="fas fa-question-circle text-primary"></i></label>
                <select name="person" class="form-select w-50" id="person">
                    <option value="1">1 person</option>
                    <option value="1">1-5 people</option>
                    <option value="1">5-10 people</option>
                    <option value="1">10+ people</option>
                </select>
            </div>
        </article>
        <article class="justify-content-between mt-auto">
            <button class="btn btn-outline-primary">Cannot determine the budget yet</button>
            <article class="gap-3">
                <button class="btn btn-ouline-light">back</button>
                <button class="btn btn-primary" @click="$store.step.current = $store.step.items[6]">Next: Post Details</button>
            </article>
        </article>

    </article>
    {{-- post --}}
    <article x-show=" $store.step.current.id === 'post' " class="span flex-column bg-white p-4 rounded-4 " style="--span: 9;">
        <h2 class="fs-2 fw-bold my-6">
            Details for the post
        </h2>
        <article class="flex-column gap-3">
            <article class="row col-5">
                <label for="title" class="form-label">Title for your project post</label>
                <input type="text" class="form-control" placeholder="web3 design"  id="title" name="title">
            </article>
            <div class="row">
                <label for="description" class="form-label">description</label>
                <textarea rows="7" class="form-control" H id="description"></textarea>
            </div>
            <article><button type="submit" class="btn btn-primary">🗎 attach file</button></article>
        </article>
        <article class="justify-content-end mt-auto">
            <article class="gap-3">
                <button class="btn btn-ouline-light">back</button>
                <button class="btn btn-primary" onclick="route('post-review')">Review post</button>
            </article>
        </article>

    </article>
</section>

