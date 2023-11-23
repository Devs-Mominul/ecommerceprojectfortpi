<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function User_Table(){
        $user=User::all();
        return view('admin.user.user',[
            'user'=>$user
        ]);
    }
   function User_remove($id){
    User::find($id)->delete();
    return back()->with('success','user delete successfully');
   }

}
