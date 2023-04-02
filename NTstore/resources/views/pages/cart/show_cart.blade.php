@extends('welcome')
@section('content')

<section id="cart_items">
	<div class="breadcrumbs">
		<ol class="breadcrumb">
			<li><a href="{{URL::to('/')}}">Trang Chủ</a></li>
			<li class="active">Giỏ Hàng Của Bạn</li>
		</ol>
	</div>
	<div class="table-responsive cart_info">
		<?php
			use Gloudemans\Shoppingcart\Facades\Cart;					
			$content = Cart::content();
		?>
		<table class="table table-condensed">
			<thead>
				<tr class="cart_menu">
					<td class="image">Hình Ảnh</td>
					<td class="description">Mô Tả</td>
					<td class="price">Giá</td>
					<td class="quantity">Số Lượng</td>
					<td class="total">Tổng Tiền</td>
					<td></td>
				</tr>
			</thead>
			<tbody>
				@foreach($content as $v_content)
				<tr>
					<td class="cart_product">
						<a href=""><img src="{{URL::to('public/upload/product/'.$v_content->options->image)}}" width="50" alt=""></a>
					</td>
					<td class="cart_description">
						<h4><a href="">{{$v_content->name}}</a></h4>
						<p>ID Sản Phẩm: {{$v_content->id}}</p>
					</td>
					<td class="cart_price">
						<p>{{number_format($v_content->price).' '.'vnd'}}</p>
					</td>
					<td class="cart_quantity">
						<div class="cart_quantity_button">
							<form action="{{URL::to('/update-cart-quatity')}}" method="POST">
								{{ csrf_field() }}
								<input class="cart_quantity_input" type="number" min="0" name="cart_quantity" value="{{$v_content->qty}}">
								<input type="hidden" value="{{$v_content->rowId}}" name="rowId_cart" class="form-control">
								<input type="submit" value="Cập nhật" name="update_qty" class="btl btl-default btl-sm">
							</form>
						</div>
					</td>
					<td class="cart_total">
						<p class="cart_total_price">
							<?php
								$subtotal = $v_content->price * $v_content->qty;
								echo number_format($subtotal).' '.'vnd';
							?>
						</p>
					</td>
					<td class="cart_delete">
						<a class="cart_quantity_delete" href="{{URL::to('/delete-to-cart/'.$v_content->rowId)}}"><i class="fa fa-times text-danger text"></i></a>
					</td>
				</tr>	
				@endforeach					
			</tbody>
		</table>
	</div>
</section>

<section id="do_action">
	<div class="col-sm-6">
		<div class="total_area">
			<ul>
				<li>Tổng <span>{{Cart::subtotal(0).' '.'vnd'}}</span></li>
				<li>Thuế <span>{{Cart::tax(0).' '.'vnd'}}</span></li>
				<li>Phí Vận Chuyển <span>Free</span></li>
				<li>Thành Tiền <span>{{Cart::total(0).' '.'vnd'}}</span></li>
			</ul>

			<?php
				use Illuminate\Support\Facades\Session;
				$user_id = Session::get('user_id');
				if($user_id != NULL){
			?>
				<a style="margin-left: 40px;" class="btn btn-default check_out" href="{{URL::to('/checkout')}}">Thanh toán</a>
			<?php
			} else{
			?>
				<a style="margin-left: 40px;" class="btn btn-default check_out" href="{{URL::to('/login-checkout')}}">Thanh toán</a>
			<?php
			}
			?>
		</div>
	</div>
</section>

@endsection