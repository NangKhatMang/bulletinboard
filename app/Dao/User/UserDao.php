<?php

namespace App\Dao\User;

use App\Contracts\Dao\User\UserDaoInterface;
use App\Models\User;
use Hash;
use Log;

class UserDao implements UserDaoInterface
{
  /**
   * Get Users List
   * @param Object
   * @return $users
   */
  public function getUser()
  {
      $users = User::paginate(50);
      return $users;
  }

  /**
   * Create Post
   * @param Object
   * @return $posts
   */
  public function store($userId, $user)
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
      'create_user_id'  =>  $userId,
      'updated_user_id' =>  $userId
    ]);
    $insertUser->save();
    return redirect()->back();
  }
}
