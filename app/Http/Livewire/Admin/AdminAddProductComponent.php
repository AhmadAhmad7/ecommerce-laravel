<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
class AdminAddProductComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $regular_price;
    public $sale_price;
    public $SKU;
    public $featured;
    public $stock_status;
    public $quantity;
    public $image;
    public $category_id;

    public $images;


    public function mount(){
        $this->stock_status='instock';
        $this->featured=0;
    }
    public function generate_slug(){
        $this->slug=Str::slug($this->name,'-');
    }


    public function updated($fields){
        $this->validateOnly($fields,[
            'name'=>'required',
            'slug'=>'required|unique:categories',
            'short_description' => 'required',
            'description' => 'required',
            'regular_price' => 'required|numeric',
            'sale_price' => 'numeric',
            'SKU' => 'required',
            'stock_status' => 'required',
            'quantity' => 'required|numeric',
            'image' => 'required|mimes:jpg,jpeg,png',
            'category_id'=>'required'
        ]);
    }


    public function add_Product(){
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:products',
            'short_description' => 'required',
            'description' => 'required',
            'regular_price' => 'required|numeric',
            'sale_price' => 'numeric',
            'SKU' => 'required',
            'stock_status' => 'required',
            'quantity' => 'required|numeric',
            'image' => 'required|mimes:jpg,jpeg,png',
            'category_id'=>'required'
        ]);





        $product= new Product();

        $product->name =$this->name;
        $product->slug =$this->slug;
        $product->short_description =$this->short_description;
        $product->description =$this->description;
        $product->SKU =$this->SKU;
        $product->stock_status =$this->stock_status;
        $product->quantity =$this->quantity;
        $product->regular_price =$this->regular_price;
        $product->sale_price =$this->sale_price;
        $product->category_id =$this->category_id;

        $imageName=Carbon::now()->timestamp. '.' .$this->image->extension();
        $this->image->storeAs('products',$imageName);
        $product->image=$imageName;

        if ($this->images){
            $imagesname='';
            foreach ($this->images as $key=>$image)
            {
                $imgname=Carbon::now()->timestamp.$key. '.' . $image->extension();
                $image->storeAs('products',$imgname);
                $imagesname= $image . ',' . $imgname;
            }
            $product->images= $imagesname;

        }
        $product->category_id= $this->category_id;

        $product->save();
        session()->flash('message',' Product has been created successfully');

    }

    public function render()
    {
        $categories=Category::all();
        return view('livewire.admin.admin-add-product-component',['categories'=>$categories])->layout('layouts.base');
    }
}
