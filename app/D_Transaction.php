<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class D_Transaction extends Model
{
    //

    use SoftDeletes;

    protected $table = "d_transactions";

    public function transactions()
    {
      return $this->belongsTo('App\Transaction', 'transaction_id');
    }

    public function products()
    {
      return $this->belongsTo('App\Product', 'product_id');
    }

    protected $fillable = [
      'transaction_id', 'product_id', 'jumlah', 'subtotal'
    ];
}
