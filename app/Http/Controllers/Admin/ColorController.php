<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ColorFormRequest;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index()
    {
        $colors=Color::all();
        return view('admin.color.index',compact('colors'));
    }
    public function create()
    {
        return view('admin.color.create');
    }
    public function store(ColorFormRequest $request)
    {
        $validatesData=$request->validated();
        Color::insert([
            'name'=>$validatesData['name'],
            'code'=>$validatesData['code'],
            'status'=>$request->status == true?'1':'0',
        ]);
        return redirect('admin/colors')->with('message','color added successfully');
    }
    public function edit(Color $color)
    {
       return view('admin.color.edit',compact('color'));
    }
    public function update(ColorFormRequest $request,$id)
    {
        $validatesData=$request->validated();
        Color::find($id)->update([
            'name'=>$validatesData['name'],
            'code'=>$validatesData['code'],
            'status'=>$validatesData['status']==true?'1':'0',
        ]);
        return redirect('admin/colors')->with('message','color updated successfully');

    }
    public function destroy($id)
    {
        Color::find($id)->delete();
        return redirect('admin/colors')->with('message','color deleted successfully');

    }
}
