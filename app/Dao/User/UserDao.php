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
}
