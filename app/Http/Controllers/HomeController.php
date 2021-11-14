<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::all();
        return view('home',compact('categories'));
    }


    public function store(Request $request){
        $request->validate([
            'name' => 'required|unique:categories,name|max:30,name',
        ]);
        $defaultImage = "defaultimage.jpg";

        $category = new Category();     
        $category->name = $request->input('name');
        $category->status = $request->input('status') == TRUE ? 'Yes':'No';

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $file_name = 'categoryPhoto'.time().'.'.$extension;
            $file->move('uploads/categoryImage/',$file_name);
            $category->photo = $file_name;
        }
        else
        {
            $category->photo = $defaultImage;
        }

        if($request->hasFile('icon'))
        {
            $ifile = $request->file('icon');
            $iextension = $ifile->getClientOriginalExtension();
            $icon_name = 'categoryIcon'.time().'.'.$iextension;
            $ifile->move('uploads/categoryIcon/',$icon_name);
            $category->icon = $icon_name;
        }
        else
        {
            $category->icon = $defaultImage;
        }

        $category->save();
        return redirect('home')->with('successAlert','You have successfully added');
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|max:30,name',
        ]);
        $category = Category::find($id);

        $category->name = $request->input('name');
        $category->status = $request->input('status') == TRUE ? 'Yes':'No';

        if($request->hasFile('image'))
        {

            $destination = 'uploads/categoryImage/'.$category->photo;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $file_name = 'category'.time().'.'.$extension;
            
            $file->move('uploads/categoryImage/',$file_name);
            $category->category_image = $file_name;
        }

        if($request->hasFile('icon'))
        {

            $idestination = 'uploads/categoryIxon/'.$category->icon;
            if(File::exists($idestination))
            {
                File::delete($idestination);
            }
            $ifile = $request->file('icon');
            $iextension = $ifile->getClientOriginalExtension();
            $ifile_name = 'category'.time().'.'.$iextension;
            
            $ifile->move('uploads/categoryImage/',$ifile_name);
            $category->icon = $ifile_name;
        }

        $category->update();

        return redirect('home')->with('successAlert','You have successfully Updated');

    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $destination1 = 'uploads/categoryImage/'.$category->photo;
        $destination2 = 'uploads/categoryIcon/'.$category->icon;
        if(File::exists($destination1))
        {
            File::delete($destination1);
        }
        if(File::exists($destination2))
        {
            File::delete($destination2);
        }
        $category->delete();
        
        if(session('tasks_url')){
            return redirect(session('tasks_url'))->withSuccessMessage('Successfully Deleted');
        }
        
        return redirect('home')->with('successAlert','You have successfully Deleted');

    }
}
