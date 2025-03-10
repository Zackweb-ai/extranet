use App\Http\Controllers\UserController;

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('users', UserController::class);
});
use App\Http\Controllers\GroupeController;

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('groupes', GroupeController::class);
});
