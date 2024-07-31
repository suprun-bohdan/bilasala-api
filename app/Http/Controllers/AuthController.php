<?php

namespace App\Http\Controllers;

use App\DTO\UserDTO;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    protected UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function register(RegisterRequest $request): JsonResponse
    {
        $userDTO = new UserDTO(
            $request->name,
            $request->email,
            $request->password
        );

        $user = $this->userRepository->create($userDTO);

        return new JsonResponse(['message' => 'User registered successfully', 'user' => $user], Response::HTTP_CREATED);
    }

    public function login(LoginRequest $request): JsonResponse
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return new JsonResponse(['message' => 'Invalid credentials'], Response::HTTP_UNAUTHORIZED);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return new JsonResponse(['access_token' => $token, 'token_type' => 'Bearer'], Response::HTTP_OK);
    }

    public function logout(Request $request): JsonResponse
    {
        $request->user()->currentAccessToken()->delete();

        return new JsonResponse(['message' => 'User logged out successfully'], Response::HTTP_OK);
    }

    public function redirectToFacebook() : RedirectResponse
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback(): JsonResponse
    {
        $facebookUser = Socialite::driver('facebook')->user();

        $authUser = User::updateOrCreate([
            'provider_id' => $facebookUser->id,
        ], [
            'name' => $facebookUser->name,
            'email' => $facebookUser->email,
            'provider' => 'facebook',
        ]);

        $token = $authUser->createToken('auth_token')->plainTextToken;

        return new JsonResponse(['access_token' => $token, 'token_type' => 'Bearer'], Response::HTTP_OK);
    }
}
