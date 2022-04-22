<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_name = "All Product";
        $products   = Product::all();
        return view('admin.product.index', compact('page_name','products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_name = "Add New Products";
        $categories   = Category::all()->where('status','0');
        return view('admin.product.create', compact('page_name','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'category_id'   => 'required',
            'product_name'  => 'required',
            'product_price' => 'required',
            'description'   => 'required',
            'type'          => 'required',
            'banner'        => 'required |mimes:jpeg,jpg,png,webp|max:7048',
            'imageFile.*'  => 'mimes:jpeg,jpg,png,webp|max:7048',
        ],[
            'category_id.required'   => "Please Enter Category",
            'product_name.requried'  => "Please Enter Prodcut Name",
            'product_price.required' => "Please Enter Product Price",
            'description.required'   => "Please Enter Product Description",
            'type.required'          => "Please Select Type",
            'banner.required'        => "Please Select an Banner",
            'banner.mimes'           => 'Please Select Jpg, Png, Jpeg File',
            'banner.mimes'           => 'Please Select Less Then 7MB File',
            'imageFile.mimes'        => 'Please Select Jpg, Png, Jpeg File',
            'imageFile.mimes'        => 'Please Select Less Then 7MB File',
        ]);
        $product = new Product();
        $product->category_id    = $request->category_id;
        $product->product_name   = $request->product_name;
        $product->product_price  = $request->product_price;
        $product->description    = $request->description;
        $product->status         = $request->status;
        $product->type           = $request->type;
        $product->special_price  = $request->special_price;
        if ($request->hasFile('banner')) {
            $file = $request->file('banner');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move('product/', $fileName);
            $product->banner = $fileName;
        } else {
            return $request;
            $product->banner = '';
        }
       if($request->imageFile == ''){
           //
       }else{
        if($request->hasfile('imageFile')) {
            foreach($request->file('imageFile') as $file)
            {
                $name = $file->getClientOriginalName();
                $file->move(public_path().'/product/', $name);
                $imgData[] = $name;
            }
            $product->name       = json_encode($imgData);
            $product->image_path = json_encode($imgData);
        }
       }

       $product->save();
       return back()->with('success','Product Added Successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page_name = "Product Details";
        $product   = Product::find($id);
        return view('admin.product.show', compact('page_name','product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page_name = "Update Product Details";
        $categories   = Category::all()->where('status','0');
        $product   = Product::find($id);
        return view('admin.product.edit',compact('page_name','product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'category_id'   => 'required',
            'product_name'  => 'required',
            'product_price' => 'required',
            'description'   => 'required',
            'imageFile.*'  => 'mimes:jpeg,jpg,png,webp|max:7048',
        ],[
            'category_id.required'   => "Please Enter Category",
            'product_name.requried'  => "Please Enter Prodcut Name",
            'product_price.required' => "Please Enter Product Price",
            'description.required'   => "Please Enter Product Description",
            'imageFile.mimes'        => 'Please Select Jpg, Png, Jpeg File',
            'imageFile.mimes'        => 'Please Select Less Then 7MB File',
        ]);

        $product = Product::find($id);
        $product->category_id    = $request->category_id;
        $product->product_name   = $request->product_name;
        $product->product_price  = $request->product_price;
        $product->description    = $request->description;
        $product->status         = $request->status;
        $product->type           = $request->type;
        $product->special_price  = $request->special_price;

       if($request->imageFile == ''){
           //
       }else{
        if($request->hasfile('imageFile')) {
            foreach($request->file('imageFile') as $file)
            {
                $name = $file->getClientOriginalName();
                $file->move(public_path().'/product/', $name);
                $imgData[] = $name;
            }
            $product->name       = json_encode($imgData);
            $product->image_path = json_encode($imgData);
        }
       }

       $product->save();
       return redirect()->route('product.index')->with('success','Product Data Update Successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return back()->with('success','Product Removed Successful');
    }
}
