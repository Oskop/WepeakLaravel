<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Water;
use App\Container;
use App\Transaction;
use App\D_Transaction;

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
      $data = Water::all();
      return response()->json($data, 200);
    }
}
