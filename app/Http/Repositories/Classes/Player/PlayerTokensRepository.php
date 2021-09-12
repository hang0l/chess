<?php


namespace App\Http\Repositories\Classes\Player;


use App\Http\Repositories\Interfaces\Player\IPlayerTokensRepository;
use App\Models\Player\PlayerTokens;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class PlayerTokensRepository implements IPlayerTokensRepository
{
    public function __construct(protected PlayerTokens $model) {
    }

    public function createOrUpdate(int $playerId): PlayerTokens {
        return $this->model::updateOrCreate(
            [
                'playerId' => $playerId,
            ],
            [
                'accessToken' => Str::random(50),
                'refreshToken' => Str::random(50),
                'accessTokenExpiresIn' => Carbon::now()->addDay()->unix(),
                'refreshTokenExpiresIn' => Carbon::now()->addMonth()->unix(),
                'createTime' => Carbon::now(),
                'modifyTime' => Carbon::now(),
            ]);
    }

    public function delete(int $playerId): int {
        return $this->model::where('playerId', '=', $playerId)
            ->delete();
    }

    public function findByAccessToken(string $accessToken): PlayerTokens {
        return $this->model::where('accessToken', '=', $accessToken)->firstOrNew();
    }
}
