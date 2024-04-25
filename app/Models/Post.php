<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;


//    protected $fillable=["title","body","user_id"];
    protected $guarded;


    # user owned the post
    # post belongs to one user
    public function user(){
        # select * from users where id= $this->user_id
        return  $this->belongsTo(User::class);
    }
}
