<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WaterController extends Controller
{
    //
    public function __construct()
    {
      $this->middleware('auth:api');
    }

    public function getWater(Request $request)
    {
      $data = $request->user();
      return response()->json($data,200);
    }

    public function getWaterList()
    {
      $data = App\Water::all();
      return response()->json($data, 200);
    }
}
