<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\RsvpController;
use App\Http\Controllers\WishController;
use App\Http\Controllers\CheckinController;
use App\Http\Controllers\DashboardController;

// ==========================================
// 1. TAMPILAN UTAMA (BACA DATA TAMU ASLI DARI DATABASE)
// ==========================================

// Jika akses localhost:8000 biasa -> Otomatis ambil data tamu pertama di database
Route::get('/', function () {
    $guest = DB::table('guests')->first();

    // Jika tabel guests di database masih kosong, buatkan 1 data default otomatis
    if (!$guest) {
        $guestId = DB::table('guests')->insertGetId([
            'name'       => 'Tamu Undangan',
            'code'       => 'ABC123',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $guest = DB::table('guests')->where('id', $guestId)->first();
    }

    $qrCode = '<img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data='.$guest->code.'" alt="QR Code">';

    return view('invitation', compact('guest', 'qrCode'));
});

// Tampilan undangan berdasarkan KODE TAMU spesifik (contoh: localhost:8000/invitation/vhr69jvs)
Route::get('/invitation/{code}', function ($code) {
    $guest = DB::table('guests')->where('code', $code)->firstOrFail();
    $qrCode = '<img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data='.$guest->code.'" alt="QR Code">';

    return view('invitation', compact('guest', 'qrCode'));
})->name('guest.show');

// Halaman Detail QR Code Full Screen
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
// 2. ENDPOINT FORM (SIMPAN KE MYSQL DATABASE)
// ==========================================

// Simpan RSVP ke Tabel MySQL
Route::post('/rsvp', function (Request $request) {
    $guestId = $request->input('guest_id') ?? DB::table('guests')->value('id');
    $attendance = $request->input('attendance') === 'tidak_hadir' ? 'not_attending' : 'attending';

    DB::table('rsvps')->insert([
        'guest_id'     => $guestId,
        'attendance'   => $attendance,
        'total_guests' => $request->input('total_guests', 1),
        'message'      => $request->input('message', $request->input('notes', NULL)),
        'created_at'   => now(),
        'updated_at'   => now(),
    ]);

    return response()->json([
        'success' => true,
        'message' => 'RSVP berhasil disimpan!'
    ]);
})->name('rsvp.store');

// Simpan Ucapan/Wishes ke Tabel MySQL
Route::post('/wishes', function (Request $request) {
    DB::table('wishes')->insert([
        'name'        => $request->input('name', $request->input('sender_name', 'Tamu Undangan')),
        'message'     => $request->input('message', $request->input('wish', 'Selamat atas pernikahannya!')),
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
// 3. ROUTE CONTROLLER LAINNYA
// ==========================================
Route::get('/checkin/scanner', [CheckinController::class, 'scanPage'])->name('checkin.scanner');
Route::get('/checkin/{code}', [CheckinController::class, 'scan'])->name('checkin.scan');
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Resource Guests
Route::resource('guests', GuestController::class);