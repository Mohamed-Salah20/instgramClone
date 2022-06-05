<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    //no need for fillable or gaurded as create method is not used in the controller


    /**
     * Get the post that owns the comment.
     */
    public function post()
    {
        return $this->belongsTo(Post::class);//belongsTo(Post::class,'forgien_key')
        //it automaticly defaults foriegn key to model name , post_id in comments table
    }

    /**
     * Get the user that owns the comment.
     */
    public function user()
    {
        return $this->belongsTo(User::class);//belongsTo(User::class,'forgien_key')
        //it automaticly defaults foriegn key to model name , user_id in comments table
    }
}
