@extends('admin_layout')
@section('admin_content')
        <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm Danh Mục Sản Phẩm
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
                                <form role="form" action="{{URL::to('/save-category-product')}}" method="post">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tên Danh Mục</label>
                                        <input type="text" name="category_product_name" required="required" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Mô Tả Danh Mục</label>
                                        <textarea style="height:220px; resize:none;" name="category_product_desc" class="form-control" id="ckeditor1" required="required" placeholder="Mô tả"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Hiển Thị</label>
                                        <select name="category_product_status" class="form-control input-sm m-bot15">
                                            <option value="0">Ẩn</option>
                                            <option value="1">Hiển Thị</option>
                                        </select>
                                    </div>                               
                                    <button type="submit" name="add_category_product" class="btn btn-info">Thêm Danh Mục</button>
                                </form>
                            </div>
                        </div>
                    </section>
            </div>
        </div>
@endsection