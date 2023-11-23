<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Intervention\Image\Facades\Image;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }
    public function Upload_image(Request $request){
        if(Auth::user()->photo==null){
            $image=$request->image;
            $extension=$image->extension();
            $file_name=Auth::id().'.'.$extension;
           $photo=Image::make($image)->resize(300, 300)->save(public_path('uploads/user/'.$file_name));
           User::find(Auth::id())->update([
             'image'=>$file_name,

           ]);
           return redirect()->back();
        }
        else{
            $parent_photo=public_path('uploads/user/'.Auth::user()->photo);
           unlink($parent_photo);
           $image=$request->image;
           $extension=$image->extension();
           $file_name=Auth::id().'.'.$extension;
          $photo=Image::make($image)->resize(300, 300)->save(public_path('uploads/user/'.$file_name));
          User::find(Auth::id())->update([
            'image'=>$file_name,

          ]);
          return redirect()->back();
        }



    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
