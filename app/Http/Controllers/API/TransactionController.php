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
      $pesanan = Transaction::with('d_transactions.products.waters','d_transactions.products.containers')->where('lunas','=',0)->get();
      dd(json($pesanan));
    }
    public function dashboardNeed(Request $request)
    {
      $data = $request->user();
      $totalpesanan = Transaction::where('lunas','=',0)->get()->sum('total');
      $omset = Transaction::where('lunas','=',1)->get()->sum('total');
      $jumlahpesanan = Transaction::where('lunas','=',0)->get()->count();
      $pesanans = Transaction::select('pelanggan','alamat','total')->where('lunas','=',0)->get();
      $resp = [
        'username' => $data->name
        ,'email' => $data->email
        ,'jumlahpesanan' => $jumlahpesanan
        ,'totalpesanan' => $totalpesanan
        ,'omset' => $omset
        ,'pesanans' => $pesanans
      ];
      return response()->json($resp, 200);
    }
}
