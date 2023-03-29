<?php

namespace App\Http\Controllers;
use App\Models\Menu;
use Illuminate\Http\Request;
// use App\Http\Requests\UpdateMenuRequest;
use File;
class MenuController extends Controller
{
    
    public function index(){
        $menu = Menu::latest()->paginate(5);
        $menu = Menu::all();
        return view('menu.index', compact('menu')) ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    public function create()
    {
        return view('menu.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required',
            ]);
             
            $path = public_path('images');

            if(!File::isDirectory($path)){
            File::makeDirectory($path, 0777, true, true);
             $imageName = time().'.'.$request->images->extension();  
             $request->images->move(public_path('images'), $imageName);
             $imagewithfolder = 'public\images\\'.$imageName;

            }else{
            $imageName = time().'.'.$request->images->extension();
            $request->images->move(public_path('images'), $imageName);
            $imagewithfolder = 'public\images\\'.$imageName;
            }
            $data = Menu::create([
            'title' => $request->title,
            'description' => $request->description,
            'images' => $imagewithfolder,
            'price' => $request->price,
            ]);

            
           return redirect()->route('menu.index')
            ->with('success','Menu has been created successfully.');
    }

    public function show(Menu $menu)
    {
        return view('menu.show', compact('menu'));
    }

    
    public function edit(Menu $menu)
    {
        return view('menu.edit', compact('menu'));
    }

    
    public function update(Request $request, $id)
    {

        $request->validate([
            'title' => 'required',    
            'description' => 'required',
            'price' => 'required',
            
          ]);
       
    
          if($_FILES['images']['name'] != ''){
               
            $path = public_path('images');
    
            if(!File::isDirectory($path)){
              File::makeDirectory($path, 0777, true, true);
              $imageName = time().'.'.$request->images->extension();  
              $request->images->move(public_path('images'), $imageName);
              $imagewithfolder = 'public\images\\'.$imageName;
    
            }else{
              $imageName = time().'.'.$request->images->extension();
              $request->images->move(public_path('images'), $imageName);
              $imagewithfolder = 'public\images\\'.$imageName;
            }
    
            $UpdateDetails = Menu::where('id', $request->id)->update(array(
           "title" => $request->title,
           "description" => $request->description,
           "images" => $imagewithfolder,
           "price" => $request->price,
           
         ));
    
          }else{
           $UpdateDetails = Menu::where('id', $request->id)->update(array(
            "title" => $request->title,
            "description" => $request->description,
            "price" => $request->price,
           
         ));
    
          }
          
          return redirect()->route('menu.index')
                       ->with('success','Menu updated successfully');
        }


    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('menu.index')
            ->with('success','Menu deleted successfully'); 
    }
}
