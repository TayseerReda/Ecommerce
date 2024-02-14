<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ProductFormRequest;

class ProductControlle extends Controller
{
    public function index()
    {
        $products=Product::all();
        
        return view('admin.product.index',compact('products'));
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
    public function edit($id)
    {
        $product=Product::find($id);
        $category=Category::all();
        $brand=Brand::all();
        // dd( $cat);
        // dd($product->category);
        return view('admin.product.edit',compact('product','category','brand'));

    }
    public function destroy_image($id)
    {
        $image= ProductImage::find($id);
        $path='uploads/product/'.$image->image;
        if(File::exists($path)){
            File::delete($path);

        }
        $image->delete();
        return redirect()->back()->with('message','image deleted successfully');

    }
    public function update(ProductFormRequest $request)
    {
        $validatedData=$request->validated();
        $category=Category::find($validatedData['category_id']);
        $product=$category->products()->update([
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
    return redirect('admin/products')->with('product updated successfully');
}
public function destroy($id)
{
    $product=Product::find($id);
    foreach ($product->productImages as $image) {
        $path='uploads/product/'.$image->image;
        if(File::exists($path)){
            File::delete($path);

        }
        
    }

    $product->delete();
    return redirect()->back()->with('message','product deleted successfully');

}
        

    
}
