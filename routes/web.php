<?php
use App\Http\Controllers\Admin\AuditLogsController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\CommentsController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PermissionsController;
use App\Http\Controllers\Admin\PrioritiesController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\StatusesController;
use App\Http\Controllers\Admin\TicketsController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\TicketController;


Route::get('/', [TicketController::class, 'create']);
Route::get('/home', function () {
    $route = Gate::denies('dashboard_access') ? 'admin.tickets.index' : 'admin.home';
    if (session('status')) {
        return redirect()->route($route)->with('status', session('status'));
    }

    return redirect()->route($route);
});

Auth::routes(['register' => false]);

Route::post('tickets/media', [TicketController::class, 'storeMedia'])->name('tickets.storeMedia');
Route::post('tickets/comment/{ticket}', [TicketController::class, 'storeComment'])->name('tickets.storeComment');
Route::resource('tickets', TicketController::class)->only(['show', 'create', 'store']);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    // Permissions
    Route::delete('permissions/destroy', [PermissionsController::class, 'massDestroy'])->name('permissions.massDestroy');
    Route::resource('permissions', PermissionsController::class);

    // Roles
    Route::delete('roles/destroy', [RolesController::class, 'massDestroy'])->name('roles.massDestroy');
    Route::resource('roles', RolesController::class);

    // Users
    Route::delete('users/destroy', [UsersController::class, 'massDestroy'])->name('users.massDestroy');
    Route::resource('users', UsersController::class);

    // Statuses
    Route::delete('statuses/destroy', [StatusesController::class, 'massDestroy'])->name('statuses.massDestroy');
    Route::resource('statuses', StatusesController::class);

    // Priorities
    Route::delete('priorities/destroy', [PrioritiesController::class, 'massDestroy'])->name('priorities.massDestroy');
    Route::resource('priorities', PrioritiesController::class);

    // Categories
    Route::delete('categories/destroy', [CategoriesController::class, 'massDestroy'])->name('categories.massDestroy');
    Route::resource('categories', CategoriesController::class);

    // Tickets
    Route::delete('tickets/destroy', [TicketsController::class, 'massDestroy'])->name('tickets.massDestroy');
    Route::post('tickets/media', [TicketsController::class, 'storeMedia'])->name('tickets.storeMedia');
    Route::post('tickets/comment/{ticket}', [TicketsController::class, 'storeComment'])->name('tickets.storeComment');
    Route::resource('tickets', TicketsController::class);

    // Comments
    Route::delete('comments/destroy', [CommentsController::class, 'massDestroy'])->name('comments.massDestroy');
    Route::resource('comments', CommentsController::class);

    // Audit Logs
    Route::resource('audit-logs', AuditLogsController::class, ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);
});
