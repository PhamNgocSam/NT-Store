@extends('admin_layout')
@section('admin_content')
        <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm Thương Hiệu Sản Phẩm
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
                                <form role="form" action="{{URL::to('/save-brand-product')}}" method="post">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tên Thương Hiệu</label>
                                        <input type="text" name="brand_product_name" class="form-control" id="exampleInputEmail1" required="required" placeholder="Tên thương hiệu">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Mô Tả Thương Hiệu</label>
                                        <textarea style="height:220px; resize:none;" name="brand_product_desc" class="form-control" id="ckeditor2" required="required" placeholder="Mô tả"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Hiển Thị</label>
                                        <select name="brand_product_status" class="form-control input-sm m-bot15">
                                            <option value="0">Ẩn</option>
                                            <option value="1">Hiển Thị</option>
                                        </select>
                                    </div>                               
                                    <button type="submit" name="add_brand_product" class="btn btn-info">Thêm Thương Hiệu</button>
                                </form>
                            </div>
                        </div>
                    </section>
            </div>
        </div>
@endsection