<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * Registers a User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(RegisterRequest $request)
    {
        // Call the register method on the AuthService to handle the registration logic
        $data = $this->authService->register($request);

        // Return rgistration success response
        return response()->json([
            $data,
            'message' => 'Registration successful',
        ], Response::HTTP_CREATED);
    }

    /**
     * Logs a User in
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginRequest $request)
    {
        // Call the login method on the AuthService, passing the RegisterRequest instance
        $loginData = $this->authService->login($request);

        // Return a response with the login data
        return response()->json($loginData, Response::HTTP_OK);
    }
    /**
     * Logs a User in
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        $this->authService->logout($request);

        return response()->json([
            'message' => 'Logged out successfully',
        ]);
    }

}