<?php

namespace App\Http\Controllers\Api;
use App\Models\Menu;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FetchmenuController extends Controller
{
    public function menu()
    {
        $menu = Menu::select('*')->get()->toArray(); 
        return($menu);
    }
}
