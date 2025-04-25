<?php


use Illuminate\Support\Facades\Route;
use App\Models;
use App\Models\XeModel;
use App\Http\Controllers;
use App\Http\Controllers\XeController;
use App\Http\Controllers\DichVuController;
use App\Http\Controllers\TaiKhoanController;
use App\Http\Controllers\DatLichController;
use App\Mail\DatLichServiceMail;
use App\Models\DichVuModel;

Route::get('/', function () {
    return redirect()->route('home'); // trang chủ
});
Route::prefix('Carshowroom')->group(function () {
    Route::get('/', function () {
        return view('index');
    })->name('home');

    Route::get('/form', function () {
        return view('laithu');
    })->name('form');


    Route::get('/test-mail', function () {
        $data = [
            'ho_ten' => 'Nguyễn Văn A',
            'email' => 'example@gmail.com',
            'ten_loai' => 'Bảo dưỡng',
            'ngay_lap' => '2025-04-21',
            'noi_dung' => 'Kiểm tra dầu máy',
        ];
        Mail::to('omonguyen0@gmail.com')->send(new DatLichServiceMail($data));
        return 'Mail sent!';
    });





    Route::get('/login', [TaiKhoanController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [TaiKhoanController::class, 'login'])->name('login.post');

    Route::post('/register', [TaiKhoanController::class, 'register'])->name('register');

    Route::post('/logout', [TaiKhoanController::class, 'logout'])->name('logout');


    Route::get('/service', [DichVuController::class, 'loaidichvu'])->name('service');
    Route::post('/service', [DichVuController::class, 'dangkydichvu'])->name('service');

    Route::get('/list', [XeController::class, 'DanhSachXe'] )->name('list');

    Route::get('/contact', function () {
        return view('lienhe');
    })->name('contact');

    Route::get('/show/{ma_xe}', [XeController::class, 'show'])->name('xe.show');
    Route::get('/show', function(){
        return view('chitiet');
    })->name('show');

    Route::get('/blog', function () {
        return view('baiviet');
    })->name('blog');
    Route::get('/test', function () {
        return view('test');
    })->name('test');
});




Route::get('/filter/car-type/{type}', 'CarController@filterByType')->name('filter.car_type');
Route::get('/filter/price/{price}', 'CarController@filterByPrice')->name('filter.price');
Route::get('/filter/program/{program}', 'CarController@filterByProgram')->name('filter.program');
Route::get('/filter/engine/{engine}', 'CarController@filterByEngine')->name('filter.engine');
Route::get('/filter/interior/{interior}', 'CarController@filterByInterior')->name('filter.interior');
Route::get('/filter/equipment/{equipment}', 'CarController@filterByEquipment')->name('filter.equipment');
Route::get('/filter/color/{color}', 'CarController@filterByColor')->name('filter.color');
