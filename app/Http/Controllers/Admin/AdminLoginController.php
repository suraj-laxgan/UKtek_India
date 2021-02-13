<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminLoginController extends Controller
{
    public function showAdminLogin()
    {
        if(Auth::guard('admin')->check())
        {
            if(Auth::guard('admin')->user()->user_group == "SU")
            {    
              return redirect()->route('admin.adminhome');
            }
            else
            {
               return redirect()->route('admin.userhome');
            }
        }
        else
        {
        return view('admin.adminLogin');
        }
    }

    public function adminHome()
    {
        return view ('admin.adminHome');
    }

    public function AdminLogin(Request $r)
    {
        $r->validate([
            'admin_user_id' => 'required|max:255',
            'admin_password' => 'required|max:255'
    	]);

        $token = $r->input('g-recaptcha-response');

       if($token)
       { 
        if (Auth::guard('admin')->attempt(['admin_user_id' => $r->admin_user_id, 'password' => $r->admin_password]))

    	   {
    		  if(Auth::guard('admin')->user()->user_group == "SU")
                {    
                     return redirect()->route('admin.adminhome');
                }
                else
                {
                    return "user group not match";
                }    
          }
          else {

              return back()->withInput()->with('errmsg', 'Either Email/User id and password does not match or you do not have permission to access this login');
          }
    
       }
       else
       {
            return back()->withInput()->with('errmsg', 'Please fill captcha');
       }    
    	
    }  
    
    public function adminlogout(Request $request)
    {
        
    	$this->guard()->logout();
    	$request->session()->invalidate();
    	return redirect()->route('admin.login');
    }
   	protected function guard()
    {
        return Auth::guard('admin');
    }	
}
