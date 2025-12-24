<?php

namespace App\Livewire;
use Livewire\Component;

class CartPage extends Component
{
    public $cart = [];

    public function mount()
    {
        $this->cart = session()->get('cart', []);
    }

    public function increment($id)
    {
        if (isset($this->cart[$id])) {
            $this->cart[$id]['quantity']++;
            $this->updateCart();
        }
    }

    public function decrement($id)
    {
        if (isset($this->cart[$id]) && $this->cart[$id]['quantity'] > 1) {
            $this->cart[$id]['quantity']--;
            $this->updateCart();
        }
    }

    public function remove($id)
    {
        unset($this->cart[$id]);
        $this->updateCart();
    }

    public function updateCart()
    {
        session()->put('cart', $this->cart);
        $this->dispatch('cartUpdated');
    }

    public function getSubtotalProperty()
    {
        return collect($this->cart)->sum(
            fn($item) =>
            $item['price'] * $item['quantity']
        );
    }

    public function render()
    {
        return view('livewire.cart-page');
    }
}
