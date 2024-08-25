<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function Index(){
        return view('frontend.index');
    }
    public function UserProfile(){
        $id = Auth::user()->id;
        $profileData = User::find($id);

        return view('frontend.dashboard.edit_profile', compact('profileData'));
    }
    public function UserStore(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        
        if($request->file('photo')){
            $file = $request->file('photo');
            @unlink(public_path('upload/user_images/'.$data->photo));
            $fileName = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'),$fileName);
            $data['photo'] = $fileName;
        }
        $data->save();
        $notification = array(
            'message' => 'Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function UserChangePassword(){

        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('frontend.dashboard.user_change_password',compact('profileData'));

    }// End Method   

    public function UserChangePasswordStore(Request $request){

        $request -> validate([
         'old_password' => 'required',
         'new_password' => 'required| confirmed'
        ]);
        if(!Hash::check($request->old_password, auth::user()->password )){
 
         $notification = array(
             'message' => 'Old password not match',
             'alert-type' => 'error'
         );
 
         return back()->with($notification);
        }
         // update the user password
 
         User::whereId(auth::user()->id)->update([
             'password' => Hash::make($request->new_password) 
         ]);
         $notification = array(
             'message' => 'Password updated successfully',
             'alert-type' => 'success'
         );
         return back()->with($notification);
 
     }// End Method   

    public function UserLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        $notification = array(
            'message' => 'User Logout Successfully',
            'alert-type' => 'success'
        );
        return redirect('/login')->with($notification);
    }
}
