<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\chat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'message'   => 'required'
        ], [
            'message.required' => 'Message Not Empty'
        ]);

        $msg = new chat();
        $msg->user_id      = Auth::user()->id;
        $msg->delivery_boy = $request->delivery_boy;
        $msg->message      = $request->message;
        $msg->send_from    = 'user';
        $msg->save();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page_name = "Chat With Delivery Boy";
        $boy_id   = User::find($id);
        $msgs = DB::table('chats')
            ->where('user_id', Auth::user()->id)
            ->where('delivery_boy', $id)
            ->get();

        return view('user.chat.index', compact('page_name','boy_id', 'msgs'));
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
        //
    }
}
