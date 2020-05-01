<?php

namespace App\Http\Controllers;

use App\D_Transaction;
use App\Product;
use App\Water;
use App\Container;
use App\Transaction;
use Illuminate\Http\Request;
use Datatables;

class DTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return redirect(route('transaction.index'))
               ->with('status', 'Fitur belum ada sehingga dialihkan ke halaman ini.');
    }

    public function dts(Request $r)
    {
        //
        if(isset($r->transaction_id)) {
          $id = $r->transaction_id;
          $raw = D_Transaction::with('products.waters', 'products.containers');
          $raw->where('transaction_id', $id);
          if (isset($r->nama)) {
            $raw->whereHas('products.waters', function($query) use($r){
              $query->where('id', '=', $r->nama);
            });
          }
          if (isset($r->wadah)) {
            $raw->whereHas('products.containers', function($query) use($r){
              $query->where('id', '=', $r->wadah);
            });
          }
          if (isset($r->isi)) {
            $raw->whereHas('products.waters', function($query) use($r){
              $query->where('isi', '=', $r->isi);
            });
          }


          $ini = Datatables::of($raw);
          return $ini
                  ->addColumn('action', function ($d_Transaction) {
                      return
                      '<a href="'.route('d_transaction.show', ['d_transaction' => $d_Transaction->id])
                      .'" class="btn btn-xs btn-primary mr-1">Detail</a>'
                      .'<a href="'.route('d_transaction.edit',['d_transaction' => $d_Transaction->id ])
                      .'" class="btn btn-xs btn-success mr-1">Ubah</a>'
                      .'<form action='. route('d_transaction.destroy', ['d_transaction' => $d_Transaction->id])
                      .' method="post"><input type="hidden" value="DELETE" name="_method"><input type="hidden" value="'. $d_Transaction->transaction_id
                      .'" name="transaction_id"><input type="hidden" name="_token" value="' . csrf_token()
                      .'"><button class="btn btn-xs btn-danger mr-1" type="submit" onclick="return confirm(\'Data mau dihapus?\')">Hapus</button></form>'
                      ;
                  })
                  ->make(true);

        }
        else {
          return redirect(route('transaction.index'))->with('status', 'Akses invalid. Dialihkan.');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $r)
    {
        //

        if(isset($r->transaction_id)){$id = $r->transaction_id;
        $opsiProduk = Product::with('waters','containers')->get();
        return view('admin.dtransaksi.add_form', compact('opsiProduk','id'));}
        else {
          return redirect(route('transaction.index'))->with('status', 'Akses invalid. Dialihkan.');
        }
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
          'transaksi_id' => 'required|numeric',
          'produk' => 'required|numeric',
          'jumlah' => 'required|numeric'
        ]);
        $subtotal = $request->jumlah
                    * Product::where('id', $request->produk)->get()[0]->harga
        ;
        // dd($subtotal);
        D_Transaction::create([
          'transaction_id' => $request->transaksi_id,
          'product_id' => $request->produk,
          'jumlah' => $request->jumlah,
          'subtotal' => $subtotal
        ]);

        $totals = Transaction::where('id',$request->transaksi_id)->get()[0]
                  ->d_transactions->sum('subtotal');
        // dd($totals);
        Transaction::where('id', $request->transaksi_id)
        ->update(['total' => $totals]);

        return redirect( route('transaction.show',
                        ['transaction' => $request->transaksi_id]) );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\D_Transaction  $d_Transaction
     * @return \Illuminate\Http\Response
     */
    public function show(D_Transaction $d_Transaction)
    {
        //
        return back()->with('status', 'Halaman dialihkan.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\D_Transaction  $d_Transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(D_Transaction $d_Transaction, Request $r)
    {
        //
        $d_Transaction = D_Transaction::find(explode('/', $r->url())[4]);
        // dd($d_Transaction->id);
        $opsiProduk = Product::with('waters','containers')->get();
        return view('admin.dtransaksi.edit_form',
                    compact('d_Transaction', 'opsiProduk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\D_Transaction  $d_Transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, D_Transaction $d_Transaction)
    {
        //
        $request->validate([
          'transaksi_id' => 'required|numeric',
          'item_id' => 'required|numeric',
          'produk' => 'required|numeric',
          'jumlah' => 'required|numeric'
        ]);
        $subtotal = $request->jumlah
                    * Product::where('id', $request->produk)->get()[0]->harga
        ;
        // dd($request->item_id);
        D_Transaction::where('id', $request->item_id)
        ->update([
          'transaction_id' => $request->transaksi_id,
          'product_id' => $request->produk,
          'jumlah' => $request->jumlah,
          'subtotal' => $subtotal
        ]);

        $totals = Transaction::where('id',$request->transaksi_id)->get()[0]
                  ->d_transactions->sum('subtotal');
        // dd($totals);
        Transaction::where('id', $request->transaksi_id)
        ->update(['total' => $totals]);

        return redirect( route('transaction.show',
                        ['transaction' => $request->transaksi_id]) )
                        ->with('status', 'Data berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\D_Transaction  $d_Transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(D_Transaction $d_Transaction, Request $r)
    {
        //
        $id = $r->transaction_id;
        
        D_Transaction::destroy(explode('/',$r->fullUrl())[4]);

        $totals = Transaction::where('id',$id)->get()[0]
                  ->d_transactions->sum('subtotal');
        // dd($totals);
        Transaction::where('id', $id)->update(['total' => $totals]);

        return redirect(route('transaction.show', ['transaction' => $id]))
                        ->with('status', 'Item berhasil dihapus.');
    }
}
