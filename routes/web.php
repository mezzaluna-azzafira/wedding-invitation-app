<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\WishController;
use App\Http\Controllers\CheckinController;
use App\Http\Controllers\DashboardController;

// ==========================================
// 1. TAMPILAN UTAMA & LOGIN/INPUT NAMA TAMU
// ==========================================

// Halaman Utama: Menampilkan Form Input Nama Tamu saat awal buka web
Route::get('/', function () {
    $guest = (object) [
        'id'   => 0,
        'name' => 'Tamu Undangan',
        'code' => 'GUEST'
    ];
    $qrCode = '<img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data='.$guest->code.'" alt="QR Code">';

    return view('invitation', compact('guest', 'qrCode'));
})->name('home');

// Memproses Form Input Nama -> Simpan ke Database -> Redirect
Route::post('/guest-login', function (Request $request) {
    $name = trim($request->input('name', 'Tamu Undangan'));

    // 1. Cari tamu berdasarkan nama
    $guest = DB::table('guests')->where('name', 'LIKE', "%{$name}%")->first();

    // 2. Jika tidak ada di database, simpan sebagai tamu baru
    if (!$guest) {
        $guestId = DB::table('guests')->insertGetId([
            'name'       => $name,
            'code'       => strtolower(Str::random(8)),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $guest = DB::table('guests')->where('id', $guestId)->first();
    }

    // 3. Pindahkan tamu ke halaman undangannya sendiri
    return redirect()->route('guest.show', ['code' => $guest->code]);
})->name('guest.login');

// Tampilan Undangan Berdasarkan KODE TAMU Personal
Route::get('/invitation/{code}', function ($code) {
    $guest = DB::table('guests')->where('code', $code)->firstOrFail();
    $qrCode = '<img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data='.$guest->code.'" alt="QR Code">';

    return view('invitation', compact('guest', 'qrCode'));
})->name('guest.show');

// Halaman Fullscreen QR Code
Route::get('/qr/{code}', function ($code) {
    $qrCode = '<img src="https://api.qrserver.com/v1/create-qr-code/?size=300x300&data='.$code.'" alt="QR Code">';
    return '<div style="display:flex; justify-content:center; align-items:center; height:100vh; background:#f4f4f4; font-family:sans-serif;">
                <div style="text-align:center; background:#fff; padding:30px; border-radius:15px; box-shadow:0 4px 10px rgba(0,0,0,0.1);">
                    <h2>Kode Tamu: '.$code.'</h2>
                    <div style="margin:20px 0;">'.$qrCode.'</div>
                    <a href="/" style="text-decoration:none; color:#007bff; font-weight:bold;">&larr; Kembali ke Undangan</a>
                </div>
            </div>';
})->name('guest.qr');

// ==========================================
// 2. ENDPOINT FORM (RSVP & UCAPAN)
// ==========================================

// Simpan RSVP dari Form JavaScript
// Simpan / Update RSVP (Mencegah Duplikasi)
Route::post('/rsvp', function (Request $request) {
    $guestId = $request->input('guest_id') ?? DB::table('guests')->value('id');
    $attendance = $request->input('attendance', 'attending');

    // Menggunakan updateOrInsert agar jika guest_id sudah ada, datanya cuma di-update
    DB::table('rsvps')->updateOrInsert(
        ['guest_id' => $guestId],
        [
            'attendance'   => $attendance,
            'total_guests' => $request->input('total_guests', 1),
            'message'      => $request->input('email', NULL),
            'updated_at'   => now(),
            'created_at'   => DB::raw('IFNULL(created_at, NOW())')
        ]
    );

    return response()->json([
        'success' => true,
        'message' => 'RSVP berhasil disimpan!'
    ]);
})->name('rsvp.store');

// Simpan Ucapan/Wishes dari Form JavaScript
Route::post('/wishes', function (Request $request) {
    DB::table('wishes')->insert([
        'name'        => $request->input('name', 'Tamu Undangan'),
        'message'     => $request->input('message', 'Selamat!'),
        'is_approved' => 1,
        'created_at'  => now(),
        'updated_at'  => now(),
    ]);

    return response()->json([
        'success' => true,
        'message' => 'Ucapan berhasil dikirim!'
    ]);
})->name('wishes.store');

Route::get('/wishes', [WishController::class, 'index'])->name('wishes.index');

// ==========================================
// 3. ADMIN & CHECK-IN CONTROLLER
// ==========================================
Route::get('/checkin/scanner', [CheckinController::class, 'scanPage'])->name('checkin.scanner');
Route::get('/checkin/{code}', [CheckinController::class, 'scan'])->name('checkin.scan');
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('guests', GuestController::class);