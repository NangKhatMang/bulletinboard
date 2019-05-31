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
  public function getUserPost($userId, $type)
  {
    return $this->postDao->getUserPost($userId, $type);
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
  public function store($userId, $post)
  {
    return $this->postDao->store($userId, $post);
  }

  /**
   * Get Post detail
   * @param Object
   * @return $postDetail
   */
  public function editPost($postId)
  {
    return $this->postDao->editPost($postId);
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
   * Delete Post
   * @param Object
   * @return $posts
   */
  public function destory($userId, $postId)
  {
    return $this->postDao->destory($userId, $postId);
  }
}
