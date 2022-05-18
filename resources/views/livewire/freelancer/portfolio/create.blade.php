@section('title', 'project portfolio')
<form wire:submit.prevent='submit' enctype="multipart/form-data" class="d-flex flex-column position-relative p-3 container">
    <h4>Create A Porject to add the portfolio</h4>
    <article class="flex-column gap-3">
        <article class="flex-column">
            <label for="title" class="form-label">Title</label>
            <input wire:model="form.title" type="text" name="title" id="title" class="form-control">
        </article>
        <article class="flex-column">
            <label for="description" class="form-label">description</label>
            <textarea wire:model="form.description" name="description" rows="4" id="description" class="form-control"></textarea>
        </article>
        <article class="gap-1">
            <article class="flex-column col-4 bg-white rounded-3 p-3">
                <h6>select team members involved.</h6>
                <article class="gap-2 flex-wrap">
                    @foreach ($members as $item)
                        <article class="border border-2 rounded-3 gap-2 bg-white position-relative square"
                            style="--size: 80px">
                            <label type='button' for="user-{{ $item->id }}"
                                class="text-center gap-2 d-flex flex-column align-items-center">
                                <div class="btn-circle"><i
                                        class="fas m-auto fa-user  bg-light rounded-pill border-dark border-2 p-3"></i>
                                </div>
                                <div class="fs-8">{{ $item->name }}</div>
                            </label>
                            <input type="checkbox" value="{{ $item->id }}" wire:model="selected_members"
                                name="selected-members" id="user-{{ $item->id }}"
                                class="form-checkbox position-absolute top-0 end-0 m-1">
                        </article>
                    @endforeach
                </article>
            </article>
            <article class="flex-column col-12 bg-white rounded-3 p-3">
                <h6>Add pictures: <small class="text-gray">First 1 will be the thumbnail</small></h6>
                <input multiple type="file" id="photos" name="photos" class="form-control" wire:model="photos">
                <div wire:loading wire:target="photos">Uploading...</div>
                @error('photos.*')
                    <span class="error">{{ $message }}</span>
                @enderror
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
            <article class="col-4 hidden flex-column bg-white rounded-3 p-3 ">
                <article class="gap-2 flex-column">
                    <article class="flex-column">
                        <label for="add-links" class="form-label">add links:</label>
                        <div class="position-relative overflow-hidden rounded-3">
                            <input wire:model.lazy="link" type="text" name="add-links" id="add-links"
                                class="form-control pe-4">
                            <button type="button" wire:click="addLink"
                                class="pointer border-0 bg-success text-white position-absolute top-0 end-0 p-2">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </article>
                    <article class="gap-2 flex-column">
                        @foreach ($links as $key => $link)
                            <article align-center>
                                <a href="#">{{ $link }}</a>
                                <button type="button" wire:click="removeLink({{ $key }})"
                                    class="btn btn-danger btn-circle ms-2" style="--bs-bg-opacity: 0.3;"><i
                                        class="fas fa-trash p-2"></i></button>
                            </article>
                        @endforeach
                    </article>
                </article>
            </article>
        </article>
        <article class="gap-3 justify-content-end">
            <button type="button" class="btn btn-outline-secondary">Back</button>
            <button type="button" class="btn btn-primary">Perview</button>
            <button type="button" class="btn btn-outline-primary">Save as draft</button>
            <button class="btn btn-success" type="submit">Publish</button>
        </article>
    </article>
</form>
