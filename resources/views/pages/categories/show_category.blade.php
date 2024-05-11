@extends('layout')
@section('content')
    

<div class="features_items"><!--features_items-->
                        @foreach ($category_name as $category)
						    <h2 class="title text-center">{{$category->category_name}}</h2>                            
                        @endforeach
						@foreach ($category_by_id as $key => $product)
					<a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}">						
							<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<form>
												{{-- {{ csrf_field() }} --}}
												@csrf
												<input type="hidden" value="{{$product->product_id}}" class="cart_product_id_{{$product->product_id}}">
												<input type="hidden" value="{{$product->product_name}}" class="cart_product_name_{{$product->product_id}}">
												<input type="hidden" value="{{$product->product_image}}" class="cart_product_image_{{$product->product_id}}">
												<input type="hidden" value="{{$product->product_price}}" class="cart_product_price_{{$product->product_id}}">
												<input type="hidden" value="1" class="cart_product_qty_{{$product->product_id}}">
												{{-- <input name="qty" type="hidden" value="1" />
												<input name="productid_hidden" type="hidden" value="{{$product->product_id}}"/> --}}
												<a  href="{{URL::to('chi-tiet-san-pham/'.$product->product_id)}}">
												<img src="{{asset('public/uploads/product/'.$product->product_image)}}" alt="" />
												<h2>{{number_format($product->product_price)}} VNĐ</h2>
												<p>{{$product->product_name}}</p>
												</a>
												
												<button style="margin-bottom: 10px" type="button" class="btn btn-default add-to-cart" data-id_product="{{$product->product_id}}" name="add-to-cart">Thêm vào giỏ hàng</button>
											</form>
										</div>
									
								</div>
								
							</div>
						</div>
					</a>
						@endforeach
						
					</div><!--features_items-->

                    



@endsection