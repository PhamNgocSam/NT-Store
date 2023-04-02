@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt Kê Danh Mục
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <form action="{{URL::to('/search-category')}}" method="POST">
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
            <th>Tên Danh Mục</th>
            <th>Hiển Thị</th>
            <th>Chức Năng</th>
          </tr>
        </thead>
        <tbody>
            @foreach($all_category_product as $key => $cate_pro)
            <tr>
                <td>{{ $cate_pro->category_name}}</td>
                <td><span class="text-ellipsis">
                    <?php
                        if($cate_pro->category_status == 0) {
                          ?>
                          <a style="color: red; font-size:30px;" href="{{URL::to('/active-category-product/'.$cate_pro->category_id)}}"><span class="fa fa-thumbs-down"></span></a>
                          <?php
                        }
                        else {
                          ?>
                          <a style="color: green; font-size:30px;" href="{{URL::to('/unactive-category-product/'.$cate_pro->category_id)}}"><span class="fa fa-thumbs-up"></span></a>
                          <?php
                        }
                    ?>
                </span></td>
                <td>
                    <a style="font-size: 20px;" href="{{URL::to('/edit-category-product/'.$cate_pro->category_id)}}" class="active" ui-toggle-class="">
                        <i style="margin-right:30px;" class="fa fa-pencil-square-o text-success text-active"></i>
                    </a>
                    <a onclick="return confirm('Bạn có chắc muốn xóa danh mục này không?')" style="font-size: 20px;" href="{{URL::to('/delete-category-product/'.$cate_pro->category_id)}}" class="active" ui-toggle-class="">
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
                {!! $all_category_product->links() !!}
            </div>                          
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection
