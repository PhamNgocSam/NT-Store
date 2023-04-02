@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt Kê Khách Hàng
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <form action="{{URL::to('/search-user')}}" method="POST">
		    {{ csrf_field() }}
            <div class="input-group">
                <input type="text" name="keywords_submit" class="input-sm form-control" placeholder="Search">
            </div>
        </form>
      </div>
    </div>
    <?php
      use Illuminate\Support\Facades\Session;
      $message=Session::get('message');
      if($message){
      echo '<span style="color:red; margin-left:15px;">',$message,'</span>';
      Session::put('message',null);
      }
      ?>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Tên Khách Hàng</th>
            <th>Địa Chỉ</th>
            <th>Số Điện Thoại</th>
            <th>Email</th>
            <th>Password</th>
            <th>Chức Năng</th>
          </tr>
        </thead>
        <tbody>
            @foreach($search_user as $key => $user)
            <tr>
                <td>{{ $user->user_name}}</td>
                <td>{{ $user->user_address}}</td>
                <td>{{ $user->user_phone}}</td>
                <td>{{ $user->user_email}}</td>
                <td>{{ $user->user_password}}</td>               
                <td>
                    <a style="font-size: 20px;" href="{{URL::to('/edit-user/'.$user->user_id)}}" class="active" ui-toggle-class="">
                        <i style="margin-right:30px;" class="fa fa-eye text-success text-active"></i>
                    </a>                    
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
      </div>
    </footer>
  </div>
</div>
@endsection