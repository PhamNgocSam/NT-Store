<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;  
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
session_start();

class AdminController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('Dashboard');
        }
        else{
            return Redirect::to('Admin')->send();
        }
    }

    public function index(){
        return view('admin_login');
    }

    public function show_dashboard()
    {
        $this->AuthLogin();
        return view('admin.dashboard');
    }

    public function dashboard(Request $request){
        $admin_email = $request -> admin_email;
        $admin_password = md5($request -> admin_password);
        $result = DB::table('tbl_admin') -> where('admin_email', $admin_email) -> where('admin_password', $admin_password) ->first();
        if($result){
            Session::put('admin_name', $result -> admin_name);
            Session::put('admin_id', $result -> admin_id);
            return Redirect::to('/Dashboard');
        }else{
            Session::put('message', 'Tài khoản hoạc mật khẩu không chính xác!');
            return Redirect::to('/Admin');
        }
    }

    public function logout(){
        $this->AuthLogin();
        Session::put('admin_name',"");
        Session::put('admin_id',"");
        return Redirect::to('/Admin');
    }
}
