<?php

namespace App\Http\Controllers\Delivery;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;

class DeliveryboyController extends Controller
{
    public function index()
    {
        return view('delivery.index');
    }

    public function edit()
    {
        $page_name = "Update Profile";
        $user_data = Auth::user();
        return view('delivery.profile.edit', compact('user_data', 'page_name'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name'    => 'required | regex:/^[a-zA-Z-.\s]+$/',
            'phone'   => 'required|min:11|max:11 | regex:/^[-0-9\+]+$/',
            'address' => 'required',
            'image'   => 'mimes:jpg,png,jpeg|max:7048'
        ], [
            'name.required'      => 'please Enter First Name',
            'name.regex'         => 'Please Enter Only Character Value',
            'name.required'      => 'please Enter Last Name',
            'phone.required'     => 'please Enter Phone Number',
            'phone.min'          => 'Phone Number Must Be 11 Digit',
            'phone.max'          => 'Phone Number Must Be 11 Digit',
            'phone.regex'        => 'Phone Number Must Be 11 Digit Long Numeric Value',
            'address.required'   => 'please Enter address',
            'image.mimes'        => 'Image Must Be jpg, jpeg, png'
        ]);

        $profile = Auth::user();
        $profile->name    = $request->name;
        $profile->phone   = $request->phone;
        $profile->address = $request->address;

        if ($request->image == '') {
            // $office->update($request->all());
            // $office->save();
        } else {
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $fileName = time() . '.' . $extension;
                $file->move('user/images/', $fileName);
                $profile->image = $fileName;
            } else {
                return $request;
                $profile->image = '';
            }
        }

        $profile->save();
        return back()->with('success', 'Profile Update Successful');
    }

    public function changePass()
    {
        $page_name = "Change Your Password";
        $users = User::find(Auth::user()->id);
        return view('delivery.profile.changepassword', compact('page_name', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);

        return back()->with('success', 'Password Change Successful');
    }
}
