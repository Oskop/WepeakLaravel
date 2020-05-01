<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    //

    use SoftDeletes;

    public function waters()
    {
      return $this->belongsTo('App\Water', 'water_id');
    }

    public function containers()
    {
      return $this->belongsTo('App\Container', 'container_id');
    }

    public function d_transactions()
    {
      return $this->hasMany('App\D_Transaction');
    }

    protected $fillable = [
      'water_id', 'container_id', 'isi', 'harga'
    ];

}
