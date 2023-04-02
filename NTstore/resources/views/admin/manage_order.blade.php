@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt Kê Đơn Hàng
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <form action="{{URL::to('/search-order')}}" method="POST">
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
            <th>Tên Người Đặt</th>
            <th>Tổng Giá Tiền</th>
            <th>Tình Trạng</th>
            <th>Chức Năng</th>
          </tr>
        </thead>
        <tbody>
            @foreach($all_order as $key => $order)
            <tr>
                <td>{{ $order->user_name }}</td>
                <td>{{ $order->order_total }}</td>
                <td>{{ $order->order_status }}</td>
                
                <td>
                    <a style="font-size: 20px;" href="{{URL::to('/view-order/'.$order->order_id)}}" class="active" ui-toggle-class="">
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
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing max 5 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
        <div>
        {!! $all_order->links() !!}
        </div>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection