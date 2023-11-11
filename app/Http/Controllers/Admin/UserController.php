<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // if(request()->ajax()) {
        //     $datanya = User::latest()->get();
        //     return DataTables::of($datanya)
        //         ->addIndexColumn()
        //         ->addColumn('action','users._action')
        //         ->rawColumns(['action'])
        //         ->make(true);
        // }

        return view('admin.users.index');
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function edit($id)
    {
        return view('admin.users.edit');
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
