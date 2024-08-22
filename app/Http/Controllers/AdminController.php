<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminController extends Controller
{
    public function AdminDashboard(){
        return view('admin.index');
    }

    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
    public function AdminLogin(Request $request)
    {
        return view('admin.admin_login');
    }
    public function AdminProfile(Request $request)
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);

        return view('admin.admin_profile_view', compact('profileData'));
    }

    public function AdminProfileStore(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        
        if($request->file('photo')){
            $file = $request->file('photo');
            @unlink(public_path('upload/admin_images/'.$data->photo));
            $fileName = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$fileName);
            $data['photo'] = $fileName;
        }
        $data->save();
        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
