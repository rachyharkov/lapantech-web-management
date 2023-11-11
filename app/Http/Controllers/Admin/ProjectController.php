<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        // if(request()->ajax()) {
        //     $datanya = Project::latest()->get();
        //     return DataTables::of($datanya)
        //         ->addIndexColumn()
        //         ->addColumn('action','projects._action')
        //         ->rawColumns(['action'])
        //         ->make(true);
        // }

        return view('admin.projects.index');
    }

    public function create()
    {
        // return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function edit($id)
    {
        // return view('admin.projects.edit');
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
