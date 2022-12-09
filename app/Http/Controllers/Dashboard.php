<?php

namespace App\Http\Controllers;

use Livewire\Component;
use App\Models\products;
use App\Models\categories;
use App\Http\Controllers\AddProduct;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;
use Image;

class Dashboard extends Component
{
    // Upload Image in Livewire package
    use WithFileUploads;

    // To Show Add Product Component 
    public $ShowAddProductValue = "Hidde";  // By Default i Hidde Add Product
    public function ShowAddProduct(){
        $this->ShowAddProductValue = "Show";  // When we click Add Product Button Change Value
    }
    
    // Get All Products Value To Update In Livewire we use this way Because This way More Secure
    public $Upname, $Upprice, $Upphoto, $UpcategoryId, $Updescription;
    public function GetProductsValue(products $productsid){
        $this->Upname = $productsid->name;
        $this->Upprice  = $productsid->price;
        $this->UpcategoryId = $productsid->category_id;
        $this->Updescription = $productsid->description;  
    }

    // Delete Old Image Function
    public function DestroyOldImage($ImageProduct){
        // Delete Old Image
        $HdPath = 'assets/UploadImages/HdImage/'.$ImageProduct;
        $SdPath = 'assets/UploadImages/SdImage/'.$ImageProduct;
        if(File::exists($HdPath) || File::exists($SdPath)){
            File::delete($HdPath);
            File::delete($SdPath);
        }
    }

    // Update Products data after we get data
    public function UpProduct(products $upProductsid){
        // Validation
        $validatedData = $this->validate([
            'Upname' => 'required|regex:/^[a-zA-Z]+$/',
            'Upprice' => 'required|regex:/^(\d+(,\d{1,2})?)?$/', 
            'Upphoto' => 'max:2048',
            'UpcategoryId' => 'required',
            'Updescription' => 'required',
        ]);

        // Image Process
        if(!empty($this->Upphoto)){
            $ImageName = rand().".".$this->Upphoto->getClientOriginalExtension();
            // Full Quality Image
            $this->Upphoto->storeAs('HdImage', $ImageName, 'path');
            // Low Quality Image Using intervention Image Package
            Image::make($this->Upphoto)->save("assets/UploadImages/SdImage/$ImageName" , 10);
            // Call Old Image Function
            $this->DestroyOldImage($upProductsid->image);
        }else{
            $ImageName = $upProductsid->image;
        }

        // Update data after we get product data
        $upProductsid->update([
            'name' => $this->Upname,
            'price' => $this->Upprice,
            'image' => $ImageName,
            'category_id' => $this->UpcategoryId,
            'description' => $this->Updescription,
        ]);
        // To Empty Image Variable and get new Value
        $this->Upphoto = "";
    }

    // Delete Product
    public function DeleteProduct(products $upProductsid){
        // Call Old Image Function
        $this->DestroyOldImage($upProductsid->image);
        // Delete Data
        $upProductsid->delete();
        // Message after Data Deleted successfully
        notyf()->position("y" , "top")->addSuccess('Data has been Deleted successfully!');
    }

    public function render()
    {
        $array = [
            'Products' => products::all(),
            'categories' => categories::all(),
        ];
        return view('dashboard' , $array)->extends('layouts.app');
    }
}
