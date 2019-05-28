<?php

namespace App\Dao\User;

use App\Contracts\Dao\User\UserDaoInterface;
use App\Models\User;
use Hash;
use Log;

class UserDao implements UserDaoInterface
{
  /**
     * Get User List
     *
     * Get customer list by email and password
     * @param [string] $email
     * @param [string] $pass
     * @return customer list
     */
    public function login($email, $pwd)
    {
        $row = User::where('email', $email)->first();
        if ($row) {
            if (Hash::check($pwd, $row->password)) {
                return $row;
            }
        }
    }

  /**
   * Get Operator List
   * @param Object
   * @return $operatorList
   */
  public function getUserList()
  {
    return User::get();
  }
}
