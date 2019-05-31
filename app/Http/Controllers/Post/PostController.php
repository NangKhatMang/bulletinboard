<?php

namespace App\Http\Controllers\Post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\Services\Post\PostServiceInterface;
use App\Services\Post\PostService;
use Auth;
use Validator;
use App\Models\Post;

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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getUserPost()
    {
        $userId = Auth::user()->id;
        $type = Auth::user()->type;
        $posts = $this->postService->getUserPost($userId, $type);
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
        $title  =   $request->title;
        $desc   =   $request->desc;
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
        $userId =   Auth::user()->id;
        $post   =   new Post;
        $post->title  =   $request->title;
        $post->desc   =   $request->desc;
        $insertCommand = $this->postService->store($userId, $post);
        return redirect()->intended('posts');
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
        $posts  = $this->postService->searchPost($searchKeyword);
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
        $post->id    = $postId;
        $post->title = $request->title;
        $post->desc  = $request->desc;
        $updateCommand = $this->postService->update($userId, $post);
        return redirect()->intended('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($postId)
    {
        //$postDetail = Post::find($postId);
        //$date = date('Y-m-d H:i:s');
        //$now  = now();
        //$carbon = Carbon::now();
        //var_dump($date,$now,$carbon);die();
        $userId = Auth::user()->id;
        $deletePost = $this->postService->destory($userId, $postId);
        return redirect()->intended('posts');
    }
}
