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
use App\Models\Color;
use App\Models\ProductColor;

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
        $colors=Color::all();
        return view('admin.product.create',compact('categories','brans','colors'));
    }
    public function store(ProductFormRequest $request)
    {
        // dd( $request->category_id );
        // dd($request->produc_colors);
        $validatedData=$request->validated();
        $category=Category::find($validatedData['category_id']);
        $product=$category->products()->create([
            'category_id'=>$validatedData['category_id'],
            'name'=>$validatedData['name'],
            'slug'=>$validatedData['slug'],
            'brand'=>$validatedData['brand'],
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
                    'image'=>'uploads/product/'.$fileName,
                ]);
            }
        }
        if($request->produc_colors)
        {
            
            foreach ($request->produc_colors as $key => $value) {
                
                $product->productColors()->create([
                'product_id'=>$product->id,
                'color_id'=>$value,
                'quantity'=>$request->product_quantity[$key],
                // dd(quantity),

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
        $productColor=$product->productColors()->pluck('color_id')->toArray();
        $colors=Color::whereNotIn('id',$productColor)->get();
        // dd($colors);
        
        return view('admin.product.edit',compact('product','category','brand','colors'));

    }
    public function destroy_image($id)
    {
        $image= ProductImage::find($id);
        $path=$image->image;
        if(File::exists($path)){
            File::delete($path);

        }
        $image->delete();
        return redirect()->back()->with('message','image deleted successfully');

    }
    public function update(ProductFormRequest $request,$prod_id)
    {
        $validatedData=$request->validated();
        $category=Category::find($validatedData['category_id']);
        // dd($category->products()->find($prod_id));
            $category->products()->find($prod_id)->update([
            'category_id'=>$validatedData['category_id'],
            'name'=>$validatedData['name'],
            'slug'=>$validatedData['slug'],
            'brand'=>$validatedData['brand'],
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
        $product=Product::find($prod_id);
        // dd($product);
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
                    'image'=>'uploads/product/'.$fileName,
                ]);
            }
        }
        

        if($request->produc_colors)
        {
            
            foreach ($request->produc_colors as $key => $value) {
                
                $product->productColors()->create([
                'product_id'=>$product->id,
                'color_id'=>$value,
                'quantity'=>$request->product_quantity[$key],
                // dd(quantity),

               ]);
            }

        }
    return redirect('admin/products')->with('product updated successfully');
}
public function destroy($id)
{
    $product=Product::find($id);
    foreach ($product->productImages as $image) {
        $path=$image->image;
        if(File::exists($path)){
            File::delete($path);

        }
        
    }

    $product->delete();
    return redirect()->back()->with('message','product deleted successfully');

}
public function updateProductColor(Request $request,$product_color_id)
{
    // dd($product_color_id);
    $productColorData=Product::find($request->product_id)->productColors->where('id',$product_color_id)->first();
    $productColorData->update([
        'quantity'=> $request->qty,

    ]);
    return response()->json(['message'=>'product color Qty Updated']);

}
public function deleteProductColor($prod_id)
{
    $prod_color=ProductColor::find($prod_id)->delete();
    return response()->json(['message'=>'product color deleted']);

}
        

    
}
