<?php

namespace App\Http\Controllers;

use Livewire\Component;
use App\Models\whishlist;

class Whishlistproduct extends Component
{

    // Delete Whishlist
    public function RemoveWhishlist(whishlist $ProductIdRemove){
        // Call Count Wishlist Event
        $this->emit('CountWishlist');
        
        $ProductIdRemove->delete();
    }
    
    public function render()
    {
        $array = [
            'Whishlists' => whishlist::where('Usertoken', csrf_token())->get(),
        ];
        return view('whishlistproduct' , $array)->extends('layouts.app');
    }
}
