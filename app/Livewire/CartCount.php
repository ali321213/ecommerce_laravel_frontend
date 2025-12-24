<?php

namespace App\Livewire;
use Livewire\Component;

class CartCount extends Component
{
    protected $listeners = ['cartUpdated' => '$refresh'];
    public function render()
    {
        $count = collect(session('cart', []))->sum('quantity');
        return view('livewire.cart-count', [
            'count' => $count
        ]);
    }
}
