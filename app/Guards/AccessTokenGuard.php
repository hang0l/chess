<?php

namespace App\Guards;

use App\Providers\TokenPlayerProvider;
use Illuminate\Auth\GuardHelpers;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

class AccessTokenGuard implements Guard
{
    use GuardHelpers;

    private string $inputKey = 'Bearer';
    private string $storageKey = 'accessToken';
    private Request $request;

    public function __construct(TokenPlayerProvider $provider, Request $request) {
        $this->provider = $provider;
        $this->request = $request;
    }

    public function user(): ?Authenticatable {
        if(!is_null($this->user)) {
            return $this->user;
        }

        $user = null;

        $token = $this->getTokenForRequest();

        if(!empty($token)) {
            $user = $this->provider->retrieveByToken($this->storageKey, $token);
        }

        return $this->user = $user;
    }

    public function getTokenForRequest(): ?string {
        return $this->request->bearerToken();
    }

    public function validate(array $credentials = []): bool {
        if(empty($credentials[$this->inputKey])) {
            return false;
        }

        $credentials = [$this->storageKey => $credentials[$this->inputKey]];

        if($this->provider->retrieveByCredentials($credentials)) {
            return true;
        }

        return false;
    }
}
