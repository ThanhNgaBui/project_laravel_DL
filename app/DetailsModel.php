<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailsModel extends Model
{
    protected $table = "details";
    public function category(){
    	return $this->belongsTo('App\CategoryModel');
    }
}
