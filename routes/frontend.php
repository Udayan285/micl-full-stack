<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\AreaController;
use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\CorporateVisionController;
use App\Http\Controllers\Email\EmailController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Middleware\ValidUser;

//Frontend view page show related all routes written Start here...
route::prefix("/")->name("micl.")->controller(FrontendController::class)->group(function(){
    Route::get('', 'homePage')->name('home');
    Route::get('md-profile','mdProfile')->name('md');
    Route::get('about-us-front','aboutUs')->name('aboutUs');
    Route::get('corporate-vision','corporateVision')->name('corporate');
    Route::get('storage-tank-terminal','storageTank')->name('storageTank');
    Route::get('bitumen-plant','vitumenPlant')->name('vitumenPlant');
    Route::get('physical-refinery','physicalRefinery')->name('physical');
    Route::get('super-oil-dry-fractionation','dryFractionation')->name('dryFractionation');
    Route::get('edible-oil','edibleOil')->name('edibleOil');
    Route::get('bottle-making','bottleMaking')->name('bottle');
    Route::get('area-front','area')->name('area');
    Route::get('contact-us','contactUs')->name('contact');
});
//Frontend view page show related all routes written End here...


//Login/Registration route here
route::prefix("/")->name('auth.')->controller(UserController::class)->group(function(){
    route::get('register','showRegForm')->name('registerForm');
    route::get('login','showLogForm')->name('loginForm');

    route::post('create','create')->name('create');
    route::post('login','login')->name('login');
    route::get('logout','logout')->name('logout');

});


//temporary sidebar->blade show and dashboard route written here..
route::middleware(ValidUser::class)->prefix("/dashboard")->name('dashboard.')->controller(BackendController::class)->group(function(){
    
    //sidebar menu route
    route::get('','dashboard')->name('all');
    // {{-- =========summernote test======== --}}
    route::get('/ckeditor','dashboardCke')->name('cke');
    route::post('/ckeditor/post','dashboardCkepost')->name('ckepost');
    // {{-- =========summernote test======== --}}

    route::get('/hero-banner','showHero')->name('heroBanner');
    route::get('/corporate-vision','showCorporate')->name('corporate');
    route::get('/main-corporate-vision','showMainCorporate')->name('mainCorporate');
    route::get('/home-about','showHomeAbout')->name('homeAbout');
    route::get('/actual-about-us','showAbout')->name('actualAbout');
    route::get('/area','showArea')->name('area');
    route::get('/contact-page','showContact')->name('contactPage');


    //banner info store/update/delete
    route::post('/store','heroStore')->name('heroStore');
    route::get('/edit/{slug}','editHero')->name('heroEdit');
    route::put('/update/{slug}','updateHero')->name('heroUpdate');
    route::put('/active/{slug}','activeHero')->name('heroActive');
    route::delete('/remove/{slug}','removeHero')->name('heroRemove');

    //Home Page Corporate info store/update/delete
    route::post('/home-corporate/store','homeCorporateStore')->name('homeCorpoStore');
    route::get('/home-corporate/edit/{slug}','editHomeCorpo')->name('homeCorpoEdit');
    route::put('/home-corporate/update/{slug}','updateHomeCorpo')->name('homeCorpoUpdate');
    route::put('/home-corporate/active/{slug}','activeHomeCorpo')->name('homeCorpoActive');
    route::delete('/home-corporate/remove/{slug}','removeHomeCorpo')->name('homeCorpoRemove');

    //Home page About us info store/update/delete
});


//Corporate Vision page route here..
route::prefix("/dashboard")->name('dashboard.')->controller(CorporateVisionController::class)->group(function(){
    route::post('/corporate/store','corporateStore')->name('corpoStore');
    route::get('/corporate/edit/{slug}','editCorpo')->name('corpoEdit');
    route::put('/corporate/update/{slug}','updateCorpo')->name('corpoUpdate');
    route::put('/corporate/active/{slug}','activeCorpo')->name('corpoActive');
    route::delete('/corporate/remove/{slug}','removeCorpo')->name('corpoRemove');
});

//about-us all route here..
route::prefix("/dashboard")->name('dashboard.')->controller(AboutController::class)->group(function(){
   
    //Home Page all about us related routes here..(#udayan285#)
    route::post('/home-about-us/store','storeHomeAbout')->name('homeAboutStore');
    route::get('/home-about-us/edit/{slug}','editHomeAbout')->name('homeAboutEdit');
    route::put('/home-about-us/update/{slug}','updateHomeAbout')->name('homeAboutUpdate');
    route::put('/home-about-us/active/{slug}','activeHomeAbout')->name('homeAboutActive');
    route::delete('/home-about-us/remove/{slug}','removeHomeAbout')->name('homeAboutRemove');

    //Main about us page all routes here..(#udayan285#)
    route::post('/actual-about-us/store','storeAbout')->name('aboutStore');
    route::get('/actual-about-us/edit/{slug}','editAbout')->name('aboutEdit');
    route::put('/actual-about-us/update/{slug}','updateAbout')->name('aboutUpdate');
    route::put('/actual-about-us/active/{slug}','activeAbout')->name('aboutActive');
    route::delete('/actual-about-us/remove/{slug}','removeAbout')->name('aboutRemove');


});

//Area Page related all route here..
route::prefix("/dashboard")->name('dashboard.')->controller(AreaController::class)->group(function(){
   
    //Area page all routes here..(#udayan285#)
    route::post('/area-page/store','storeArea')->name('areaStore');
    route::get('/area-page/edit/{slug}','editArea')->name('areaEdit');
    route::put('/area-page/update/{slug}','updateArea')->name('areaUpdate');
    route::put('/area-page/active/{slug}','activeArea')->name('areaActive');
    route::delete('/area-page/remove/{slug}','removeArea')->name('areaRemove');

});

//Contact Page related all route here..
route::prefix("/dashboard")->name('dashboard.')->controller(ContactController::class)->group(function(){
   
    //Contact page all routes here..(#udayan285#)
    route::post('/contact/store','storeContact')->name('contactStore');
    route::get('/contact/edit/{id}','editContact')->name('contactEdit');
    route::put('/contact/update/{id}','updateContact')->name('contactUpdate');
    route::put('/contact/active/{id}','activeContact')->name('contactActive');
    route::delete('/contact/remove/{id}','removeContact')->name('contactRemove');

});


//Email sending route here....(#udayan285#)
route::post('/send-email',[EmailController::class,'sendEmail'])->name('sendEmail');