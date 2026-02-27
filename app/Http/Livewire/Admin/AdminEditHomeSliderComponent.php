<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use phpDocumentor\Reflection\Types\This;

class AdminEditHomeSliderComponent extends Component
{

    use WithFileUploads;

    public $title;
    public $subtitle;
    public $price;
    public $image;
    public $link;
    public $status;
    public $newimage;
    public $slider_id;


    public function mount($slide_id){
//        $this->slider_id=$slider_id;

        $slider=HomeSlider::find($slide_id);

        $this->title=$slider->title;
        $this->subtitle=$slider->subtitle;
        $this->price=$slider->price;
        $this->link=$slider->link;
        $this->status=$slider->status;
        $this->image=$slider->image;
        $this->slider_id=$slider->id;


    }
    public function updateSlide(){
        $slider=HomeSlider::find($this->slider_id);
        $slider->title=$this->title;
        $slider->subtitle=$this->subtitle;
        $slider->price=$this->price;
        $slider->link=$this->link;
        $slider->status=$this->status;
        $slider->link=$this->link;
        if ($this->newimage){

            $imageName=Carbon::now()->timestamp. '.'. $this->newimage->extension();
            $this->newimage->storeAs('sliders',$imageName);
            $slider->image=$imageName;
        }

        $slider->image=$this->image;
        $slider->save();
        session()->flash('message','Slide has been created successfully');
    }

    public function render()
    {


        return view('livewire.admin.admin-edit-home-slider-component')->layout('layouts.base');
    }
}
