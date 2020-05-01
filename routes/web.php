<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// use Illuminate\Http\Request;
// use App\Water;

Route::get('/', 'HomeController@index');

Route::resource('water', 'WaterController');
Route::resource('container', 'ContainerController');
Route::resource('transaction', 'TransactionController');
Route::resource('d_transaction', 'DTransactionController');
Route::get('productsearch', 'ProductController@products')->name('product.filter');
Route::get('containerfilter', 'ContainerController@getCustomFilter')->name('container.filter');
Route::get('waterfilter', 'WaterController@waterfilter')->name('water.filter');
Route::get('transactionfilter', 'TransactionController@transactionjson')->name('transaction.filter');
Route::get('d_transactionfilter', 'DTransactionController@dts')->name('d_transaction.filter');
// Route::get('containerfilters', 'ContainerController@getCustomFilter')->name('containers.filter');
Route::resource('product', 'ProductController');
Auth::routes();
// Route::get('/air/{ph?}', 'WaterController@water');
// // Route::get('/air', 'WaterController@index');
// Route::get('/waters/{ph?}', function ($ph = null)
// {
//   $request = Request();
//   if ($ph == null) {
//     if ($request->query('ph') != null) {
//       $air = Water::where('ph', $request->query('ph'))->get();
//     } else {
//       $air = Water::all();
//     }
//   } else {
//     // dd($ph);
//     $air = Water::where('ph', $ph)->get();
//   }
//   return view('admin.air.index', compact('air'));
//   // dd( $request->query('ph'));
//   // $sss = ['1' => '11,5',
//   //         '2' => '9,5',
//   //         '3' => '9,0',
//   //         '4' => '8,5'
//   //        ];
//   // $index = null; $satuan = null;
//   // if ($request->query('ph') != null || $ph != null) {
//   //   $idph = null;
//   //   if ($ph != null) {
//   //     // $index = array_search($ph, $sss);
//   //   } else {
//   //     // $index = array_search($request->query('ph'), $sss);
//   //   }
//   //   dd( $index);
//   // } else {
//   //   $index = Water::all();
//   //   $satuan[] = $sss;
//   // }
//   // // dd( $ph );
//   // return view('admin.air.index', compact($sss));
// }
// );

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
