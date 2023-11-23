<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;

class CategoryController extends Controller
{
    public function Category(){
        $categories=Category::Paginate(3);
        return view('category.category',[
            'categories'=>$categories
        ]);
    }
    public function Category_store(Request $request){
        $image=$request->category_img;
        $extension=$image->extension();
       $file_name=Str::lower(str_replace(' ','-',$request->category_name)).'-'.random_int(100000,900000).'.'.$extension;
       $photo=Image::make($image)->save('uploads/category/'.$file_name);
       Category::insert([
        'category_name'=>$request->category_name,
        'category_img'=>$file_name,
        'created_at'=>Carbon::now()
       ]);
       return back()->with('success','Add Category Success');

    }
    public function Category_Controller($id){
        $category_info=Category::find($id);

        return view('category.category_edit',[
            'category_info'=>$category_info
        ]);
    }
    public function Category_Update(Request $request){
        $category=Category::find($request->category_id);
        if($request->category_img==''){
            Category::find($request->category_id)->update([
                'category_name'=>$request->category_name,
                'updated_at'=>Carbon::now()

            ]);

        }
        else{
            $current_img=public_path('uploads/category/'.$category->category_img);
            unlink($current_img);
            $image=$request->category_img;
            $extension=$image->extension();
            $file_name=Str::lower(str_replace(' ','-',$request->category_name)).'-'.random_int(100000,900000).'.'.$extension;
            $photo=Image::make($image)->save('uploads/category/'.$file_name);
            Category::find($request->category_id)->update([
                'category_name'=>$request->category_name,
                'category_img'=>$file_name,
                'updated_at'=>Carbon::now()

            ]);

        }
    }
    public function Category_Delete($id){
        Category::find($id)->delete();
    }
    public function subcategory(){
        $category=Category::all();
        return view('category.subcategory',[
            'categories'=>$category
        ]);
    }
    public function Substore(Request $request){
        Subcategory::create([
            'category_id'=>$request->category,
            'subcategory_name'=>$request->subcategory_name
        ]);
        return back();
    }
    public function Subcategory_Edit($id){
        $subcategory=Subcategory::find($id);
        $categories=Category::all();
        return view('category.subcategory_edit',[
            'categories'=>$categories,
            'subcategories'=>$subcategory
        ]);
    }

    public function Subcategory_Delete($id){
        Subcategory::find($id)->delete();

    }
    public function subcategory_update(Request $request,$id){
        Subcategory::find($id)->update([
            'subcategory_name'=>$request->subcategory_name,
            'updated_at'=>Carbon::now(),
        ]);

    }
}
