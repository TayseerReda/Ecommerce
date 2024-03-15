<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    
    public function index()
    {
        $sliders=Slider::all();
        return view('frontend.index',compact('sliders'));
    }
    public function category()
    {
        $categories=Category::all();
        return view('frontend.collections.category.index',compact('categories'));
    }
    public function products($category_slug)
    {
        $categories=Category::where('slug',$category_slug)->first();
       
        if($categories)
        {           
            return view('frontend.collections.product.index',compact('categories')); 
        }
        else
        {
            return redirect()->back()->with('message','No Products available for this category');
        }

    }
    public function productsView($category_slug,$product_slug)
    {
        $categories=Category::where('slug',$category_slug)->first();
        
        if($categories)
        {           
            $products=$categories->products()->where('slug',$product_slug)->where('status','0')->first();
            // dd($products);
            if($products)
            {
                return view('frontend.collections.product.view',compact('categories','products')); 

            }
            else
            {
                return redirect()->back();
            }
        }
        else
        {
            return redirect()->back()->with('message','No Products available for this category');
        }




    }
}
