<?php


namespace App\Http\Repositories\Classes\Player;


use App\Http\Repositories\Interfaces\Player\IPlayerRepository;
use App\Models\Player\Player;

class PlayerRepository implements IPlayerRepository
{
    public function __construct(protected Player $model) {
    }

    public function updateOrCreate(
        string $firstName,
        string $lastName, string
        $password,
        string $email,
        int $id = null
    ): Player {
        return $this->model->updateOrCreate(
            [
                'email' => $email,
            ],
            [
                'firstName' => $firstName,
                'lastName' => $lastName,
                'passwordHash' => $password,
            ]
        );
    }

    public function findById(int $id): Player {
        return $this->model::where('id', '=', $id)->firstOrNew();
    }
}
