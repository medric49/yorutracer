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

/*
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
*/


// ================ ESPACE INVITE =========================
Route::group(['middleware' => ['guest']],function () {
    Route::get('/', function () {
        return view('guest.welcome');
    })->name('welcome');

    Route::get('/connexion','LoginController@index')->name('guest.login');
    Route::post('/connect','LoginController@connect')->name('guest.connect');

    Route::get('/inscription/producteur','RegisterController@productor')->name('guest.register.productor');
    Route::get('/inscription/distributeur','RegisterController@distributor')->name('guest.register.distributor');
    Route::get('/inscription','RegisterController@index')->name('guest.register');
    Route::post('/inscription/enregistrement','RegisterController@store')->name('guest.register.store');
});

// ================ ESPACE MEMBRE =========================
Route::group(['middleware' => ['auth']],function () {
    // ========================== ESPACE API =========================
    Route::post('/api-produits','ApiController@products')->name('api.products');
    Route::post('/api-save-public-key','ApiController@savePublicKey')->name('api.save_pk');

    // ========================== ESPACE PRODUCTEUR =========================
    Route::group(['middleware' => ['productor'],'prefix' => 'producteur','namespace' =>'Productor'],function () {
        Route::get('/accueil','HomeController@index')->name('productor.home');
        Route::get('/profil','ProfileController@index')->name('productor.profile');
        Route::get('/modification-profil','ProfileController@modificationForm')->name('production.profile_modification_form');
        Route::post('/deconnexion','HomeController@disconnect')->name('productor.disconnection');

        Route::post('/enregistrement_mot_de_passe','ProfileController@storePassword')->name('productor.store_password');
        Route::post('/enregistrement_information_sociale','ProfileController@storeSocialInformation')->name('productor.store_social_information');

        Route::get('/models-de-produits','ProductController@models')->name('productor.models');
        Route::get('/produits','ProductController@index')->name('productor.products');
        Route::get('/nouveau-model','ProductController@newModelForm')->name('productor.new_model');
        Route::post('/nouveau-model','ProductController@storeNewModel');
        Route::get('/model/{id}','ProductController@model')->name('productor.model');
        Route::post('/nouveau-produit','ProductController@storeProduct')->name('productor.store_product');

        Route::get('/transformations','TransformationController@index')->name('productor.transformations');
        Route::get('/transformation/{id}','TransformationController@transformation')->name('productor.transformation');
        Route::get('/nouvelle-transformation','TransformationController@newTransformationForm')->name('productor.new_transformation');
        Route::post('/nouvelle-transformation','TransformationController@storeTransformation');
    });

    // ========================== ESPACE DISTRIBUTEUR =========================
    Route::group(['middleware' => ['distributor'],'prefix' => 'distributeur','namespace' =>'Distributor'],function () {
        Route::get('/accueil','HomeController@index')->name('distributor.home');
        Route::post('/deconnexion','HomeController@disconnect')->name('distributor.disconnection');
        Route::get('/profil','ProfileController@index')->name('distributor.profile');
        Route::get('/modification-profil','ProfileController@modificationForm')->name('distributor.profile_modification_form');

        Route::post('/enregistrement_mot_de_passe','ProfileController@storePassword')->name('distributor.store_password');
        Route::post('/enregistrement_information_sociale','ProfileController@storeSocialInformation')->name('distributor.store_social_information');

    });

});