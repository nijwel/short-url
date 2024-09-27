<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ShortLink;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $shortLinks = ShortLink::where('user_id',Auth::id())->latest()->get();
        return view('home',compact('shortLinks'));
    }

    /**
     * Show the auth profile.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function profile()
    {
        $data = User::where('id',Auth::id())->first();
        return view('admin.profile.profile',compact('data'));
    }

    /**
     * Update the auth profile.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update(Request $request)
    {
        $id    = Auth::id();
        $image = $request->image;

        $user = User::where('id',$id)->first();
        $user->name        = $request->name;
        $user->email       = $request->email;
        $user->phone       = $request->phone;
        $user->designation = $request->designation;
        $user->address     = $request->address;
        $user->about_me = $request->about_me;
        $user->save();

        return redirect()->back()->with('success','Successfully Updated !');

    }


    /**
     * Show the auth password.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function password()
    {
        return view('admin.profile.password');
    }

    /**
     * Update the auth profile.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password'     => 'required',
            'new_password'     => 'required',
            'confirm_password' => 'required|same:new_password',
        ]);

        $password    = Auth::user()->password;
        $oldpass     = $request->old_password;
        $newpass     = $request->new_password;
        $confirmpass = $request->confirm_password;
        if (Hash::check($oldpass,$password)) {
             if ($newpass === $confirmpass) {
                $user           = User::find(Auth::id());
                $user->password = Hash::make($newpass);
                    $user->save();
                    Auth::logout();
                return redirect()->route('login')->with('success','Successfully Password Update! Please login with new password !');
             }else{
                return redirect()->back()->with('error','Newpassword & Confirm Password Does Not Matched!');
             }
        }else{
            return redirect()->back()->with('error','Old Password Not Matched!');
        }
    }
}
