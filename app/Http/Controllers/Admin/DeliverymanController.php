<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DeliverymanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_name = "All Delivery Boy";
        $boys      = DB::table('users')->where('role_id','3')->orderBy('id','DESC')->get();
        return view('admin.delivery-boy.index', compact('page_name','boys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_name = "Add Delivery Boy";
        return view('admin.delivery-boy.create', compact('page_name'));
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
            'name' => 'required',
            'email' => 'required | unique:users',
            'phone' => 'required | regex:/^([0-9\s\-\+\(\)]*)$/ | min:11 | max:11'
        ],[
            'name.required' => 'Please Enter Name',
            'email.required' => 'Please Enter Email',
            'email.unique'   => 'This Email All Ready Taken',
            'phone.required' => "Please Enter Phone Number",
            'phone.rgex'     => "Phone Number Must Be Numeric",
            'phone.min'      => "Phone Number Must Be 11 Digit",
            'phone.max'      => "Phone Number Must Be 11 Digit",
        ]);

        $users = new User();
        $users->name     = $request->name;
        $users->email    = $request->email;
        $users->phone    = $request->phone;
        $users->password = Hash::make('1234');
        $users->role_id  = 3;

        $users->save();
        return redirect()->route('delivery-man.index')->with('success','Added Successful');
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
        $user = User::find($id);
        $user->delete();
        return back()->with('success','Removed Successful');
    }
}
