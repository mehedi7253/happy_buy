<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_name = "All Category List";
        $categories = Category::all();
        return view('admin.category.index', compact('page_name', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_name = "Add New Category";
        return view('admin.category.create', compact('page_name'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'category_name'  => 'required',
            'url'            => 'required |unique:categories',
            'cat_banner'     => 'required | mimes:jpg,png,jpeg | max:7048'
        ],[
            'category_name.required'  => 'Please Enter Category Name',
            'url.required'            => 'Please Enter URL',
            'url.unique'              => 'This URL Allready Taken',
            'cat_banner.required'     => 'Please Select An banner',
            'cat_banner.mimes'        => 'Please Select Jpg,png,jpeg Type',
            'cat_banner.max'          => 'Please Select banner Less Then 8 Mb',
            'status.required'         => 'Please Select One'
        ]);

        $category = new Category();
        $category->category_name = $request->category_name;
        $category->url           = $request->url;
        $category->status        = $request->status;

        if ($request->hasFile('cat_banner')) {
            $file = $request->file('cat_banner');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move('category/images/', $fileName);
            $category->cat_banner = $fileName;
        } else {
            return $request;
            $category->cat_banner = '';
        }

        $category->save();
        return back()->with('success','Category Added Successful');

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
        $page_name = "Update Category Data";
        $category  = Category::find($id);
        return view('admin.category.edit', compact('page_name','category'));
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
        $this->validate($request, [
            'category_name'  => 'required',
            'cat_banner'     => 'mimes:jpg,png,jpeg | max:7048'
        ],[
            'category_name.required'  => 'Please Enter Category Name',
            'cat_banner.mimes'        => 'Please Select Jpg,png,jpeg Type',
            'cat_banner.max'          => 'Please Select banner Less Then 8 Mb',
            'status.required'         => 'Please Select One'
        ]);

        $category = Category::find($id);
        $category->category_name = $request->category_name;
        $category->status        = $request->status;

        if($request->cat_banner == ''){
            //
        }else{
            if ($request->hasFile('cat_banner')) {
                $file = $request->file('cat_banner');
                $extension = $file->getClientOriginalExtension();
                $fileName = time() . '.' . $extension;
                $file->move('category/images/', $fileName);
                $category->cat_banner = $fileName;
            } else {
                return $request;
                $category->cat_banner = '';
            }
        }

        $category->save();
        return redirect()->route('category.index')->with('success','Update Successful');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category  = Category::find($id);
        $category->delete();
        return back()->with('success','Remove Successful');
    }
}
