@extends('welcome')
@section('content')

<div class="features_items"><!--features_items-->
	<h2 class="title text-center">SẢN PHẨM MỚI NHẤT</h2>
		@foreach($all_product as $key => $product)
			<div class="col-sm-4">
				<div class="product-image-wrapper" style="width: 280px;">
					<div class="single-products">
						<div class="productinfo text-center">
							<form>
								@csrf
								<input type="hidden" class="cart_product_id_{{$product->product_id}}" value="{{$product->product_id}}">
								<input type="hidden" class="cart_product_name_{{$product->product_id}}" value="{{$product->product_name}}">
								<input type="hidden" class="cart_product_image_{{$product->product_id}}" value="{{$product->product_image}}">
								<input type="hidden" class="cart_product_price_{{$product->product_id}}" value="{{$product->product_price}}">
								<input type="hidden" class="cart_product_qty_{{$product->product_id}}" value="1">

								<a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}">
									<img style="width:250px; height:300px;" src="{{URL::to('public/upload/product/'.$product->product_image)}}" alt="" />
									<h2>{{number_format($product->product_price).' '.'VND'}}</h2>
									<p>{{$product->product_name}}</p>
								
									<button type="button" class="btn btn-default add-to-cart" data-id="{{$product->product_id}}" name="add-to-cart">Chi Tiết Sản Phẩm</button>
								</a>
							</form>
						</div>						
					</div>

					<div class="choose">
						<ul class="nav nav-pills nav-justified">
							<li><a href="#"><i class="fa fa-plus-square"></i>Yêu Thích</a></li>
							<li><a href="#"><i class="fa fa-plus-square"></i>So Sánh</a></li>
						</ul>
					</div>
				</div>
			</div>
		@endforeach											
</div>
{!! $all_product->links() !!}
@endsection