@extends('admin_layout')
@section('admin_content')
        <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm Nhà Cung Cấp
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
                                <form role="form" action="{{URL::to('/save-producer')}}" method="post">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tên Nhà Cung Cấp</label>
                                        <input type="text" name="producer_name" required="required" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Địa Chỉ Nhà Cung Cấp</label>
                                        <input type="text" name="producer_address" required="required" class="form-control" id="exampleInputEmail1" placeholder="Địa chỉ">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Số Điện Thoại</label>
                                        <input type="text" name="producer_phone" required="required" class="form-control" id="exampleInputEmail1" placeholder="Số điện thoại">
                                    </div>                             
                                    <button type="submit" name="add_producer" class="btn btn-info">Thêm Nhà Cung Cấp</button>
                                </form>
                            </div>
                        </div>
                    </section>
            </div>
        </div>
@endsection