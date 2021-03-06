<?php
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
        return view('pages.index');
});
//auth & user
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/password-change', 'HomeController@changePassword')->name('password.change');
Route::post('/password-update', 'HomeController@updatePassword')->name('password.update');
Route::get('/user/logout', 'HomeController@Logout')->name('user.logout');

//admin=======
Route::get('admin/home', 'AdminController@index')->name('admin.home');
Route::get('admin', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin', 'Admin\LoginController@login');
// Password Reset Routes...
Route::get('admin/password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin-password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin/reset/password/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('admin/update/reset', 'Admin\ResetPasswordController@reset')->name('admin.reset.update');
Route::get('/admin/Change/Password','AdminController@ChangePassword')->name('admin.password.change');
Route::post('/admin/password/update','AdminController@Update_pass')->name('admin.password.update'); 
Route::get('admin/logout', 'AdminController@logout')->name('admin.logout');

//-------------- Admin Section ---------------
// Categories
Route::get('admin/categories', 'Admin\Category\CategoryController@index')->name('categories');
Route::post('admin/store/category', 'Admin\Category\CategoryController@store')->name('category.store');
Route::get('admin/delete/category/{id}', 'Admin\Category\CategoryController@destroy')->name('category.destroy');
Route::get('admin/edit/category/{id}', 'Admin\Category\CategoryController@edit')->name('category.edit');
Route::put('admin/update/category/{id}', 'Admin\Category\CategoryController@update')->name('category.update');

// Brands
Route::get('admin/brands', 'Admin\Category\BrandController@index')->name('brands');
Route::post('admin/brands', 'Admin\Category\BrandController@store')->name('brands.store');
Route::get('admin/brands/delete/{id}', 'Admin\Category\BrandController@destroy')->name('brands.destroy');
Route::get('admin/brands/edit/{id}', 'Admin\Category\BrandController@edit')->name('brands.edit');
Route::put('admin/brands/update/{id}', 'Admin\Category\BrandController@update')->name('brands.update');

// Subcategories
Route::get('admin/subcategories', 'Admin\Category\SubCategoryController@index')->name('subcategories');
Route::post('admin/store/subcategory', 'Admin\Category\SubCategoryController@store')->name('subcategory.store');
Route::get('admin/delete/subcategory/{id}', 'Admin\Category\SubCategoryController@destroy')->name('subcategory.destroy');
Route::get('admin/edit/subcategory/{id}', 'Admin\Category\SubCategoryController@edit')->name('subcategory.edit');
Route::put('admin/update/subcategory/{id}', 'Admin\Category\SubCategoryController@update')->name('subcategory.update');

// Coupons
Route::get('admin/coupons', 'Admin\Category\CouponController@index')->name('admin.coupons');
Route::post('admin/store/coupon', 'Admin\Category\CouponController@store')->name('coupon.store');
Route::get('admin/delete/coupon/{id}', 'Admin\Category\CouponController@destroy')->name('coupon.destroy');
Route::get('admin/edit/coupon/{id}', 'Admin\Category\CouponController@edit')->name('coupon.edit');
Route::put('admin/update/coupon/{id}', 'Admin\Category\CouponController@update')->name('coupon.update');

// Newsletters
Route::get('admin/newsletters', 'Admin\Category\NewsletterController@index')->name('admin.newsletters');
Route::get('admin/delete/newsletter/{id}', 'Admin\Category\NewsletterController@destroy')->name('newsletter.destroy');

// Products
Route::get('admin/products', 'Admin\ProductController@index')->name('admin.products');
Route::get('admin/products/create', 'Admin\ProductController@create')->name('admin.product.create');
Route::get('/get/subcategory/{category_id}', 'Admin\ProductController@showSubCategory')->name('admin.product.sub');
Route::post('/admin/products/store', 'Admin\ProductController@store')->name('admin.product.store');
Route::get('/admin/products/active/{id}', 'Admin\ProductController@active')->name('admin.product.active');
Route::get('/admin/products/inactive/{id}', 'Admin\ProductController@inactive')->name('admin.product.inactive');
Route::get('/admin/products/delete/{id}', 'Admin\ProductController@destroy')->name('admin.product.destroy');
Route::get('/admin/products/show/{id}', 'Admin\ProductController@show')->name('admin.product.show');
Route::get('/admin/products/edit/{id}', 'Admin\ProductController@edit')->name('admin.product.edit');
Route::put('/admin/products/update/{id}', 'Admin\ProductController@update')->name('admin.product.update');
Route::put('/admin/products/update-photo/{id}', 'Admin\ProductController@updatePhoto')->name('admin.product.update.photo');

// Posts
Route::get('admin/posts', 'Admin\Post\PostController@index')->name('admin.posts');
Route::get('admin/post/create', 'Admin\Post\PostController@create')->name('admin.post.create');

// Post Categories
Route::get('admin/post-cat', 'Admin\Post\PostCategoryController@index')->name('admin.post-cat');
Route::post('admin/post-cat/store', 'Admin\Post\PostCategoryController@store')->name('admin.post-cat.store');
Route::get('admin/post-cat/edit/{id}', 'Admin\Post\PostCategoryController@edit')->name('admin.post-cat.edit');
Route::put('admin/post-cat/update/{id}', 'Admin\Post\PostCategoryController@update')->name('admin.post-cat.update');
Route::get('admin/post-cat/delete/{id}', 'Admin\Post\PostCategoryController@destroy')->name('admin.post-cat.destroy');

//-------------- Frontend Section ---------------
Route::post('subscribe/store', 'Frontend\SubscribeController@subscribe')->name('newsletter.subscribe');