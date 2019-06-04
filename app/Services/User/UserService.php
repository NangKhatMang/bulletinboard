<?php

namespace App\Services\User;

use App\Contracts\Dao\User\UserDaoInterface;
use App\Contracts\Services\User\UserServiceInterface;

class UserService implements UserServiceInterface
{
  private $userDao;

  /**
   * Class Constructor
   * @param OperatorUserDaoInterface
   * @return
   */
  public function __construct(UserDaoInterface $userDao)
  {
    $this->userDao = $userDao;
  }

  /**
   * Get Users List
   * @param Object
   * @return $users
   */
  public function getUser()
  {
    return $this->userDao->getUser();
  }

  /**
   * Create User
   * @param Object
   * @return $users
   */
  public function store($userId, $user)
  {
    return $this->userDao->store($userId, $user);
  }
}
