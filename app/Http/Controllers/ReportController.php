<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $table = [
            'stock_in' => 'Stock In',
            'stock_out' => 'Stock Out',
            'borrow' => 'Borrow',
            'supplier' => 'Supplier',
            'item' => 'Item',
            'user' => 'User',
            'role' => 'Roles',
        ];
        return view('laporan.index')
                ->with('table', $table);
    }
}
