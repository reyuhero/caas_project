<form wire:submit.prevent='submit' class="bg-white w-50 mx-auto position-absolute top-50 end-50 start-50 translate-middle rounded-4 shadow-md">
    <article class="position-relative text-left flex-column w-100 p-3 gap-2">
        <button type="button" @click="open = false" class="fas fa-times position-absolute top-0 end-0 text-danger p-2 m-1 btn-circle bg-light btn "></button>
        <h4>create your notice</h4>
        <div class="col">
            <label for="title" class="form-label">Title</label>
            <input wire:model.lazy="form.title" placeholder="E.g. BestDesigners or CodeStudio" class="form-control" type="text"
                name="title" id="title">
        </div>
        <article column>
            <label for="description" class="form-label">description (optional)</label>
            <textarea wire:model.lazy="form.description" class="form-control" id="description" rows="3"
                placeholder="description"></textarea>
        </article>
        <article column>
            <label for="type" class="form-label">notice type</label>
            <select id="type" wire:model.lazy="form.type" class="form-control" >
                <option> select notice type</option>
                <option value="1">team notice</option>
                <option value="2">system notice</option>
                <option value="3">project notice</option>
            </select>
        </article>
        <div>
            <button class="btn btn-outline-secondary" @click="open = false">Cancel</button>
            <button type="submit" class="btn btn-primary float-end">Save notice</button>
        </div>
    </article>
</form>
