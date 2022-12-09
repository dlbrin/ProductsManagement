<?php

namespace App\Http\Controllers;

use Livewire\Component;
use App\Models\products;
use App\Models\whishlist;

class Product extends Component
{
    // Load More Products
    public $limit = 20;
    public function loadmore(){
        $this->limit += 20;
    }

    // Products Search
    public $ProductsSearch;

    // Add Wishlist
    public function AddWishlist($ProductId){
        $ExistsWhishlsit = whishlist::where(['product_id' => $ProductId , 'Usertoken' => csrf_token()])->exists();
        if($ExistsWhishlsit){
            notyf()->position("y" , "top")->addError('Alredy Added');
        }else{
            whishlist::create([
                'product_id' => $ProductId,
                'Usertoken' => csrf_token(),
            ]);
            // Call Count Wishlist Event
            $this->emit('CountWishlist');
            notyf()->position("y" , "top")->addSuccess('Add Successfully');
        } 
    }

    public function render()
    {
        $array = [
            'Products' => products::where('name', 'LIKE', '%'.$this->ProductsSearch.'%')->paginate($this->limit),
            'WhishlistsData' => whishlist::all(),
            
        ];
        return view('product' , $array)->extends('layouts.app');
    }
}
