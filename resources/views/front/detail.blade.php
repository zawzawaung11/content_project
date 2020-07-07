@extends('layouts.front_layout')

@section('content')
		



		<div class="colorlib-shop">
			<div class="container">
				<div class="row row-pb-lg">
					<div class="col-md-10 col-md-offset-1">
						<div class="product-detail-wrap">
							<div class="row">
								<div class="col-md-5">
									<div class="product-entry">
										<div class="product-img" style="background-image: url({{asset('uploads/origin/'.$data->photo)}});">
											
										</div>
		
									</div>
								</div>
								<div class="col-md-7">
									<div class="desc">
										<h3>{{$data->name}}</h3>
										<p>{{$data->description}}</p>
										<a href="/" class="btn btn-success" role="button">back</a>
										</div>
								</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>


		


@endsection
