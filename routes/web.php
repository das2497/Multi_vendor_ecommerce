<?php

use App\Http\Controllers\Customer\Carts;
use App\Http\Controllers\Customer\Checkout;
use App\Http\Controllers\Customer\Favorites;
use App\Http\Controllers\Customer\My_orders;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Rider\Cancelled_orders;
use App\Http\Controllers\Rider\Delivered_orders;
use App\Http\Controllers\Rider\Packaging_orders;
use App\Http\Controllers\Rider\Shipping_orders;
use App\Http\Controllers\Shop\Email\ExampleEmailSender;
use App\Http\Controllers\Shop\Gallery;
use App\Http\Controllers\Shop\Home;
use App\Http\Controllers\Shop\Single_product_view;
use App\Http\Controllers\Shop_owner\Products;
use App\Http\Controllers\SuperAdmin\CancelledOrders;
use App\Http\Controllers\SuperAdmin\DeliveredOrders;
use App\Http\Controllers\SuperAdmin\Home as SuperAdminHome;
use App\Http\Controllers\SuperAdmin\New_orders;
use App\Http\Controllers\SuperAdmin\Riders;
use App\Http\Controllers\SuperAdmin\ShippingOrders;
use App\Http\Controllers\SuperAdmin\Shops;
use App\Http\Controllers\SuperAdmin\Zones;
use App\Http\Controllers\SuperAdmin\Products as Super_admin_products;
use App\Models\Favorite;
use Illuminate\Support\Facades\Route;

Route::get('/', [Home::class, 'view']);

Route::get('/login', function () {
    return view('login');
})->middleware('login');

Route::get('/aboutus', function () {
    return view('shop.aboutus');
});

Route::get('/gallery', [Gallery::class, 'view']);
Route::get('/gallery/by-catogory/{name}', [Gallery::class, 'view_by_category']);
Route::get('/gallery/by-shop/{name}', [Gallery::class, 'view_by_shop']);

Route::get('/single-product-view/{id}', [Single_product_view::class, 'view']);

Route::get('/email', [ExampleEmailSender::class, 'sendEmail']);

Route::get('/emai-template', function () {
    return view('shop.emails.checkout-mail');
});

//----------------------------------------------------------------------------------------------------------------------------------------------------------------

Route::middleware('customer')->group(function () {
    Route::get('/cart', [Carts::class, 'cart_view'])->name('customer.cart');
    Route::get('/add-to-cart', [Carts::class, 'add_to_cart'])->name('customer.add_to_cart');
    Route::delete('/remove-from-cart', [Carts::class, 'remove_from_cart'])->name('customer.remove_from_cart');
    Route::post('/update-cart', [Carts::class, 'update_cart'])->name('customer.update_cart');

    Route::get('/checkout', [Checkout::class, 'checkout_view'])->name('customer.checkout');
    Route::post('/checkout/add-address', [Checkout::class, 'add_address'])->name('customer.checkout-add-address');
    Route::post('/checkout/get-shipping-cost', [Checkout::class, 'get_shipping_cost'])->name('customer.checkout-get-shipping-cost');
    Route::post('/checkout/place-order', [Checkout::class, 'place_order'])->name('customer.checkout-place-order');

    Route::get('/favorites', [Favorites::class, 'view'])->name('customer.favorites');
    Route::get('/add-to-favorite', [Favorites::class, 'store'])->name('customer.add_to_favorite');    

    Route::get('/order-success', function () {
        return view('shop.order-success');
    });

    Route::get('/order-my-orders', [My_orders::class, 'view'])->name('customer.my-orders');
});

//----------------------------------------------------------------------------------------------------------------------------------------------------------------

Route::middleware('s_admin')->group(function () {
    Route::get('/super-admin/dashboard', [SuperAdminHome::class, 'view'])->name('super-admin.dashboard');

    Route::get('/super-admin/active-shop', [Shops::class, 'active_shop_view'])->name('super-admin.active-shop');
    Route::get('/super-admin/all-shop', [Shops::class, 'all_shop_view'])->name('super-admin.all-shop');
    Route::get('/super-admin/shop-category', [Shops::class, 'shop_category_view'])->name('super-admin.shop-category');
    Route::post('/super-admin/shop-category-store', [Shops::class, 'shop_category_store'])->name('super-admin.shop-category-save');
    Route::get('/super-admin/ad-shop', [Shops::class, 'add_shop_view'])->name('super-admin.add-shop');
    Route::post('/super-admin/ad-shop-store', [Shops::class, 'add_shop_store'])->name('super-admin.add-shop-save');

    Route::get('/super-admin/product-category', [Super_admin_products::class, 'product_category_view'])->name('super-admin.product-category');
    Route::post('/super-admin/product-category-store', [Super_admin_products::class, 'product_category_store'])->name('super-admin.product-category-save');

    Route::get('/super-admin/product-sub-category', [Super_admin_products::class, 'product_sub_category_view'])->name('super-admin.product-sub-category');
    Route::post('/super-admin/product-sub-category-store', [Super_admin_products::class, 'product_sub_category_store'])->name('super-admin.product-sub-category-save');

    Route::get('/super-admin/zone', [Zones::class, 'zone_view'])->name('super-admin.zones');
    Route::post('/super-admin/zone-add', [Zones::class, 'zone_store'])->name('super-admin.zone-save');

    Route::get('/super-admin/rider-add', [Riders::class, 'rider_add_view'])->name('super-admin.rider-add');
    Route::post('/super-admin/rider-add-store', [Riders::class, 'rider_add_store'])->name('super-admin.rider-add-save');

    Route::get('/super-admin/new-orders', [New_orders::class, 'view'])->name('super-admin.packaging-orders');
    Route::post('/super-admin/new-orders-add-rider/', [New_orders::class, 'assign_rider'])->name('super-admin.packaging-orders-add-rider');

    Route::get('/super-admin/new-orders-view/{id}', [New_orders::class, 'packaging_orders_view']);
    Route::get('/super-admin/delivery-orders', [New_orders::class, 'delivery_orders_view'])->name('super-admin.delivery-orders');

    Route::get('/super-admin/shipping-orders', [ShippingOrders::class, 'view']);
    Route::get('/super-admin/shipping-orders-view/{id}', [ShippingOrders::class, 'order_view']);

    Route::get('/super-admin/delivered-orders', [DeliveredOrders::class, 'view']);
    Route::get('/super-admin/delivered-orders-view/{id}', [DeliveredOrders::class, 'order_view']);

    Route::get('/super-admin/cancelled-orders', [CancelledOrders::class, 'view']);
    Route::get('/super-admin/cancelled-orders-view/{id}', [CancelledOrders::class, 'order_view']);
});

// ----------------------------------------------------------------------------------------------------------------------------------------------------------------

Route::middleware('rider')->group(function () {
    Route::get('/rider/dashboard', function () {
        return view('rider.index');
    })->name('rider.dashboard');

    Route::get('/rider/packaging-orders', [Packaging_orders::class, 'view'])->name('rider.packaging-orders');
    Route::post('/rider/packaging-orders-change-state/', [Packaging_orders::class, 'change_state'])->name('rider.packaging-orders-change-state');
    Route::get('/rider/packaging-orders-view/{id}', [Packaging_orders::class, 'packaging_orders_view']);

    Route::get('/rider/shipping-orders', [Shipping_orders::class, 'view'])->name('rider.shipping-orders');
    Route::post('/rider/shipping-orders-change-state/', [Shipping_orders::class, 'change_state'])->name('rider.shipping-orders-change-state');
    Route::get('/rider/shipping-orders-view/{id}', [Shipping_orders::class, 'shipping_orders_view']);

    Route::get('/rider/delivered-orders', [Delivered_orders::class, 'view'])->name('rider.delivered-orders');
    Route::post('/rider/delivered-orders-change-state/', [Delivered_orders::class, 'change_state'])->name('rider.delivered-orders-change-state');
    Route::get('/rider/delivered-orders-view/{id}', [Delivered_orders::class, 'delevered_orders_view']);

    Route::get('/rider/canceled-orders', [Cancelled_orders::class, 'view'])->name('rider.canceled-orders');
    Route::get('/rider/canceled-orders-view/{id}', [Cancelled_orders::class, 'canceled_orders_view']);
});

// ----------------------------------------------------------------------------------------------------------------------------------------------------------------

Route::middleware('shop')->group(function () {
    Route::get('/shop-owner/dashboard', function () {
        return view('shop_owner.index');
    })->name('shop.dashboard');
    Route::get('/shop-owner/product-add', [Products::class, 'products_view'])->name('shop_owner.add_product');
    Route::post('/shop-owner/product-add-store', [Products::class, 'products_store'])->name('shop_owner.add_product_save');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
