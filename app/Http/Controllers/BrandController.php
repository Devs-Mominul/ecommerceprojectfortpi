<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{
    function brand(){
        $brands=Brand::all();
        return view('brand.brand',[
            'brands'=>$brands
        ]);
    }
    function brand_store(Request $request){
        $logo=$request->brand_logo;
        $extension=$logo->extension();
       $file_name=Str::lower(str_replace(' ','-',$request->brand_name)).'.'.$extension;
       $image=Image::make($logo)->save(public_path('uploads/brand/'.$file_name));

       Brand::create([
         'brand_name'=>$request->brand_name,
         'brand_logo'=>$file_name,

       ]);
       return back();
    }
    function brand_edit($id){
        $brands=Brand::find($id);
        return view('brand.brand_edit',[
            'brands'=>$brands
        ]);
    }
    function brand_update(Request $request,$id){
        $brand=Brand::find($id);
       if($request->brand_logo==null){
        Brand::find($id)->update([
            'brand_name'=>$request->brand_name

        ]);
       }
       else{
        $current_img=public_path('uploads/brand/'.$brand->brand_logo);
        unlink($current_img);
        $logo=$request->brand_logo;
        $extension=$logo->extension();
       $file_name=Str::lower(str_replace(' ','-',$request->brand_name)).'.'.$extension;
       $image=Image::make($logo)->save(public_path('uploads/brand/'.$file_name));
       Brand::find($id)->update([
        'brand_name'=>$request->brand_name,
        'brand_logo'=>$file_name,

    ]);


       }
    }
    function brand_delete($id){
        Brand::find($id)->delete();
        return back();
    }
}
