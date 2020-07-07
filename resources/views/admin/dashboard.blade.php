@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
	<div class="col-md-3 mb-3">
	<div class="card mb-3">
			  <div class="card-header">
				Welcome <b>{{ Auth::user()->name }} </b>
			  </div>
			  <ul class="list-group list-group-flush">
				<li class="list-group-item"><a href="/dashboard">Product List</a></li>
				<li class="list-group-item"><a href="/product/add">Add Product</a></li>
			  </ul>
			</div>
			
		    <div class="card p-3">
			<form class="form-inline active-cyan-4" action="/product/search" method="get">
			  <input class="form-control form-control-sm mr-3 w-75" type="text" placeholder="Search"
				aria-label="Search" name="search">			   
			   <button type="submit" class="btn btn-success btn-sm btn-rounded"><i class="fa fa-search"
				aria-hidden="true"></i></button>			   
			</form>
			</div>		
			
	</div>
        <div class="col-md-9">
			 <table class="table table-hover">
			  <thead>
				<tr>
				  <th scope="col">#</th>
				  <th scope="col">Photo</th>
				  <th scope="col">Name</th>
				  <th scope="col">Category</th>
				  <th scope="col">Price</th>
				  <th scope="col">Action</th>
				</tr>
			  </thead>
			  <tbody>
			  <?php $i = -4; $skipped = $data->currentPage() * $data->perPage(); ?>
			  @foreach($data as $product)

				<tr>
				  <th scope="row">
					{{ $skipped + $i }}
				    <?php $i++; ?>
				  </th>
				  <td> 
				   <img src="{{asset('uploads/thumbs/'.$product->photo)}}" />
				  </td>
				  <td>{{$product->name}}</td>
				  <td>{{$product->category}}</td>
				  <td>{{number_format($product->price,2)}} $</td>
				  <td>

				  <a href="/product/edit/{{$product->id}}">	
				  <i class="fa fa-edit mr-3"></i>
				  </a>
				  
				  <a href="/product/delete/{{$product->id}}" class="del">	
				  <i class="fa fa-trash"></i>
				  </a>  

				  
				  </td>
				</tr>
			@endforeach
			  </tbody>
			</table>
			{{ $data->links() }}
        </div>
    </div>
</div>
@endsection

@section('extra-script')
<script>  
$(document).ready(function(){
  $(".del").click(function(){
    if (!confirm("Do you want to delete this item?")){
      return false;
    }
  });
});
</script>
@endsection
