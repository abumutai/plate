<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StockController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\MetricsController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ConversionController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\SubcategoriesController;
use App\Http\Controllers\ConsumedstocksController;
use App\Http\Controllers\DestroyedstockController;


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
Route::get('/pages/user/review/', "RestaurantController@reviewRestaurant" )->name('pages.restaurants.review');
Route::get('/pages/restaurants/', "HomeController@listRestaurants" )->name('pages.restaurants');
Route::get('/pages/restaurants/new', "HomeController@NewRestaurant" )->name('pages.restaurants.new');
//Order

Route::get('/pending/{order_id}', 'OrderController@pending');
Route::get('/processing/{order_id}', 'OrderController@processing');
Route::get('/completed/{order_id}', 'OrderController@completed');
Route::get('/cancelled/{order_id}', 'OrderController@cancelled');

//Menu Status
Route::get('menu/destock/{order_id}', 'MenuController@destock');
Route::get('menu/restock/{order_id}', 'MenuController@restock');
Route::get('menu/delete/{order_id}', 'MenuController@delete');


Route::get('/pages/driver/submit', "HomeController@submitDriver" )->name('pages.driver.submit');

Route::get('/pages/restaurants/{restaurant}', "HomeController@restaurantProfile" )->name('pages.restaurants.profile');
Route::get('/pages/restaurants/{restaurant}/menu', "HomeController@viewRestaurantMenu" )->name('pages.restaurants.menu');

Route::get('/portal/dashboard', "PortalController@index" )->name('dashboard');
Route::get('/portal/menu/all', "PortalController@menuList" )->name('menu.list');
Route::patch('/menu/add','MenuController@addMenu')->name('menu.add');
Route::get('/cart/delete{temp_id}','MenuController@deleteCart')->name('cart.delete');


Route::get('/portal/ingredient/all', "PortalController@ingredientList" )->name('ingredients.list');
Route::patch('/ingredient/{restaurant}/add','MenuController@addIngredient')->name('ingredient.add');


Route::get('/portal/generate/qr', "PortalController@qrCodeView" )->name('qr.generate.view');
Route::get('/qr/{restaurant}/response', "RestaurantController@qrCodeResponse" )->name('qr.response');

Route::get('/portal/gallery', "PortalController@gallery" )->name('gallery');
Route::patch('/gallery/{restaurant}/add','RestaurantController@addToGallery')->name('gallery.add');

Route::get('/portal/orders', "PortalController@viewOrders" )->name('orders');
Route::get('/portal/completed/orders', "PortalController@viewCompletedOrders" )->name('orders.completed');
Route::get('/portal/cancelled/orders', "PortalController@cancelledOrders" )->name('orders.cancelled');

Route::get('/portal/today', "PortalController@today" )->name('today');
Route::get('/portal/weekly', "PortalController@weekly" )->name('weekly');
Route::get('/portal/monthly', "PortalController@monthly" )->name('monthly');
Route::get('/portal/report', "PortalController@report" )->name('report');
Route::get('/portal/orders/pdf', 'PortalController@createPDF')->name('all.pdf');
Route::get('/portal/receipts', 'PortalController@receipts')->name('receipts');
Route::get('/portal/receipt', 'PortalController@receipt')->name('receipt');


Route::get('/portal/customer/orders', "PortalController@viewCustomerOrders" )->name('customer.orders');
Route::get('/portal/customer/completed/orders', "PortalController@viewCompletedCustomerOrders" )->name('customer.completed.orders');



Route::get('/', 'HomeController@index')->name('landing');
Route::get('/search/','HomeController@searchItems')->name('item.search');

Route::get('/menu/{menu}/cart/add','OrderController@cartAdd')->name('cart.add');
Route::post('/restaurant/{restaurant}/cart/complete','OrderController@cartComplete')->name('cart.complete');

Route::get('/restaurant/{restaurant}/order/process', "OrderController@orderStep2")->name('order.step2');
Route::get('/restaurant/{restaurant}/order/finish', "OrderController@orderStep3")->name('order.step3');
Route::post('/order/status/update', "OrderController@updateOrderStatus")->name('order.update');



Auth::routes([
    'verify' =>true
]);

Route::get('/portal/profile', "PortalController@profile" )->name('profile');
Route::get('/portal/user/profile', "PortalController@UserProfile" )->name('user.profile');

Route::get('/restaurant/tables', "PortalController@viewTables" )->name('restaurant.tables');
// Route::get('/restaurant/profile', "PortalController@kulaPoints" )->name('kula.points');
Route::post('/restaurant/table/add', "PortalController@addTable" )->name('table.add');
Route::post('/restaurant/table/delete', "PortalController@deleteTable" )->name('table.delete');

Route::get('/restaurant/users', 'RestaurantController@showWaiters')->name('restaurant.users');

Route::post('/restaurant/waiter/add', "RestaurantController@addWaiter" )->name('waiter.add');

Route::patch('/portal/profile/update', "RestaurantController@updateProfile" )->name('profile.update');
Route::patch('/user/profile/update', "PortalController@updateProfile" )->name('user.update');
Route::get('/country/{country}/cities', 'SystemController@getCities')->name('country.cities');



Route::get('/restaurants/details', function () {
    return view('pages.details');
})->name('details');
Route::get('/faq', function () {
    return view('pages.faq');
})->name('faq');


Route::get('/order/cart2', function () {
    return view('pages.cart2');
})->name('cart2');
Route::get('/order/cart3', function () {
    return view('pages.cart3');
})->name('cart3');
Route::get('/diet/tips', function () {
    return view('pages.dtips');
})->name('d_tips');


Route::get('/about', function () {
    return view('pages.about');
})->name('about');
Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');
Route::get('/reservation', function () {
    return view('pages.reservation');
})->name('reservation');
Route::get('/tips', function () {
    return view('pages.tips');
})->name('tips');

Route::get('/cart', function () {
    return view('pages.cart');
})->name('cart');


Route::get('/wishes', function () {
    return view('pages.wishes');
})->name('wishes');


Route::get('/checkout', function () {
    return view('pages.checkout');
})->name('checkout');



Route::get('/admin/dashboard', 'AdminController@index')->name('admin.dashboard');
Route::get('/waiter/dashboard', 'RestaurantController@waiterDashboard')->name('waiter.dashboard');
Route::get('/cashier/dashboard', 'RestaurantController@cashierDashboard')->name('cashier.dashboard');
Route::get('/cashier/mpesa/{order_id}', 'RestaurantController@mpesa')->name('mpesa');
Route::get('/cashier/cash/{order_id}', 'RestaurantController@cash')->name('cash');
Route::get('/cashier/all/{user_id}', 'RestaurantController@complete')->name('cash');

Route::get('/admin/manage/users', 'AdminController@manageUsers')->name('admin.manage.users');


Route::get('/admin/restaurant/update', 'AdminController@UpdateStatus')->name('admin.restaurant.update');
Route::get('/suspend/{restaurant_profile_id}', 'AdminController@suspend');
Route::get('/activate/{restaurant_profile_id}', 'AdminController@activate');
Route::get('/banned/{restaurant_profile_id}', 'AdminController@banned');


Route::get('/admin/session/order', 'AdminController@keepOrderID')->name('admin.session.order');


Route::get('/menu', function () {
    return view('pages.menu');
})->name('menu');
Route::get('/menu/all',"HomeController@menuAll")->name('menu.all');
// Route::post('/menu/delete',"HomeController@delete")->name('menu.remove');

Route::get('/menu/{category?}',"HomeController@listRestaurants")->name('list-restaurants');
Route::get('/menu/restaurant/{id}',"HomeController@restaurantCategories")->name('list-category');


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/verify', 'HomeController@verify')->name('verify');




/************ Mobile api Urls *******************/
#Route::post("/api/restaurants","MobileController@getAllRestaurants");
Route::post("/api/restaurant","MobileController@getRestaurants");
Route::post("/api/restaurant/menus","MobileController@getAllMenus");
Route::post("/api/restaurant/menu","MobileController@getMenu");
Route::post("/api/restaurant/tables","MobileController@getTables");

//Route::post("/api/restaurant/categories","MobileController@getMenuCategories");

Route::post('/api/user/login','MobileController@loginInUser');//e.g. api/user/auth?email=collins@gmail.com&password=collins
Route::post('/api/user/register','MobileController@registerUser');

Route::post("/api/categories/all","MobileController@getCategories");
Route::post("/api/menus/all","MobileController@getMenus");
//Route::post("/api/tips/all","MobileController@getTips");

Route::post("/api/user/reservations","MobileController@getReservations");
Route::post("/api/user/reservation/create","MobileController@newReservation");

Route::post("/api/user/orders","MobileController@getOrders");
Route::post("/api/order/create","MobileController@createOrder");
Route::post('/api/user/resetpassword', 'MobileController@resetPassword');
//role_id::1=admin 2=employer 3=candidate

Route::post("/api/restaurants/all","MobileController@getAllRestaurants");

/*
 *End of Mobile api routes
 */





 //Kitchen routes 
 //Backend routes 
 
Route::get('/reports',[ReportsController::class,'stocks'])->name('reports');
Route::get('/reportsget',[ReportsController::class,'get'])->name('reportsget');
Route::get('/reportsexpiry',[ReportsController::class,'expiry'])->name('reports.expiry');
Route::get('/reportsexpiryget',[ReportsController::class,'expiryresult'])->name('reportsget.expiry');
Route::get('/print/{query}',[ReportsController::class,'printPDF'])->name('reports.print');
Route::get('/printsummary',[ReportsController::class,'printsummary'])->name('reports.summary');
Route::get('/profitloss',[ReportsController::class,'profitloss'])->name('profitloss');
Route::get('/printpl',[ReportsController::class,'printprofitloss'])->name('profitloss.print');

Route::middleware(['admin'])->group(function(){
    Route::get('/dashboard/kitchen', [DashboardController::class,'index'])->middleware(['auth'])->name('kitchen.dashboard');

    Route::get('/edit/{id}/stocks',[StockController::class,'edit'])->name('stock.edit');
    Route::patch('/update/{id}/stock',[StockController::class,'update'])->name('stock.update');
    Route::get('/delete/{id}/stock',[StockController::class,'destroy'])->name('stock.delete');
    Route::get('/approve/{id}/stock',[StockController::class,'approve'])->name('stock.approve');
    Route::get('/move/{id}/stock',[StockController::class,'moved'])->name('stock.move');

    Route::get('/edit/{id}/consumedstocks',[ConsumedstocksController::class,'edit'])->name('consumedstocks.edit');
    Route::patch('/update/{id}/consumedstock',[ConsumedstocksController::class,'update'])->name('consumedstocks.update');
    Route::get('/delete/{id}/consumedstock',[ConsumedstocksController::class,'destroy'])->name('consumedstocks.delete');
    Route::get('/approve/{id}/consumedstock',[ConsumedstocksController::class,'approve'])->name('consumedstocks.approve');

    Route::get('/edit/{id}/destroyedstocks',[DestroyedstockController::class,'edit'])->name('destroyedstocks.edit');
    Route::patch('/update/{id}/destroyedstock',[DestroyedstockController::class,'update'])->name('destroyedstocks.update');
    Route::get('/delete/{id}/destroyedstock',[DestroyedstockController::class,'destroy'])->name('destroyedstocks.delete');
    Route::get('/approve/{id}/destroyedstock',[DestroyedstockController::class,'approve'])->name('destroyedstocks.approve');

    Route::get('/users',[UsersController::class,'index'])->name('users');
    Route::get('/users/create',[UsersController::class,'create'])->name('users.create');
    Route::post('/users/store',[UsersController::class,'store'])->name('users.store');
    Route::get('/edit/{id}/users',[UsersController::class,'edit'])->name('users.edit');
    Route::patch('/update/{id}/users',[UsersController::class,'update'])->name('users.update');
    Route::get('/delete/{id}/users',[UsersController::class,'destroy'])->name('users.delete');
});


Route::get('/home/kitchen', [DashboardController::class,'home'])->middleware(['auth'])->name('kitchen.home');
Route::post('/logout', [DashboardController::class,'logout'])->name('logout');

//Route::get('/sales',[SalesController::class,'index'])->name('sales');

Route::get('/products',[ProductsController::class,'index'])->name('products');
Route::get('/products/create',[ProductsController::class,'create'])->name('products.create');
Route::post('/products/store',[ProductsController::class,'store'])->name('products.store');
Route::get('/product/edit/{id}',[ProductsController::class,'edit'])->name('products.edit');
Route::patch('/product/update/{id}',[ProductsController::class,'update'])->name('products.update');
Route::get('/delete/{id}/product',[ProductsController::class,'destroy'])->name('products.delete');

Route::get('/stocks',[StockController::class,'index'])->name('stock');
Route::get('/stocks/create',[StockController::class,'create'])->name('stock.create');
Route::post('/stocks/store',[StockController::class,'store'])->name('stock.store');
Route::get('/availablestocks',[StockController::class,'available'])->name('stock.available');


Route::get('/consumedstocks',[ConsumedstocksController::class,'index'])->name('consumedstocks');
Route::get('/consumedstocks/create',[ConsumedstocksController::class,'create'])->name('consumedstocks.create');
Route::post('/consumedstocks/store',[ConsumedstocksController::class,'store'])->name('consumedstocks.store');

Route::get('/destroyedstocks',[DestroyedstockController::class,'index'])->name('destroyedstocks');
Route::get('/destroyedstocks/create',[DestroyedstockController::class,'create'])->name('destroyedstocks.create');
Route::post('/destroyedstocks/store',[DestroyedstockController::class,'store'])->name('destroyedstocks.store');

Route::get('/metrics',[MetricsController::class,'index'])->name('metrics');
Route::get('/metrics/create',[MetricsController::class,'create'])->name('metrics.create');
Route::post('/metrics/store',[MetricsController::class,'store'])->name('metrics.store');
Route::get('/edit/{id}/metrics',[MetricsController::class,'edit'])->name('metrics.edit');
Route::patch('/update/{id}/metrics',[MetricsController::class,'update'])->name('metrics.update');
Route::get('/delete/{id}/metrics',[MetricsController::class,'destroy'])->name('metrics.delete');

Route::get('/categories',[CategoriesController::class,'index'])->name('categories');
Route::get('/categories/create',[CategoriesController::class,'create'])->name('categories.create');
Route::post('/categories/store',[CategoriesController::class,'store'])->name('categories.store');
Route::get('/edit/{id}/categories',[CategoriesController::class,'edit'])->name('categories.edit');
Route::patch('/update/{id}/categories',[CategoriesController::class,'update'])->name('categories.update');
Route::get('/delete/{id}/categories',[CategoriesController::class,'destroy'])->name('categories.delete');

Route::get('/subcategories',[SubcategoriesController::class,'index'])->name('subcategories');
Route::get('/subcategories/create',[SubcategoriesController::class,'create'])->name('subcategories.create');
Route::post('/subcategories/store',[SubcategoriesController::class,'store'])->name('subcategories.store');
Route::get('/edit/{id}/subcategories',[SubcategoriesController::class,'edit'])->name('subcategories.edit');
Route::patch('/update/{id}/subcategories',[SubcategoriesController::class,'update'])->name('subcategories.update');
Route::get('/delete/{id}/subcategories',[SubcategoriesController::class,'destroy'])->name('subcategories.delete');

Route::get('/{id}',[UsersController::class,'show'])->name('users.show');

Route::get('/notifications/index',[NotificationsController::class,'index'])->name('notifications');
Route::get('/notifications/markallread',[NotificationsController::class,'markallread'])->name('notifications.markallread');
Route::get('/notifications/markallunread',[NotificationsController::class,'markallunread'])->name('notifications.markallunread');
Route::get('/notifications/deleteall',[NotificationsController::class,'deleteall'])->name('notifications.deleteall');
Route::get('/notifications/markread/{id}',[NotificationsController::class,'markread'])->name('notifications.markread');
Route::get('/notifications/markunread/{id}',[NotificationsController::class,'markunread'])->name('notifications.markunread');
Route::get('/notifications/delete/{id}',[NotificationsController::class,'delete'])->name('notifications.delete');
Route::get('/notifications/show/{id}',[NotificationsController::class,'show'])->name('notifications.show');

Route::get('/suppliers/index',[SupplierController::class,'index'])->name('suppliers');
Route::get('/suppliers/create',[SupplierController::class,'create'])->name('suppliers.create');
Route::post('/suppliers/store',[SupplierController::class,'store'])->name('suppliers.store');
Route::get('/edit/{id}/suppliers',[SupplierController::class,'edit'])->name('suppliers.edit');
Route::patch('/update/{id}/suppliers',[SupplierController::class,'update'])->name('suppliers.update');
Route::get('/delete/{id}/suppliers',[SupplierController::class,'destroy'])->name('suppliers.delete');

Route::get('/conversions/index',[ConversionController::class,'index'])->name('conversions');
Route::get('/conversions/create',[ConversionController::class,'create'])->name('conversions.create');
Route::post('/conversions/store',[ConversionController::class,'store'])->name('conversions.store');
Route::get('/edit/{id}/conversions',[ConversionController::class,'edit'])->name('conversions.edit');
Route::patch('/update/{id}/conversions',[ConversionController::class,'update'])->name('conversions.update');
Route::get('/delete/{id}/conversions',[ConversionController::class,'destroy'])->name('conversions.delete');

Route::get('/expenses/index',[ExpenseController::class,'index'])->name('expenses');
Route::get('/expenses/create',[ExpenseController::class,'create'])->name('expenses.create');
Route::post('/expenses/store',[ExpenseController::class,'store'])->name('expenses.store');
Route::get('/edit/{id}/expenses',[ExpenseController::class,'edit'])->name('expenses.edit');
Route::patch('/update/{id}/expenses',[ExpenseController::class,'update'])->name('expenses.update');
Route::get('/delete/{id}/expenses',[ExpenseController::class,'destroy'])->name('expenses.delete');
