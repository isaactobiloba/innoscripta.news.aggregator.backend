<?php

namespace App\Services;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService
{

    public function register(RegisterRequest $request): array
    {
        // Retrieve the validated data from the request
        $data = $request->validated();

        // Create a new user
        $user = $this->createUser($data);

        // Generate and save the user's access token
        $accessToken = $this->generateAccessToken($user);

        return [
            'user' => new UserResource($user),
            'accessToken' => $accessToken
        ];
    }

    public function login(LoginRequest $request): array
    {
        // Retrieve the validated data from the request
        $credentials = $request->only('email', 'password');

        // Attempt to authenticate the user
        if (!Auth::attempt($credentials)) {
            // Authentication failed
            // You can throw an exception or handle the failure in any other way you prefer
            // For example, you can return an error response indicating invalid credentials
            throw new \InvalidArgumentException('Invalid credentials');
        }

        // Authentication succeeded
        $user = $request->user();
        $accessToken = $this->generateAccessToken($user);

        return [
            'user' => new UserResource($user),
            'accessToken' => $accessToken,
        ];
    }

    public function logout(Request $request): void
    {
        $user = $request->user();

        // Revoke the user's access tokens
        $user->tokens()->delete();
    }

    protected function createUser(array $data): User
    {
        $user = User::create([
            'first_name' => $data['firstName'],
            'last_name' => $data['lastName'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        return $user;
    }

    protected function generateAccessToken(User $user): string
    {
        // Generate an access token with laravel Passport
        $accessToken = $user->createToken('Personal Access Token')->accessToken;

        return $accessToken;
    }
}