<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Gloudemans\Shoppingcart\Facades\Cart;
session_start();

class CheckoutController extends Controller
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

    public function login_checkout()
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderBy('category_id')->get();
        $brand_product = DB::table('tbl-brand')->where('brand_status','1')->orderBy('brand_id')->get();

        return view('pages.checkout.login_checkout')->with('category',$cate_product)->with('brand',$brand_product);
    }

    public function add_user(Request $request)
    {
        $data = array();
        $data['user_name'] = $request->user_name;
        $data['user_address'] = $request->user_address;
        $data['user_phone'] = $request->user_phone;
        $data['user_email'] = $request->user_email;
        $data['user_password'] = md5($request->user_password);

        $user_id = DB::table('tbl_user')->insertGetId($data);

        Session::put('user_id',$user_id);
        Session::put('user_name',$request->user_name);
        return Redirect::to('/checkout');
    }

    public function checkout()
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderBy('category_id')->get();
        $brand_product = DB::table('tbl-brand')->where('brand_status','1')->orderBy('brand_id')->get();

        return view('pages.checkout.show_checkout')->with('category',$cate_product)->with('brand',$brand_product);
    }

    public function save_checkout_user(Request $request)
    {
        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_address'] = $request->shipping_address;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_notes'] = $request->shipping_notes;

        $shipping_id = DB::table('tbl_shipping')->insertGetId($data);

        Session::put('shipping_id',$shipping_id);
        return Redirect::to('/payment');
    }

    public function logout_checkout()
    {
        Session::flush();
        return Redirect::to('/login-checkout');
    }

    public function login_user(Request $request)
    {
        $email = $request->email_account;
        $password = md5($request->password_account);
        $result = DB::table('tbl_user')->where('user_email',$email)->where('user_password',$password)->first();

        if($result)
        {
            Session::put('user_id',$result->user_id);
            return Redirect::to('/checkout');
        }
        else{
            return Redirect::to('/login-checkout');
        }
    }

    public function payment()
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderBy('category_id')->get();
        $brand_product = DB::table('tbl-brand')->where('brand_status','1')->orderBy('brand_id')->get();

        return view('pages.checkout.payment')->with('category',$cate_product)->with('brand',$brand_product);
    }

    public function order_place(Request $request)
    {
        //insert payment method
        $data = array();
        $data['payment_method'] = $request->payment_option;
        $data['payment_status'] = 'Đang chờ xử lý!';
        $payment_id = DB::table('tbl_payment')->insertGetId($data);

        //insert order
        $order_data = array();
        $order_data['order_total'] = Cart::total(0);
        $order_data['order_status'] = 'Đang chờ xử lý!';
        $order_data['user_id'] = Session::get('user_id');
        $order_data['shipping_id'] = Session::get('shipping_id');
        $order_data['payment_id'] = $payment_id;
        $order_id = DB::table('tbl_order')->insertGetId($order_data);

        //insert order details
        $content = Cart::content(); 
        foreach($content as $v_content)
        {
            $order_d_data['order_id'] = $order_id;
            $order_d_data['product_id'] = $v_content->id;
            $order_d_data['product_name'] = $v_content->name;
            $order_d_data['product_price'] = $v_content->price;
            $order_d_data['product_sales_quantity'] = $v_content->qty;
            DB::table('tbl_order_details')->insert($order_d_data);       
        }
        if($data['payment_method'] == 1)
        {
            $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderBy('category_id')->get();
            $brand_product = DB::table('tbl-brand')->where('brand_status','1')->orderBy('brand_id')->get();

            return view('pages.checkout.handcash')->with('category',$cate_product)->with('brand',$brand_product);
        }
        else{
            $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderBy('category_id')->get();
            $brand_product = DB::table('tbl-brand')->where('brand_status','1')->orderBy('brand_id')->get();

            return view('pages.checkout.handcash')->with('category',$cate_product)->with('brand',$brand_product);
        }
        //return Redirect::to('/payment');
    }

    public function manage_order()
    {       
        $this->AuthLogin();
        $all_order = DB::table('tbl_order')
        ->join('tbl_user','tbl_order.user_id','=','tbl_user.user_id')
        ->select('tbl_order.*','tbl_user.user_name')
        ->orderBy('tbl_order.order_id')->paginate(5);
        $manager_order = view('admin.manage_order')->with('all_order', $all_order);
        return view('admin_layout')->with('admin.manage_order', $manager_order);
    }

    public function view_order($orderId)
    {
        $this->AuthLogin();
        $order_by_id = DB::table('tbl_order')
        ->join('tbl_user','tbl_order.user_id','=','tbl_user.user_id')
        ->join('tbl_shipping','tbl_order.shipping_id','=','tbl_shipping.shipping_id')
        ->join('tbl_order_details','tbl_order_details.order_id','=','tbl_order.order_id')
        ->select('tbl_order.*','tbl_user.*','tbl_shipping.*','tbl_order_details.*')->first();

        // $nguoinhan = DB::table('tbl_shipping')->orderBy('tbl_shipping.shipping_id','desc')->first();
        $hang_theo_id = DB::table('tbl_order_details')->join('tbl_order','tbl_order.order_id','=','tbl_order_details.order_id')->where('tbl_order_details.order_id',$orderId)->get();

        $nguoinhan = DB::table('tbl_order')->join('tbl_shipping','tbl_shipping.shipping_id','=','tbl_order.shipping_id')->where('tbl_order.order_id',$orderId)->first();

        $manager_order_by_id = view('admin.view_order')->with('order_by_id', $order_by_id)->with('nguoinhan', $nguoinhan)->with('hang_theo_id', $hang_theo_id);
        return view('admin_layout')->with('admin.view_order', $manager_order_by_id);
    }
}
