@extends('layout')

@section('content')
    <section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Trang chủ</a></li>
				  <li class="active">Thanh toán giỏ hàng</li>
				</ol>
			</div><!--/breadcrums-->

			<div class="review-payment">
				<h2>Xem lại giỏ hàng</h2>
			</div>

            <div class="table-responsive cart_info">
				{{-- {{$content = Cart::content()}} --}}
				<?php
					$content = Cart::content();
				?>
				<table class="table table-condensed">
					<form style="display: inline-flex" action="{{URL::to('/update-cart-ajax')}}" method="post">
						{{ csrf_field() }}
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
						@if(Session::get('cart') == true)
                        <?php $total =0; ?>
						@foreach (Session::get('cart') as $key => $cart)
						<?php 
							$subtotal = $cart['product_price']* $cart['product_qty'];
							$total += $subtotal;
						?>
                            <tr style="margin:">
							<td style="margin:" class="cart_product">
								<a href=""><img src="{{asset('public/uploads/product/'.$cart['product_image'])}}" width="100" alt="{{$cart['product_name']}}"></a>
							</td>
							<td class="cart_description">
								<h4><a href=""></a></h4>
								<p>ID: {{$cart['product_name']}}</p>
							</td>
							<td class="cart_price">
								<p>{{number_format($cart['product_price'],0,',','.')}} VNĐ</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">								
									<input class="cart_quantity_input"  name="cart_qty[{{$cart['session_id']}}]" disabled value="{{$cart['product_qty']}}" >
										
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{number_format($subtotal,0,',','.')}} VNĐ</p>
							</td>
							
						</tr>
						
                        @endforeach
						<?php Session::put('total',$total) ?>
						
					<div style="padding: 30px" class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Tổng tiền<span>{{number_format($total,0,',','.')}} VNĐ</span></li>

							<li>Phí vận chuyển<span>Free</span></li>
							<li>Thành tiền <span>{{number_format($total,0,',','.')}} VNĐ</span></li>
							
						</ul>
								
					</div>
				</div>
						@else
						<td colspan="5"><center><?php echo "Làm ơn thêm sản phẩm vào giỏ"; ?></center></td>
						@endif
								
					</tbody>
					</form>
				</table>
			</div>
			<h4 style="margin:40px 0; font-size:20px">Chọn hình thức thanh toán</h4>
			<form action="{{URL::to('/order-place')}}" method="post">
				{{ csrf_field() }}
				<div  class="payment-options">
					<span>
						<label><input name="payment_option" value="1" type="checkbox"> Thanh toán bằng thẻ ATM</label>
					</span>
					<span>
						<label><input name="payment_option" value="2" type="checkbox"> Thanh toán bằng tiền mặt</label>
					</span>
					<span>
						<label><input name="payment_option" value="3" type="checkbox"> Thanh toán bằng thẻ ghi nợ</label>
					</span>
					<input style="margin-top:-10px; width:10%" type="submit" value="Đặt hàng" name="send_order_place" class="btn btn-primary btn-sm">
				</div> 
			</form>
		</div>
	</section> <!--/#cart_items-->
@endsection