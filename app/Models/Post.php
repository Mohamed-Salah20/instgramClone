<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded=[]; //for MassAssignmentException or use protected $fillable['caption']

    public function user(){
        return $this->belongsTo(User::class);
    }

    /**
     * Get the comments for the post.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);//hasMany(Comment::class,'foriegn_key')
        //it automaticly defaults foriegn key to model name , post_id in comments table
    }
}
