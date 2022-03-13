<?php

namespace App\Http\Controllers\Delivery;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeliveryboyController extends Controller
{
    public function index()
    {
        return view('delivery.index');
    }
}
