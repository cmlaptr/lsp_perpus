<?php

use App\Models\Buku;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Pemberitahuan;
use App\Models\User;
use App\Models\Peminjaman; 
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('/user')->group(function(){
    Route::get('dashboard', function(){
        $pemberitahuan = Pemberitahuan::where('status', 'aktif')->get();

        $buku = Buku::all();

        return view('user.dashboard', compact('buku', 'pemberitahuan'));
    })->name('user.dashboard');
    Route::get('peminjaman', function(){

        $peminjaman = Peminjaman::where('user_id', Auth::user()->id)->get();

        return view('user.peminjaman',  compact('peminjaman'));
    })->name('user.peminjaman');
    Route::get('form_peminjaman', function(){

        $buku = Buku::all();

        return view('user.form_peminjaman', compact('buku'));
    })->name('user.form_peminjaman');
    Route::post('form_peminjaman', function(Request $request){

        $buku_id = $request->buku_id;

        $buku = Buku::all();

        return view('user.form_peminjaman', compact('buku', 'buku_id'));
    })->name('user.form_peminjaman');
    Route::post('submit_peminjaman', function (Request $request) {

        $peminjaman = Peminjaman::create($request->all());

        if ($peminjaman) {
            return redirect()->route("user.peminjaman")
            ->with("status", "success")
            ->with("message", "Berhasil Menambah Data");
        }
            return redirect()->back()
            ->with("status", "danger")
            ->with("message", "Gagal Menambah Data");

    })->name('user.submit_peminjaman');
    Route::get('pengembalian', function(){
        return view('user.pengembalian');
    })->name('user.pengembalian');
    Route::get('pesan', function(){
        return view('user.pesan');
    })->name('user.pesan');
    Route::get('profile', function(){
        return view('user.profile');
    })->name('user.profile');
    Route::put('profile', function (Request $request) {
        $id = Auth::user()->id;

        $namaGambar = time().'.'.$request->foto->extension();

        $request->foto->move(public_path('img'), $namaGambar);

        $user = User::find(Auth::user()->id)->update($request->all());
        
        $profile = User::find($id)->update([
            "password" => Hash::make($request->password),
            "foto" => "/img/", $namaGambar
        ]);

        if ($user && $profile) {
            return redirect()->back()
            ->with("status", "success")
            ->with("message", "Berhasil Update Profil");
        }
            return redirect()->back()
            ->with("status", "danger")
            ->with("message", "Gagal Update Profil");
    })->name('update.profile');
});
Route::prefix('/admin')->group(function(){
    Route::get('dashboard', function(){
        return view('admin.dashboard');
    })->name('admin.dashboard');
});
