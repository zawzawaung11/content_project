<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

use Illuminate\Support\Facades\Validator;

use Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
	
		public function search(Request $request)
    {
       
	     $search = $request->get("search");

         $product= Product::orderBy('created_at','desc')
		 ->where('name','like','%'.$search.'%')
		 ->orWhere('category','like','%'.$search.'%')
		 ->orWhere('price','like','%'.$search.'%')
		 ->paginate(5);
		 
		 return view('admin.dashboard',['data'=>$product]);
	   
	   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		return view('product.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
	     $validator = Validator::make($request->all(), [
         'name' => 'required',
		 'description' => 'required',
		 'price' => 'required',
		 'category' => 'required',
		 'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }		
		
		   $file = $request->file('photo');
		   $filename = $file->getClientOriginalName();
		   $img = Image::make($file);
		   $img->save(public_path('uploads/origin/'.$filename));
		   $img->fit(80, 80)->save(public_path('uploads/thumbs/'.$filename));

		$product = new Product;
		$product->name = $request->input('name');
		$product->description = $request->input('description');
		$product->price = $request->input('price');
		$product->category = $request->input('category');
		$product->photo = $filename;
		$product->save();
		
		return redirect('dashboard')->with('toast_success','Product created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

		$product = Product::find($id);
		
		return view('product.edit',['data'=>$product]);	
		
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
		 $validator = Validator::make($request->all(), [
         'name' => 'required',
		 'description' => 'required',
		 'price' => 'required',
		 'category' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }	

	if($request->hasFile('photo')){
		   $file = $request->file('photo');
		   $filename = $file->getClientOriginalName();
		   $img = Image::make($file);
		   $img->save(public_path('uploads/origin/'.$filename));
		   $img->fit(80, 80)->save(public_path('uploads/thumbs/'.$filename));
		
		$product = Product::find($request->id);
		$product->name = $request->input('name');
		$product->description = $request->input('description');
		$product->price = $request->input('price');
		$product->category = $request->input('category');
		$product->photo = $filename;
		$product->save();
	}

    else
	{

		$product = Product::find($request->id);
		$product->name = $request->input('name');
		$product->description = $request->input('description');
		$product->price = $request->input('price');
		$product->category = $request->input('category');
		$product->save();

	}		
	
		return redirect('dashboard')->with('toast_success','Product updated!');
		
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
		$product = Product::find($id);
		$product->delete();
		
		return redirect('dashboard')->with('toast_success','Product deleted!');
    }
}
