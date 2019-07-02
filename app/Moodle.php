<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Moodle extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'moodles';
    protected $primaryKey = 'id';

    protected $guarded = ['id','updated_at'];


}
