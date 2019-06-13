<?php

namespace App\Http\Controllers\Post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\Services\Post\PostServiceInterface;
use App\Services\Post\PostService;
use Auth;
use Validator;
use App\Models\Post;
use App\Models\User;
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

    /**
     * Show post registrarrion form.
     */
    public function showRegisterForm()
    {
        return view('Post.create');
    }

    /**
     * Show file upload form.
     */
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
        $auth_id = Auth::user()->id;
        $type    = Auth::user()->type;
        session()->forget([
            'searchKeyword', 
            'title', 
            'desc'
        ]);
        $posts = $this->postService->getPost($auth_id, $type);
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
            'title' =>  'required|max:255|unique:posts,title', 
            'desc'  =>  'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $title  =  $request->title;
        $desc   =  $request->desc;
        session([
            'title' => $title, 
            'desc'  => $desc
        ]);
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
        $auth_id =  Auth::user()->id;
        $post    =  new Post;
        $post->title = $request->title;
        $post->desc  = $request->desc;
        $posts   =  $this->postService->store($auth_id, $post);
        return view('Post.postList', compact('posts'))->withSuccess('Post create successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $auth_id   = Auth::user()->id;
        $auth_type = Auth::user()->type;
        $search_keyword = $request->search;
        $posts     = $this->postService->searchPost($search_keyword, $auth_id, $auth_type);
        session ([
            'searchKeyword' => $search_keyword
        ]);
        return view('Post.postlist', compact('posts'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($post_id)
    {
        $post = Post::find($post_id);
        $user = User::where('id', '=', $post->create_user_id)
            ->select('name')
            ->first();
        return response()->json(['post' => $post, 'user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($post_id)
    {
        $post_detail = $this->postService->postDetail($post_id);
        return view('Post.edit', compact('post_detail'));
    }

    /**
     * Update Confirm the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editConfirm(Request $request, $post_id)
    {
        $post   =   Post::find($post_id);
        $title  =   $request->title;
        $desc   =   $request->desc;
        $validator  = Validator::make($request->all(), [
            'title' =>  'required|max:255|unique:posts,title,' . $post->id, 
            'desc'  =>  'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        return view('Post.update', compact('title', 'desc', 'post_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $post_id)
    {
        $user_id  =  Auth::user()->id;
        $post     =  new Post;
        $post->id     =  $post_id;
        $post->title  =  $request->title;
        $post->desc   =  $request->desc;
        $posts    =  $this->postService->update($user_id, $post);
        return view('Post.postList', compact('posts'))->withSuccess('Post update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $post_id = $request->post_id;
        $auth_id = Auth::user()->id;
        $delete_post = $this->postService->softDelete($auth_id, $post_id);
        return redirect()->intended('posts')->with('success', 'Post delete successfully.');
    }
    /**
     * export excel file
     *
     * @return \Illuminate\Http\Response
     */
    public function export() 
    {
        return Excel::download(new PostsExport, 'posts.xlsx');
    }

    /**
     * import excel file
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request) 
    {
        $auth_id   = Auth::user()->id;
        $validator = Validator::make($request->all(), [
            'file' => 'required|max:2048'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $file = $request->file('file');
        //validate type of file
        $extension = $file->getClientOriginalExtension();
        if ($extension != 'csv') {
            return redirect()->back()->withInvalid('The file must be a file of type: csv.');
        }
        //upload csv file
        $fileName = $file->getClientOriginalName();
        $file->move('upload', $fileName);
        $filepath = public_path() . '/upload/' . $fileName;

        $import_csv_file = $this->postService->import($auth_id, $filepath);
        return redirect()->intended('posts')->withSuccess('Csv file upload successfully.');
    }
}
