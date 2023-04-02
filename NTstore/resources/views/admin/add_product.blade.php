@extends('admin_layout')
@section('admin_content')
        <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm Sản Phẩm
                        </header>
                        <?php
                            use Illuminate\Support\Facades\Session;
                            $message=Session::get('message');
                            if($message){
                            echo '<span style="color:red; align-item: center;">',$message,'</span>';
                            Session::put('message',null);
                            }
                        ?>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/save-product')}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tên Sản Phẩm</label>
                                        <input type="text" name="product_name" required="required" class="form-control" id="exampleInputEmail1" placeholder="Tên sản phẩm">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Ảnh Sản Phẩm</label>
                                        <input type="file" name="product_image" required="required" class="form-control" id="exampleInputEmail1">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Mô Tả</label>
                                        <textarea style="height:220px; resize:none;" name="product_desc" class="form-control" id="ckeditor3" required="required" placeholder="Mô tả"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Giá Sản Phẩm</label>
                                        <input type="text" name="product_price" required="required" class="form-control" id="exampleInputEmail1" placeholder="Giá sản phẩm">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Danh Mục</label>
                                        <select name="product_cate" class="form-control input-sm m-bot15">
                                            @foreach($cate_product as $key => $cate)
                                            <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Thương Hiệu</label>
                                        <select name="product_brand" class="form-control input-sm m-bot15">
                                            @foreach($brand_product as $key => $brand)
                                            <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>  
                                    <div class="form-group">
                                        <label for="exampleInputFile">Trạng Thái</label>
                                        <select name="product_status" class="form-control input-sm m-bot15">
                                            <option value="0">Ẩn</option>
                                            <option value="1">Hiển Thị</option>
                                        </select>
                                    </div>                             
                                    <button type="submit" name="add_product" class="btn btn-info">Thêm Sản Phẩm</button>
                                </form>
                            </div>
                        </div>
                    </section>
            </div>
        </div>
@endsection