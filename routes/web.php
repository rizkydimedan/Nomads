<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\TravelPackageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/detail/{slug}', [DetailController::class, 'index'])->name('detail');

// Checkout
Route::post('/checkout/{id}', [CheckoutController::class, 'process'])->name('checkout_process')->middleware(['auth', 'verified']);

Route::get('/checkout/{id}', [CheckoutController::class, 'index'])->name('checkout')->middleware(['auth', 'verified']);

Route::post('/checkout/create/{detail_id}', [CheckoutController::class, 'create'])->name('checkout_create')->middleware(['auth', 'verified']);

Route::post('/checkout/remove/{detail_id}', [CheckoutController::class, 'remove'])->name('checkout_remove')->middleware(['auth', 'verified']);

Route::post('/checkout/confirm/{id}', [CheckoutController::class, 'confirm'])->name('checkout_success')->middleware(['auth', 'verified']);
// End checkout

Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::get('/admin', [DashboardController::class, 'index'])->name('dashboard');

    // Route::resource('travel-package', 'TravelPackageController');
    Route::resource('travel-package', TravelPackageController::class);
    Route::resource('gallery', GalleryController::class);
    Route::resource('transaction', TransactionController::class);

});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
});


Route::get('/only-verified',function(){
    return view('auth.verified');
})->middleware(['auth', 'verified']);

require __DIR__ . '/auth.php';
