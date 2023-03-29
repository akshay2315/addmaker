<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Facebook;

class FacebookApiController extends Controller
{
    //
    public function index()
    {

        // $display = Facebook::pluck()->toArray();
          
        // return ($display);

    //    $user = Facebook::select('*')->get();
    //    return ($user);

        $products = Facebook::all();
        return response()->json([
        "success" => true,
        "message" => "Facebook List",
        "data" => $products
        ]);
        
    }
}
