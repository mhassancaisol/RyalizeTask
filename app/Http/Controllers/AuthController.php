<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    // Handle user login
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        //echo $password = bcrypt('Test Password');

        try {
            // Attempt to generate a token
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        // Return the token in the response
        return response()->json(compact('token'));
    }

    // Get the authenticated user
    public function getUser(Request $request)
    {
        return response()->json($request->user());
    }

    // Handle user logout
    public function logout()
    {
        try {
            JWTAuth::invalidate(JWTAuth::getToken());
            return response()->json(['message' => 'Successfully logged out']);
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_log_out'], 500);
        }
    }
}
