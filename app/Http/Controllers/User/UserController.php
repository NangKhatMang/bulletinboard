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
use Auth;
use Hash;
use File;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserServiceInterface $user)
    {
        $this->userService = $user;
    }

    public function showRegisterForm()
    {
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
        $email      =   $request->email;
        $pwd        =   $request->password;
        $validator  =   Validator::make($request->all(), [
            'email'     =>  'required|email',
            'password'  =>  'required|min:8|regex:/^(?=.*?[A-Z])(?=.*?[0-9]).{8,}$/',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        if (Auth::guard('')->attempt(['email' => $email, 'password' => $pwd])) {
            return redirect()->intended('/post/user');
        } else {
            return redirect()->back()->with('incorrect', 'Email and password incorrect!');
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
        session()->forget(['name','email','dateFrom','dateTo']);
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
        $validator = Validator::make($request->all(), [
            'user_name'  =>  'required',
            'email'     =>  'required|email|unique:users,email',
            'password'  =>  'required|min:8|confirmed|regex:/^(?=.*?[A-Z])(?=.*?[0-9]).{8,}$/',
            'password_confirmation' => 'required|min:8|regex:/^(?=.*?[A-Z])(?=.*?[0-9]).{8,}$/',
            'phone'     =>  'required|numeric|regex:/(09)[0-9]{7}/',
            'profileImg'   =>  'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $name    =  $request->user_name;
        $email   =  $request->email;
        $pwd     =  $request->password;
        $type    =  $request->type;
        $phone   =  $request->phone;
        $dob     =  $request->dob;
        $address =  $request->address;
        $profileImg   =  $request->file('profileImg');

        //password show as ***
        $hide = "*";
        $pwdHide = str_pad($hide, strlen($pwd), "*");
        //tempory save profile photo
        $fileName = "";
        if ($profileImg) {
            $fileName = $profileImg->getClientOriginalName();
            $profileImg->move('img/tempProfile', $fileName);
        }
        return view('User.createConfirm', compact(
            'name', 'email','pwd', 'type', 'phone', 'dob', 'address', 'pwdHide', 'fileName'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $authId    =  Auth::user()->id;
        //save profile image
        $fileName  =  $request->fileName;
        $oldpath   =  public_path().'/img/tempProfile/'.$fileName;
        $newpath   =  public_path().'/img/profile/'.$fileName;
        File::move($oldpath, $newpath);
        $user           =  new User;
        $user->name     =  $request->user_name;
        $user->email    =  $request->email;
        $user->password =  Hash::make($request->password);
        $user->type     =  $request->type;
        $user->phone    =  $request->phone;
        $user->dob      =  $request->dob;
        $user->address  =  $request->address;
        $user->profile  =  '/img/profile/'.$fileName;
        $insertCommand  =  $this->userService->store($authId, $user);
        return redirect()->intended('users')->with('success', 'User create successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $dateFrom = $request->dateFrom;
        $dateTo = $request->dateTo;
        session ([
            'name' => $name,
            'email'=> $email,
            'dateFrom' => $dateFrom,
            'dateTo' => $dateTo,
        ]);
        $users = $this->userService->searchUser($name, $email, $dateFrom, $dateTo);
        return view('User.userlist', compact('users'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showProfile($userId)
    {
        $userProfile = $this->userService->userDetail($userId);
        return view('User.userProfile', compact('userProfile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($userId)
    {
        $userDetail = $this->userService->userDetail($userId);
        return view('User.edit', compact('userDetail'));
    }

    /**
     * Update Confirm the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editConfirm(Request $request, $userId)
    {
        $user = User::find($userId);
        $validator = Validator::make($request->all(), [
            'user_name'  =>  'required',
            'email'     =>  'required|email|unique:users,email,'.$user->id,
            'phone'     =>  'required|numeric|regex:/(09)[0-9]{7}/',
            'profile_photo'   =>  'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $user   =   new User;
        $user->name    =  $request->user_name;
        $user->email   =  $request->email;
        $user->type    =  $request->type;
        $user->phone   =  $request->phone;
        $user->dob     =  $request->dob;
        $user->address =  $request->address;
        $newProfile =  $request->file('profile_photo');
        $oldProfile = $request->oldProfile;

        //tempory save new profile photo
        if ($newProfile) {
            $fileName = $newProfile->getClientOriginalName();
            $newProfile->move('img/tempProfile', $fileName);
            $user->profile = $fileName;
        }
        return view('User.Update', compact('user', 'oldProfile', 'userId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $userId)
    {
        $authId = Auth::user()->id;
        $user   = new User;
        $user->id      =  $userId;
        $user->name    =  $request->name;
        $user->email   =  $request->email;
        $user->type    =  $request->type;
        $user->phone   =  $request->phone;
        $user->dob     =  $request->dob;
        $user->address =  $request->address;
        $newProfile    =  $request->newProfile;
        $oldProfile    =  $request->oldProfile;
        if ($newProfile) {
            $oldpath = public_path().'/img/tempProfile/'.$newProfile;
            $newpath = public_path().'/img/profile/'.$newProfile;
            File::move($oldpath, $newpath);
            $user->profile = '/img/profile/'.$newProfile;
        } else {
            $user->profile = $oldProfile;
        }
        $updateCommand  =  $this->userService->update($authId, $user);
        return redirect()->intended('users')->with('success', 'User update successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showPwdForm($userId)
    {
        return view('User.changePassword', compact('userId'));
    }

    /**
     * Change password the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changePassword(Request $request, $userId)
    {
        $validator = Validator::make($request->all(), [
            'old_password'  =>  'required|min:8|regex:/^(?=.*?[A-Z])(?=.*?[0-9]).{8,}$/',
            'password'  =>  'required|min:8|confirmed|regex:/^(?=.*?[A-Z])(?=.*?[0-9]).{8,}$/',
            'password_confirmation' => 'required|min:8|regex:/^(?=.*?[A-Z])(?=.*?[0-9]).{8,}$/',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $oldPwd   =   $request->old_password;
        $newPwd   =   $request->password;
        $authId = Auth::user()->id;
        $authType = Auth::user()->type;
        $status = $this->userService->changePassword($authId, $userId, $oldPwd, $newPwd);
        if ($status) {
            if ($authType == '0') {
                return redirect()->intended('users')->with('success-changPwd', 'Password change successfully.');
            } else {
                return redirect()->intended('post/user')->with('success-changPwd', 'Password change successfully.');
            }
        } else {
            return redirect()->back()->with('incorrect', 'Old password does not match.');
        }
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
