<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductAndServiceController extends Controller
{
    public function index()
    {
        // if(request()->ajax()) {
        //     $datanya = ProductAndService::latest()->get();
        //     return DataTables::of($datanya)
        //         ->addIndexColumn()
        //         ->addColumn('action','productandservices._action')
        //         ->rawColumns(['action'])
        //         ->make(true);
        // }

        return view('admin.productandservices.index');
    }

    public function create()
    {
        // return view('admin.productandservices.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function edit($id)
    {
        // return view('admin.productandservices.edit');
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
