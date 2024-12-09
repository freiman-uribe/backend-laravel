<?php
namespace App\Infrastructure\Repositories;

use App\Domain\Models\User;

class UserRepository
{
    public function create(array $data)
    {
        return User::create($data);
    }

    public function findByEmail(string $email)
    {
        return User::where('email', $email)->firstOrFail();
    }
}