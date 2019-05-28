<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\Services\User\UserServiceInterface;
use App\Services\User\UserService;
use App\Http\Controllers\Redirect;
use Log;
use Validator;
use Input;
use Auth;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserServiceInterface $user)
    {
        $this->userService = $user;
    }

     /**
     * Customer Login
     *
     * Login action using user email and password
     * @param [Request] $request
     * @return [View] postlist
     */
    public function login(Request $request)
    {
        $email  =   $request->email;
        $pwd    =   $request->password;
        $validator = Validator::make($request->all(), [
            'email' =>  'required|email',
            'password'  =>  'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $row = $this->userService->login($email, $pwd);
        if ($row) {
            session(['login_name' => $row->name]);
            $authority = $row->type;
            return view('Post.postList', compact('authority'));
        } else {
            return redirect()->back()
                ->withErrors(['error' => "Email and password incorrect!"]);
            //    ->withinput(Input::all());
        }
    }

    /**
     * User Logout
     *
     * Logout action 
     * @param 
     * @return [View] login-form
     */
    public function logout()
    {
        Auth::logout();
        session()->forget('login_name');
        return redirect('/');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
