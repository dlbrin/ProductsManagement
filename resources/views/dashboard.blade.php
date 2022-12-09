<div class="container">
    @if ($ShowAddProductValue == 'Hidde')
        <button type="button" class="btn btn-primary mt-3" wire:click="ShowAddProduct">Add Product</button>
        <div class="ProductsCardContainer">
            @foreach ($Products as $Product)
                <div class="ProductsCard">
                    <div class="ProductsCardHeader">
                        <img src="{{ asset('assets/UploadImages/SdImage/'.$Product->image) }}">
                    </div>
                    <div class="ProductsCardContent">
                        <h3>{{ $Product->name }}</h3>
                        <div class="ProductsCardContentDetails">
                            <span><i class="far fa-folder"></i> {{ $Product->categoriesType->name }}</span>
                            <span><i class="fal fa-calendar-alt"></i> {{ $Product->created_at }}</span>
                            <span style="color: red"><i class="fal fa-dollar-sign"></i> {{ number_format( $Product->price) }}</span>
                        </div>
                        <p>{{ $Product->description }}</p>
                    </div>
                    <div class="ProductsCardFooter">
                        <i class="far fa-pen h5 text-success" data-bs-toggle="modal" data-bs-target="#EditProduct{{ $Product->id }}" wire:click="GetProductsValue({{ $Product->id }})" style="cursor: pointer;"></i>
                        <i class="far fa-trash h5 text-danger" data-bs-toggle="modal" data-bs-target="#DeleteProductData{{ $Product->id }}" style="cursor: pointer;"></i>
                    </div>
                </div>

                <!-- Edit Modal -->
                <div wire:ignore.self class="modal fade" id="EditProduct{{ $Product->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form wire:submit.prevent="UpProduct({{ $Product->id }})" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <input type="text" class="form-control mb-3" placeholder="Product Name" wire:model.defer="Upname" @error('Upname') style="border: 2px solid #F8D7DA;" @enderror>
                                    <input type="number" class="form-control mb-3" placeholder="Product Price" wire:model.defer="Upprice" @error('Upprice') style="border: 2px solid #F8D7DA;" @enderror>
                                    <input type="file" class="form-control mb-3" wire:model.defer="Upphoto" accept="image/*" @error('Upphoto') style="border: 2px solid #F8D7DA;" @enderror>
                                    <select class="form-select mb-3" wire:model.defer="UpcategoryId" @error('UpcategoryId') style="border: 2px solid #F8D7DA;" @enderror>
                                        <option selected>Category Type</option>
                                        @foreach ($categories as $categorie)
                                            <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                                        @endforeach
                                    </select>
                                    <textarea class="form-control mb-3" placeholder="Description" wire:model.defer="Updescription" @error('Updescription') style="border: 2px solid #F8D7DA;" @enderror></textarea> 
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Deltete Modal -->
                <div wire:ignore.self class="modal fade" id="DeleteProductData{{ $Product->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content delete-msg">
                            <img src="{{ asset('assets/img/delete.gif') }}" alt="" width="300">
                            <p>Are You Sure To Delete ?</p>
                            <div>
                                <span class="mb-3 btn btn-danger" wire:click="DeleteProduct({{ $Product->id }})" data-bs-dismiss="modal">Delete</span>
                                <span type="button" class="mb-3 btn btn-secondary" data-bs-dismiss="modal">Close</span>
                            </div>
                            
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <button type="button" class="btn btn-primary mt-3 mb-3" wire:click="$set('ShowAddProductValue' , 'Hidde')">Show Products</button>
        <livewire:add-product />
    @endif
    
</div>



