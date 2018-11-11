<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\User;

class Blog extends Model
{
  protected $table = 'blog';
  protected $primaryKey = 'idpost';
  protected $fillable = [
      'title_coll', 'title', 'idcategory', 'postbody', 'posterid'
  ];
  public $timestamps = true;

  public function category(){
        return $this->belongsTo('App\Category','idcategory');
    }

    public function users(){
          return $this->belongsTo('App\User','idpengguna');
      }

}
