<?php

namespace App\Http\Controllers;

use App\Water;
use Illuminate\Http\Request;

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
        // $air = Water::all();
        // return view('admin.air.index', compact('air'));
        if ($ph == null) {
          if ($this->request->query('ph') != null) {
            $air = Water::where('ph', $this->request->query('ph'))->get();
          } else {
            $air = Water::all();
          }
        } else {
          // dd($ph);
          $air = Water::where('ph', $ph)->get();
        }
        return view('admin.air.index', compact('air'));
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
        return view( 'admin.air.detail', compact('air'));
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
