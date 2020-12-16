<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shopping;
class ShoppingController extends Controller
{
    public function index($id = null){
        if($id == null){
            return Shopping::all();
        }
       
        return Shopping::find($id);

    }
    public function create(Request $request){
      
        $query = Shopping::Create([
            'name' => $request->shopping['name'],
            'createdDate' => $request->shopping['createddate']
        ]);

        if($query->save()){
            $shopping= Shopping::get()->last();
            return response()->json([
                'data' => [
                    'createddate' => $shopping->createdDate,
                    'id' => $shopping->id,
                    'name' => $shopping->name
                ],
               
            ], 200);
        }
    }
    public function update(Request $request,$id){
        $shopping = Shopping::find($id);
        if(!$shopping){
            return response([
                'message' => ['Data Not Found']
            ], 404);
        }

        $query = Shopping::where('id', $id)
        ->update([
            'name' => $request->shopping['name'],
            'createdDate' => $request->shopping['createddate']
        ]);
            
        if($query){
            return response()->json([
                'message' => ['data has been updated successfully']
               
            ], 200);
        }
    }
    public function delete($id){
        $shopping = Shopping::find($id);
        if(!$shopping){
            return response([
                'message' => ['Data Not Found']
            ], 404);
        }
        if($shopping->delete()){
            return response()->json([
                'message' => ['data has been deleted successfully']
               
            ], 200);
        }
        

    }
}

