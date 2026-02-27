<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\HomeCategory;
use Livewire\Component;

class AdminHomeCategoryComponent extends Component
{

    public $selected_categories=[];
    public $number_Of_Products;

    public function mount(){
    $category=HomeCategory::find(1);
    $this->selected_categories=explode(',',$category->sel_categories);
    $this->number_Of_Products=$category->no_of_products;
    }

    public function updateHomeCategory(){
        $category=HomeCategory::find(1);
        $category->sel_categories=implode(',',$this->selected_categories);
        $category->no_of_products=$this->number_Of_Products;
        $category->save();
        session()->flash('message','HomeCategory has been updated successfully');
    }

    public function render()
    {


        $categories=Category::all();
        return view('livewire.admin.admin-home-category-component',['categories'=>$categories])->layout('layouts.base');
    }
}
