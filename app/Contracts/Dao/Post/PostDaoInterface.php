<?php

namespace App\Contracts\Dao\Post;

interface PostDaoInterface
{
  //get post list
  public function getUserPost($userId, $type);
  //get Post detail
  //public function editPost($id);
}
