<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostModel extends Model
{
    protected $table='post';
    protected $primaryKey='id';
    protected $fillable=['category_name','sub_category_name','post_title','short_description','long_description','image','counter','likes'];


    public function post_validation()
    {
    	return [
    		"category_name"=>'required',
    		"sub_category_name"=>'required',
    		"post_title"=>'required',
    		"short_description"=>'required',
    		"long_description"=>'required',
    		"image"=>'required|mimes:jpeg,bmp,png,jpg'
    	];
    }
}
