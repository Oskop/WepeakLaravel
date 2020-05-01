<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Transaction;
use App\D_Transaction;

class TransactionController extends Controller
{
    //
    public function __construct()
    {
      $this->middleware('auth:api');
    }

    public function index()
    {
      $pesanan = Transaction::with('products.waters','products.containers')->where('lunas','=',0)->get();
      dd(json($pesanan));
    }
}
