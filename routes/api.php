<?php

use App\Http\Controllers\Api\Delivery\AssignDeliveryController;
use App\Http\Controllers\Api\Delivery\TrackDeliveryController;
use App\Http\Controllers\Api\Delivery\UpdateStatusDeliveryController;
use App\Http\Controllers\Api\Menu\AddMenuItemController;
use App\Http\Controllers\Api\Menu\DeleteMenuItemController;
use App\Http\Controllers\Api\Menu\GetMenuItemController;
use App\Http\Controllers\Api\Menu\GetMenuItemDetailsController;
use App\Http\Controllers\Api\Menu\UpdateMenuItemController;
use App\Http\Controllers\Api\Order\CancelOrderController;
use App\Http\Controllers\Api\Order\GetAllOrdersController;
use App\Http\Controllers\Api\Order\GetOrderDetailsController;
use App\Http\Controllers\Api\Order\PlaceOrderController;
use App\Http\Controllers\Api\Order\UpdateOrderController;
use App\Http\Controllers\Api\Restaurant\AddRestaurantController;
use App\Http\Controllers\Api\Restaurant\DeleteRestaurantController;
use App\Http\Controllers\Api\Restaurant\GetAllRestaurantsController;
use App\Http\Controllers\Api\Restaurant\GetRestaurantDetailController;
use App\Http\Controllers\Api\Restaurant\UpdateRestaurantController;
use App\Http\Controllers\Api\Review\GetReviewsController;
use App\Http\Controllers\Api\Review\PostReviewController;
use App\Http\Controllers\Api\SpecialOffer\CreateOfferController;
use App\Http\Controllers\Api\SpecialOffer\DeleteOfferController;
use App\Http\Controllers\Api\SpecialOffer\GetAllOffersController;
use App\Http\Controllers\Api\SpecialOffer\GetOfferDetailsController;
use App\Http\Controllers\Api\SpecialOffer\UpdateOfferController;
use App\Http\Controllers\Api\User\ChangePasswordController;
use App\Http\Controllers\Api\User\DeleteUserController;
use App\Http\Controllers\Api\User\ForgetPasswordController;
use App\Http\Controllers\Api\User\GetUserDetailController;
use App\Http\Controllers\Api\User\UpdateUserDetailController;
use App\Http\Controllers\Api\User\UserLoginController;
use App\Http\Controllers\Api\User\UserLogoutController;
use App\Http\Controllers\Api\User\UserProfileController;
use App\Http\Controllers\Api\User\UserRegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::prefix('v1')->group(function () {
    Route::prefix('user')->group(function () {
        Route::post('/register', UserRegisterController::class);
        Route::post('/login', UserLoginController::class);
        Route::post('/forgot-password', ForgetPasswordController::class);
    });

    Route::middleware('auth:sanctum')->group(function () {
        Route::prefix('user')->group(function () {
            Route::get('/profile', UserProfileController::class);
            Route::put('/update', UpdateUserDetailController::class);
            Route::get('/info', GetUserDetailController::class);
            Route::post('/logout', UserLogoutController::class);
            Route::delete('/{id}', DeleteUserController::class);
            Route::post('/change-password', ChangePasswordController::class);
        });

        Route::prefix('orders')->group(function () {
            Route::post('/', PlaceOrderController::class);
            Route::get('/', GetAllOrdersController::class);
            Route::get('/{id}', GetOrderDetailsController::class);
            Route::put('/{id}', UpdateOrderController::class);
            Route::patch('/{id}/cancel', CancelOrderController::class);
        });

        Route::prefix('restaurants')->group(function () {
            Route::post('/', AddRestaurantController::class);
            Route::put('/{id}', UpdateRestaurantController::class);
            Route::get('/', GetAllRestaurantsController::class);
            Route::get('/{id}', GetRestaurantDetailController::class);
            Route::delete('/{id}', DeleteRestaurantController::class);
        });

        Route::prefix('menu-items')->group(function () {
            Route::post('/', AddMenuItemController::class);
            Route::put('/{id}', UpdateMenuItemController::class);
            Route::get('/', GetMenuItemController::class);
            Route::get('/{id}', GetMenuItemDetailsController::class);
            Route::delete('/{id}', DeleteMenuItemController::class);
        });

        Route::prefix('deliveries')->group(function () {
            Route::post('/{id}/assign', AssignDeliveryController::class);
            Route::get('/{id}/track', TrackDeliveryController::class);
            Route::put('/{id}/status', UpdateStatusDeliveryController::class);
        });

        Route::prefix('reviews')->group(function () {
            Route::get('/', GetReviewsController::class);
            Route::post('/', PostReviewController::class);
        });

        Route::prefix('offers')->group(function () {
            Route::post('/', CreateOfferController::class);
            Route::put('/{id}', UpdateOfferController::class);
            Route::get('/', GetAllOffersController::class);
            Route::get('/{id}', GetOfferDetailsController::class);
            Route::delete('/{id}', DeleteOfferController::class);
        });
    });
});

//Route::prefix('orders')->group(function () {
//    Route::middleware('auth:api')->group(function () {
//        Route::post('/', PlaceOrderController::class);
//        Route::get('/', GetAllOrdersController::class);
//        Route::get('/{id}', GetOrderDetailsController::class);
//        Route::put('/{id}', UpdateOrderController::class);
//        Route::patch('/{id}/cancel', CancelOrderController::class);
//    });
//});
//Route::prefix('restaurants')->group(function () {
//    Route::middleware('auth:api')->group(function () {
//        Route::post('/', AddRestaurantController::class);
//        Route::put('/{id}', UpdateRestaurantController::class);
//        Route::get('/', GetAllRestaurantsController::class);
//        Route::get('/{id}', GetRestaurantDetailController::class);
//        Route::delete('/{id}', DeleteRestaurantController::class);
//    });
//});
//Route::prefix('menu-items')->group(function () {
//    Route::middleware('auth:api')->group(function () {
//        Route::post('/', AddMenuItemController::class);
//        Route::put('/{id}', UpdateMenuItemController::class);
//        Route::get('/', GetMenuItemController::class);
//        Route::get('/{id}', GetMenuItemDetailsController::class);
//        Route::delete('/{id}', DeleteMenuItemController::class);
//    });
//});
//Route::prefix('deliveries')->group(function () {
//    Route::middleware('auth:api')->group(function () {
//        Route::post('/{id}/assign', AssignDeliveryController::class);
//        Route::get('/{id}/track', TrackDeliveryController::class);
//        Route::put('/{id}/status', UpdateStatusDeliveryController::class);
//    });
//});
//Route::prefix('reviews')->group(function () {
//    Route::middleware('auth:api')->group(function () {
//        Route::get('/', GetReviewsController::class);
//        Route::post('/', PostReviewController::class);
//    });
//});
//Route::prefix('offer')->group(function () {
//    Route::middleware('auth:api')->group(function () {
//        Route::post('/', CreateOfferController::class);
//        Route::put('/{id}', UpdateOfferController::class);
//        Route::get('/', GetAllOffersController::class);
//        Route::get('/{id}', GetOfferDetailsController::class);
//        Route::delete('/{id}', DeleteOfferController::class);
//    });
//});
