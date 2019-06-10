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
  public function store($authId, $user)
  {
    return $this->userDao->store($authId, $user);
  }

  /**
   * Get Users List
   * @param Object
   * @return $users
   */
  public function searchUser($name, $email, $dateFrom, $dateTo)
  {
    return $this->userDao->searchUser($name, $email, $dateFrom, $dateTo);
  }

  /**
   * Get User detail
   * @param Object
   * @return $userDetail
   */
  public function userDetail($userId)
  {
    return $this->userDao->userDetail($userId);
  }

  /**
   * Update User
   * @param Object
   * @return $users
   */
  public function update($authId, $user)
  {
    return $this->userDao->update($authId, $user);
  }

  /**
   * Update User, Change Password
   * @param Object
   * @return $users
   */
  public function changePassword($authId, $userId, $oldPwd, $newPwd)
  {
    return $this->userDao->changePassword($authId, $userId, $oldPwd, $newPwd);
  }
}