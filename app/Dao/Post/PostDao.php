<?php

namespace App\Dao\Post;

use App\Contracts\Dao\Post\PostDaoInterface;
use App\Models\Post;
use Hash;
use Log;

class PostDao implements PostDaoInterface
{
  /**
   * Get User's Post List
   * @param Object
   * @return $posts
   */
  public function getUserPost($userId, $type)
  {
    if ($type == '0') {
      $posts = Post::paginate(50);
    } else {
      $posts = Post::where(
        'create_user_id', 'LIKE', '%'. $userId . '%')
        ->paginate(50);
    }
    return $posts;
  }

  /**
   * Get Posts List
   * @param Object
   * @return $posts
   */
  public function getPost()
  {
    $posts = Post::paginate(50);
    return $posts;
  }

  /**
   * Get Post detail
   * @param Object
   * @return $postDetail
   */
  public function editPost($postId)
  {
    $postDetail = Post::find($postId);
    return $postDetail;
  }

  /**
   * Create Post
   * @param Object
   * @return $posts
   */
  public function store($userId, $post)
  {
    $posts = new Post([
      'title' =>  $post->title,
      'description' =>  $post->desc,
      'create_user_id'  =>  $userId,
      'updated_user_id'  =>  $userId
    ]);
    $posts->save();
    return redirect()->back();
  }

  /**
   * Update Post
   * @param Object
   * @return $posts
   */
  public function update($userId, $post)
  {
    $posts = Post::find($post->id);
    $posts->title        = $post->title;
    $posts->description  = $post->desc;
    $posts->updated_user_id  = $userId;
    $posts->updated_at       = now();
    $posts->save();
    return redirect()->back();
  }

  /**
   * Get Posts List
   * @param Object
   * @return $posts
   */
  public function searchPost($searchKeyword)
  {
    if ($searchKeyword == null) {
      $posts = Post::paginate(50);
    } else {
        $posts = Post::where(
            'title', 'LIKE', '%' . $searchKeyword . '%')
            ->paginate(50);
        $posts = Post::where(
            'description', 'LIKE', '%' . $searchKeyword . '%')
            ->paginate(50);
    }
    return $posts;
  }

  /**
   * Delete Post
   * @param Object
   * @return $posts
   */
  public function destory($userId, $postId)
  {
    return Post::find($postId)->delete();
  }
}
