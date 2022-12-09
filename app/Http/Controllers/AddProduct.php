<?php

namespace App\Http\Controllers;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\products;
use App\Models\categories;
// This is intervention Image Package
use Image;

class AddProduct extends Component
{
    // I use this package to Upload Image in Livewire
    use WithFileUploads;

    // Insert Value into variables With Livewire
    public $name, $price, $photo, $categoryId, $description;
    
    // Save Products
    public function saveProduct(){
        // Validation
        $validatedData = $this->validate([
            'name' => 'required|regex:/^[\pL\s\-]+$/u',
            'price' => 'required|regex:/^(\d+(,\d{1,2})?)?$/', 
            'photo' => 'required|image|max:2048|mimes:jpeg,png,jpg|dimensions:min_width=500,min_height=500',
            'categoryId' => 'required',
            'description' => 'required',
        ]);

        // Image Process
        $ImageName = rand().".".$this->photo->getClientOriginalExtension();
        // Full Quality Image
        $this->photo->storeAs('HdImage', $ImageName, 'path');
        // Low Quality Image Using intervention Image Package
        Image::make($this->photo)->save("assets/UploadImages/SdImage/$ImageName" , 10);

        // Insert Data
        $SaveProduct = products::create([
            'name' => $this->name,
            'price' => $this->price,
            'image' => $ImageName,
            'category_id' => $this->categoryId,
            'description' => $this->description,
        ]);
        // Message after Data Save successfully
        notyf()->position("y" , "top")->addSuccess('Data has been saved successfully!');
    }


    public function render()
    {
        // Show Categories Table Data For Add Products
        $array = [
            'categories' => categories::all(),
        ];
        return view('add-product' , $array);
    }
}
