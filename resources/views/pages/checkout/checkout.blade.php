@extends('layout')

@section('content')
    <section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
				  <li class="active">Thanh toán giỏ hàng</li>
				</ol>
			</div><!--/breadcrums-->

								<?php
	$message = Session::get('message');
	if($message){
		echo '<span class= "text-danger">',$message,'</span>';
		Session::put('message',null);
	}
	?>

			<div class="register-req">
				<p>Làm ơn đăng ký hoặc đăng nhập để thanh toán giỏ hàng và xem lịch sử mua hàng</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
					
					<div class="col-sm-12 clearfix">
						<div class="bill-to">
							<p>Thông tin hóa đơn thanh toán</p>
							<div class="form-one">
								<form method="POST" action="{{URL::to('/save-checkout-customer')}}">
                                    {{ csrf_field() }}
									<input type="text" name="shipping_name" placeholder="Họ tên*">
									<input type="text" name="shipping_email" placeholder="Email">
									<input type="text" name="shipping_address" placeholder="Địa chỉ*">
									<input type="text" name="shipping_phone" placeholder="SĐT*">
									<textarea name="shipping_notes" placeholder="Ghi chú đơn hàng" rows="16"></textarea>
                                    <input type="submit" value="Gửi" name="send_order" class="btn btn-primary btn-sm">
								</form>
							</div>
							
						</div>
					</div>				
				</div>
			</div>
			
		</div>
	</section> <!--/#cart_items-->
@endsection