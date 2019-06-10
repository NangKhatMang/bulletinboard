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
   * Get Posts List
   * @param Object
   * @return $posts
   */
  public function getPost($authId, $type)
  {
    return $this->postDao->getPost($authId, $type);
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
   * Soft Delete Post
   * @param Object
   * @return $posts
   */
  public function softDelete($authId, $postId)
  {
    return $this->postDao->softDelete($authId, $postId);
  }
}
