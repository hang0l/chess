<?php


namespace App\Http\Repositories\Interfaces\Player;


use App\Models\Player\Player;

interface IPlayerRepository
{
    public function updateOrCreate(
        string $firstName,
        string $lastName, string
        $password,
        string $email,
        int $id = null
    ): Player;

    public function findById(int $id): Player;
}
