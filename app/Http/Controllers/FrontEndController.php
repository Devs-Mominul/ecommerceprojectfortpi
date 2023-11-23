<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index(){
        $categories=Category::all();
        return view('frontend.index',[
            'categories'=>$categories,
        ]);
    }
    public function about(){
        return view('frontend.about');
    }
    public function shop(){
        return view('frontend.shop');
    }
    public function contact(){
        return view('frontend.contact');
    }
    public function logins(){
        return view('frontend.frontend_login');
    }
    public function registers(){
        return view('frontend.fregister');
    }

}
