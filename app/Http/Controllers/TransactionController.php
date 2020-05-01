<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\D_Transaction;
use App\Product;
use App\Water;
use App\Container;
use Illuminate\Http\Request;
use Datatables;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $opsiPelanggan = Transaction::select('pelanggan')->groupBy('pelanggan')->get();
        // $opsi = Product::select('harga')->groupBy('harga')->get();
        return view('admin.transaksi.index', compact('opsiPelanggan'));
    }

    public function transactionjson(Request $r)
    {

      $raw = Transaction::select('id', 'pelanggan'
                                ,'alamat', 'total', 'lunas');
      if (isset($r->pelanggan)) {$raw->where('pelanggan', 'like', '%' . $r->pelanggan . '%');}
      if (isset($r->lunas)) {$raw->where('lunas', '=', $r->lunas);}
      if (isset($r->total)) {$raw->where('total', '=', $r->total);}

      $ini = Datatables::of($raw);
      return $ini
            ->addColumn('displayable_lunas', function($transaction){
              return $transaction->displayable_lunas;
            })
            ->addColumn('action', function ($transaction) {
                return
                '<a href="'.route('transaction.show', ['transaction' => $transaction->id])
                .'" class="btn btn-xs btn-primary mr-1">Detail</a>'
                .'<a href="'.route('transaction.edit',['transaction' => $transaction->id ])
                .'" class="btn btn-xs btn-success mr-1">Ubah</a>'
                ;
            })
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $opsiPelanggan = Transaction::select('pelanggan')
                         ->groupBy('pelanggan')
                         ->get();
        return view('admin.transaksi.add_form',
                    compact('opsiPelanggan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
          'pelanggan' => 'required|max:30',
          'alamat' => 'required',
          'total' => 'required|numeric|max:0',
          'lunas' => 'required|boolean'
        ]);

        Transaction::create([
          'pelanggan' => $request->pelanggan,
          'alamat' => $request->alamat,
          'total' => $request->total,
          'lunas' => $request->lunas
        ]);
        $id = Transaction::latest()->first()->id;
        return redirect( route('transaction.show', ['transaction' => $id]) );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
        $transaction = Transaction::with('d_transactions.products.waters'
                                        ,'d_transactions.products.containers')
                       ->where('id', '=', $transaction->id)
                       ->get();
        // $d_transaction = Transaction::find($transaction->id)->d_transactions->products;
        // $totals = Transaction::with('d_transactions')->where('id',$request->transaksi_id)
        //           ->get()->sum('subtotal');
        $totals = $transaction[0]->d_transactions->sum('subtotal');
        // dd($totals);
        Transaction::where('id', $transaction[0]->id)
        ->update(['total' => $totals]);
        // dd($transaction[0]->d_transactions);
        return view('admin.transaksi.detail',
                    compact('transaction'))
                    ->with('status', 'Data Berhasil Ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
        return view('admin.transaksi.edit_form', compact('transaction'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
        $request->validate([
          'pelanggan' => 'required|max:30',
          'alamat' => 'required',
          'total' => 'required|numeric|max:9999999',
          'lunas' => 'required|boolean'
        ]);

        Transaction::where('id', $transaction->id)
        ->update([
          'pelanggan' => $request->pelanggan,
          'alamat' => $request->alamat,
          'total' => $request->total,
          'lunas' => $request->lunas
        ]);

        $totals = $transaction->d_transactions->sum('subtotal');
        // dd($totals);
        Transaction::where('id', $transaction->id)
        ->update(['total' => $totals]);

        return redirect( route('transaction.show',
                        ['transaction' => $transaction->id]) )
                        ->with('status', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
        Transaction::destroy($transaction->id);
        return redirect(route('transaction.index'))->with('status', 'Data Berhasil dihapus.');
    }
}
