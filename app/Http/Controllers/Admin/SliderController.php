<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\SliderFormRequest;

class SliderController extends Controller
{
    public function Index()
    {
        $sliders=Slider::all();
        return view('admin.slider.index',compact('sliders'));
    }
    public function create()
    {
        return view('admin.slider.create');
    }
    public function store(SliderFormRequest $request)
    {
        $validatedData=$request->validated();

        if($request->hasFile('image'))
        {
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $fileName=time().'.'.$ext;
            $file->move('uploads/slider/',$fileName);
            $validatedData['image']='uploads/slider/'.$fileName;

        }
        Slider::create([
            'title'=>$validatedData['title'],
            'description'=>$validatedData['description'],
            'status'=>$request->status==true?'1':'0',
            'image'=> $validatedData['image'],

        ]);
        return redirect('admin/slider')->with('message','slider added successfully');

    }
    public function edit(Slider $slider)
    {
        return view('admin.slider.edit',compact('slider'));
    
    }
    public function update(SliderFormRequest $request,Slider $slider)
    {
        $validatedData=$request->validated();
        $validatedData['image']=$slider->image;
       

        if($request->hasFile('image'))
        {
            $path=$slider->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $fileName=time().'.'.$ext;
            $file->move('uploads/slider/',$fileName);
            $validatedData['image']='uploads/slider/'.$fileName;

        }
     


       $slider->update([
            'title'=>$validatedData['title'],
            'description'=>$validatedData['description'],
            'status'=>$request->status==true?'1':'0',
            'image'=> $validatedData['image'],
            
        ]);
        return redirect('admin/slider')->with('message','slider updated successfully');
    }
    public function destroy(Slider $slider)
    {
        $path=$slider->image;
        if(File::exists('path'))
        {
            File::delete('path');
        }
        $slider->delete();
        return redirect('admin/slider')->with('message','slider deleted successfully');
    }

    
}
