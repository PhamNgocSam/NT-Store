@extends('admin_layout')
@section('admin_content')
        <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Sửa Nhà Cung Cấp
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
                            @foreach($edit_producer as $key => $edit_value)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-producer/'.$edit_value->producer_id)}}" method="post">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tên Nhà Cung Cấp</label>
                                        <input type="text" value="{{$edit_value->producer_name}}" name="producer_name" class="form-control" id="exampleInputEmail1">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Địa Chỉ</label>
                                        <input type="text" value="{{$edit_value->producer_address}}" name="producer_address" class="form-control" id="exampleInputEmail1">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Số Điện Thoại</label>
                                        <input type="text" value="{{$edit_value->producer_phone}}" name="producer_phone" class="form-control" id="exampleInputEmail1">
                                    </div>                                                               
                                    <button type="submit" name="update_producer" class="btn btn-info">Sửa Nhà Cung Cấp</button>
                                </form>
                            </div>
                            @endforeach
                        </div>
                    </section>
            </div>
        </div>
@endsection