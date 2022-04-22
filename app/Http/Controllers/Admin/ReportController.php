<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        $page_name = "Monthly Report";
        $orders = order::all();
        return view('admin.report.index', compact('page_name', 'orders'));
    }

    public function search(Request $request)
    {
        $month = date('m');
        // return $month;
        $page_name = "Monthly Report";
        $search = $request->get('search');
        $data = DB::table('orders')
            ->whereMonth('created_at', '=', $search)
            ->where('status', 'Processing')
            ->get();

        if (count($data) > 0) {
            $total = DB::table('orders')
                ->whereMonth('created_at', '=', $search)
                ->where('status', 'Processing')
                ->sum('amount');
        } else {
            $total = 0;
        }
        return view('admin.report.index', compact('data', 'page_name', 'total'));
    }
}
