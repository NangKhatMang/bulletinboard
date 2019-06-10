<?php

namespace App\Dao\User;

use App\Contracts\Dao\User\UserDaoInterface;
use App\Models\User;
use Hash;
use Log;
use DB;

class UserDao implements UserDaoInterface
{
  /**
   * Get Users List
   * @param Object
   * @return $users
   */
  public function getUser()
  {
    $users = User::select('users.name',
                           'users.email',
                           'users.phone',
                           'users.dob',
                           'users.address',
                           'users.created_at',
                           'users.updated_at',
                           'users.id',
                           'u1.name as created_user_name')
                  ->join('users as u1', 'u1.id', 'users.create_user_id')
                  ->orderBy('users.updated_at', 'DESC')
                  ->paginate(50);
    return $users;
  }

  /**
   * Create Post
   * @param Object
   * @return $posts
   */
  public function store($authId, $user)
  {
    $insertUser = new User([
      'name'            =>  $user->name,
      'email'           =>  $user->email,
      'password'        =>  $user->password,
      'profile'         =>  $user->profile,
      'type'            =>  $user->type,
      'phone'           =>  $user->phone,
      'address'         =>  $user->address,
      'dob'             =>  $user->dob,
      'create_user_id'  =>  $authId,
      'updated_user_id' =>  $authId
    ]);
    $insertUser->save();
    return redirect()->back();
  }

  /**
   * Get Users List
   * @param Object
   * @return $users
   */
  public function searchUser($name, $email, $dateFrom, $dateTo)
  {
    if ($name == null && $email == null && $dateFrom == null & $dateTo == null) {
      $users = User::orderBy('updated_at', 'DESC')->paginate(50);
    } else {
        if ((isset($name) || isset($email)) &&
            (is_null($dateFrom) && is_null($dateTo))) {
                $users = User::where([
                    ['name', 'LIKE', '%' . $name . '%'],
                    ['email', 'LIKE', '%' . $email . '%']
                ])->orderBy('updated_at', 'DESC')->paginate(50);
        } elseif ((isset($name) || isset($email)) ||
            (isset($dateFrom) && isset($dateTo))) {
                $users = User::where([
                    ['name', 'LIKE', '%' . $name . '%'],
                    ['email', 'LIKE', '%' . $email . '%']
                ])->whereBetween('created_at', array($dateFrom,$dateTo))
                  ->orderBy('updated_at', 'DESC')
                  ->paginate(50);
        }
    }
    return $users;
  }

  /**
   * Get User detail
   * @param Object
   * @return $userDetail
   */
  public function userDetail($userId)
  {
    $userDetail = User::find($userId);
    return $userDetail;
  }

  /**
   * Update User
   * @param Object
   * @return $users
   */
  public function update($authId, $user)
  {
    if ($user->profile == null) {
      $user->profile = "";
    }
    $updateUser = User::find($user->id);
    $updateUser->name = $user->name;
    $updateUser->email = $user->email;
    $updateUser->profile = $user->profile;
    $updateUser->type = $user->type;
    $updateUser->phone = $user->phone;
    $updateUser->address = $user->address;
    $updateUser->dob = $user->dob;
    $updateUser->updated_user_id = $authId;
    $updateUser->updated_at = now();
    $updateUser->save();
    return redirect()->back();
  }

  /**
   * Update User, Change Password
   * @param Object
   * @return $users
   */
  public function changePassword($authId, $userId, $oldPwd, $newPwd)
  {
    $updateUser = User::find($userId);
    $status = Hash::check($oldPwd, $updateUser->password);
    if ($status) {
        $updateUser->password = Hash::make($newPwd);
        $updateUser->updated_user_id = $authId;
        $updateUser->updated_at = now();
        $updateUser->save();
    }
    return $status;
  }
}
