<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    /**
     * User registration process:
     * - processing the user name, email, and password
     * - generating token if success
     * - returning the response
     */
    public function register(Request $request): JsonResponse
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token,
        ], Response::HTTP_OK);
    }

    /**
     * User login process:
     * - processing the user email and password
     * - generating token if success
     * - returning the response
     */
    public function login(Request $request): JsonResponse
    {
        // validation logic
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // check if the user is exists in db
        $user = User::where('email', $request->email)->first();
        $isValidPassword = $user && Hash::check($request->password, $user->password);

        // user checking logic
        if (! $isValidPassword) {
            return response()->json([
                'success' => false,
                'message' => 'Authentication failed! Invalid credentials.',
            ], Response::HTTP_UNAUTHORIZED);
        }

        // generate token logic using sanctum
        $token = $user->createToken('api-token')->plainTextToken;

        // return response details; user's data and API/Bearer token
        return response()->json([
            'user' => $user,
            'token' => $token,
        ], Response::HTTP_OK);
    }

    /**
     * User logout process:
     * - revoking the token (delete the token)
     * - returning the response
     */
    public function logout(): JsonResponse
    {
        Auth::user()->currentAccessToken()->delete();

        return response()->json([
            'success' => true,
            'message' => 'User logged out successfully.',
        ], Response::HTTP_OK);
    }

    /** Showing user details via protected route*/
    public function me(): JsonResponse
    {
        $user = Auth::user();

        return response()->json([
            'success' => true,
            'user' => $user,
        ], Response::HTTP_OK);
    }
}
