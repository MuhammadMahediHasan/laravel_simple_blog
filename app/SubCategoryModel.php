<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategoryModel extends Model
{
    protected $table='sub_category';
    protected $primaryKey='id';
    protected $fillable=['category_name','sub_category_name','description','status'];


    public function validation_sub_category()
    {
    	return [
    		"category_name"=>'required',
    		"sub_category_name"=>'required',
    		"description"=>'required',
    		"status"=>'required',
    	];
    }
}
