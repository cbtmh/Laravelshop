@extends('layout')
@section('content')
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
				  <li class="active">Giỏ hàng</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				{{-- {{$content = Cart::content()}} --}}
				<?php
					$content = Cart::content();
				?>
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Hình ảnh</td>
							<td class="description">Tên sản phẩm</td>
							<td class="price">Giá</td>
							<td class="quantity">Số lượng</td>
							<td class="total">Thành tiền</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						@foreach ($content as $key => $content)
                            <tr style="margin: 10px">
							<td style="margin:0%" class="cart_product">
								<a href=""><img src="{{asset('public/uploads/product/'.$content->options->image)}}" width="100" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$content->name}}</a></h4>
								<p>ID: {{$content->id}}</p>
							</td>
							<td class="cart_price">
								<p>{{number_format($content->price)}} VNĐ</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<form style="display: inline-flex" action="{{URL::to('/update-cart-quantity')}}" method="post">
										{{ csrf_field() }}
									<input class="cart_quantity_input" type="text" name="quantity" value="{{$content->qty}}" autocomplete="off" size="2">
										<input type="hidden" value="{{$content->rowId}}" name="rowId_cart" class="form-control">
										<input type="submit" value="Cập nhật" name="update_qty" class="btn btn-default btn-sm">
									</form>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price"><?php $subtotal= $content->price*$content->qty; echo number_format($subtotal)?>$</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{URL::to('/delete-to-cart/'.$content->rowId)}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
                        @endforeach

						
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->
	<section id="do_action">
		<div class="container">
			
			<div class="row">
				
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Tổng tiền<span>{{Cart::subtotal(0,',','.')}}$</span></li>
							<li>Thuế<span>{{Cart::tax(0,',','.')}}$</span></li>
							<li>Phí vận chuyển<span>Free</span></li>
							<li>Thành tiền <span>{{Cart::total(0,',','.')}}$</span></li>
						</ul>
							{{-- <a class="btn btn-default update" href="">Update</a> --}}
							<?php
									$customer_id = Session::get('customer_id');
									if($customer_id != NULL){
								?>
										<a class="btn btn-default check_out" href="{{URL::to('/checkout')}}">Thanh toán</a>
								<?php
									}else {
								?>
										<a class="btn btn-default check_out" href="{{URL::to('/login-checkout')}}">Thanh toán</a>
								<?php
									}
								?>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->
@endsection