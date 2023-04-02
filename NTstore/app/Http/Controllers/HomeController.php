<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
session_start();

class HomeController extends Controller
{
    public function index() {
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderBy('category_id')->get();
        $brand_product = DB::table('tbl-brand')->where('brand_status','1')->orderBy('brand_id')->get();

        $all_product = DB::table('tbl_product')->where('product_status','1')->orderBy('product_id')->paginate(9);
        return view('pages.home')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product);
    }

    public function search(Request $request)
    {
        $keywords = $request->keywords_submit;
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderBy('category_id')->get();
        $brand_product = DB::table('tbl-brand')->where('brand_status','1')->orderBy('brand_id')->get();

        $search_product = DB::table('tbl_product')->where('product_name','like','%'.$keywords.'%')->get();

        return view('pages.sanpham.search')->with('category',$cate_product)->with('brand',$brand_product)->with('search_product',$search_product);
    }

    public function error()
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderBy('category_id')->get();
        $brand_product = DB::table('tbl-brand')->where('brand_status','1')->orderBy('brand_id')->get();
        return view('pages.demo.error')->with('category',$cate_product)->with('brand',$brand_product);
    }

    public function contact()
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderBy('category_id')->get();
        $brand_product = DB::table('tbl-brand')->where('brand_status','1')->orderBy('brand_id')->get();
        return view('pages.demo.contact')->with('category',$cate_product)->with('brand',$brand_product);
    }

    public function blog()
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderBy('category_id')->get();
        $brand_product = DB::table('tbl-brand')->where('brand_status','1')->orderBy('brand_id')->get();
        return view('pages.demo.blog')->with('category',$cate_product)->with('brand',$brand_product);
    }

    public function other_blog()
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderBy('category_id')->get();
        $brand_product = DB::table('tbl-brand')->where('brand_status','1')->orderBy('brand_id')->get();
        return view('pages.demo.other_blog')->with('category',$cate_product)->with('brand',$brand_product);
    }
}
