<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;
class ShopComponent extends Component
{
    public function store($product_id,$product_name,$product_price){
        Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');

        return redirect()->route('product.cart')->with('success','Item added in the cart');

    }
    use WithPagination;
    public function render()
    {
        $products=Product::paginate(12);
        return view('livewire.shop-component',compact('products'))->layout('layouts.base');
    }
}
