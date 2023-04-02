<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
session_start();

class SearchController extends Controller
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

    public function search_category(Request $request)
    {
        $this->AuthLogin();
        $keywords = $request->keywords_submit;
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderBy('category_id')->get();
        $brand_product = DB::table('tbl-brand')->where('brand_status','1')->orderBy('brand_id')->get();

        $search_category = DB::table('tbl_category_product')->where('category_name','like','%'.$keywords.'%')->get();

        return view('pages.searchbackend.search_category')->with('category',$cate_product)->with('brand',$brand_product)->with('search_category',$search_category);
    }

    public function search_brand(Request $request)
    {
        $this->AuthLogin();
        $keywords = $request->keywords_submit;
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderBy('category_id')->get();
        $brand_product = DB::table('tbl-brand')->where('brand_status','1')->orderBy('brand_id')->get();

        $search_brand = DB::table('tbl-brand')->where('brand_name','like','%'.$keywords.'%')->get();

        return view('pages.searchbackend.search_brand')->with('category',$cate_product)->with('brand',$brand_product)->with('search_brand',$search_brand);
    }

    public function search_producer(Request $request)
    {
        $this->AuthLogin();
        $keywords = $request->keywords_submit;
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderBy('category_id')->get();
        $brand_product = DB::table('tbl-brand')->where('brand_status','1')->orderBy('brand_id')->get();

        $search_producer = DB::table('tbl_producer')->where('producer_name','like','%'.$keywords.'%')->get();

        return view('pages.searchbackend.search_producer')->with('category',$cate_product)->with('brand',$brand_product)->with('search_producer',$search_producer);
    }

    public function search_product(Request $request)
    {
        $this->AuthLogin();
        $keywords = $request->keywords_submit;
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderBy('category_id')->get();
        $brand_product = DB::table('tbl-brand')->where('brand_status','1')->orderBy('brand_id')->get();

        $search_products = DB::table('tbl_product')->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')->join('tbl-brand','tbl_product.brand_id','=','tbl-brand.brand_id')->where('product_name','like','%'.$keywords.'%')->get();

        return view('pages.searchbackend.search_product')->with('category',$cate_product)->with('brand',$brand_product)->with('search_products',$search_products);
    }

    public function search_order(Request $request)
    {
        $this->AuthLogin();
        $keywords = $request->keywords_submit;
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderBy('category_id')->get();
        $brand_product = DB::table('tbl-brand')->where('brand_status','1')->orderBy('brand_id')->get();

        $search_order = DB::table('tbl_order')->join('tbl_user','tbl_order.user_id','=','tbl_user.user_id')->where('user_name','like','%'.$keywords.'%')->get();

        return view('pages.searchbackend.search_order')->with('category',$cate_product)->with('brand',$brand_product)->with('search_order',$search_order);
    }

    public function search_user(Request $request)
    {
        $this->AuthLogin();
        $keywords = $request->keywords_submit;
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderBy('category_id')->get();
        $brand_product = DB::table('tbl-brand')->where('brand_status','1')->orderBy('brand_id')->get();

        $search_user = DB::table('tbl_user')->where('user_name','like','%'.$keywords.'%')->get();

        return view('pages.searchbackend.search_user')->with('category',$cate_product)->with('brand',$brand_product)->with('search_user',$search_user);
    }
}
