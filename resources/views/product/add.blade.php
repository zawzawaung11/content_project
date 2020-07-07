@extends('layouts.app')

@section('content')

<div class="container">
<div class="col-md-8">
	<div class="card">
			  <div class="card-header">
				Entry Product Record
			  </div>
			  
			  <div class="container">
			  <div class="col-md-12 mt-3 mb-3">
				<form action="/product/store" method="post" enctype="multipart/form-data">
				@csrf
				  <div class="form-group row">
				  <label class="col-sm-4 col-form-label">Name</label>
				  <div class="col-sm-8">
					<input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="Enter product name">
				  </div>	
				  </div>
				  
				<div class="form-group row">
				  <label class="col-sm-4 col-form-label">Description</label>
				  <div class="col-sm-8">
					<textarea  name="description" class="form-control" rows="2"> </textarea>
				  </div>	
				  </div>    
				  
				<div class="form-group row">
				  <label class="col-sm-4 col-form-label">Price</label>
				  <div class="col-sm-8">
					<input type="number" class="form-control" name="price" value="{{old('price')}}" placeholder="Enter price">
				  </div>	
				  </div> 

				<div class="form-group row">
				  <label class="col-sm-4 col-form-label">Category</label>
				  <div class="col-sm-8">
							<select name="category" class="form-control">
							  <option value="pc">PC</option>
							  <option value="xbox">Xbox</option>
							  <option value="playstation">Play Station</option>
							</select>

				  </div>	
				  </div>  

				<div class="form-group row">
				  <label class="col-sm-4 col-form-label">Cover Photo</label>
				  <div class="col-sm-8">
					 <input type="file" name="photo" >
					
				  </div>	
				  </div>   				  
	

				  <button type="submit" class="btn btn-primary mr-3">Submit</button>
				  
				  <a href="/dashboard">Cancel</a>
				</form>
			</div>		
			 </div>
				 
	</div>
</div>
</div>

@endsection