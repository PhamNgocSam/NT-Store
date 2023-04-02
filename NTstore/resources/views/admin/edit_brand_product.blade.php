@extends('admin_layout')
@section('admin_content')
        <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Sửa Thương Hiệu Sản Phẩm
                        </header>
                        <?php
                            use Illuminate\Support\Facades\Session;
                            $message=Session::get('message');
                            if($message){
                            echo '<span style="color:red;">',$message,'</span>';
                            Session::put('message',null);
                            }
                        ?>
                        <div class="panel-body">
                            @foreach($edit_brand_product as $key => $edit_value)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-brand-product/'.$edit_value->brand_id)}}" method="post">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tên Thương Hiệu</label>
                                        <input type="text" value="{{$edit_value->brand_name}}" name="brand_product_name" class="form-control" id="exampleInputEmail1">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Mô Tả Thương Hiệu</label>
                                        <textarea style="height:220px; resize:none;" name="brand_product_desc" class="form-control" id="ckeditor2">{{$edit_value->brand_desc}}</textarea>
                                    </div>                                                                 
                                    <button type="submit" name="update_brand_product" class="btn btn-info">Sửa Thương Hiệu</button>
                                </form>
                            </div>
                            @endforeach
                        </div>
                    </section>
            </div>
        </div>
@endsection