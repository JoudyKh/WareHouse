<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;

class AuthController extends Controller
{
    //     Create owner 
    public function registerWeb(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'phone_number' => 'required|unique:users|numeric|starts with:09|min_digits:10|max_digits:10',
            'password' => 'required|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|min:8|confirmed',
            'email' => 'email|unique:users',
            'address' => 'string',
            'store_name' => 'string|unique:users'
        ]);

        $user = new User([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone_number' => $request->phone_number,
            'password' => Hash::make($request->password),
            'role' => 1,
            'email' => $request->email,
            'address' => $request->address,
            'store_name' => $request->store_name
        ]);

        if ($user->save()) {
            $token = $user->createToken('API Token')->plainTextToken;
            Auth::login($user, $remember = true);
            return response()->json(['message' => 'successfully created user!', 'accessToken' => $token], 201);
        } else {
            return response()->json(['error' => 'provide proper details']);
        }
    }


    //     login owner
    public function loginWeb(Request $request)
    {
        $request->validate([
            'phone_number' => 'required|numeric',
            'password' => 'required|string'
        ]);

        $user = User::where('phone_number', $request->phone_number)->first();

        if (!$user || $user['role'] == 0 || !Hash::check($request->password, $user->password)) {
            return response()->json(['error' => 'unauthorized', 400]);
        }
        $token = $user->createToken('API Token')->plainTextToken;
        Auth::login($user, $remember = true);
        return response()->json(['success' => 'user logged in successfuly', 'access token' => $token], 201);
    }

    //     Create user
    public function register(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'phone_number' => 'required|unique:users|numeric|starts with:09|min_digits:10|max_digits:10',
            'password' => 'required|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|min:8|confirmed',
            'email' => 'email|unique:users',
            'address' => 'string',
            'store_name' => 'string|unique:users'
        ]);


        $user = new User([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone_number' => $request->phone_number,
            'password' => Hash::make($request->password),
            'role' => 0,
            'email' => $request->email,
            'address' => $request->address,
            'store_name' => $request->store_name
        ]);

        if ($user->save()) {
            $token = $user->createToken('Personal Access Token')->plainTextToken;
            Auth::login($user, $remember = true);
            return response()->json(['message' => 'successfully created user!', 'accessToken' => $token], 201);
        } else {
            return response()->json(['error' => 'provide proper details']);
        }
    }
    
    //     Login user
    public function login(Request $request)
    {
        $request->validate([
            'phone_number' => 'required|numeric',
            'password' => 'required|string'
        ]);

        $user = User::where('phone_number', $request->phone_number)->first();

        if (!$user || $user['role'] == 1 || !Hash::check($request->password, $user->password)) {
            return response()->json(['error' => 'unauthorized', 400]);
        }
        $token = $user->createToken('Personal Access Token')->plainTextToken;
        Auth::login($user, $remember = true);
        return response()->json(['success' => 'user logged in successfuly', 'access token' => $token], 201);
    }

    //     Get the authenticated User
    public function user(Request $request)
    {
        return response()->json($request->user());
    }

    //     logout
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    //     seed Owners
        public function seedUsers(Request $request)
        {
    
            Artisan::call('db:seed', ['--class' => 'UserSeeder']);
        }
    
}
