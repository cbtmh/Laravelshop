@extends('layout')
@section('content')
										
					@foreach ($details_product as $key => $details_product)
                        <div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="{{asset('public/uploads/product/'.$details_product->product_image)}}" alt="" />
								<h3>VIP</h3>
							</div>
							

						</div>
						<div class="col-sm-7">
							<div style="" class="product-information"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h2>{{$details_product->product_name}}</h2>
								<p>ID: {{$details_product->product_id}}</p>
								<img src="images/product-details/rating.png" alt="" />
								<form >
									@csrf
									<span  >
									<span>{{number_format($details_product->product_price)}} VNĐ</span>
									{{-- <label>Số lượng: </label> --}}
									{{-- <input name="qty" type="number" min="1" value="1" />
									<input name="productid_hidden" type="hidden" value="{{$details_product->product_id}}" /> --}}
									<input type="hidden" value="{{$details_product->product_id}}" class="cart_product_id_{{$details_product->product_id}}">
												<input type="hidden" value="{{$details_product->product_name}}" class="cart_product_name_{{$details_product->product_id}}">
												<input type="hidden" value="{{$details_product->product_image}}" class="cart_product_image_{{$details_product->product_id}}">
												<input type="hidden" value="{{$details_product->product_price}}" class="cart_product_price_{{$details_product->product_id}}">
												<input type="hidden" value="1" class="cart_product_qty_{{$details_product->product_id}}">
									<button style="margin-bottom: 10px" type="button" class="btn btn-default add-to-cart" data-id_product="{{$details_product->product_id}}" name="add-to-cart">Thêm vào giỏ hàng</button>
										<i class="fa fa-shopping-cart"></i>
										
									</button>
								</span>
								</form>
								<p><b>Tình trạng:</b> Còn hàng</p>
								<p><b>Điều kiện:</b> 100%</p>
								<p><b>Thương hiệu:</b> {{$details_product->brand_name}}</p>
								<p><b>Danh mục:</b> {{$details_product->category_name}}</p>
								<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
                    
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active" ><a href="#details" data-toggle="tab">Mô tả sản phẩm</a></li>
								<li><a href="#companyprofile" data-toggle="tab">Chi tiết sản phẩm</a></li>
								{{-- <li><a href="#tag" data-toggle="tab">Tag</a></li> --}}
								<li><a href="#reviews" data-toggle="tab">Đánh giá</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="details" >
								<p style="padding:20px">{!!$details_product->product_desc!!}</p>
							</div>
							
							<div class="tab-pane fade" id="companyprofile" >
								
								<p style="padding: 20px">{!!$details_product->product_content!!}</p>
								
							</div>
									<div class="tab-pane fade" id="reviews" >
										<div class="col-sm-12">
											<?php	$customer_id = Session::get('customer_id'); ?>
											<h3>Bình luận: </h3>@foreach ($rate_comment as $rateComment)
												<p style="color: #19830d">{{$rateComment->customer_name}}: {{$rateComment->comment}}</p>
												<input class="star star-{{$rateComment->rate}}" id="star-{{$rateComment->rate}}" type="radio" name="rate" disabled value="{{$rateComment->rate}}"/>
													@endforeach
													<?php $rateComment=  $rate_comment[0];?>
											<div style="margin-left: 20px" class="stars">
												<form action="{{URL::to('/rate-comment/'.$rateComment->product_id)}}" method="post">
													{{ csrf_field() }}
													<input class="star star-5" id="star-5" type="radio" name="rate" value="5"/>
													<label class="star star-5" for="star-5"></label>
													<input class="star star-4" id="star-4" type="radio" name="rate" value="4"/>
													<label class="star star-4" for="star-4"></label>
													<input class="star star-3" id="star-3" type="radio" name="rate" value="3"/>
													<label class="star star-3" for="star-3"></label>
													<input class="star star-2" id="star-2" type="radio" name="rate" value="2"/>   
													<label class="star star-2" for="star-2"></label>
													<input class="star star-1" id="star-1" type="radio" name="rate" value="1"/>
													<label class="star star-1" for="star-1"></label>
													<input type="hidden" name="customer_id" value="{{$customer_id}}">
													<div class="mb-3">
														<label for="exampleInputEmail1" class="form-label">Bình luận của bạn</label>
														<input type="text" name="comment" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
														<div id="emailHelp" class="form-text">Xin vui lòng để lại đánh giá sản phẩm.</div>
													</div>
													<button type="submit" class="btn btn-default">Submit</button>
												</form>
											</div>
										
										</div>
									</div>
						</div>	
							
							
							
						
					</div><!--/category-tab-->
                    @endforeach
					
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">Sản phẩm liên quan</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">	
									@foreach ($related_product as $key => $related)
										<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<form>
												{{-- {{ csrf_field() }} --}}
												@csrf
												<input type="hidden" value="{{$related->product_id}}" class="cart_product_id_{{$related->product_id}}">
												<input type="hidden" value="{{$related->product_name}}" class="cart_product_name_{{$related->product_id}}">
												<input type="hidden" value="{{$related->product_image}}" class="cart_product_image_{{$related->product_id}}">
												<input type="hidden" value="{{$related->product_price}}" class="cart_product_price_{{$related->product_id}}">
												<input type="hidden" value="1" class="cart_product_qty_{{$related->product_id}}">
												{{-- <input name="qty" type="hidden" value="1" />
												<input name="productid_hidden" type="hidden" value="{{$related->product_id}}"/> --}}
												<a  href="{{URL::to('chi-tiet-san-pham/'.$related->product_id)}}">
												<img src="{{asset('public/uploads/product/'.$related->product_image)}}" alt="" />
												<h2>{{number_format($related->product_price)}} VNĐ</h2>
												<p>{{$related->product_name}}</p>
												</a>
												
												<button style="margin-bottom: 10px" type="button" class="btn btn-default add-to-cart" data-id_product="{{$related->product_id}}" name="add-to-cart">Thêm vào giỏ hàng</button>
											</form>
										</div>
									
								</div>
							</div>
						</div>
									@endforeach
								</div>
                                
                                
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div><!--/recommended_items-->
@endsection