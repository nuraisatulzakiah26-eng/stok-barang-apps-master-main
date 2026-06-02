<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\suppliers;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = suppliers::all();
        return view('admin.material.supplier', compact('suppliers'));
    }
}
