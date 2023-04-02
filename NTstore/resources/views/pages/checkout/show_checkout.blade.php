@extends('welcome')
@section('content')

    <section id="cart_items">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="{{URL::to('/')}}">Trang Chủ</a></li>
                <li class="active">Thanh Toán Giỏ Hàng</li>
            </ol>
        </div>

        <div class="register-req">
            <p>Vui lòng đăng ký hoặc đăng nhập để thanh toán giỏ hàng và xem lại lịch sử mua hàng.</p>
        </div>

        <div class="shopper-informations">
            <div class="row">
                <div class="col-sm-12 clearfix">
                    <div class="bill-to">
                        <p>Điền Thông Tin Gửi hàng</p>
                        <div class="form-one">
                            <form action="{{URL::to('/save-checkout-user')}}" method="POST">
                                {{ csrf_field() }}
                                <input type="text" name="shipping_name" required="required" placeholder="Họ và tên">
                                <input type="text" name="shipping_address" required="required" placeholder="Địa chỉ">
                                <input type="text" name="shipping_phone" required="required" placeholder="Số điện thoại">
                                <input type="text" name="shipping_email" required="required" placeholder="Email *">
                                <textarea name="shipping_notes" required="required" placeholder="Ghi chú đơn hàng của bạn!" rows="16"></textarea>									
                                <input style="margin-top: 15px; background-color: #FE980F; color:white;" type="submit" value="Gửi" name="send_order" class="btl btl-primary btl-sm">
                            </form>
                        </div>			
                    </div>
                </div>										
            </div>
        </div>
	</section>

@endsection