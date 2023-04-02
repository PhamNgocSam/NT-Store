@extends('welcome')
@section('content')

<div class="features_items">
	@foreach($brand_name as $key => $brands)
		<h2 class="title text-center">{{$brands->brand_name}}</h2>
	@endforeach
		@foreach($brand_by_id as $key => $product)
		<form>
			@csrf
			<a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}">
				<div class="col-sm-4">
					<div class="product-image-wrapper" style="width: 250px;">
						<div class="single-products">
							<div class="productinfo text-center">
								<img style="width:250px; height:300px;" src="{{URL::to('public/upload/product/'.$product->product_image)}}" alt="" />
								<h2>{{number_format($product->product_price).' '.'VND'}}</h2>
								<p>{{$product->product_name}}</p>
								<button type="button" class="btn btn-default add-to-cart" data-id="{{$product->product_id}}" name="add-to-cart">Chi Tiết Sản Phẩm</button>
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
			</a>
		</form>
		@endforeach											
</div>                  
@endsection