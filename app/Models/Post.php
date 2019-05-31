<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Post extends Model
{
    protected $fillable = [
        'title','description',
        'create_user_id', 'updated_user_id', 'deleted_user_id',
        'deleted_at',
    ];

    /**
     * Get the user that owns the post.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'create_user_id');
    }
}
