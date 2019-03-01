<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SetupModel extends Model
{
    protected $table='setup';
    protected $primaryKey='id';
    protected $fillable=['company_name','company_title','phone','email','address','logo'];
}
