<?php

namespace App\Dao\Post;

use App\Contracts\Dao\Post\PostDaoInterface;
use App\Models\Post;
use Hash;
use Log;

class PostDao implements PostDaoInterface
{
  /**
   * Get Posts List
   * @param Object
   * @return $posts
   */
  public function getPost($authId, $type)
  {
    if ($type == '0') {
      $posts = Post::orderBy('updated_at','DESC')->paginate(50);
    } else {
      $posts = Post::where('create_user_id', $authId)
        ->orderBy('updated_at','DESC')
        ->paginate(50);
    }
    return $posts;
  }

  /**
   * Get Post detail
   * @param Object
   * @return $postDetail
   */
  public function postDetail($postId)
  {
    $postDetail = Post::find($postId);
    return $postDetail;
  }

  /**
   * Create Post
   * @param Object
   * @return $posts
   */
  public function store($authId, $post)
  {
    $insertPost = new Post([
      'title'           =>  $post->title,
      'description'     =>  $post->desc,
      'create_user_id'  =>  $authId,
      'updated_user_id' =>  $authId
    ]);
    $insertPost->save();
    $posts = Post::where('create_user_id', $authId)
        ->orderBy('updated_at','DESC')
        ->paginate(50);
    return $posts;
  }

  /**
   * Update Post
   * @param Object
   * @return $posts
   */
  public function update($userId, $post)
  {
    $updatePost = Post::find($post->id);
    $updatePost->title            =  $post->title;
    $updatePost->description      =  $post->desc;
    $updatePost->updated_user_id  =  $userId;
    $updatePost->updated_at       =  now();
    $updatePost->save();
    $posts = Post::where('create_user_id', $userId)
        ->orderBy('updated_at','DESC')
        ->paginate(50);
    return $posts;
  }

  /**
   * Get Posts List
   * @param Object
   * @return $posts
   */
  public function searchPost($searchKeyword)
  {
    if ($searchKeyword == null) {
      $posts = Post::orderBy('updated_at','DESC')->paginate(50);
    } else {
        $posts = Post::where('title', 'LIKE', '%' . $searchKeyword . '%')
                      ->orwhere('description', 'LIKE', '%' . $searchKeyword . '%')
                      ->orderBy('updated_at','DESC')
                      ->paginate(50);
    }
    return $posts;
  }

  /**
   * Import csf file
   * @param Object
   * @return $posts
   */
  public function import($authId, $filepath)
  {
    if (($handle = fopen($filepath, 'r')) !== FALSE) {
      while (($data = fgetcsv($handle, 1000, ',' )) !== FALSE ) {
          $post = new Post;
          $post->title = $data [0];
          $post->description = $data [1];
          $post->create_user_id = $authId;
          $post->updated_user_id = $authId;
          $post->save ();
          }
      fclose($handle);
    }
    return back();
  }

  /**
   * Soft Delete Post
   * @param Object
   * @return $posts
   */
  public function softDelete($authId, $postId)
  {
    $deletePost = Post::withTrashed()
                      ->where('id', $postId)
                      ->get();
    // var_dump($deletePost);die();    
    return back();
  }
}
