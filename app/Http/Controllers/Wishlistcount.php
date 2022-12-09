<?php

namespace App\Http\Controllers;

use Livewire\Component;
use App\Models\whishlist;

class Wishlistcount extends Component
{

    public $IncreseCount;
    
    // Event listeners are registered in the $listeners property
    protected $listeners = ['CountWishlist' => 'WishlistIncreaseCount'];
    
    public function WishlistIncreaseCount(){
        return $this->IncreseCount = whishlist::where('Usertoken', csrf_token())->count();
    }

    public function render()
    {
        $this->IncreseCount = $this->WishlistIncreaseCount();
        return view('wishlistcount' , ['WishlistsCountProduct' => $this->IncreseCount])->extends('layouts.app');
    }
}
