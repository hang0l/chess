<?php


namespace App\Http\Repositories\Interfaces\Player;


use App\Models\Player\PlayerTokens;

interface IPlayerTokensRepository
{
    public function createOrUpdate(int $playerId): PlayerTokens;

    public function delete(int $playerId): int;

    public function findByAccessToken(string $accessToken): PlayerTokens;
}
