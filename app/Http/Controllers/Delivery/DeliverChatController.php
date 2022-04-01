<?php

namespace App\Http\Controllers\Delivery;

use App\Http\Controllers\Controller;
use App\Models\chat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DeliverChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_name = "Chat List";
        $lists = DB::table('chats')
                ->join('users','users.id', 'chats.user_id')
                ->where('delivery_boy', Auth::user()->id)
                ->groupBy('user_id')
                ->get();

        return view('delivery.chat.index', compact('page_name','lists'));
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
        $msg->delivery_boy = Auth::user()->id;
        $msg->user_id      = $request->user_id;
        $msg->message      = $request->message;
        $msg->send_from    = 'boy';
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
        $page_name = "Reply Your Message";
        $user_id   = User::find($id);
        $msgs = DB::table('chats')
            ->where('delivery_boy', Auth::user()->id)
            ->where('user_id', $id)
            ->get();

        return view('delivery.chat.message', compact('page_name', 'user_id', 'msgs'));
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
