<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index');
    }

    public function create()
    {
        return view('admin.category.create');
    }
    public function store(CategoryRequest $request)
    {
        $validatedData=$request->validated();
        $category=new Category();
        $category->name=$validatedData['name'];
        $category->description=$validatedData['description'];
        $category->slug=$validatedData['slug'];
        $category->meta_title=$validatedData['meta_title'];
        $category->meta_keyword=$validatedData['meta_keyword'];
        $category->meta_description=$validatedData['meta_description'];
        $category->status=$request->status == true?'0':'1';

        if(request()->hasFile('image'))
        {
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $fileName=time().'.'.$ext;
            $file->move('uploads/category/',$fileName);
            $category->image=$fileName;
        }
        $category->save();
        return redirect('admin/category')->with('message','Category is added successfully');


    }
    public function edit(Category $category){
      
         return view('admin.category.edit',compact('category'));
// return $category;
    }
    public function update(CategoryRequest $request,$category)
    {
        $validatedData=$request->validated();
        $category= Category::find($category);
        $category->name=$validatedData['name'];
        $category->description=$validatedData['description'];
        $category->slug=$validatedData['slug'];
        $category->meta_title=$validatedData['meta_title'];
        $category->meta_keyword=$validatedData['meta_keyword'];
        $category->meta_description=$validatedData['meta_description'];
        $category->status=$request->status == true?'0':'1';

        if(request()->hasFile('image'))
        {
            $path='uploads/category/'.$category;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $fileName=time().'.'.$ext;
            $file->move('uploads/category/',$fileName);
            $category->image=$fileName;
        }
        $category->update();
        return redirect('admin/category')->with('message','Category is updated successfully');

    }
  

}
