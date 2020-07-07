@extends('layouts.app')

@section('content')

<div class="container">
<div class="col-md-8">
	<div class="card">
			  <div class="card-header">
				Edit Product Record
			  </div>
			  
			  <div class="container">
			  <div class="col-md-12 mt-3 mb-3">
				<form action="/product/update" method="post" enctype="multipart/form-data">
				@csrf
				<input type="hidden" name="id" value="{{$data->id}}">
				<div class="form-group row">
				  <div class="col-sm-4 col-form-label"> 
				  <img src="{{asset('uploads/thumbs/'.$data->photo)}}" />
				  </div>
				</div>
				
				
				  <div class="form-group row">
				  <label class="col-sm-4 col-form-label">Name</label>
				  <div class="col-sm-8">
					<input type="text" class="form-control" name="name" value="{{$data->name}}" placeholder="Enter product name">
				  </div>	
				  </div>
				  
				<div class="form-group row">
				  <label class="col-sm-4 col-form-label">Description</label>
				  <div class="col-sm-8">
					<textarea  name="description" class="form-control" rows="2"> {{$data->description}} </textarea>
				  </div>	
				  </div>    
				  
				<div class="form-group row">
				  <label class="col-sm-4 col-form-label">Price</label>
				  <div class="col-sm-8">
					<input type="number" class="form-control" name="price" value="{{$data->price}}" placeholder="Enter price">
				  </div>	
				  </div> 

				<div class="form-group row">
				  <label class="col-sm-4 col-form-label">Category</label>
				  <div class="col-sm-8">
							<select name="category" class="form-control">
							  <option value="pc" {{($data->category=="pc")? "selected" : "" }}>PC</option>
							  <option value="xbox" {{($data->category=="xbox")? "selected" : "" }}>Xbox</option>
							  <option value="playstation" {{($data->category=="playstation")? "selected" : "" }}>Play Station</option>
							</select>

				  </div>	
				  </div>  

				<div class="form-group row">
				  <label class="col-sm-4 col-form-label">Cover Photo</label>
				  <div class="col-sm-8">
					 <input type="file" name="photo" >
					
				  </div>	
				  </div>   				  
	

				  <button type="submit" class="btn btn-primary mr-3">Update</button>
				  
				  <a href="/dashboard">Cancel</a>
				</form>
			</div>		
			 </div>
				 
	</div>
</div>
</div>

@endsection