@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Thông Tin Khách Hàng
        </div>
               
        <div class="table-responsive">
            <table class="table table-striped b-t b-light">
                <thead>
                <tr>                   
                    <th>Tên Khách Hàng</th>
                    <th>Địa Chỉ</th>
                    <th>Số Điện Thoại</th>
                </tr>
                </thead>
                <tbody>                
                    <tr>
                        <td>{{$nguoinhan->shipping_name}}</td>
                        <td>{{$nguoinhan->shipping_address}}</td>   
                        <td>{{$nguoinhan->shipping_phone}}</td>                        
                    </tr>
                </tbody>
            </table>
        </div>   
    </div>
</div>

<br><br>

<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Chi Tiết Đơn Hàng
        </div>
               
        <div class="table-responsive">
            <table class="table table-striped b-t b-light">
                <thead>
                <tr>                   
                    <th>Tên Sản Phẩm</th>
                    <th>Số Lượng</th>
                    <th>Giá</th>
                    <th>Tổng Tiền</th>
                </tr>
                </thead>
                <tbody>     
                    @foreach($hang_theo_id as $key => $hang)         
                        <tr>
                            <td>{{ $hang->product_name }}</td>
                            <td>{{ $hang->product_sales_quantity }}</td>
                            <td>{{ $hang->product_price.' '.'VNĐ' }}</td>
                            <td>{{ ($hang->product_price * $hang->product_sales_quantity).' '.'VNĐ' }}</td>                          
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>   
    </div>
</div>
@endsection