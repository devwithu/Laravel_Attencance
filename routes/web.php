<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\User;
use App\Models\Attendance;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia\Inertia::render('Dashboard');
})->name('dashboard');

Route::get('/qr/{id}', function ($id) {

    $user = User::findOrFail($id);
    //return QrCode::generate('https://qra.jdj.kr/att/' . $id);


    return response(QrCode::format('png')->generate('https://qra.jdj.kr/att/' . $id))
        ->header('Content-Type','image/png')
        ->header('Pragma','public')
        ->header('Content-Disposition','inline; filename="qrcodeimg.png"')
        ->header('Cache-Control','max-age=60, must-revalidate');

});


Route::get('/att/{id}', function ($id) {
    return view('att.index', ['id' => $id]);
});

Route::get('/att/in/{id}', function ($id) {



    $user = User::findOrFail($id);

    $attendance = Attendance::create([
        'user_id' => $user->id,
        'type' => 1,
        'ip' => Request::ip(),
    ]);


    $do = '출근';



    return view('att.do',
        ['id' => $id,
            'do' => $do,
        ]);
});

Route::get('/att/out/{id}', function ($id) {

    $user = User::findOrFail($id);

    $attendance = Attendance::create([
        'user_id' => $user->id,
        'type' => 2,
        'ip' => Request::ip(),
    ]);

    $do = '퇴근';
    return view('att.do',
        ['id' => $id,
            'do' => $do,
        ]);
});

