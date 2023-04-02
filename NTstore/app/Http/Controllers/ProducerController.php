<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
session_start();

class ProducerController extends Controller
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

    public function add_producer()
    {
        $this->AuthLogin();
        return view('admin.add_producer');
    }

    public function all_producer()
    {
        $this->AuthLogin();
        $all_producer = DB::table('tbl_producer')->paginate(5);
        $manager_producer = view('admin.all_producer')->with('all_producer', $all_producer);
        return view('admin_layout')->with('admin.all_producer', $manager_producer);
    }

    public function save_producer(Request $request)
    {
        $this->AuthLogin();
        $data = array();
        $data['producer_name'] = $request->producer_name;
        $data['producer_address'] = $request->producer_address;
        $data['producer_phone'] = $request->producer_phone;

        DB::table('tbl_producer')->insert($data);
        Session::put('message', 'Thêm nhà cung cấp thành công!');
        return Redirect::to('all-producer');
    }

    public function edit_producer($producer_id)
    {
        $this->AuthLogin();
        $edit_producer = DB::table('tbl_producer')->where('producer_id',$producer_id)->get();
        $manager_producer = view('admin.edit_producer')->with('edit_producer', $edit_producer);
        return view('admin_layout')->with('admin.edit_producer', $manager_producer);
    }

    public function update_producer(Request $request, $producer_id)
    {
        $this->AuthLogin();
        $data = array();
        $data['producer_name'] = $request->producer_name;
        $data['producer_address'] = $request->producer_address;
        $data['producer_phone'] = $request->producer_phone;
        DB::table('tbl_producer')->where('producer_id',$producer_id)->update($data);
        Session::put('message', 'Cập nhật nhà cung cấp thành công!');
        return Redirect::to('all-producer');
    }

    public function delete_producer($producer_id)
    {
        $this->AuthLogin();
        DB::table('tbl_producer')->where('producer_id',$producer_id)->delete();
        Session::put('message', 'Xóa nhà cung cấp thành công!');
        return Redirect::to('all-producer');
    }
}
