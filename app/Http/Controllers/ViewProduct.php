<?php

namespace App\Http\Controllers;

use Livewire\Component;
use App\Models\products;
use App\Http\Controllers\Product;

class ViewProduct extends Component
{
    public products $productid;   // This is the same that Eloquent => products::find($productid); In livewire we use that to get product id :)

    // Call AddWishlistProduct For View Product Page
    public function AddWishlistView($productIdWish){
        // Call Function From Product Controller
        (new Product)->AddWishlist($productIdWish);
        // Call Count Wishlist Event
        $this->emit('CountWishlist');
    }

    public function render()
    {
        return view('view-product')->extends('layouts.app');
    }
}
