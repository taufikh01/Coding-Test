<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shopping;
class ShoppingController extends Controller
{
    public function index(){
        $shopping = Shopping::all();
        
        
    }
    public function create(Request $request){
        $id = $request->id;

        $query = Shopping::Create([
            'name' => $request->name,
            'createDate' => $request->create_date
        ]);
        $query->save();

        return response()->json([
            'data' => [
                'createdate' => $request->create_date,
                'name' => $request->name
            ],
           
        ], 200);

    }
}

