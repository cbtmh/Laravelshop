<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Trang chủ | LPTIP-SHOP</title>
    <link href="{{asset('public/FrontEnd/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/FrontEnd/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('public/FrontEnd/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('public/FrontEnd/css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('public/FrontEnd/css/main.css')}}" rel="stylesheet">
	<link href="{{asset('public/FrontEnd/css/responsive.css')}}" rel="stylesheet">
    <link href="{{asset('public/FrontEnd/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/FrontEnd/css/sweetalert.css')}}" rel="stylesheet">


</head><!--/head-->

<body>
	<header id="header"><!--header-->
		
<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6 ">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href=""><i class="fa fa-phone"></i> +87 852 4640</a></li>
								<li><a href=""><i class="fa fa-envelope"></i> diep.bt194505@sis.hust.edu.vn</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href=""><i class="fa fa-facebook"></i></a></li>
								<li><a href=""><i class="fa fa-twitter"></i></a></li>
								<li><a href=""><i class="fa fa-linkedin"></i></a></li>
								<li><a href=""><i class="fa fa-dribbble"></i></a></li>
								<li><a href=""><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="{{URL::to('/')}}"><img src="{{asset('public/FrontEnd/images/logo.png')}}" alt="" /></a>
						</div>
						
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								{{-- <li><a href="{{URL::to('/login-checkout')}}"><i class="fa fa-user"></i> Tài khoản</a></li> --}}
								<?php
									$customer_id = Session::get('customer_id');
									$shipping_id = Session::get('shipping_id');
									
									if($customer_id != NULL && $shipping_id == NULL){
								?>
										<li><a href="{{URL::to('/checkout')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
								<?php
											
									}elseif($customer_id != NULL && $shipping_id != NULL){
								?>
										<li><a href="{{URL::to('/payment')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
								<?php
									
									}else {
								?>
										<li><a href="{{URL::to('/login-checkout')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
								<?php
									}
								?>
								
								
								<li><a href="{{URL::to('/show-cart-ajax')}}"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
								
								
								<?php
									$customer_id = Session::get('customer_id');
									if($customer_id != NULL){
								?>
										<li><a href="{{URL::to('/logout-checkout')}}"><i class="fa fa-lock"></i> Đăng xuất</a></li>
								<?php
									}else {
								?>
										<li><a href="{{URL::to('/login-checkout')}}"><i class="fa fa-lock"></i> Đăng nhập</a></li>
								<?php
									}
								?>

							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-8">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="{{URL::to('/')}}" class="active">Trang chủ</a></li>
								<li><a href="{{URL::to('/show-info/'.$customer_id)}}">Tài khoản</a></li>
								<li><a href="{{URL::to('/show-cart-ajax')}}">Giỏ hàng</a></li>
								<li><a href="">Liên hệ</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-4">
						<form action="{{URL::to('/search')}}" method="post">
							{{ csrf_field() }}
							<div style="display: inline-flex" class="search_box pull-right">
							<input type="text" name="keyword" placeholder="Tìm kiếm"/>
							<input type="submit" style="margin-left: 3px" name="search_items" class="btn btn-info btn-sm" value="search">
						</div>
						</form>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->

	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1><span>LPTIP</span>-SHOP</h1>
									<h2>Laptop gaming</h2>
									<p>Laptop gaming hiệu năng siêu khủng, chiến mọi tựa game. </p>

								</div>
								<div class="col-sm-6">
									<img src="{{asset('public/FrontEnd/images/gaming.png')}}" class="girl img-responsive" alt="" />
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1><span>LPTIP</span>-SHOP</h1>
									<h2>Laptop mỏng nhẹ - Windows</h2>
									<p>Laptop mỏng nhẹ, thời trang, phong cách. </p>

								</div>
								<div class="col-sm-6">
									<img src="{{asset('public/FrontEnd/images/vanphong.png')}}" class="girl img-responsive" alt="" />
								</div>
							</div>
							
							<div class="item">
								<div class="col-sm-6">
									<h1><span>LPTIP</span>-SHOP</h1>
									<h2>Macbook</h2>
									<p>Các dòng macbook mới nhất từ Apple. </p>

								</div>
								<div class="col-sm-6">
									<img src="{{asset('public/FrontEnd/images/macbook.png')}}" class="girl img-responsive" alt="" />
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1><span>LPTIP</span>-SHOP</h1>
									<h2>Phụ kiện</h2>
									<p>Phụ kiện máy tính: chuột, tai nghe gaming, bàn phím cơ Led RGB. </p>

								</div>
								<div class="col-sm-6">
									<img src="{{asset('public/FrontEnd/images/phukien.png')}}" class="girl img-responsive" alt="" />
								</div>
							</div>
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Danh mục sản phẩm</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
						@foreach ($cate_product as $key=> $cate)
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="{{URL::to('/danh-muc-san-pham/'.$cate->category_id)}}">{{$cate->category_name}}</a></h4>
								</div>
							</div>
						@endforeach
							
							
							
							
						</div><!--/category-products-->
					
						<div class="brands_products"><!--brands_products-->
							<h2>Thương hiệu sản phẩm</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
							@foreach ($brand_product as $key=> $brand)

									<li><a href="{{URL::to('/thuong-hieu-san-pham/'.$brand->brand_id)}}"> <span class="pull-right"></span>{{$brand->brand_name}}</a></li>
							@endforeach		
								</ul>
							</div>
						</div><!--/brands_products-->
						
						{{-- <div class="price-range"><!--price-range-->
							<h2>Price Range</h2>
							<div class="well text-center">
								 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
								 <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
							</div>
						</div><!--/price-range--> --}}
						
						{{-- <div class="shipping text-center"><!--shipping-->
							<img src="{{('public/FrontEnd/images/shipping.jpg')}}" alt="" />
						</div><!--/shipping--> --}}
					
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					@yield('content')
				</div>
			</div>
		</div>
	</section>
	
	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				
			</div>
		</div>
		
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>ASUS</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Asus gaming</a></li>
								<li><a href="#">Asus mỏng nhẹ</a></li>
								<li><a href="#">Phụ kiện Asus</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>ACER</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Acer gaming</a></li>
								<li><a href="#">Acer mỏng nhẹ</a></li>
								<li><a href="#">Phụ kiện Acer</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>DELL</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Dell gaming</a></li>
								<li><a href="#">Dell mỏng nhẹ</a></li>
								<li><a href="#">Phụ kiện Dell</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>HP</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">HP gaming</a></li>
								<li><a href="#">HP mỏng nhẹ</a></li>
								<li><a href="#">Phụ kiện HP</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>MACBOOK</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Macbook M1</a></li>
								<li><a href="#">MacBook Pro</a></li>
								<li><a href="#">Phụ kiện Apple</a></li>
							</ul>
						</div>
					</div>
					
					
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container"><div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Shop bán hàng công nghệ số 1 Việt Nam</p>
					<p class="pull-right">Project môn thực hành lập trình web<span><a target="_blank" href="https://www.facebook.com/Thienlongaochin7"> Diepton</a></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	

  
    <script src="{{asset('public/FrontEnd/js/jquery.js')}}"></script>
	<script src="{{asset('public/FrontEnd/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('public/FrontEnd/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{asset('public/FrontEnd/js/price-range.js')}}"></script>
    <script src="{{asset('public/FrontEnd/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('public/FrontEnd/js/main.js')}}"></script>
    <script src="{{asset('public/FrontEnd/js/sweetalert.min.js')}}"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('.add-to-cart').click(function(){
				var id= $(this).data('id_product');
				var cart_product_id = $('.cart_product_id_'+id).val();
				var cart_product_name = $('.cart_product_name_'+id).val();
				var cart_product_image = $('.cart_product_image_'+id).val();
				var cart_product_price = $('.cart_product_price_'+id).val();
				var cart_product_qty = $('.cart_product_qty_'+id).val();
				var _token = $('input[name="_token"]').val();
				// alert(cart_product_name);

				$.ajax({
					url:'{{url('/add-cart-ajax')}}',
					method:'post',
					data:{cart_product_id:cart_product_id,cart_product_name:cart_product_name,cart_product_image:cart_product_image,cart_product_price:cart_product_price,cart_product_qty:cart_product_qty,_token:_token},
					success:function(data){
						swal({
							title: "Đã thêm sản phẩm vào giỏ hàng",
							type: "success",
							// text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
							showCancelButton: true,
							cancelButtonText: "Xem tiếp",
							confirmButtonClass: "btn-info",
							confirmButtonText: "Đi đến giỏ hàng",
							closeOnConfirm: false
							},
							function() {
							window.location.href = "{{url('/show-cart-ajax')}}";
							});
					}
				});
				// swal({
				// 	title: "Thêm vào giỏ hàng thành công!",
				// 	text: "Hãy vào giỏ hàng để thanh toán!",
				// 	icon: "success",
				// 	});
			});
		});
	</script>

</body>
</html>