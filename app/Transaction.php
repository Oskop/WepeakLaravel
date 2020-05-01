<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    //
    use SoftDeletes;

    public function d_transactions()
    {
      return $this->hasMany('App\D_Transaction');
    }

    protected $fillable = [
      'pelanggan', 'alamat', 'total', 'lunas'
    ];

    protected $appends = ['displayable_lunas'];

    public function getDisplayableLunasAttribute(){
        return $this->lunas?"Lunas":"Belum";
    }
}
