<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $fillable= ['name','description','price','image','category_id'];

    public function category(){
        return $this->hasOne(Category::class,'id','category_id');
    }
}
