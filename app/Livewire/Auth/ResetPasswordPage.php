<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class ResetPasswordPage extends Component
{
    public string $email = '';
    public string $password = '';
    public string $token;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:6',
    ];

    public function mount($token)
    {
        $this->token = $token;
    }

    public function resetPassword()
    {
        $this->validate();

        Password::reset(
            [
                'email' => $this->email,
                'password' => $this->password,
                'token' => $this->token
            ],
            function ($user) {
                $user->password = Hash::make($this->password);
                $user->save();
            }
        );

        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.auth.reset-password-page');
    }
}
