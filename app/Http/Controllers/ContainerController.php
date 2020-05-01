<?php

namespace App\Http\Controllers;

use App\Container;
use Illuminate\Http\Request;
use App\DataTables\ContainersDataTable;
use Datatables;
use Illuminate\Support\Str;

class ContainerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index($isi = null)
    // {
    //     //
    //     $request = Request();
    //     if ($isi === null) {
    //       if ($request->query('isi') != null) {
    //         $wadah = Container::where('isi', $request->query('isi'))->get();
    //       } else {
    //         $wadah = Container::all();
    //       }
    //     } else {
    //       $wadah = Container::where('isi', $isi)->get();
    //     }
    //     // $datatable = Datatables::of($wadah)->make(true);
    //     // dd($datatable);
    //     // return view('admin.wadah.index', compact('wadah'));
    //     return view('admin.wadah.index', compact('datatable'));
    // }

    public function index(Request $request)
    {
      // code...
      // return $dataTable->render('admin.wadah.index');
      $opsiWadah = Container::select('jenis_botol')->groupBy('jenis_botol')->get();
      $opsiIsi = Container::select('isi')->groupBy('isi')->get();
      $opsiHarga = Container::select('harga')->groupBy('harga')->get();
      return view('admin.wadah.index', compact('opsiWadah','opsiIsi','opsiHarga'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $wadah = null;
        return view( 'admin.wadah.add_form', compact('wadah') );
    }

    public function getCustomFilter(Request $request)
    {
        //
        $wadah = Container::select(['id', 'jenis_botol', 'isi', 'harga']);
        if (isset($request->jenis_botol))
        {$wadah->where('jenis_botol', 'like', '%'. $request->jenis_botol .'%');}
        if (isset($request->isi)) {$wadah->where('isi', '=', $request->isi);}
        if (isset($request->harga)) {$wadah->where('harga', '=', $request->harga);}

        $data = Datatables::of($wadah);
        return $data
                    ->addColumn('action', function ($container) {
                        return
                        '<a href="'.route('container.show', ['container' => $container->id])
                        .'" class="btn btn-xs btn-primary mr-1">Detail</a>'
                        .'<a href="'.route('container.edit',['container' => $container->id ])
                        .'" class="btn btn-xs btn-success mr-1">Ubah</a>'
                        // .'<form action="'.route('container.destroy', ['container' => $container->id])
                        // .'" method="post" class="d-inline">'. method('delete') . csrf()
                        // .'<button onclick="return confirm("Apa?")" class="btn btn-xs btn-danger">Hapus</button></form>'
                        ;
                    })
                    ->make(true);
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
          'jenis_botol' => 'required',
          'isi' => 'required|numeric',
          'harga' => 'required|numeric'
        ]);
        Container::create($request->all());
        return redirect( '/container' )->with('status', 'Data Wadah Berhasil Ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Container  $container
     * @return \Illuminate\Http\Response
     */
    public function show(Container $container)
    {
        //
        $wadah = $container;
        $produk = Container::find($container->id)->products;
        return view( 'admin.wadah.detail', compact('wadah', 'produk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Container  $container
     * @return \Illuminate\Http\Response
     */
    public function edit(Container $container)
    {
        //
        $wadah = $container;
        return view( 'admin.wadah.edit_form', compact('container') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Container  $container
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Container $container)
    {
        //
        $request->validate([
          'jenis_botol' => 'required',
          'isi' => 'required|numeric',
          'harga' => 'required|numeric'
        ]);
        Container::where('id', $container->id)
                    ->update([
                      'jenis_botol' => $request->jenis_botol,
                      'isi' => $request->isi,
                      'harga' => $request->harga
                    ]);
        return redirect(route('container.index'))->with('status', 'Data Wadah Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Container  $container
     * @return \Illuminate\Http\Response
     */
    public function destroy(Container $container)
    {
        //
        Container::destroy($container->id);
        return redirect(route('container.index'))->with('status', 'Data Wadah Berhasil Dihapus!');
    }
}
