<?php

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
Route::get('/test', function(){
    Artisan::call('migrate');
    Artisan::call('db:seed');
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    // LOGIN
    Route::get('/', 'LoginController@index')->name('admin_login');
    Route::get('login', 'LoginController@formLogin')->name('login');
    Route::post('login', 'LoginController@login')->name('check_login');
    Route::get('logout', 'LoginController@logout')->name('logout');
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/top', 'TopController@index')->name('admin_top');

    // NEWS-CATEGORY
    Route::get('/tao-danh-muc-tin-tuc', 'NewsCategoryController@createCategory')->name('form_news_category');
    Route::post('/tao-danh-muc-tin-tuc', 'NewsCategoryController@saveCategory')->name('save_news_category');
    Route::get('/sua-danh-muc-tin-tuc/{id}', 'NewsCategoryController@editCategory')->name('form_edit_news_category');
    Route::post('/sua-danh-muc-tin-tuc', 'NewsCategoryController@saveEditCategory')->name('save_edit_news_category');
    Route::get('/xoa-danh-muc-tin-tuc/{id}', 'NewsCategoryController@deleteCategory')->name('delete_news_category');

    // NEWS
    Route::get('/tao-tin-tuc', 'NewsController@createNews')->name('form_news');
    Route::post('/tao-tin-tuc', 'NewsController@saveNews')->name('save_news');
    Route::get('/danh-sach-tin-tuc', 'NewsController@listNews')->name('list_news');
    Route::get('/sua-tin-tuc/{id}', 'NewsController@showEditNews')->name('show_edit_news');
    Route::post('/sua-tin-tuc', 'NewsController@editNews')->name('edit_news');
    Route::get('/xoa-tin-tuc/{id}', 'NewsController@deleteNews')->name('delete_news');

    // PRODUCT-CATEGORY
    Route::get('/tao-danh-muc-san-pham', 'ProductsCategoryController@createCategory')->name('form_products_category');
    Route::post('/tao-danh-muc-san-pham', 'ProductsCategoryController@saveCategory')->name('save_products_category');
    Route::get('/sua-danh-muc-san-pham/{id}', 'ProductsCategoryController@editCategory')->name('form_edit_products_category');
    Route::post('/sua-danh-muc-san-pham', 'ProductsCategoryController@saveEditCategory')->name('save_edit_products_category');
    Route::get('/xoa-danh-muc-san-pham/{id}', 'ProductsCategoryController@deleteCategory')->name('delete_products_category');

    // PRODUCT
    Route::get('/tao-san-pham', 'ProductsController@createProducts')->name('form_products');
    Route::post('/tao-san-pham', 'ProductsController@saveProducts')->name('save_products');
    Route::get('/danh-sach-san-pham', 'ProductsController@listProducts')->name('list_products');
    Route::get('/sua-san-pham/{id}', 'ProductsController@showEditProducts')->name('show_edit_products');
    Route::post('/sua-san-pham', 'ProductsController@editProducts')->name('edit_products');
    Route::get('/xoa-san-pham/{id}', 'ProductsController@deleteProducts')->name('delete_products');

    //VIDEO
    Route::get('/tao-videos', 'VideosController@registerVideos')->name('register_videos');
    Route::post('/luu-videos', 'VideosController@saveVideos')->name('save_register_videos');
    Route::get('/danh-sach-videos', 'VideosController@listVideos')->name('list_videos');
    Route::get('/xoa-videos/{id}', 'VideosController@deleteVideos')->name('delete_videos');

    //Introduces
    Route::get('/tao-lich-su-hinh-thanh', 'IntroducesController@formIntroduce1')->name('form_history1');
    Route::get('/tao-co-cau-to-chuc', 'IntroducesController@formIntroduce2')->name('form_history2');
    Route::get('/tao-don-vi-thanh-vien', 'IntroducesController@formIntroduce3')->name('form_history3');
    Route::get('/tao-dang-doan-the', 'IntroducesController@formIntroduce4')->name('form_history4');
    Route::post('/save-gioi-thieu', 'IntroducesController@saveIntroduces')->name('save_introduces');

    //Document
    Route::get('/tao-van-ban', 'DocumentsController@formDocuments')->name('form_documents');
    Route::post('/tao-van-ban', 'DocumentsController@saveDocuments')->name('save_documents');
    Route::get('/danh-sach-van-ban', 'DocumentsController@listDocuments')->name('list_documents');
    Route::get('/xoa-van-ban/{id}', 'DocumentsController@deleteDocuments')->name('delete_documents');

    //Images
    Route::get('/tao-danh-muc-hinh-anh', 'ImagesController@createCategoryImage')->name('create_category_image');
    Route::post('/save-danh-muc-hinh-anh', 'ImagesController@saveCategoryImage')->name('save_category_image');
    Route::get('/xoa-danh-muc-hinh-anh/{id}', 'ImagesController@deleteCategoryImage')->name('delete_category_image');
    Route::get('/sua-danh-muc-hinh-anh/{id}', 'ImagesController@showEditCategoryImage')->name('show_edit_category_image');
    Route::post('/sua-danh-muc-hinh-anh', 'ImagesController@editCategoryImage')->name('edit_category_image');

    Route::get('/tao-hinh-anh', 'ImagesController@registerImage')->name('register_image');
    Route::post('/luu-hinh-anh', 'ImagesController@saveImage')->name('save_register_image');
    Route::get('/danh-sach-hinh-anh', 'ImagesController@listImage')->name('list_images');
    Route::get('/sua-hinh-anh/{id}', 'ImagesController@showEditImage')->name('show_edit_image');
    Route::post('/sua-hinh-anh', 'ImagesController@editImage')->name('edit_image');
    Route::get('/xoa-hinh-anh/{id}', 'ImagesController@deleteImage')->name('delete_image');
});

Route::group(['namespace' => 'User'], function () {
    Route::get('/', 'TopController@index')->name('user_top');
    Route::get('van-ban', 'DocumentsController@index')->name('document');
    Route::get('lien-he', 'VideosController@contact')->name('contact');
    Route::get('videos', 'VideosController@index')->name('videos');
    Route::get('gioi-thieu', 'IntroducesController@index')->name('introduce');
    Route::get('gioi-thieu/lich-su-hinh-thanh', 'IntroducesController@introduce1')->name('introduce1');
    Route::get('gioi-thieu/co-cau-to-chuc', 'IntroducesController@introduce2')->name('introduce2');
    Route::get('gioi-thieu/don-vi-thanh-vien', 'IntroducesController@introduce3')->name('introduce3');
    Route::get('gioi-thieu/dang-doan-the', 'IntroducesController@introduce4')->name('introduce4');

    Route::get('tin-tuc', 'NewsController@index')->name('news');
    Route::get('tin-tuc/{category}/{id}', 'NewsController@listNewsCategory')->name('list_news_user');
    Route::get('tin-tuc/{id}', 'NewsController@detailNews')->name('detail_news');

    Route::get('/hinh-anh', 'ImageController@listImage')->name('list_image');

    Route::get('san-pham', 'ProductsController@index')->name('products');

});
