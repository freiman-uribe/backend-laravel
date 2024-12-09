<?php
namespace App\Application\Services;

use App\Domain\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function register(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function findByEmail(string $email)
    {
        return User::where('email', $email)->firstOrFail();
    }
}