<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        if(request()->ajax()) {
            $datanya = Post::latest()->get();
            return DataTables::of($datanya)
                ->addIndexColumn()
                ->addColumn('action','admin.posts._action')
                ->toJson();
        }

        return view('admin.posts.index');
    }

    public function create()
    {
        $data = [
            'post_title' => '',
            'post_content' => '',
            'post_status' => '',
            'post_category_id' => '',
            'post_author' => '',
            'post_views' => '',
            'tags' => '',
            'foto_sampul' => '',
            'created_at' => '',
            'updated_at' => '',
            'action' => route('admin.posts.store'),
            'method' => 'POST',
            'post_category' => PostCategory::all(),
        ];
        return view('admin.posts.form', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'post_title' => 'required',
            'post_content' => 'required',
            'post_status' => 'required',
            'post_category_id' => 'required',
            'post_author' => 'required',
            'post_views' => 'required',
            'created_at' => 'required',
            'tags' => 'required',
        ]);

        // dd($request->all());

        // $post = Post::create($request->all());

        // if($request->hasFile('foto_sampul')) {
        //     $image = $request->file('foto_sampul');
        //     $image_name = time() . '.' . $image->getClientOriginalExtension();
        //     // upload to storage/app/public/posts
        //     Storage::disk('public')->put('posts/' . $image_name, file_get_contents($image));
        //     // update the image name
        //     $post->update(['foto_sampul' => $image_name]);
        // }

        // return redirect()->route('admin.posts.index')->with('success', 'Post created successfully.');
    }

    public function edit($id)
    {
        // return view('admin.posts.edit');
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function upload_image(Request $request)
    {
        if($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $randomname = Str::random($length=10);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $randomname . '.' . $extension;

            $request->file('upload')->storeAs('public/posts', $fileName);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('storage/posts/'.$fileName);
            $msg = 'Image uploaded successfully';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            return response()->json([
                'uploaded' => true,
                'url' => $url
            ]);
        }
    }
}
