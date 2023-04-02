@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt Kê Nhà Cung Cấp
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <form action="{{URL::to('/search-producer')}}" method="POST">
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
            <th>Tên Nhà Cung Cấp</th>
            <th>Địa Chỉ</th>
            <th>Số Điện Thoại</th>
            <th>Chức Năng</th>
          </tr>
        </thead>
        <tbody>
            @foreach($all_producer as $key => $producer)
            <tr>
                <td>{{ $producer->producer_name}}</td>
                <td>{{ $producer->producer_address}}</td>
                <td>{{ $producer->producer_phone}}</td>
                <td>
                    <a style="font-size: 20px;" href="{{URL::to('/edit-producer/'.$producer->producer_id)}}" class="active" ui-toggle-class="">
                        <i style="margin-right:30px;" class="fa fa-pencil-square-o text-success text-active"></i>
                    </a>
                    <a onclick="return confirm('Bạn có chắc muốn xóa nhà cung cấp này không?')" style="font-size: 20px;" href="{{URL::to('/delete-producer/'.$producer->producer_id)}}" class="active" ui-toggle-class="">
                        <i class="fa fa-times text-danger text"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing max 5 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
        <div>
        {!! $all_producer->links() !!}
        </div>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection