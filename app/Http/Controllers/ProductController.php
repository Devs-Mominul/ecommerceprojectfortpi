<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductGallery;
use App\Models\Subcategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    function product(){
        $categories=Category::all();
        $subcategories=Subcategory::all();
        $brands=Brand::all();
        return view('product.product',[
            'categories'=>$categories,
            'subcategories'=>$subcategories,
            'brands'=>$brands,
        ]);
    }
    function getsubcategory(Request $request){
        $str='<option value="">select subcategory</option>';
       $sub_categories=Subcategory::where('category_id',$request->category_id)->get();
       foreach($sub_categories as $subcate){
        $str.='<option value="'.$subcate->id.'">'.$subcate->subcategory_name.'</option>';
       }
       echo $str;
    }
    function product_store(Request $request){
         $after_implode=implode(',',$request->tags);
         $preview=$request->preview;
         $extension=$preview->extension();
         $file_name=Str::lower(str_replace(' ','-',$request->product_name)).'-'.random_int(1000000,9000000).'.'.$extension;
        $image=Image::make($preview)->save(public_path('uploads/product/preview/'.$file_name));

        $product_id=Product::insertGetId([
            'category_id'=>$request->category,
            'subcategory_id'=>$request->subcategory_id,
            'brand_id'=>$request->brand_id,
            'product_name'=>$request->product_name,
            'price'=>$request->price,
            'discount'=>$request->discount,
            'after_discount'=>$request->price-($request->price*$request->discount/100),
            'tags'=>$after_implode,
            'short_desp'=>$request->short_desp,
            'long_desp'=>$request->long_desp,
            'addi_info'=>$request->additional_information,
            'preview'=>$file_name,
            'slug'=>Str::lower(str_replace(' ','-',$request->product_name)).'-'.random_int(1000000,9000000),
            'created_at'=>Carbon::now(),





        ]);
        $gallery=$request->gallery;
        foreach($gallery as $gal){
            $extension=$gal->extension();
         $file_name=Str::lower(str_replace(' ','-',$request->product_name)).'-'.random_int(1000000,9000000).'.'.$extension;
        $image=Image::make($gal)->save(public_path('uploads/gallery/'.$file_name));
        ProductGallery::insert([
            'product_id'=>$product_id,
            'gallery_image'=>$file_name,

        ]);


        }

    }
    function product_list(){
        // $catagory_product=DB::table('products')
        // ->join('categories','categories.id','=','products.category_id')
        // ->select('categories.category_name as name','products.*')->get();
        $products=Product::all();

        return view('product.product_list',[
            'products'=>$products
        ]);
    }
    function product_delete($id){
        $product=Product::find($id);
        $gallery=ProductGallery::where('product_id',$id)->get();
        $preview=public_path('uploads/product/preview/'.$product->preview);
        unlink($preview);
        foreach($gallery as $gal){
            $gal_img=public_path('uplaods/gallery/'.$gal->gallery);
            unlink($gal_img);
            ProductGallery::find($gal->id)->delete();
        }
        Product::find($id)->delete();


    }
    function product_show($id){
        $product=Product::find($id);
        $gallery=ProductGallery::where('product_id',$id)->get();
        return view('product.product_show',[
            'product'=>$product,
            'gallery'=>$gallery,

        ]);
    }
}
