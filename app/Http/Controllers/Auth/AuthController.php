<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Interfaces\Player\IPlayerRepository;
use App\Http\Repositories\Interfaces\Player\IPlayerTokensRepository;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct(
        private IPlayerRepository $playerRepository,
        private IPlayerTokensRepository $playerTokensRepository,
    ) {
    }

    public function login(LoginRequest $request): JsonResponse {
        if(Auth::attempt($request->validated())) {
            $tokens = $this->playerTokensRepository->createOrUpdate(Auth::user()->getAuthIdentifier());
            return response()->json([
                'user' => Auth::user(),
                'accessToken' => $tokens->accessToken,
                'refreshToken' => $tokens->refreshToken,
            ]);
        }

        return response()->json([], 422);
    }

    public function register(RegisterRequest $request): JsonResponse {
        $request->validated();
        $passwordHash = Hash::make($request->password);
        $player = $this->playerRepository->updateOrCreate(
            $request->firstName,
            $request->lastName,
            $passwordHash,
            $request->email
        );
        return response()->json($player);
    }

    public function logout(): JsonResponse {
        xdebug_break();
        $this->playerTokensRepository->delete(Auth::user()->id);
        return response()->json();
    }
}
