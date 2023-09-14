<?php

use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Supply;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Admin\SupplyController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Client\DashboardController;
use App\Http\Controllers\Client\OrderController as ClientOrderController;
use App\Http\Controllers\Client\ProductController as ClientProductController;
use App\Http\Controllers\Client\ProfileController as ClientProfileController;
use App\Http\Controllers\Employee\OrderController as EmployeeOrderController;
use App\Http\Controllers\Employee\SupplyController as EmployeeSupplyController;
use App\Http\Controllers\Employee\TransactionController as EmployeeTransactionController;
use App\Http\Controllers\HomeController;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// temporary routes
Route::get('/products', function () {
    $cart = Cart::with('products')->where('is_check_out', false)->first();
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

    $products = Product::with('categories')->get();
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
            Route::get('/', function () {
                $totalSupplies = Supply::get()->count();
                $onlineOrder = Order::where('type', 'online')->where('status', 'processed')->count();
                $walkinOrder = Order::where('type', 'walk_in')->where('status', 'processed')->count();
                $transactions = Transaction::get()->count();

                $orders = Order::where('status', 'processed')->get();
                $sales = 0;

                foreach ($orders as $order) {
                    $sales = $sales + $order->total;
                }

                $registeredCustomer = User::role('customer')->get()->count();
                return view('users.admin.dashboard', compact(['totalSupplies', 'onlineOrder', 'walkinOrder', 'registeredCustomer', 'transactions', 'sales']));
            })->name('index');
        });

        Route::prefix('supply')->as('supply.')->group(function () {
            Route::resource('type', TypeController::class);
        });

        Route::resource('order', OrderController::class);
        Route::resource('transaction', TransactionController::class);
        Route::resource('category', CategoryController::class);
        Route::resource('products', ProductController::class);
        Route::resource('supply', SupplyController::class);
        Route::resource('employee', EmployeeController::class);
        Route::resource('profile', ProfileController::class)->except('destroy', 'index');
    });

    Route::middleware('role:employee|admin')->prefix('employee')->as('employee.')->group(function () {

        Route::prefix('dashboard')->as('dashboard.')->group(function () {
            Route::get('/', function () {
                return view('users.employee.dashboard');
            })->name('index');
        });

        Route::prefix('pos')->as('pos.')->group(function () {
            Route::get('/', function () {
                $products = Product::get();
                return view('users.employee.PointOfSale.index', compact(['products']));
            })->name('index');
        });

        Route::prefix('order')->as('order.')->group(function () {
            Route::post('/approve/{id}', [EmployeeOrderController::class, 'approved'])->name('approved');
        });


        Route::resource('transaction', EmployeeTransactionController::class)->only([
            'index',
            'create',
            'update',
            'edit',
            'store'
        ]);
        Route::resource('supply', EmployeeSupplyController::class)->only([
            'index'
        ]);
        Route::resource('order', EmployeeOrderController::class)->only([
            'index'
        ]);
    });

    Route::middleware('role:customer')->prefix('client')->as('client.')->group(function () {

        Route::prefix('dashboard')->as('dashboard.')->group(function () {
            Route::get('/', [DashboardController::class, 'index'])->name('index');
        });

        Route::prefix('cart')->as('cart.')->group(function () {
            Route::post('/addToCart', [CartController::class, 'addToCart'])->name('add');
            Route::get('/{id}', [CartController::class, 'index'])->name('index');
            Route::get('/show/product/{id}', [CartController::class, 'showProduct'])->name('showProduct');
        });

        Route::resource('order', ClientOrderController::class)->only([
            'index',
            'create',
            'store'
        ]);
        Route::resource('profile', ClientProfileController::class)->except('destroy', 'index');
        Route::resource('products', ClientProductController::class)->only([
            'index', 'show'
        ]);
    });
});


require __DIR__ . '/auth.php';
