<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
session_start();

class UserController extends Controller
{
    public function AuthLogin()
    {
        $admin_id = Session::get('admin_id');
        if($admin_id)
        {
            return Redirect::to('Dashboard');
        }
        else{
            return Redirect::to('Admin')->send();
        }
    }

    public function add_user()
    {
        $this->AuthLogin();
        return view('admin.add_user');
    }

    public function all_user()
    {
        $this->AuthLogin();
        $all_user = DB::table('tbl_user')->paginate(5);
        $manager_user = view('admin.all_user')->with('all_user', $all_user);
        return view('admin_layout')->with('admin.all_user', $manager_user);
    }

    public function save_user(Request $request)
    {
        $this->AuthLogin();
        $data = array();
        $data['user_name'] = $request->user_name;
        $data['user_address'] = $request->user_address;
        $data['user_phone'] = $request->user_phone;
        $data['user_email'] = $request->user_email;
        $data['user_password'] = md5($request->user_password);

        DB::table('tbl_user')->insert($data);
        Session::put('message', 'Thêm khách hàng thành công!');
        return Redirect::to('all-user');
    }

    public function active_user($user_id)
    {
        $this->AuthLogin();
        DB::table('tbl_user')->where('user_id',$user_id)->update(['user_status'=>1]);
        Session::put('message', 'Kích hoạt khách hàng thành công!');
        return Redirect::to('all-user');
    }

    public function unactive_user($user_id)
    {
        $this->AuthLogin();
        DB::table('tbl_user')->where('user_id',$user_id)->update(['user_status'=>0]);
        Session::put('message', 'Đã khóa khách hàng!');
        return Redirect::to('all-user');
    }

    public function edit_user($user_id)
    {
        $this->AuthLogin();
        $edit_user = DB::table('tbl_user')->where('user_id',$user_id)->get();
        $manager_user = view('admin.edit_user')->with('edit_user', $edit_user);
        return view('admin_layout')->with('admin.edit_user', $manager_user);
    }

    public function update_user(Request $request, $user_id)
    {
        $this->AuthLogin();
        return Redirect::to('all-user');
    }
}
