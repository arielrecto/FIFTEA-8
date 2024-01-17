<?php

use App\Models\Cart;
use App\Models\Type;
use App\Models\User;
use App\Models\Order;
use App\Models\Supply;
use App\Models\Product;
use App\Models\Category;
use App\Models\Feedback;
use App\Models\HeroContent;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\HeroContentController;
use App\Http\Controllers\Admin\SupplyController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\client\FeedbackController;
use App\Http\Controllers\Client\DashboardController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Employee\PointOfSaleController;
use App\Http\Controllers\Client\OrderController as ClientOrderController;
use App\Http\Controllers\Admin\FeedbackController as AdminFeedbackController;
use App\Http\Controllers\Client\ProductController as ClientProductController;
use App\Http\Controllers\Client\ProfileController as ClientProfileController;
use App\Http\Controllers\Employee\OrderController as EmployeeOrderController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\GcashPaymentController;
use App\Http\Controllers\Employee\SupplyController as EmployeeSupplyController;
use App\Http\Controllers\Employee\TransactionController as EmployeeTransactionController;

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

Route::get('/home', [HomeController::class, 'home']);

Route::prefix('media')->as('media.')->group(function () {
    Route::get('product/{name}', [MediaController::class, 'product'])->name('product');
    Route::get('profile/{name}', [MediaController::class, 'profile'])->name('profile');
    Route::get('gcash/{name}', [MediaController::class, 'gcash'])->name('gcash');
    Route::middleware('auth')->group(function () {
        Route::get('payment/{name}', [MediaController::class, 'payment'])->name('payment');
    });
});

Route::get('/', function () {

    $feedBacks = Feedback::latest()->where('is_display', true)->limit(4)->get();

    $products = Product::withCount('cart')->orderByDesc('cart_count')->take(3)->get();

    $content = HeroContent::first();

    return view('welcome', compact(['feedBacks', 'products', 'content']));

});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// temporary routes
Route::get('/products', function () {
    $user = Auth::user();

    if ($user) {
        $cart = Cart::with('products')->where('is_check_out', false)->where('user_id', $user->id)->first();
    } else {
        $cart = null;
    }
    $subtotal = 0;
    //computation for subtotal if cart is not null
    if ($cart !== null) {
        foreach ($cart->products()->get() as $product) {
            $subtotal = $subtotal + $product->total;
        }
    }


    return view('products.index', compact(['cart', 'subtotal']));
})->name('products');

Route::get('/product/data', function () {

    $products = Product::with('categories')->withAvg('cart', 'rate')->get();
    $categories = Category::get();
    $supplies = Supply::with('types')->get();
    return response([
        'products' => $products,
        'categories' => $categories,
        'supplies' => $supplies
    ]);
});

Route::get('product/filter/{name}', function ($name) {

    $products = Category::where('name', $name)->first()->products()->get();

    return $products;
});


// Route::get('/user/cart', function () {
//     return view('cart.cart');
// })->name('cart');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware('role:admin')->prefix('admin')->as('admin.')->group(function () {
        Route::prefix('dashboard')->as('dashboard.')->group(function () {
            Route::get('/', [AdminDashboardController::class, 'index'])->name('index');
        });

        Route::prefix('supply')->as('supply.')->group(function () {
            Route::resource('type', TypeController::class);
            Route::get('/filter', [SupplyController::class, 'filter'])->name('filter.json');
        });

        Route::resource('gcash', GcashPaymentController::class)->only('store', 'show', 'edit', 'update', 'index', 'create');
        Route::resource('order', OrderController::class);
        Route::resource('transaction', TransactionController::class);
        Route::resource('category', CategoryController::class);
        Route::resource('products', ProductController::class);
        Route::resource('supply', SupplyController::class);
        Route::resource('employee', EmployeeController::class);
        Route::resource('profile', ProfileController::class)->except('destroy', 'index');
        Route::resource('feedbacks', AdminFeedbackController::class)->except(['store', 'create']);
        Route::resource('hero', HeroContentController::class);
    });

    Route::middleware('role:employee|admin')->prefix('employee')->as('employee.')->group(function () {

        Route::prefix('dashboard')->as('dashboard.')->group(function () {
            Route::get('/', function () {
                return view('users.employee.dashboard');
            })->name('index');
        });

        Route::prefix('pos')->as('pos.')->group(function () {
            Route::get('/', [PointOfSaleController::class, 'index'])->name('index');
        });

        Route::prefix('order')->as('order.')->group(function () {
            Route::post('/approve/{id}', [EmployeeOrderController::class, 'approved'])->name('approved');
        });


        Route::resource('transaction', EmployeeTransactionController::class)->only([
            'index',
            'create',
            'update',
            'edit',
            'store',
            'show',
        ]);

        Route::resource('supply', EmployeeSupplyController::class)->only([
            'index'
        ]);

        Route::resource('order', EmployeeOrderController::class)->only([
            'index',
            'show',
            'destroy'
        ]);

    });

    Route::middleware('role:customer')->prefix('client')->as('client.')->group(function () {

        Route::prefix('dashboard')->as('dashboard.')->group(function () {
            Route::get('/', [DashboardController::class, 'index'])->name('index');
        });

        Route::prefix('cart')->as('cart.')->group(function () {
            Route::controller(CartController::class)->group(function () {
                Route::post('/addToCart', 'addToCart')->name('add');
                Route::get('/{id}', 'index')->name('index');
                Route::get('/show/{id}', 'showProduct')->name('showProduct');
                Route::put('/show/{id}', 'updateCartItem')->name('updateCartItem');
                Route::delete('/show/{id}/delete', 'deleteCartItem')->name('deleteCartItem');
            });

        });

        Route::resource('order', ClientOrderController::class)->only([
            'index',
            'create',
            'store',
            'show'
        ]);
        Route::resource('profile', ClientProfileController::class)->except('destroy', 'index');
        Route::resource('products', ClientProductController::class)->only([
            'index',
            'show'
        ]);
        Route::prefix('feedbacks')->as('feedbacks.')->group(function () {
            Route::get('/create', [FeedbackController::class, 'create'])->name('create');
            Route::post('/', [FeedbackController::class, 'store'])->name('store');
        });
    });
});


require __DIR__ . '/auth.php';
