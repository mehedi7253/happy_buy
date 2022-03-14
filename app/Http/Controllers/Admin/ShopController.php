<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_name = "All Shop";
        $shops     = shop::all();
        return view('admin.shop.index', compact('page_name','shops'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_name = "Add New Shop";
        return view('admin.shop.create', compact('page_name'));
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
            'shop_name'    => 'required',
            'location'     => 'required',
            'phone_number' => 'required | regex:/^([0-9\s\-\+\(\)]*)$/ | min:11 | max:11',
            'shop_info'    => 'required',
            'imageFile'    => 'required',
            'imageFile.*'  => 'mimes:jpeg,jpg,png|max:7048'
        ],[
            'shop_name.required'    => "Please Enter Shop Name",
            'location.required'     => "Please Enter Shop Location",
            'phone_number.required' => "Please Enter Phone Number",
            'phone_number.rgex'     => "Phone Number Must Be Numeric",
            'phone_number.min'      => "Phone Number Must Be 11 Digit",
            'phone_number.max'      => "Phone Number Must Be 11 Digit",
            'shop_info.required'    => "Please Enter Shop Info",
            'imageFile.required'    => 'Please Select Image',
            'imageFile.mimes'       => 'Please Select Jpg, Png, Jpeg File',
            'imageFile.mimes'       => 'Please Select Less Then 7MB File',
        ]);

        $shop  = new shop();
        $shop->shop_name     = $request->shop_name;
        $shop->location      = $request->location;
        $shop->phone_number  = $request->phone_number;
        $shop->shop_info     = $request->shop_info;
        $shop->status        = $request->status;
        $shop->google_map    = $request->google_map;


        if($request->hasfile('imageFile')) {
            foreach($request->file('imageFile') as $file)
            {
                $name = $file->getClientOriginalName();
                $file->move(public_path().'/shop/', $name);
                $imgData[] = $name;
            }
            $shop->name       = json_encode($imgData);
            $shop->image_path = json_encode($imgData);
        }

        $shop->save();
        return back()->with('success','Shop Added Successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shop = shop::find($id);
        return view('admin.shop.show', compact('shop'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shop = shop::find($id);
        return view('admin.shop.edit', compact('shop'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shop = shop::find($id);
        $shop->delete();
        return back()->with('success','Remove Successful');
    }
}
