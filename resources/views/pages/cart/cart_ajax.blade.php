@extends('layout')
@section('content')
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
				  <li class="active">Giỏ hàng</li>
				
									<?php   
                                    $message = Session::get('message');
                                    if($message){
                                        echo '<span style="margin:20px" class= "alert alert-success">',$message,'</span>';
                                        Session::put('message',null);
                                    }
                                    ?>
								
				</ol>
				
			</div>
				
			<div class="table-responsive cart_info">				
					
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

									<input class="cart_quantity_input" type="number" name="cart_qty[{{$cart['session_id']}}]" value="{{$cart['product_qty']}}" min="1">
										
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{number_format($subtotal,0,',','.')}} VNĐ</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{URL::to('/delete-cart-ajax/'.$cart['session_id'])}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						
                        @endforeach
						<?php Session::put('total',$total) ?>
						<tr>
							<td>
								<div >
									<input type="submit" value="Cập nhật giỏ hàng" name="update_qty" class="check_out btn btn-default btn-sm">
									<td><div style="float:right"><a href="{{URL::to('delete-all-cart-ajax')}}" class="btn btn-default check_out" href="">Xóa đơn hàng</a></div></td>
								</div>
								
							</td>
							
						</tr>
					<table class="table-responsive cart_info">
						<div style="padding: 30px; margin-top: 50px; border:0.2px solid;border-color:grey" class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Tổng tiền<span>{{number_format($total,0,',','.')}} VNĐ</span></li>

							<li>Phí vận chuyển<span>Free</span></li>
							<li>Thành tiền <span>{{number_format($total,0,',','.')}} VNĐ</span></li>
							
						</ul>
						
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
					</table>
						@else
						<td colspan="5"><center><?php echo "Làm ơn thêm sản phẩm vào giỏ"; ?></center></td>
						@endif
								
					</tbody>
					</form>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->
	<section id="do_action">
		<div class="container">
			
			<div class="row">
				
				
			</div>					
						
		</div>
	</section><!--/#do_action-->
	
@endsection