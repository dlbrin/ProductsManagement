<div class="container">
    @if (count($Whishlists) == 0)
        <div class="d-flex flex-column align-items-center justify-content-center mt-5">
            <img src="{{ asset('assets/img/whishlist.gif') }}" alt="" width="300">
            <h3>Your whishlist is empty !</h3>
        </div>
    @else
        <div class="WishlistProducts">
            <h1><i class="fal fa-wave-sine" style="color: rgb(196, 46, 46)"></i> My Wishlist</h1>
            <div class="ProductsCardContainer">
                @foreach ($Whishlists as $Whishlist)
                    <div class="ProductsCard">
                        <div class="ProductsCardHeader">
                            <img src="{{ asset('assets/UploadImages/SdImage/'.$Whishlist->WhishlistId->image) }}">
                        </div>
                        <div class="ProductsCardContent">
                            <a href="{{ route('ViewProduct' , $Whishlist->WhishlistId->id) }}">
                                <h3>{{ $Whishlist->WhishlistId->name }}</h3>
                                <div class="ProductsCardContentDetails">
                                    <span><i class="far fa-folder"></i> {{ $Whishlist->WhishlistId->categoriesType->name }}</span>
                                    <span><i class="fal fa-calendar-alt"></i> {{ $Whishlist->WhishlistId->created_at }}</span>
                                    <span style="color: red"><i class="fal fa-dollar-sign"></i> {{ number_format( $Whishlist->WhishlistId->price) }}</span>
                                </div>
                                <p>{{ $Whishlist->WhishlistId->description }}</p>
                            </a>
                        </div>
                        <div class="ProductsCardFooter">
                            <div class="ProductsCardFooterSatr">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="ProductsCardFooterWishlist">
                                <i class="fas fa-heart" wire:click="RemoveWhishlist({{ $Whishlist->id }})" style="color: rgb(196, 46, 46)"></i>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <a href="{{ route('Product') }}" class="btn btn-primary mt-5">Back</a>
        </div>
    @endif
</div>
