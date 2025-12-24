{{-- resources\views\livewire\cart-page.blade.php --}}
<div class="max-w-7xl mx-auto py-10 px-4">
    <h1 class="text-2xl font-semibold mb-6">Shopping Cart</h1>

    @if (count($cart))
        <div class="grid md:grid-cols-4 gap-6">
            <!-- CART ITEMS -->
            <div class="md:col-span-3 bg-white rounded-lg shadow p-6">
                <table class="w-full">
                    <thead>
                        <tr class="text-left border-b">
                            <th>Product</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Total</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cart as $id => $item)
                            <tr class="border-b">
                                <td class="py-4 flex items-center gap-4">
                                    <img class="h-16 w-16 rounded" src="{{ asset('storage/' . $item['image']) }}">
                                    <span class="font-semibold">{{ $item['name'] }}</span>
                                </td>
                                <td>Rs {{ number_format($item['price']) }}</td>
                                <td>
                                    <div class="flex items-center">
                                        <button wire:click="decrement({{ $id }})"
                                            class="px-3 border">-</button>
                                        <span class="px-4">{{ $item['quantity'] }}</span>
                                        <button wire:click="increment({{ $id }})"
                                            class="px-3 border">+</button>
                                    </div>
                                </td>
                                <td>
                                    Rs {{ number_format($item['price'] * $item['quantity']) }}
                                </td>
                                <td>
                                    <button wire:click="remove({{ $id }})"
                                        class="text-red-500 hover:underline">
                                        Remove
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- SUMMARY -->
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-lg font-semibold mb-4">Summary</h2>

                <div class="flex justify-between mb-2">
                    <span>Subtotal</span>
                    <span>Rs {{ number_format($this->subtotal) }}</span>
                </div>

                <div class="flex justify-between mb-2">
                    <span>Shipping</span>
                    <span>Rs 0</span>
                </div>

                <hr class="my-2">

                <div class="flex justify-between font-semibold">
                    <span>Total</span>
                    <span>Rs {{ number_format($this->subtotal) }}</span>
                </div>

                <button class="bg-blue-600 text-white w-full py-2 mt-4 rounded">
                    Checkout
                </button>
            </div>
        </div>
    @else
        <p class="text-gray-500">Your cart is empty.</p>
    @endif
</div>
