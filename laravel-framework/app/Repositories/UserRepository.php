<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Arr;

class UserRepository
{
    private $user;

    public function __construct(User $user)
    {
       $this->user = $user;
    }

    public function fetchAll()
    {
        return $this->user->with('address')->orderBy('name')->get();
    }

    public function create(array $validated): void
    {
        $userData = Arr::except($validated, ['address']);

        $user = $this->user->create($userData);

        $user->address()->create($validated['address']);
    }

    public function getById(string $id): User
    {
        return $this->user->with('address')->findOrFail($id);
    }

    public function update(string $id, array $validated): void
    {
        $user = $this->user->findOrFail($id);

        $user->update($validated);
    }

    public function deleteById(string $id): void
    {
        $user = $this->user->findOrFail($id);

        $user->delete();
    }
}
