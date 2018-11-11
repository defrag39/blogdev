<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Blog;

class Category extends Model
{
  protected $table = 'category';
  protected $primaryKey = 'idcategory';
  protected $fillable = [
      'categoryname',
  ];
  public $timestamps = true;

  public function blog(){
        return $this->hasMany('App\Blog','idcategory');
    }
}
