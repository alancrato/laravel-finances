<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class StatementsController extends Controller
{
    /**
     * StatementsController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.statements');
    }
}
