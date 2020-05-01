<?php

namespace App\Http\Controllers;

use App\Product;
use App\Container;
use App\Water;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\DataTables\ProductsDataTable;
use Datatables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        //
        $produk = null;
        $text = $request->text; $sort = $request->sort;
        $nama = $request->nama; $wadah = $request->wadah;
        $isi = $request->isi; $harga = $request->harga;

        // Opsi Filter
        $opsiNama = Water::select('nama')->groupBy('nama')->get();
        $opsiWadah = Container::select('jenis_botol')->groupBy('jenis_botol')->get();
        $opsiIsi = Product::select('isi')->groupBy('isi')->get();
        $opsiHarga = Product::select('harga')->groupBy('harga')->get();
        // dd(isset($request->search));

        // Pengondisian Antara Pencarian dan Saringan Data

        return view('admin.produk.index',
                    compact('produk', 'text', 'nama', 'wadah', 'isi', 'harga',
                    'opsiNama', 'opsiWadah', 'opsiIsi', 'opsiHarga', 'sort')
                  );

        // return $dataTable->render('admin.produk.index');
    }

    public function products(Request $r)
    {

      $raw = Product::with('waters', 'containers');
      if (isset($r->nama)) {
        $raw->whereHas('waters', function($query) use($r){
          $query->where('nama', 'like', '%' . $r->nama . '%');
        });
      }
      if (isset($r->wadah)) {
        $raw->whereHas('containers', function($query) use($r){
          $query->where('jenis_botol', 'like', '%' . $r->wadah . '%');
        });
      }
      if (isset($r->isi)) {$raw->where('isi', '=', $r->isi);}
      if (isset($r->harga)) {$raw->where('harga', '=', $r->harga);}

      $ini = Datatables::of($raw);
      return $ini
            ->addColumn('nama', function (Product $product) {
                return $product->waters->nama
                ;
              })
            ->addColumn('wadah', function (Product $product) {
                return $product->containers->jenis_botol
                ;
              })
            ->addColumn('action', function ($product) {
                return
                '<a href="'.route('product.show', ['product' => $product->id])
                .'" class="btn btn-xs btn-primary mr-1">Detail</a>'
                .'<a href="'.route('product.edit',['product' => $product->id ])
                .'" class="btn btn-xs btn-success mr-1">Ubah</a>'
                ;
            })
            // ->addColumn('wadah', function (Product $product) {
            //     return $product->containers->map(function ($container){
            //       return str_limit($container->jenis_botol, 30, '...');
            //     })
            //     // ->implode('<br>')
            //     ;
              // })
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
        $opsiWadah = Container::select('id', 'jenis_botol')->get();
        $opsiNama = Water::select('id', 'nama')->get();
        // dd($air);
        return view( 'admin.produk.add_form', compact('opsiNama', 'opsiWadah') );
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
          'nama' => 'required|numeric',
          'wadah' => 'required|numeric',
          'isi' => 'required|numeric',
          'harga' => 'required|numeric'
        ]);
        Product::create([
          'water_id' => $request->nama
          ,'container_id' => $request->wadah
          ,'isi' => $request->isi
          ,'harga' => $request->harga
        ]);
        return redirect( '/product' )->with('status', 'Data Produk Berhasil Ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
        $air = Product::find($product->id)->waters;
        $wadah = Product::find($product->id)->containers;
        $produk = Product::where('id', $product->id)->get()[0];
        // dd($produk);
        return view( 'admin.produk.detail', compact('air', 'wadah', 'produk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
        $opsiNama = Water::select('id', 'nama')->get();
        $opsiWadah = Container::select('id', 'jenis_botol')->get();
        return view( 'admin.produk.edit_form',
                      compact('product', 'opsiNama', 'opsiWadah'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
        $request->validate([
          'nama' => 'required|numeric',
          'wadah' => 'required|numeric',
          'isi' => 'required|numeric',
          'harga' => 'required|numeric'
        ]);
        Product::where('id', $product->id)
               ->update([
                 'water_id' => $request->nama
                 ,'container_id' => $request->wadah
                 ,'isi' => $request->isi
                 ,'harga' => $request->harga
               ]);
        return redirect( route('product.index'))->with('status', 'Data Produk Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
        Product::destroy($product->id);
        return redirect(route('product.index'))->with('status', 'Data Produk Berhasil Dihapus!');
    }
}
