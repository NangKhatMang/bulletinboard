<?php

namespace App\Services\Post;

use App\Contracts\Dao\Post\PostDaoInterface;
use App\Contracts\Services\Post\PostServiceInterface;

class PostService implements PostServiceInterface
{
  private $postDao;

  /**
   * Class Constructor
   * @param OperatorPostDaoInterface
   * @return
   */
  public function __construct(PostDaoInterface $postDao)
  {
    $this->postDao = $postDao;
  }

  /**
   * Get User's Post List
   * @param Object
   * @return $posts
   */
  public function getUserPost($authId, $type)
  {
    return $this->postDao->getUserPost($authId, $type);
  }

  /**
   * Get Posts List
   * @param Object
   * @return $posts
   */
  public function getPost()
  {
    return $this->postDao->getPost();
  }

  /**
   * Create Post
   * @param Object
   * @return $posts
   */
  public function store($authId, $post)
  {
    return $this->postDao->store($authId, $post);
  }

  /**
   * Get Post detail
   * @param Object
   * @return $postDetail
   */
  public function postDetail($postId)
  {
    return $this->postDao->postDetail($postId);
  }

  /**
   * Update Post
   * @param Object
   * @return $posts
   */
  public function update($userId, $post)
  {
    return $this->postDao->update($userId, $post);
  }

  /**
   * Get Posts List
   * @param Object
   * @return $posts
   */
  public function searchPost($searchKeyword)
  {
    return $this->postDao->searchPost($searchKeyword);
  }

  /**
   * Import csf file
   * @param Object
   * @return $posts
   */
  public function import($authId, $filepath)
  {
    return $this->postDao->import($authId, $filepath);
  }

  /**
   * Delete Post
   * @param Object
   * @return $posts
   */
  public function destory($userId, $postId)
  {
    return $this->postDao->destory($userId, $postId);
  }
}
