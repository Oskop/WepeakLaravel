<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Water extends Model
{
    //
    use SoftDeletes;

    protected $fillable = ['nama', 'ph', 'manfaat'];

    public function products()
    {
      return $this->hasMany('App\Product');
    }
}
