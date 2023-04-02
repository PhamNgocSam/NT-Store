@extends('welcome')
@section('content')

    <section id="form">
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Đăng Nhập Tài Khoản Của Bạn</h2>
						<form action="{{URL::to('/login-user')}}" method="POST">
							{{ csrf_field() }}
							<input type="text" name="email_account" required="required" placeholder="Tài khoản" />
							<input type="password" name="password_account" required="required" placeholder="Mật khẩu" />
							<span>
								<input type="checkbox" class="checkbox"> 
								Ghi nhớ đắng nhập
							</span>
							<button type="submit" class="btn btn-default">Đăng Nhập</button>
						</form>
					</div><!--/login form-->
				</div>

				<div class="col-sm-1">
					<h2 class="or">Hoặc</h2>
				</div>
                
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>Đăng Ký</h2>
						<form action="{{URL::to('/add-user')}}" method="POST">
							{{ csrf_field() }}
							<input type="text" name="user_name" required="required" placeholder="Họ và tên"/>
							<input type="text" name="user_address" required="required" placeholder="Địa chỉ"/>
							<input type="text" name="user_phone" required="required" placeholder="Số điện thoại"/>
							<input type="email" name="user_email" required="required" placeholder="Địa chỉ email"/>
							<input type="password" name="user_password" required="required" placeholder="Mật khẩu"/>
							<button type="submit" class="btn btn-default">Đăng Ký</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section>

@endsection