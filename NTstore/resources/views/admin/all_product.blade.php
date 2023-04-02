@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt Kê Sản Phẩm
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <form action="{{URL::to('/search-product')}}" method="POST">
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
            <th>Tên Sản Phẩm</th>
            <th>Ảnh</th>
            <th>Mô Tả</th>
            <th>Giá</th>
            <th>Danh Mục</th>
            <th>Thương Hiệu</th>
            <th>Trạng Thái</th>
            <th>Chức Năng</th>
          </tr>
        </thead>
        <tbody>
            @foreach($all_product as $key => $pro)
            <tr>
                <td>{{ $pro->product_name}}</td>
                <td><img src="public/upload/product/{{ $pro->product_image}}" height="100" width="100"></td>
                <td>{{ $pro->product_desc}}</td>
                <td>{{ $pro->product_price}}</td>
                <td>{{ $pro->category_name}}</td>
                <td>{{ $pro->brand_name}}</td>
                <td><span class="text-ellipsis">
                    <?php
                        if($pro->product_status == 0) {
                          ?>
                          <a style="color: red; font-size:30px;" href="{{URL::to('/active-product/'.$pro->product_id)}}"><span class="fa fa-thumbs-down"></span></a>
                          <?php
                        }
                        else {
                          ?>
                          <a style="color: green; font-size:30px;" href="{{URL::to('/unactive-product/'.$pro->product_id)}}"><span class="fa fa-thumbs-up"></span></a>
                          <?php
                        }
                    ?>
                </span></td>
                <td>
                    <a style="font-size: 20px;" href="{{URL::to('/edit-product/'.$pro->product_id)}}" class="active" ui-toggle-class="">
                        <i style="margin-right:30px;" class="fa fa-pencil-square-o text-success text-active"></i>
                    </a>
                    <a onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này không?')" style="font-size: 20px;" href="{{URL::to('/delete-product/'.$pro->product_id)}}" class="active" ui-toggle-class="">
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
          <small class="text-muted inline m-t-sm m-b-sm">showing max 10 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
        <div>
        {!! $all_product->links() !!}
        </div>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection