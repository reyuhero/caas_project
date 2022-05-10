@section('title', 'Create Talent Recruitment')

<main class="container py-3" x-data="{ current: 1 , skills_grouped: @js($grouped_skills), open: false}">
    <h4>Create A Talent Recruitment Post</h4>
    <form wire:submit.prevent="submit" class="d-flex flex-column">
        <article x-show="current == 1" class="flex-column">
            <article class="col-6 flex-column">
                <label for="title" class="form-label">title:</label>
                <input wire:model="form.title" type="text" placeholder="Ex: 4 Developers Needed" name="title" id="title" class="form-control">
            </article>
            <article class="flex-column col">
                <div>Select and search the Categories of talents you need</div>
                <article class="flex-column">
                    <article class="flex-column w-100" >
                        <label for="project-duration" class="form-label pe-3 m-0">selected:</label>
                        @empty($selected_categories)
                            <div></div>
                        @else
                            <ul
                                class="d-flex flex-row bg-white py-2 px-3 rounded-3 gap-2 border list-unstyled m-0 flex-wrap w-100">
                                @foreach ($selected_categories as $key => $item)
                                    <li >
                                        <button wire:click="removeCategory({{ $key }})" type="button" class="btn btn-warning p-0 m-0 rounded-pill">
                                            <small class="pe-2 ps-3">{{ $item['name'] }}</small>
                                            <span class="badge bg-danger btn rounded-pill m-0">&times;</span>
                                        </button>
                                    </li>
                                @endforeach
                            </ul>
                        @endempty
                    </article>
                    {{-- categories --}}
                    <article class="gap-2 mt-3 col-12 flex-wrap overflow-auto p-3" style="height: calc(100vh - 30ch)">
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
            <article class="mt-3 flex-row-reverse">
                <button type="button" class="btn btn-primary" @click="current = current+1">next</button>
            </article>
        </article>
        <article x-show="current == 2" class="flex-column">

            <div class="fs-2 fw-bold my-6">
                Skills
            </div>
            <div class="py-3">what main skills does your project require</div>
            <article class="flex-column gap-1 mt-1">
                <div class="d-flex flex-column px-3 position-relative">
                    <label for="search-skills" class="form-label">Search skills or add your own</label>
                    <input type="text" class="form-control" x-on:click="open = true"
                        x-on:click.outside="open = false">
                    <ul :class=" open ? 'd-flex' : 'd-none'"
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
                            </article>
                        </article>
                    </article>
                </article>
                <article column class="gap-3">
                    <template x-for="(items, index) in skills_grouped" :key="index">
                        <article column>
                            <div x-text="index" class="py-2 border-top w-100"></div>
                            <article class="gap-2 flex-wrap">
                                <template x-for="item in items">
                                    <button type="button"
                                        class="btn btn-warning p-0 pe-2 m-0 rounded-pill position-relative"
                                        @click="$wire.addSkill(item)">
                                        <small x-text="item.name" class="ps-4"></small>
                                        <span class="badge bg-light rounded-pill m-0 p-0 position-absolute text-success"
                                            style="width: 26px; height: 26px; font-size: 25px; left:-5px; top: -1px;">&plus;</span>
                                    </button>
                                </template>
                            </article>
                        </article>
                    </template>
                </article>
            </article>
            <article class="mt-3 justify-content-between">
                <button type="button" class="btn btn-outline-secondary" @click="current = current-1">back</button>
                <button type="button" class="btn btn-primary" @click="current = current+1">next</button>
            </article>
        </article>
        <article x-show="current == 3" class="flex-column">
            <article class="flex-column">
                <label for="description" class="form-label">description</label>
                <textarea wire:model="form.description" name="description" rows="4" id="description" class="form-control"></textarea>
            </article>
            <article class="mt-3 flex-row-reverse gap-3">
                <button type="submit" class="btn btn-primary">post now</button>
                <button type="button" class="btn btn-primary">Save as draft</button>
                <button type="button" class="btn btn-primary">Preview</button>
                <button type="button" class="btn btn-outline-secondary" @click="current = current-1">back</button>
            </article>
        </article>
    </form>
</main>
