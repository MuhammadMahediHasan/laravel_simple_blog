<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentsModel extends Model
{
    protected $table='comments';
    protected $primaryKey='id';
    protected $fillable=['name','post_id','email','phone','message'];


    public function comments_validation()
    {
    	return [
    		"name"=>'required',
    		"post_id"=>'required',
    		"email"=>'required|email',
    		"phone"=>'required',
    		"message"=>'required|max:50'
    	];
    }
}
