<?php


namespace App\Providers;


use App\Http\Repositories\Classes\Player\PlayerRepository;
use App\Http\Repositories\Classes\Player\PlayerTokensRepository;
use App\Http\Repositories\Interfaces\Player\IPlayerRepository;
use App\Http\Repositories\Interfaces\Player\IPlayerTokensRepository;
use App\Models\Player\Player;
use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Support\Facades\App;

class TokenPlayerProvider extends EloquentUserProvider
{
    public function retrieveByCredentials(array $credentials): bool {
        if (
            empty($credentials) || count($credentials) < 2 || array_key_exists('password', $credentials)
        ) {
            return false;
        }

        return true;
    }

    public function retrieveByToken($identifier, $token): Player {
        xdebug_break();
        /** @var PlayerTokensRepository $playerTokenRepository */
        $playerTokenRepository = App::make(IPlayerTokensRepository::class);
        $tokens = $playerTokenRepository->findByAccessToken($token);
        if($tokens->exists) {
            /** @var PlayerRepository $playerRepository */
            $playerRepository = App::make(IPlayerRepository::class);
            return $playerRepository->findById($tokens->playerId);
        }
        return new Player();
    }
}
