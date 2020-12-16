<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        $user = User::all();
        
        return response()->json([
            'success' => true,
        ], 200);
    }
    public function signup(Request $request){
        $id = $request->id;
        $username = $request->username;
        $password = $request->password;
        $email = $request->email;
        $phone = $request->phone;
        $country = $request->country;
        $city = $request->city;
        $postcode = $request->postcode;
        $name = $request->name;
        $address = $request->address;

        $query = User::updateOrCreate(['id' => $id], [
            'username' => $request->username,
            'password' => $request->password,
            'email' => $request->email,
            'phone' => $request->phone,
            'country' => $request->country,
            'city' => $request->city,
            'postcode' => $request->postcode,
            'name' => $request->name,
            'address' => $request->address
        ]);
        $query->save();
    }
}
