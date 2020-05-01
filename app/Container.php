<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Container extends Model
{
    //

    use SoftDeletes;

    protected $fillable = ['jenis_botol', 'isi', 'harga'];

    public function products()
    {
      return $this->hasMany('App\Product');
    }
}
