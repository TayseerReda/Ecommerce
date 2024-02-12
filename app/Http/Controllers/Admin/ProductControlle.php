<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFormRequest;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductControlle extends Controller
{
    public function index()
    {
        return view('admin.product.index');
    }
    public function create()
    {
        $categories=Category::all();
        $brans=Brand::all();
        return view('admin.product.create',compact('categories','brans'));
    }
    public function store(ProductFormRequest $request)
    {
        // dd( $request->category_id );
        $validatedData=$request->validated();
        $category=Category::find($validatedData['category_id']);
        $product=$category->products()->create([
            'category_id'=>$validatedData['category_id'],
            'name'=>$validatedData['name'],
            'slug'=>$validatedData['slug'],
            'small_description'=>$validatedData['small_description'],
            'description'=>$validatedData['description'],
            'meta_title'=>$validatedData['meta_title'],
            'meta_keyword'=>$validatedData['meta_keyword'],
            'meta_description'=>$validatedData['meta_description'],
            'original_price'=>$validatedData['original_price'],
            'selling_price'=>$validatedData['selling_price'],
            'quantity'=>$validatedData['quantity'],
            'trending'=>$request->trending==true?'1':'0',
            'status'=>$request->status==true?'1':'0',
            'image'=>$validatedData['image'],

        ]);
        $i=1;
        if(request()->hasFile('image'))
        {
            foreach ($request->file('image') as $file ) {
                # code...
                $ext=$file->getClientOriginalExtension();
                $fileName=$i++.time().'.'.$ext;
                $file->move('uploads/product/',$fileName);
                $product->productImages()->create([
                    'product_id'=>$product->id,
                    'image'=>$fileName,
                ]);
            }
        }
        return redirect('admin/products')->with('message','product is added successfully');
    

    }
        

    
}
