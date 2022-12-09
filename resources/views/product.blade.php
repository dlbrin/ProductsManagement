<div>
    <section>
        <header>
            <div class="HeaderTxt">
                <h1>Buy & Sell Near You</h1>
                <div class="HaederSearch">
                    <div>
                        <input type="text" placeholder="Search for products" wire:model="ProductsSearch">
                    </div>
                    <div class="HaederSearchIcon">
                        <i class="far fa-search"></i>
                    </div>
                </div>
                <div class="FooterOfHeader">
                    <h1>POPULAR CATEGORY</h1>
                    <div class="FooterOfHeaderCategory">
                        <span><i class="fal fa-tshirt"></i> Shirts</span>
                        <span><i class="far fa-user-tie"></i> Clothes</span>
                        <span><i class="fal fa-laptop"></i> Laptop</span>
                        <span><i class="far fa-bolt"></i> Electronics </span>
                    </div>
                </div>
            </div>
        </header>
        <div class="ProductsContainer">
            <div class="ProductsContainerHaeder">
                <h1>Our Products</h1>
                <hr size="8">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas, magnam.</p>
            </div>
            <div class="ProductsCardContainer">
                @foreach ($Products as $Product)
                    <div class="ProductsCard">
                        <div class="ProductsCardHeader">
                            <img src="{{ asset('assets/UploadImages/SdImage/'.$Product->image) }}">
                        </div>
                        <div class="ProductsCardContent">
                            <a href="{{ route('ViewProduct' , $Product->id) }}">
                                <h3>{{ $Product->name }}</h3>
                                <div class="ProductsCardContentDetails">
                                    <span><i class="far fa-folder"></i> {{ $Product->categoriesType->name }}</span>
                                    <span><i class="fal fa-calendar-alt"></i> {{ $Product->created_at }}</span>
                                    <span style="color: red"><i class="fal fa-dollar-sign"></i> {{ number_format( $Product->price) }}</span>
                                </div>
                                <p>{{ $Product->description }}</p>
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
                                <i class="far fa-heart" wire:click="AddWishlist({{ $Product->id }})"></i> 
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @if ($limit <= $Products->total())
                <div class="d-flex justify-content-center m-4">
                    <span wire:click="loadmore" class="btn btn-success">More</span>
                </div>
            @endif
        </div>
    </section>
</div>
