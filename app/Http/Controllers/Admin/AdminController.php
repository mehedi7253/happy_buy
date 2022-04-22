<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $today = @date('Y-m-d');
        $month = date('m');

        $monthly_earn = DB::table('orders')
            ->whereMonth('created_at', '=', $month)
            ->sum('amount');

        $orders = order::select("id", "created_at", DB::raw("(sum(amount)) as Total"), DB::raw("(DATE_FORMAT(created_at, '%d')) as day"))
            ->orderBy('created_at')
            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%d')"))
            ->whereMonth('created_at', '=', $month)
            ->get();

        $neworder = DB::table('orders')
            ->where('process_status', '=', '1')
            ->count();

        $boy = User::all()->where('role_id', '=', '3')->count();

        $members = User::all()->where('role_id', '=', '2')->count();

        return view('admin.index', compact('orders', 'monthly_earn', 'neworder', 'members', 'boy'));
    }
    public function customer(){
        $page_name = "All Customer's List";
        $customers = User::all()->where('role_id','2');
        return view('admin.users.index', compact('page_name','customers'));
    }


}
