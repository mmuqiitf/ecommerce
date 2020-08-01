<?php


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

// Coupons
Route::get('admin/newsletters', 'Admin\Category\CouponController@index')->name('admin.newsletters');