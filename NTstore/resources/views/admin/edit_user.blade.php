@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Xem Chi Tiết Khách Hàng
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
                    @foreach($edit_user as $key => $edit_value)
                    <div class="position-center">
                        <form role="form" action="{{URL::to('/update-user/'.$edit_value->user_id)}}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên Khách Hàng</label>
                                <input type="text" value="{{$edit_value->user_name}}" name="user_name" class="form-control" id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Địa Chỉ</label>
                                <input type="text" value="{{$edit_value->user_address}}" name="user_address" class="form-control" id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Số Điện Thoại</label>
                                <input type="text" value="{{$edit_value->user_phone}}" name="user_phone" class="form-control" id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="text" value="{{$edit_value->user_email}}" name="user_email" class="form-control" id="exampleInputEmail1">
                            </div>     
                            <div class="form-group">
                                <label for="exampleInputEmail1">Password</label>
                                <input type="text" value="{{$edit_value->user_password}}" name="user_password" class="form-control" id="exampleInputEmail1">
                            </div>                                                           
                            <button type="submit" name="update_user" class="btn btn-info">Quay Lại</button>
                        </form>
                    </div>
                    @endforeach
                </div>
            </section>
    </div>
</div>
@endsection