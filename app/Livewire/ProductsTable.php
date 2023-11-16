<?php

namespace App\Livewire;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class ProductsTable extends Component
{
    public $products;
    public array $quantity = [];

    public function mount()
    {
        $this->products = Product::all();
        foreach ($this->products as $product) {
            $this->quantity[$product->id] = 1;
        }
    }

    public function render()
    {
        $cart = Cart::content();

        return view('livewire.products-table',
            compact('cart'));
    }

    public function addToCart($productId)
    {		
        $product = Product::findOrFail($productId);
        Cart::add(
            $product->id,
            $product->name,
            $this->quantity[$productId],
            $product->price / 100,
        );
        $this->dispatch('cart_updated');
    }

    public function delete($cartItemId)
    {
        Cart::remove($cartItemId);
        $this->dispatch('cart_updated');
    }
}
