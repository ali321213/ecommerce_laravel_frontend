<?php

namespace App\Livewire\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\Password;

class ForgotPasswordPage extends Component
{
    public string $email = '';
    protected $rules = ['email' => 'required|email'];

    public function sendResetLink()
    {
        $this->validate();
        Password::sendResetLink(['email' => $this->email]);
        session()->flash('success', 'Password reset link sent.');
    }

    public function render()
    {
        return view('livewire.auth.forgot-password-page');
    }
}
