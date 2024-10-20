 <?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CataloryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FactoryController;
use App\Http\Controllers\HangSuDungController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SatffController;
use App\Http\Controllers\LichLamViecController;
use App\Http\Controllers\ChamCongController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GoodsReceiptController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/ 

//goods receipt api
Route::controller(GoodsReceiptController::class)->group(function () {
    Route::post('/goods-receipt', 'createGoodsReceipt');
    Route::get('/goods-receipt', 'getAll');
});

//catalog api
Route::get('/catalory',[CataloryController::class,'getCatalory']);
Route::post('/catalory',[CataloryController::class,'create']);


//factory api
Route::get('/factory',[FactoryController::class,'getAll']);
Route::get('/factory/{id}',[FactoryController::class,'getById']);
Route::post('/factory',[FactoryController::class,'create']);
Route::put('/factory/{id}',[FactoryController::class,'update']);
Route::delete('/factory/{id}',[FactoryController::class,'delete']);

//employee api
Route::post('/employee/create-working-schedule',[LichLamViecController::class,'create']);
Route::get('/employee/lich-lam-viec',[LichLamViecController::class,'getAll']);
Route::put('/employee/lich-lam-viec/{id}',[LichLamViecController::class,'update']);
Route::delete('/employee/lich-lam-viec/{id}',[LichLamViecController::class,'delete']);
Route::get('employee/lich-lam-viec/{staff_id}',[LichLamViecController::class,'getByStaffId']);

Route::get('employee/',[SatffController::class,'getAll']);
Route::get('employee/{user_id}',[SatffController::class,'getInfoEmployee']);
Route::post('/employee/salary',[SatffController::class,'createSalary']);
Route::get('/employee/salary',[SatffController::class,'getAllSalary']);

Route::post('/employee/cham-cong',[ChamCongController::class,'create']);
Route::get('/employee/cham-cong',[ChamCongController::class,'index']);
Route::put('/employee/cham-cong/{id}',[ChamCongController::class,'update']);
Route::post('employee/check-in',[ChamCongController::class,'create']);
Route::put('employee/check-out/{id}',[ChamCongController::class,'update']);
Route::get('employee/cham-cong/{staff_id}/{day}',[ChamCongController::class,'getByStaffIdAndDay']);
Route::get('employee/cham-cong',[ChamCongController::class,'index']);
Route::put('employee/{id}',[ChamCongController::class,'update']);

Route::post('login',[AuthController::class,'login']);
Route::post('register',[AuthController::class,'register']);
Route::post('/logout',[AuthController::class,'logout']);

Route::get('/product',[ProductController::class,'getAll']);
Route::post('/product',[ProductController::class,'create']);
Route::post('/product/{id}',[ProductController::class,'update']);






// user manager api
Route::controller(UserController::class)->group(function () {
    Route::get('/users/{id}', 'getUserById');
    Route::post('/users', 'createUser');
    Route::put('/users/{id}', 'updateUser');
    Route::get('/users/{id}/staff', 'getStaffByUserId');
    Route::get('/users', 'getAll');
    Route::delete('/users/{id}', 'deleteUser');
});
//manager discount api
Route::controller(PromotionController::class)->group(function () {
    Route::get('/promotion', 'getPromotion');
    Route::post('/promotion', 'create');
    Route::delete('/promotion/{id}', 'delete');
    Route::put('/promotion/{id}', 'update');
});







Route::controller(HangSuDungController::class)->group(function () {
    Route::get('/hang-su-dung', 'getAll');
    Route::get('/hang-su-dung/{id}', 'getById');
    Route::post('/hang-su-dung', 'create');
    Route::put('/hang-su-dung/{id}', 'update');
    Route::delete('/hang-su-dung/{id}', 'delete');
});




Route::middleware('auth:sanctum')->group(function() {
    
    Route::get('/logout',[AuthController::class,'logout']);

    Route::get('/user', function (Request $request) {
        return $request->user();
    });


    Route::post('/check-login-status',[AuthController::class,'checkLoginStatus']);
    Route::get('/current-user',[AuthController::class,'getCurrentUser']);
    Route::post('/verify-token',[AuthController::class,'verifyToken']);
});






Route::controller(CustomerController::class)->group(function () {
    Route::get('/customer/{phone}', 'getOne');
    Route::post('/customer', 'create');
    Route::put('/customer/{id}', 'update');

});

Route::controller(OrdersController::class)->group(function () {
    Route::get('/orders', 'getAll');
    // Route::post('/order', 'create');
});
Route::post('/orders', [OrdersController::class, 'create']);
Route::put('/orders/{order_id}', [OrdersController::class, 'updateOrder']);
Route::get('/orders/detail/{order_id}', [OrdersController::class, 'getDetail']);
Route::get('/orders', [OrdersController::class, 'getAll']);



Route::post('/vnpay/pay', [PaymentController::class, 'pay']);
Route::get('/vnpay/return', [PaymentController::class, 'return']);
Route::post('/vnpay/notify', [PaymentController::class, 'notify']);




Route::get('/hang-su-dung',[HangSuDungController::class,'getAll']);
Route::get('/hang-su-dung-product',[HangSuDungController::class,'get']);




///php artisan serve --host=10.0.2.16 


