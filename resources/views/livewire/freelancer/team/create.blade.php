    <form wire:submit.prevent='submit' enctype="multipart/form-data"
        class="bg-white w-50 mx-auto position-absolute top-50 end-50 start-50 translate-middle rounded-4 shadow-md">
        <article class="position-relative text-left flex-column w-100 p-3">
            <button type="button" @click="open = false"
                class="fas fa-times position-absolute top-0 end-0 text-danger p-2 m-1 btn-circle bg-light btn "></button>
            <!-- ? 1 step -->
            <step-content hidden class="p-3 gap-3 flex-column" :class="current === 1 && 'd-flex'" id="step-1">
                <h4>create your teams</h4>
                <article class="justify-content-between">
                    <article
                        style="background-image: url({{ $logo ? $logo->temporaryUrl() : null }}); background-size: contain; background-position: center; background-repeat: no-repeat;"
                        align-center
                        class="flex-column rounded-3 overflow-hidden gap-2 me-3 square position-relative {{ !$logo ? 'image' : '' }}">
                        <input hidden type="file" accept=".jpg, .jpeg, .png" id="logo" wire:model.lazy="logo" />
                        <label for="logo"
                            class="align-items-center d-flex h-100 justify-content-center pointer text-dark w-100 z-1 bg-dark p-1 text-center"
                            style="--bs-bg-opacity: 0.2">
                            <div>upload team logo</div>
                            <div wire:loading wire:target="logo">Uploading...</div>
                        </label>
                    </article>
                    <article class="justify-content-end ms-auto flex-column">
                        <div><small class="fs-9">Or one-click Creation </small><i
                                class="fas fa-question-circle"></i></div>
                        <button type="button" class="btn btn-secondary fs-7">Convert your profile into a team</button>
                    </article>
                </article>

                <div class="col">
                    <label for="team-name" class="form-label">Team name</label>
                    <input wire:model="name" placeholder="E.g. BestDesigners or CodeStudio" class="form-control"
                        type="text" name="team-name" id="team-name">
                </div>

                <div class="col-auto">
                    <label for="team-profile-url" class="form-label">Your Team profile url: <i
                            class="fas fa-question-circle text-primary ps-2"></i></label>
                    <div class="d-flex flex-row gap-3 col align-items-center"> caas.io/
                        <input type="text" wire:model.lazy="url" name="team-profile-url" class="form-control"
                            id="team-profile-url">
                    </div>
                </div>

                <div class="col">
                    <label for="tagline" class="form-label">
                        Tagline
                        <i class="fas fa-question-circle text-primary"></i>
                    </label>
                    <input wire:model.lazy="tagline" class="form-control" type="text" name="tagline" id="tagline">
                </div>

                <article class="justify-content-end gap-3">
                    <button type="button" type="button" @click="open = false"
                        class="btn btn-outline-secondary rounded-pill w-auto">
                        cancel
                    </button>
                    <button type="button" @click="current = current+1" class="btn btn-primary rounded-pill w-auto">
                        next <i class="fas fa-arrow-right"></i>
                    </button>
                </article>

            </step-content>
            <!-- ? 2 step -->
            <step-content hidden class="p-3 gap-3 flex-column" :class="current === 2 && 'd-flex'" id="step-2">
                <h4>create your teams</h4>
                <article class="flex-column">
                    <div>Select and search the Categories of talents you need</div>
                    <article class="flex-column">
                        <article class="flex-column w-100">
                            <label for="project-duration" class="form-label pe-3 m-0">selected:</label>
                            @empty($selected_categories)
                                <div></div>
                            @else
                                <ul
                                    class="d-flex flex-row bg-white py-2 px-3 rounded-3 gap-2 border list-unstyled m-0 flex-wrap w-100">
                                    @foreach ($selected_categories as $key => $item)
                                        <li>
                                            <button wire:click="removeCategory({{ $key }})" type="button"
                                                class="btn btn-warning p-0 m-0 rounded-pill">
                                                <small class="pe-2 ps-3">{{ $item['name'] }}</small>
                                                <span class="badge bg-danger btn rounded-pill m-0">&times;</span>
                                            </button>
                                        </li>
                                    @endforeach
                                </ul>
                            @endempty
                        </article>
                        {{-- categories --}}
                        <article class="gap-2 mt-3 col-12 flex-wrap overflow-auto p-3"
                            style="height: calc(100vh - 30ch)">
                            @forelse ($categories as $item)
                                <button type="button" wire:click='addToCategories({{ $item }})'
                                    class="btn bg-gradient d-flex bg-light rounded-4 p-3 border flex-column col-3 shadow-sm align-items-center text-center">
                                    <i class="{{ $item->icon }} fs-2 mb-3 text-warning"></i>
                                    <small class="text-center">{{ $item->name }}</small>
                                </button>
                            @empty
                                <div>There is no category</div>
                            @endforelse
                        </article>
                    </article>
                </article>
                <article class="justify-content-between align-items-end">
                    <back-btn type="button" @click="current = current-1" class="btn btn-outline-secondary rounded-pill">
                        <i class="fas fa-arrow-left"></i> Back
                    </back-btn>
                    <next-btn type="button" @click="current = current+1" class="btn btn-primary rounded-pill w-auto">
                        next <i class="fas fa-arrow-right"></i>
                    </next-btn>
                </article>
            </step-content>
            <!-- ? 3 step -->
            <step-content hidden class="p-3 gap-3 flex-column" :class="current === 3 && 'd-flex'" id="step-3">
                <h4>create your Klabo teams</h4>
                <p>Upload team banner (optional) <i class="fas fa-question-circle text-primary"></i></p>

                <article
                    style="background-image: url({{ $banner ? $banner->temporaryUrl() : '' }}); background-size: cover; background-position: center; height: 160px"
                    class="bg-light w-100 justify-content-center {{ !$banner ? 'image' : '' }}" align-center>
                    <input hidden type="file" accept=".jpg, .jpeg, .png" wire:model="banner" name="banner" id="banner">
                    <label for="banner"
                        class="align-items-center d-flex h-100 justify-content-center pointer text-dark w-100 z-1 bg-dark"
                        style="--bs-bg-opacity: 0.2">
                        <h5 class="my-3">Team banner picture upload</h5>
                    </label>
                    <div wire:loading wire:target="photo">Uploading...</div>
                </article>
                <article column>
                    <label for="description" class="form-label">description (optional)</label>
                    <textarea wire:model.lazy="description" class="form-control" id="description" rows="3"
                        placeholder="why should other talents join the team? why should clients hire the teams?"></textarea>
                </article>
                <article class="justify-content-between align-items-end">
                    <back-btn type="button" @click="current = current-1" class="btn btn-outline-secondary rounded-pill">
                        <i class="fas fa-arrow-left"></i> Back
                    </back-btn>
                    <next-btn type="button" @click="current = current+1" class="btn btn-primary rounded-pill w-auto">
                        next <i class="fas fa-arrow-right"></i>
                    </next-btn>
                </article>
            </step-content>
            <!-- ? 4 step -->
            <step-content hidden class="p-3 gap-3 flex-column" :class="current === 4 && 'd-flex'" id="step-4">
                <h4>create your Klabo teams</h4>
                <div>Add project portfolio for the team (optional) <i class="fas fa-question-circle text-primary"></i>
                </div>
                <article class="gap-3">
                    <button type="button" class="btn btn-success">create a project portfolio <i
                            class="fas fa-plus ms-2"></i></button>
                    <button type="button" class="btn btn-primary">import from your personal portfolio <i
                            class="fas fa-file-import ms-2"></i></button>
                </article>
                <!-- ! list portfolio -->
                <article column class="gap-3 overflow-auto" style="height: calc(100vh - 30ch)">
                    @foreach ($portfolios as $item)
                        <!-- * item -->
                        <article class="gap-3 position-relative p-3 bg-light">
                            {{-- logo --}}
                            <article class="bg-success text-success btn-circle p-3"
                                style="--bs-bg-opacity: 0.3; --size: 40px;">
                                <i class="fas fa-image"></i>
                            </article>
                            <article column class="col">
                                <h5>Title: {{ $item->title }}</h5>
                                <h6 class="fs-7">description: {{ $item->description }}</h6>
                                <article>
                                    members: <i class="fas fa-user"></i>
                                </article>
                            </article>

                            <article class="position-absolulte bottom-0 end-0 gap-1 mt-auto flex-column">
                                <button type="button" class="btn btn-outline-primary rounded-circle"><i
                                        class="fas fa-pen"></i></button>
                                <button type="button" class="btn btn-outline-danger rounded-circle"><i
                                        class="fas fa-trash"></i></button>
                                <button type="button" class="btn btn-outline-secondary rounded-circle"><i
                                        class="fas fa-chevron-right"></i></button>
                            </article>
                        </article>
                        <!-- * end item -->
                    @endforeach
                </article>
                <!-- ! end list porfolio -->
                <article class="justify-content-between align-items-end">
                    <back-btn type="button" @click="current = current-1" class="btn btn-outline-secondary rounded-pill">
                        <i class="fas fa-arrow-left"></i> Back
                    </back-btn>
                    <next-btn type="button" @click="current = current+1" class="btn btn-primary rounded-pill w-auto">
                        next <i class="fas fa-arrow-right"></i>
                    </next-btn>
                </article>
            </step-content>
            <!-- ? 5 step -->
            <step-content hidden class="p-3 gap-3 flex-column" :class="current === 5 && 'd-flex'" id="step-5">
                <h4>create your Klabo teams</h4>
                <div>Add service offering (optional) <i class="fas fa-question-circle text-primary"></i></div>
                <article class="gap-3">
                    <button type="button" class="btn btn-success">create a service offering <i
                            class="fas fa-plus ms-2"></i></button>
                </article>
                <!-- ! list service offering -->
                <article column class="gap-3 overflow-auto" style="height: calc(100vh - 30ch)">
                    @foreach ($serviceOfferings as $item)
                        <!-- * item -->
                        <article class="gap-3 position-relative p-3 bg-light">
                            <article class="bg-success text-success btn-circle p-3"
                                style="--bs-bg-opacity: 0.3; --size: 40px;"><i class="fas fa-image fs-4 p-3"></i>
                            </article>
                            <article class="col-9 gap-2">
                                <article column class="col-9">
                                    <h5>Title: {{ $item->title }}</h5>
                                    <h6 class="fs-7">description: {{ $item->description }}</h6>
                                    <article>
                                        <i class="fas fa-user"></i>
                                    </article>
                                </article>
                                <article column class="col">
                                    <p>Fixed Cost: {{ $item->pricing }}</p>
                                    <p>Timeline: {{ $item->timeline }}</p>
                                </article>
                            </article>

                            <article class="position-absolulte ms-auto flex-column bottom-0 end-0 gap-2 mt-auto">
                                <button type="button" class="btn btn-outline-primary rounded-circle"><i
                                        class="fas fa-pen"></i></button>
                                <button type="button" class="btn btn-outline-danger rounded-circle"><i
                                        class="fas fa-trash"></i></button>
                                <button type="button" class="btn btn-outline-secondary rounded-circle"><i
                                        class="fas fa-chevron-right"></i></button>
                            </article>
                        </article>
                        <!-- * end item -->
                    @endforeach

                </article>
                <!-- ! end list porfolio -->

                <article class="justify-content-between align-items-end">
                    <back-btn type="button" @click="current = current-1"
                        class="btn btn-outline-secondary rounded-pill"> <i class="fas fa-arrow-left"></i> Back
                    </back-btn>
                    <next-btn type="button" @click="current = current+1" class="btn btn-primary rounded-pill w-auto">
                        next <i class="fas fa-arrow-right"></i>
                    </next-btn>
                </article>
            </step-content>
            <!-- ? 6 step -->
            <step-content hidden class="p-3 gap-3 flex-column" :class="current === 6 && 'd-flex'" id="step-6">
                <h4>create your Klabo teams</h4>
                <div>Invite talents to join your team
                    <i class="fas fa-question-circle text-primary tool-tip">
                        <div class="top">
                            You can work solo for the learn or you can invite and collobrate with other talents!
                        </div>
                    </i>
                </div>
                <article class="gap-3">
                    <!-- ! list -->
                    <article column class="col-6">
                        <div class="position-relative">
                            recommendations
                        </div>
                        <article column class="gap-2 overflow-auto" style="height: calc(100vh - 30ch)">
                            @foreach ($users as $item)
                                <!-- * item -->
                                <article class="border-2 rounded-3 bg-light p-2 align-items-center gap-2">
                                    <div class="btn-circle bg-dark p-4 shadow-sm overflow-hidden">
                                        <i class="fas fa-user text-white fs-2 mt-3"></i>
                                    </div>
                                    <article column>
                                        <h6>{{ $item->name }}</h6>
                                        <div class="fs-8">
                                            @foreach ($item->profile->skills as $skill)
                                                {{ $skill->name }},
                                            @endforeach
                                        </div>
                                    </article>
                                    <button type="button" class="btn btn-outline-primary ms-auto">invite</button>
                                </article>
                                <!-- * end item -->
                            @endforeach

                        </article>
                    </article>
                    <!-- invited -->
                    <article column class="col-6 ">
                        <div class="position-relative">
                            Invited:
                        </div>
                        <article column class="gap-2 overflow-auto" style="height: calc(100vh - 30ch)">
                            @foreach ($selected_users as $item)
                                <!-- * item -->
                                <article class="border-2 rounded-3 bg-light p-2 align-items-center gap-2">
                                    <div class="btn-circle bg-dark p-4 shadow-sm overflow-hidden">
                                        <i class="fas fa-user text-white fs-2 mt-3"></i>
                                    </div>
                                    <article column>
                                        <h6>{{ $item->name }}</h6>
                                        <div class="fs-8">
                                            @foreach ($item->profile->skills as $skill)
                                                {{ $skill->name }},
                                            @endforeach
                                        </div>
                                    </article>
                                    <button type="button" class="btn btn-outline-primary ms-auto">invite</button>
                                </article>
                                <!-- * end item -->
                            @endforeach

                        </article>
                    </article>

                </article>

                <article class="align-items-center gap-3 align-self-end">
                    <i class="fas fa-question-circle text-primary"></i>
                    <button type="button" class="btn btn-primary">Post a Talent Recruitment</button>
                </article>
                <article class="justify-content-between align-items-end">
                    <back-btn type="button" @click="current = current-1"
                        class="btn btn-outline-secondary rounded-pill"> <i class="fas fa-arrow-left"></i> Back
                    </back-btn>
                    <button type="button" type="button" class="btn btn-primary rounded-pill w-auto">Preview <i
                            class="fas fa-arrow-right"></i></button>
                    <button type="submit" type="button" role="button" class="btn btn-success rounded-pill w-auto "
                        @click="open = false; current = 1">Complete & publish your team now<i
                            class="fas fa-check ps-2"></i></button>
                </article>
            </step-content>
        </article>
    </form>
