@extends('layouts.front_layout')

@section('content')
		

		<div class="colorlib-shop">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
						<h2><span>New Arrival</span></h2>
					</div>
				</div>
				<div class="row">
				
			@foreach($data as $product)	
					<div class="col-md-3 text-center">
						<div class="product-entry">
							<div class="product-img" style="background-image: url({{asset('uploads/origin/'.$product->photo)}});">
								<p class="tag"><span class="new">New</span></p>
								<div class="cart">
									<p>
										<span class="addtocart"><a href="/item_detail/{{$product->id}}"><i class="icon-search"> </i> More </a></span> 						
									</p>
								</div>
							</div>
							<div class="desc">
								<h3><a href="shop.html">{{$product->name}}</a></h3>
								<!--<p class="price"><span>{{number_format($product->price,2)}} $</</span></p>-->
							</div>
						</div>
					</div>
		@endforeach

				</div>
			</div>
		</div>
		
@endsection

