<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class DetailsComponent extends Component
{
    public $slug;
    public function mount($slug){
$this->slug=$slug;
    }
    public function render()
    {
        $product=Product::where('slug',$this->slug)->first();
        $ppro=Product::inRandomOrder()->limit(4)->get();
        $rpro=Product::where('category_id',$product->category_id)->inRandomOrder()->limit(8)->get();
        return view('livewire.details-component',compact('product','ppro','rpro'))->layout('layouts.base');
    }
}
