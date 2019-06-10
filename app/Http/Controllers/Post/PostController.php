<?php

namespace App\Http\Controllers\Post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\Services\Post\PostServiceInterface;
use App\Services\Post\PostService;
use Auth;
use Validator;
use App\Models\Post;
use Illuminate\Support\Facades\Input;
use App\Exports\PostsExport;
use Maatwebsite\Excel\Facades\Excel;

class PostController extends Controller
{
    private $postService;

    public function __construct(PostServiceInterface $post)
    {
        $this->postService = $post;
    }

    public function showRegisterForm()
    {
        return view('Post.create');
    }

    public function showUploadForm()
    {
        return view('Post.upload');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authId = Auth::user()->id;
        $type   = Auth::user()->type;
        session()->forget(['searchKeyword']);
        $posts = $this->postService->getPost($authId, $type);
        return view('Post.postList', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' =>  'required|max:255',
            'desc'  =>  'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $title  =  $request->title;
        $desc   =  $request->desc;
        return view('Post.createConfirm', compact('title', 'desc'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $authId =  Auth::user()->id;
        $post   =  new Post;
        $post->title    =  $request->title;
        $post->desc     =  $request->desc;
        $posts  =  $this->postService->store($authId, $post);
        return view('Post.postList',compact('posts'))->withSuccess('Post create successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $searchKeyword = $request->search;
        $posts = $this->postService->searchPost($searchKeyword);
        session ([
            'searchKeyword' => $searchKeyword
        ]);
        return view('Post.postlist', compact('posts'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($postId)
    {
        $postDetail = $this->postService->postDetail($postId);
        return view('Post.edit', compact('postDetail'));
    }

    /**
     * Update Confirm the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editConfirm(Request $request, $postId)
    {
        $title  =   $request->title;
        $desc   =   $request->desc;
        $validator = Validator::make($request->all(), [
            'title' =>  'required|max:255',
            'desc'  =>  'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        return view('Post.update', compact('title', 'desc', 'postId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $postId)
    {
        $userId =   Auth::user()->id;
        $post   =   new Post;
        $post->id       =  $postId;
        $post->title    =  $request->title;
        $post->desc     =  $request->desc;
        $posts  =  $this->postService->update($userId, $post);
        return view('Post.postList', compact('posts'))->withSuccess('Post update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function softDelete($postId)
    {
        $authId = Auth::user()->id;
        $deletePost = $this->postService->softDelete($authId, $postId);
        return redirect()->intended('posts');
    }
    //export excel
    public function export() 
    {
        return Excel::download(new PostsExport, 'posts.xlsx');
    }

    //import csv file
    public function import(Request $request) 
    {
        $authId = Auth::user()->id;
        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:csv,txt|max:2048'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        $file->move('upload', $fileName);
        $filepath = public_path().'/upload/'.$fileName;
        $import = $this->postService->import($authId, $filepath);
        return redirect()->intended('posts')->withSuccess('Csv file upload successfully.');
    }
}
