<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
}
