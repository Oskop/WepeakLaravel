<?php

namespace App\Http\Controllers;

use App\Water;
use Illuminate\Http\Request;
use Datatables;

class WaterController extends Controller
{
    private $request;
    public function __construct(Request $request)
    {
      // code...
      $this->request = $request;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($ph = null)
    {
        //
        $opsiAir = Water::select('nama')->groupBy('nama')->get();
        $opsiph = Water::select('ph')->groupBy('ph')->get();
        $opsiManfaat = Water::select('manfaat')->groupBy('manfaat')->get();
        return view('admin.air.index'
                    , compact('opsiAir', 'opsiph', 'opsiManfaat'));
    }

    public function waterfilter(Request $request)
    {
        //
        $raw = Water::select(['id', 'nama', 'ph', 'manfaat']);
        if (isset($request->nama))
        {$raw->where('nama', 'like', '%'. $request->nama .'%');}
        if (isset($request->ph)) {$raw->where('ph', '=', $request->ph);}
        // if (isset($request->manfaat))
        // {$raw->where('manfaat', 'like', '%'. $request->manfaat . '%');}
        $data = Datatables::of($raw);
        return $data
                ->addColumn('action', function ($water) {
                    return
                    '<a href="'.route('water.show', ['water' => $water->id])
                    .'" class="btn btn-xs btn-primary mr-1">Detail</a>'
                    .'<a href="'.route('water.edit',['water' => $water->id ])
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
        $air = null;
        return view( 'admin.air.add_form', compact('air') );
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
          'nama' => 'required',
          'ph' => 'required|max:14|numeric',
          'manfaat' => 'required'
        ]);
        // dd( $request );
        Water::create($request->all());
        return redirect( '/water' )->with('status', 'Data Jenis Air Berhasil Ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Water  $water
     * @return \Illuminate\Http\Response
     */
    public function show(Water $water)
    {
        //
        $air = $water;
        $produk = Water::find($water->id)->products;
        // dd($produk);
        return view( 'admin.air.detail', compact('air', 'produk'));
    }

    // public function water($ph = null)
    // {
    //   // code...
    //   // dd($this->request);
    //   if ($ph == null) {
    //     if ($this->request->query('ph') != null) {
    //       $air = Water::where('ph', $this->request->query('ph'))->get();
    //     } else {
    //       $air = Water::all();
    //     }
    //   } else {
    //     // dd($ph);
    //     $air = Water::where('ph', $ph)->get();
    //   }
    //   return view('admin.air.index', compact('air'));
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Water  $water
     * @return \Illuminate\Http\Response
     */
    public function edit(Water $water)
    {
        //
        $air = $water;
        return view( 'admin.air.edit_form', compact('air') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Water  $water
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Water $water)
    {
        //
        $request->validate([
          'nama' => 'required',
          'ph' => 'required|max:14|numeric',
          'manfaat' => 'required'
        ]);
        Water::where('id', $water->id)
                    ->update([
                      'nama' => $request->nama,
                      'ph' => $request->ph,
                      'manfaat' => $request->manfaat
                    ]);
        return redirect(route('water.index'))->with('status', 'Data Jenis Air Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Water  $water
     * @return \Illuminate\Http\Response
     */
    public function destroy(Water $water)
    {
        //
        Water::destroy($water->id);
        return redirect(route('water.index'))->with('status', 'Data Jenis Air Berhasil Dihapus!');
    }
}
