<?php

use App\OnlineShop;
use App\Book;
use App\online_product;
use App\online_member;
use App\user_tables;
use Illuminate\Http\Request;
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
//ログイン
Route::get('/login', function (Request $request) {
    return redirect('LOG101');
});

//ログアウト
Route::get('/logout', function (Request $request) {
    $request->session()->flush();
    return redirect('LOG101');
});

//ログインエラー
Route::get('/LOG101_ERROR', function (Request $request) {
    return view('LOG101_ERROR',['request' =>$request]);
});

Route::get('/', function (Request $request) {
    return view('MEN101',['request' =>$request]);
});

Route::get('/MEN101', function (Request $request) {
    return view('MEN101',['request' =>$request]);
});

//ログイン画面→ユーザメニュー
Route::post('/MEN101', function (Request $request) {
    
    $user =DB::table('online_member')
    ->where('MEMBER_NO', '=', $request->input('staffNo'))
    ->where('PASSWORD', '=', $request->input('password'))
    ->first();

    if($user == null)
    {
        $request->session()->flush();
        return redirect('LOG101_ERROR');
    }

    // セッションIDの再発行
    $request->session()->regenerate();
    session(['userId' => $user->MEMBER_NO]);
    session(['userName' => $user->NAME]);
    $request->session()->put('kagoIsNull',"true");
    

    return view('MEN101',['request' =>$request]);
});

Route::get('/MEM101', function (Request $request) {
    return view('MEM101',['request' =>$request]);
});

Route::post('/MEM102', function (Request $request) {
    return view('MEM102',['$request' =>$request]);
});

Route::post('/MEM103', function (Request $request) {
    $date =date("Y/m/d H:i:s");
    App\online_member::create(['PASSWORD' => $request->input('password'),
                                            'NAME' => $request->input('name'),
                                            'AGE' => $request->input('age'),
                                            'SEX' =>$request->input('sex'),
                                            'ZIP' => $request->input('post-num'),
                                            'ADDRESS' => $request->input('address'),
                                            'TEL' => $request->input('tel'),
                                            'REGISTER_DATE' => $date,
                                            'DELETE_FLG' => 'false']);
    $userRes =DB::table('online_member')
    ->orderBy('MEMBER_NO', 'desc')
    ->first();
    return view('MEM103',['user' =>$userRes]);
});

Route::get('/LOG101', function (Request $request) {
    return view('LOG101',['request' =>$request]);
});

Route::get('/LOG102', function (Request $request) {
    return view('LOG102',['request' =>$request]);
});

Route::get('/SHO101', function (Request $request) {
    $products=online_product::all();
    return view('SHO101',['products' =>$products],['request' =>$request]);
});

Route::post('/SHO101', function (Request $request) {
    $productName = $request->input('product-name');
    $products = DB::table('online_product')
       // ->when(!empty($productName), function ($query, $productName)
        ->when($productName=='リポビタンD', function ($query, $productName)
        {
        //if(strcmp($productName,'リポビタンD')==0)
        //if($productName==='リポビタンD')
        //{
        //    return $query->where('PRODUCT_NAME', '<>', $productName);
        //}else
        //{
        //    return $query->where('PRODUCT_NAME', '<>', 'BOSS');
        //}
            return $query->where('PRODUCT_NAME', '=', 'リポビタンD');
        })
        ->get();
    return view('SHO101',['products' =>$products],['request' =>$request]);
});

Route::get('/SHO102', function (Request $request) {
    
    $productCode = $request->input('product_code');
    $product =DB::table('online_product')
    ->where('PRODUCT_CODE', '=', $productCode)
    ->first();
    return view('SHO102',['product' =>$product],['request' =>$request]);
});

Route::post('/SHO103', function (Request $request) {

    if(!isset($request) || !$request->session()->has('userId'))
    {
        return view('LOG101',['request' =>$request]);
    }

    $product_code = array();
    $product_name = array();
    $maker = array();
    $price = array();
    $choose_value = array();

    $idx = 0;
    foreach($request->input('choose_flag') as $flag){
        if($flag == "true")
        {
            array_push($product_code, $request->input('product_code')[$idx]);
            array_push($product_name, $request->input('product_name')[$idx]);
            array_push($maker, $request->input('maker')[$idx]);
            array_push($price, $request->input('price')[$idx]);
            array_push($choose_value, $request->input('choose_value')[$idx]);
        }
        $idx++;
    }

    if($idx > 0)
    {
        $request->session()->put('kagoIsNull',"false");
    }

    $request->session()->put('product_code',$product_code);
    $request->session()->put('product_name',$product_name);
    $request->session()->put('maker',$maker);
    $request->session()->put('price',$price);
    $request->session()->put('choose_value',$choose_value);


    return view('SHO103',['request' =>$request]);
});

Route::get('/KGO101', function (Request $request) {
    if(!isset($request) || !$request->session()->has('userId'))
    {
        return view('LOG101',['request' =>$request]);
    }
    return view('KGO101',['request' =>$request]);
});

Route::get('/KGO101_torikeshi', function (Request $request) {
$request->session()->put('kagoIsNull',"true");
    $request->session()->forget('choose_flag');
    $request->session()->forget('product_code');
    $request->session()->forget('product_name');
    $request->session()->forget('maker');
    $request->session()->forget('price');
    $request->session()->forget('choose_value');
    return view('KGO101',['request' =>$request]);
});

Route::get('/KGO101_allCancel', function (Request $request) {
    $request->session()->put('kagoIsNull',"true");
    $request->session()->forget('choose_flag');
    $request->session()->forget('product_code');
    $request->session()->forget('product_name');
    $request->session()->forget('maker');
    $request->session()->forget('price');
    $request->session()->forget('choose_value');
    return view('MEN101',['request' =>$request]);

});

Route::post('/KGO102', function (Request $request) {

    $request->session()->put('product_code',$request->input('product_code'));
    $request->session()->put('product_name',$request->input('product_name'));
    $request->session()->put('maker',$request->input('maker'));
    $request->session()->put('price',$request->input('price'));
    $request->session()->put('choose_value',$request->input('choose_value'));

   
    if($request->input('product_code') > 0)
    {
    $request->session()->put('kagoIsNull',"false");
    }
    else
    {
     $request->session()->put('kagoIsNull',"true");
    }
    return view('KGO102',['request' =>$request]);

});


Route::get('/kojichu', function (Request $request) {
    return view('kojichu',['request' =>$request]);
});
