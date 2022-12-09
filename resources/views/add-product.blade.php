<div>
    <form wire:submit.prevent="saveProduct" enctype="multipart/form-data">
        @csrf
        <div class="row mt-3 mb-3">
            <div class="col">
              <input type="text" class="form-control" placeholder="Product Name" wire:model.defer="name" @error('name') style="border: 2px solid #F8D7DA;" @enderror>
              @error('name') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="col">
              <input type="number" class="form-control" placeholder="Product Price" wire:model.defer="price" @error('price') style="border: 2px solid #F8D7DA;" @enderror>
              @error('price') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
        <input class="form-control" type="file" wire:model.defer="photo" accept="image/*"  @error('photo') style="border: 2px solid #F8D7DA;" @enderror>
        @error('photo') <span class="error text-danger">{{ $message }}</span> @enderror
        <select class="form-select mt-3" wire:model.defer="categoryId"  @error('categoryId') style="border: 2px solid #F8D7DA;" @enderror>
            <option selected>Category Type</option>
            @foreach ($categories as $categorie)
                <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
            @endforeach
        </select>
        @error('categoryId') <span class="error text-danger">{{ $message }}</span> @enderror
        <div wire:ignore class="mt-3">
            <textarea wire:model.defer="description" id="summernote" class="form-control" placeholder="Description" @error('description') style="border: 2px solid #F8D7DA;" @enderror></textarea> 
        </div>
        @error('description') <span class="error text-danger mb-3">{{ $message }}</span> @enderror   
        <br>
        <button class="btn btn-primary mt-3">Save</button>
    </form>
</div>
<script>
    $('#summernote').summernote({
        placeholder: 'Description',
        tabsize: 2,
        callbacks: {
            onChange: function(e) {
                @this.set('description', e);
            },
        }
    });
</script>

