<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Color;
use App\Models\Size;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    function varition(){
        $color=Color::all();
        return view('product.variation',[
            'color'=>$color
        ]);
    }
    function varition_post(Request $request){
        Color::create([
            'color_name'=>$request->color_name,
            'color_code'=>$request->color_code,

        ]);
    }
    function varition_size(){
        $categories=Category::all();
        $size=Size::all();
        return view('product.size',[
            'categories'=>$categories,
            'size'=>$size
        ]);

    }
    function post_size(Request $request){
      Size::create([

        'size_name'=>$request->size_name,
        'category_id'=>$request->category_id,
      ]);
    }
}
