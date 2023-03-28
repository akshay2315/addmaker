<?php

namespace App\Http\Controllers\Api;
use App\Models\Posts;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FetchipostController extends Controller
{
    public function ipost()
    {
        $insta = Posts::select('*')->get()->toArray(); 
        return($insta);
    }
}