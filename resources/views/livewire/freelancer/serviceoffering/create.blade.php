@section('title','Create Service Offering')

<form x-data="{ current: 1 }" wire:submit.prevent='submit' class="d-flex flex-column position-relative p-3 container">
    <h4>Add a service offering (<span x-text="current"></span>/2)</h4>
    <article x-show="current === 1" class="flex-column gap-3">
        <article class="flex-column">
            <label for="title" class="form-label">Title</label>
            <input wire:model="form.title" type="text" name="title" id="title" class="form-control">
        </article>
        <article class="flex-column">
            <label for="description" class="form-label">description</label>
            <textarea wire:model="form.description" name="description" rows="4" id="description" class="form-control"></textarea>
        </article>
        <article class="gap-1">
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
            <article class="col-4 flex-column bg-white rounded-3 p-3 ">
                <article class="gap-2 flex-column">
                    <article class="flex-column">
                        <label for="add-links" class="form-label">add links:</label>
                        <div class="position-relative overflow-hidden rounded-3">
                            <input wire:model.lazy="link" type="text" name="add-links" id="add-links" class="form-control pe-4">
                            <button type="button" wire:click="addLink" class="pointer border-0 bg-success text-white position-absolute top-0 end-0 p-2">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </article>
                    <article class="gap-2 flex-column">
                        @foreach ($links as $key => $link)
                            <article align-center>
                                <a href="#">{{ $link }}</a>
                                <button type="button" wire:click="removeLink({{ $key }})" class="btn btn-danger btn-circle ms-2" style="--bs-bg-opacity: 0.3;"><i class="fas fa-trash p-2"></i></button>
                            </article>
                        @endforeach
                    </article>
                </article>
            </article>
        </article>
        <article class="gap-3 justify-content-end">
            <button class="btn btn-primary" type="button" @click="current = current+1">Next</button>
        </article>
    </article>
    <article x-show="current === 2" class="flex-column gap-3">
        <article class="flex-column col-4 bg-white rounded-3 p-3">
            <h6>Add pictures: <small class="text-gray">First 1 will be the thumbnail</small></h6>
            <input type="file" wire:change='' id="photos" name="photos" class="form-control" wire:model="photos" multiple>
            <div wire:loading wire:target="photos">Uploading...</div>
            @error('photos.*') <span class="error">{{ $message }}</span> @enderror
            <article class="gap-2 mt-3">
                @if ($photos)
                    @foreach ($photos as $key => $item)
                        <article class="flex-column bg-light align-items-center p-3 rounded-3">
                            <div class="card me-1 mb-1 overflow-hidden square">
                                <img src="{{ $item->temporaryUrl() }}" class="square contain">
                            </div>
                            <i class="fas fa-trash text-danger"></i>
                        </article>
                    @endforeach
                @endif
            </article>
        </article>
        <article class="gap-3">
            <article column>
                <label for="timeline" class="form-label">timeline:</label>
                <input wire:model='form.timeline' type="text" name="timeline" id="timeline" class="form-control" placeholder="service Duration:">
            </article>
            <article column>
                <label for="pricing" class="form-label">set pricing: <span class="fs-8">fixed cost</span></label>
                <div flex icon aria-label="$">
                    <input type="text" wire:model='form.pricing' name="pricing" placeholder="start from:" inputmode="decimal" id="pricing" class="form-control ps-4">
                </div>
            </article>
        </article>
        <article class="flex-column col-4 bg-white rounded-3 p-3">
            <h6>select team members involved.</h6>
            <article class="gap-2 flex-wrap">
                @foreach ($members as $item)
                    <article class="rounded-3 p-2 gap-2 bg-white position-relative square pointer" style="--size: 80px">
                        <label for="user-{{ $item->id }}" class="text-center gap-2 d-flex flex-column align-items-center">
                            <div class="btn-circle"><i class="fas m-auto fa-user  bg-light rounded-pill border-dark border-2 p-3"></i></div>
                            <div class="fs-8">{{ $item->name }}</div>
                        </label>
                        <input type="checkbox" value="{{ $item->id }}" wire:model="selected_members" name="selected-members" id="user-{{ $item->id }}" class="form-checkbox position-absolute top-0 end-0 m-1">
                    </article>
                @endforeach
            </article>
        </article>
        <article class="gap-3 justify-content-end">
            <button class="btn btn-secondary" type="button" @click="current = current-1">Back</button>
            <button class="btn btn-primary" type="submit" >Publish</button>
        </article>
    </article>
</form>

