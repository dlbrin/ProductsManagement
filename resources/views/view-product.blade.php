<div class="container">
    <div class="ViewProductsContainer">
        <div class="ViewProductsContainerImg">
            <img src="{{ asset('assets/UploadImages/HdImage/'.$productid->image) }}">
        </div>
        <div class="ViewProductsContainerDetails">
            <h1>{{ $productid->name }}</h1>
            <p>{{ $productid->description }}</p>
            <h2>{{ number_format($productid->price) }} $</h2>
            <div class="ViewProductsContainerDetailsCate">
                <span><i class="far fa-folder"></i> {{ $productid->categoriesType->name }}</span>
                <span><i class="fal fa-calendar-alt"></i> {{ $productid->created_at }}</span>
            </div>
            <button class="btn btn-danger" wire:click="AddWishlistView({{ $productid->id }})"><i class="far fa-heart"></i> Wishlist</button>
            <a href="{{ route('Product') }}" class="btn btn-primary">Back</a>
        </div>
    </div>
</div>
