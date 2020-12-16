<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return $user = User::all();
        
    }
    protected function signup(Request $request)
    {
        
        $token = Str::random(80);
        $query = User::create([
            'username' => $request->user['username'],
            'password' => Hash::make($request->user['password']),
            'email' => $request->user['email'],
            'phone' => $request->user['phone'],
            'country' => $request->user['country'],
            'city' => $request->user['city'],
            'postcode' => $request->user['postcode'],
            'name' => $request->user['name'],
            'address' => $request->user['address'],
            'token' => $token
        ]);
        if($query->save()){
            return response()->json([
                'email' => $request->user['email'],
                'token' => $token,
                'username' => $request->user['username']
    
            ], 200);
        }
    }
    
    public function signin(Request $request){
        $user= User::where('email', $request->email)->first();
        // print_r($data);
            if (!$user || !Hash::check($request->password, $user->password)) {
                return response([
                    'message' => ['These credentials do not match our records.']
                ], 404);
            }
        
             $token = $user->createToken('my-app-token')->plainTextToken;
        
            $response = [
                'user' => $user,
                'token' => $token
            ];
            return response($response, 201);
    }
    
}
