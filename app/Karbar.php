<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;




class Karbar extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'karbars';
    protected $primaryKey = 'id';


    //

    public function posts(){
      return  $this->hasMany('App\Post');

    }
}
