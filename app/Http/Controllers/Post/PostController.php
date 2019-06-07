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
    public function getUserPost()
    {
        $userId = Auth::user()->id;
        $type   = Auth::user()->type;
        $posts  = $this->postService->getUserPost($userId, $type);
        return view('Post.postList', compact('posts'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->postService->getPost();
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
        $userId =  Auth::user()->id;
        $post   =  new Post;
        $post->title    =  $request->title;
        $post->desc     =  $request->desc;
        $posts  =  $this->postService->store($userId, $post);
        return view('Post.postList', compact('posts'));
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
        $postDetail = $this->postService->editPost($postId);
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
        return view('Post.postList', compact('posts'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($postId)
    {
        $userId = Auth::user()->id;
        $deletePost = $this->postService->destory($userId, $postId);
        return redirect()->intended('posts');
    }
    //export excel
    public function export() 
    {
        return Excel::download(new PostsExport, 'posts.csv');
    }

    //import csv file
    public function import(Request $request) 
    {
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
        if (($handle = fopen(public_path().'/upload/'.$fileName, 'r')) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ',' )) !== FALSE ) {
                $post = new Post;
                $post->id = (int)$data [0];
                $post->title = $data [1];
                $post->description = $data [2];
                $post->status = (int)$data [3];
                $post->create_user_id = (int)$data [4];
                $post->updated_user_id = (int)$data [5];
                $post->deleted_user_id = (int)$data [6];
                $post->created_at = strtotime($data [7]);
                $post->updated_at = strtotime($data [8]);
                //$post->deleted_at = strtotime($data [9]);
                $post->save ();
                }
            fclose($handle);
        }
        return redirect()->intended('posts');
    }
}
