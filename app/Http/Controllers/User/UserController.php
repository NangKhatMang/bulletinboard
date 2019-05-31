<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\Services\User\UserServiceInterface;
use App\Services\User\UserService;
use App\Http\Controllers\Redirect;
use App\Models\User;
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

    public function showRegisterForm()
    {
        //session()->forget('pwd-not-match');
        return view('User.create');
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
        if (Auth::guard('')->attempt(['email' => $email, 'password' => $pwd])) {
            return redirect()->intended('/post/user');
        } else {
            return redirect()->back()
                ->withErrors(['incorrect' => "Email and password incorrect!"]);
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
        return redirect('/');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->userService->getUser();
        return view('User.userList', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        session()->forget('pwd-not-match');
        $validator = Validator::make($request->all(), [
            'username'  =>  'required',
            'email'     =>  'required|email|unique:users,email',
            'password'  =>  'required|min:8|confirmed|regex:/^(?=.*?[A-Z])(?=.*?[0-9]).{8,}$/',
            'password_confirmation' => 'required|min:8|regex:/^(?=.*?[A-Z])(?=.*?[0-9]).{8,}$/',
            'phone'     =>  'required',
            'profile'   =>  'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $name    =  $request->username;
        $email   =  $request->email;
        $pwd     =  $request->password;
        $type    =  $request->type;
        $phone   =  $request->phone;
        $dob     =  $request->dob;
        $address =  $request->address;
        $profile =  $request->profile;
        //password show as ***
        $hide = "*";
        $pwdHide = str_pad($hide, strlen($pwd), "*");
        //tempory save profile photo
        $tempProfile = time().'.'.request()->profile->getClientOriginalExtension();
        request()->profile->move(public_path('img/tempProfile'), $tempProfile);
        $tempProfilePath = '/img/tempProfile/'.$tempProfile;

        return view('User.createConfirm', compact(
            'name', 'email','pwd', 'type', 'phone', 'dob', 'address', 'profile', 'pwdHide', 'tempProfile', 'tempProfilePath'));
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
        $user = new User;
        $user->name    =  $request->username;
        $user->email   =  $request->email;
        $user->pwd     =  $request->password;
        $user->type    =  $request->type;
        $user->phone   =  $request->phone;
        $user->dob     =  $request->dob;
        $user->address =  $request->address;
        $user->profile =  $request->profile;
        $insertCommand =  $this->userService->store($userId, $user);
        return redirect()->intended('users');

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
