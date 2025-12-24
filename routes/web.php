<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Livewire\{
    HomePage,
    CategoriesPage,
    ProductsPage,
    ProductDetailPage,
    CartPage,
    CheckoutPage,
    MyOrdersPage,
    MyOrderDetailPage,
    SuccessPage,
    CancelPage
};
use App\Livewire\Auth\{
    LoginPage,
    RegisterPage,
    ForgotPasswordPage,
    ResetPasswordPage
};

/* Public Routes */
Route::get('/', HomePage::class)->name('home');

Route::prefix('shop')->group(function () {
    Route::get('/categories', CategoriesPage::class)->name('categories.index');
    Route::get('/products', ProductsPage::class)->name('products.index');
    Route::get('/products/{slug}', ProductDetailPage::class)->name('products.show');
});
// Route::post('/login', [AuthController::class, 'login'])->name('login.store');
/* Cart & Checkout (Auth Required) */
Route::middleware('auth')->group(function () {
    Route::get('/cart', CartPage::class)->name('cart.index');
    Route::get('/checkout', CheckoutPage::class)->name('checkout.index');

    Route::prefix('orders')->group(function () {
        Route::get('/', MyOrdersPage::class)->name('orders.index');
        Route::get('/{order}', MyOrderDetailPage::class)->name('orders.show');
    });
});

/* Authentication Routes (Guest Only) */
Route::middleware('guest')->group(function () {
    Route::get('/login', LoginPage::class)->name('login');
    Route::get('/register', RegisterPage::class)->name('register');
    Route::get('/forgot-password', ForgotPasswordPage::class)->name('password.request');
    Route::get('/reset-password/{token}', ResetPasswordPage::class)->name('password.reset');
});

/* Payment Status Pages */
Route::middleware('auth')->group(function () {
    Route::get('/payment/success', SuccessPage::class)->name('payment.success');
    Route::get('/payment/cancelled', CancelPage::class)->name('payment.cancelled');
});


Route::post('/logout', function () {
    auth()->logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect()->route('login');
})->name('logout')->middleware('auth');
