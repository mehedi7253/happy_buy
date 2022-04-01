@extends('includes.app')
    @section('content')
        <div class="col-md-12 col-sm-12 mb-5">
            <div class="card">
                <div class="card-header">
                    <h3>{{ $page_name }}</h3>
                </div>
                <div class="card-body" style="margin: 5px; padding: 5px; height: 500px; overflow: auto;">
                     @foreach ($msgs as $msg)
                        @if($msg->send_from == 'user')
                            <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <img src="{{ asset('user/images/'.Auth::user()->image) }}" style="height: 50px; width: 50px; border-radius: 50%;">
                                </div>
                                <textarea class="font-weight-bold form-control" disabled style="height: 56px; border-radius: 16px; margin-left: 8px; margin-top: 10px"> {{ $msg->message }}</textarea>
                            </div>
                            <p class="text-dark float-right" style="font-size: 9px">{{ $msg->created_at }}</p>
                        @elseif($msg->send_from ==  'boy')
                            <div class="form-group input-group">
                                <textarea class="font-weight-bold form-control" disabled style="height: 56px; border-radius: 16px; margin-left: 8px; margin-top: 10px">{{ $msg->message }}</textarea>
                                <div class="input-group-prepend">
                                    <img src="{{ asset('user/images/'.$boy_id->image) }}" style="height: 50px; width: 50px; border-radius: 50%;">
                                </div>
                            </div>
                            <p class="text-dark float-left" style="font-size: 9px">{{ $msg->created_at }}</p>
                        @endif
                    @endforeach
                </div>
                <div class="card-footer">
                    <form action="{{ route('chats.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group input-group">
                            <input name="delivery_boy" value="{{ $boy_id->id }}" hidden>
                            <input type="text" name="message" placeholder="Write Message...." class="form-control">
                            <div class="input-group-prepend">
                                <button type="submit" name="btn" class="btn btn-skype"><i class="fa fa-paper-plane" style="color: #0a2d6c"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
