<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected static ?string $password;

    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->optional()->phoneNumber(),
            'address' => fake()->optional()->address(),
            'utype' => 'USR', // default customer
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | States
    |--------------------------------------------------------------------------
    */

    // Admin user
    public function admin(): static
    {
        return $this->state(fn() => [
            'utype' => 'ADM',
            'email' => 'admin@admin.com',
            'phone' => '03001234567',
        ]);
    }

    public function user(): static
    {
        return $this->state(fn() => [
            'utype' => 'USR',
            'email' => 'user@user.com',
            'phone' => '03001234547',
        ]);
    }

    // Unverified user
    public function unverified(): static
    {
        return $this->state(fn() => [
            'email_verified_at' => null,
        ]);
    }
}
