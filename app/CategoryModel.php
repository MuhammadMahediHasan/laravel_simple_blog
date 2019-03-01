<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    protected $table='category';
    protected $primaryKey='id';
    protected $fillable=['category_name','description','status'];


    public function validation_category()
    {
    	return[
    		"category_name"=>'required',
    		"description"=>'required'
    	];
    }
}
