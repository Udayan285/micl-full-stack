<?php

use App\Http\Middleware\ValidUser;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Email\EmailController;
use App\Http\Controllers\Backend\AreaController;
use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\FooterController;
use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\ManagerController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Backend\UserManagementController;
use App\Http\Controllers\Backend\CorporateVisionController;
use App\Http\Controllers\Backend\Business\SuperOilController;
use App\Http\Controllers\Backend\Business\EdibleOilController;
use App\Http\Controllers\Backend\Business\StorageTankController;
use App\Http\Controllers\Backend\Business\BitumenPlantController;
use App\Http\Controllers\Backend\Business\BottleMakingController;
use App\Http\Controllers\Backend\Business\PhysicalRefineryController;
use App\Http\Controllers\Backend\BusinessActivitiesController;

//Frontend view page show related all routes written Start here...
route::prefix("/")->name("micl.")->controller(FrontendController::class)->group(function(){
    Route::get('', 'homePage')->name('home');
    Route::get('manager-profile','mdProfile')->name('manager');
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
    route::get('/md-profile','showMD')->name('mdPage');
    route::get('/footer','showFooter')->name('footer');
    route::get('/activity','showActivity')->name('activity');
    
    // business activities related blade route
    route::get('/storage-tank-terminal-and-delivery-support-services','showStorageTank')->name('storageTank');
    route::get('/bitumen-plant-and-storage-tank','showBitumen')->name('bitumen');
    route::get('/physical-refinery','showPhysical')->name('physical');
    route::get('/super-oil-dry-fractionation','showSuperOil')->name('superOil');
    route::get('/edible-oil','showEdibleOil')->name('edibleOil');
    route::get('/bottle-making','showBottleMaking')->name('bottleMaking');


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
route::middleware(ValidUser::class)->prefix("/dashboard")->name('dashboard.')->controller(CorporateVisionController::class)->group(function(){
    route::post('/corporate/store','corporateStore')->name('corpoStore');
    route::get('/corporate/edit/{slug}','editCorpo')->name('corpoEdit');
    route::put('/corporate/update/{slug}','updateCorpo')->name('corpoUpdate');
    route::put('/corporate/active/{slug}','activeCorpo')->name('corpoActive');
    route::delete('/corporate/remove/{slug}','removeCorpo')->name('corpoRemove');
});

//about-us all route here..
route::middleware(ValidUser::class)->prefix("/dashboard")->name('dashboard.')->controller(AboutController::class)->group(function(){
   
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
route::middleware(ValidUser::class)->prefix("/dashboard")->name('dashboard.')->controller(AreaController::class)->group(function(){
   
    //Area page all routes here..(#udayan285#)
    route::post('/area-page/store','storeArea')->name('areaStore');
    route::get('/area-page/edit/{slug}','editArea')->name('areaEdit');
    route::put('/area-page/update/{slug}','updateArea')->name('areaUpdate');
    route::put('/area-page/active/{slug}','activeArea')->name('areaActive');
    route::delete('/area-page/remove/{slug}','removeArea')->name('areaRemove');

});

//Contact Page related all route here..
route::middleware(ValidUser::class)->prefix("/dashboard")->name('dashboard.')->controller(ContactController::class)->group(function(){
   
    //Contact page all routes here..(#udayan285#)
    route::post('/contact/store','storeContact')->name('contactStore');
    route::get('/contact/edit/{id}','editContact')->name('contactEdit');
    route::put('/contact/update/{id}','updateContact')->name('contactUpdate');
    route::put('/contact/active/{id}','activeContact')->name('contactActive');
    route::delete('/contact/remove/{id}','removeContact')->name('contactRemove');

});


//Email sending route here....(#udayan285#)
route::post('/send-email',[EmailController::class,'sendEmail'])->name('sendEmail');



//Managing Director page related all route here..
route::middleware(ValidUser::class)->prefix("/dashboard")->name('dashboard.')->controller(ManagerController::class)->group(function(){
   
    //MD page all routes here..(#udayan285#)
    route::post('/md-profile/store','storeMD')->name('mdStore');
    route::get('/md-profile/edit/{id}','editMD')->name('mdEdit');
    route::put('/md-profile/update/{id}','updateMD')->name('mdUpdate');
    route::put('/md-profile/active/{id}','activeMD')->name('mdActive');
    route::delete('/md-profile/remove/{id}','removeMD')->name('mdRemove');

});

//Footer page related all route here..
route::middleware(ValidUser::class)->prefix("/dashboard")->name('dashboard.')->controller(FooterController::class)->group(function(){
   
    //Footer page all routes here..(#udayan285#)
    route::post('/footer/store','storeFooter')->name('footerStore');
    route::get('/footer/edit/{id}','editFooter')->name('footerEdit');
    route::put('/footer/update/{id}','updateFooter')->name('footerUpdate');
    route::put('/footer/active/{id}','activeFooter')->name('footerActive');
    route::delete('/footer/remove/{id}','removeFooter')->name('footerRemove');

});

//storage tank related all route here..
route::middleware(ValidUser::class)->prefix("/dashboard")->name('dashboard.')->controller(StorageTankController::class)->group(function(){
   
    //Footer page all routes here..(#udayan285#)
    route::post('/storage-tank/store','storeStorageTank')->name('storageTankStore');
    route::get('/business-activities/preview','previewAll')->name('preview');
    route::get('/storage-tank/edit/{id}','editStorage')->name('storageEdit');
    route::put('/storage-tank/update/{id}','updateStorage')->name('storageUpdate');
    route::put('/storage-tank/active/{id}','activeStorage')->name('storageActive');
    route::delete('/storage-tank/remove/{id}','removeStorage')->name('storageRemove');

});

//bitumen plant related all route here..
route::middleware(ValidUser::class)->prefix("/dashboard")->name('dashboard.')->controller(BitumenPlantController::class)->group(function(){
    //Bitumen page all routes here..(#udayan285#)
    route::post('/bitumen-plant/store','storeBitumen')->name('storeBitumen');
    route::get('/bitumen-plant/preview','previewBitumen')->name('previewBitumen');
    route::get('/bitumen-plant/edit/{id}','editBitumen')->name('bitumenEdit');
    route::put('/bitumen-plant/update/{id}','updateBitumen')->name('bitumenUpdate');
    route::put('/bitumen-plant/active/{id}','activeBitumen')->name('bitumenActive');
    route::delete('/bitumen-plant/remove/{id}','removeBitumen')->name('bitumenRemove');

});

//physical refinery unit related all route here..
route::middleware(ValidUser::class)->prefix("/dashboard")->name('dashboard.')->controller(PhysicalRefineryController::class)->group(function(){
    //physical refinery unit page all routes here..(#udayan285#)
    route::post('/physical-refienry/store','storePhysical')->name('storePhysical');
    route::get('/physical-refienry/preview','previewPhysical')->name('previewPhysical');
    route::get('/physical-refienry/edit/{id}','editPhysical')->name('editPhysical');
    route::put('/physical-refienry/update/{id}','updatePhysical')->name('updatePhysical');
    route::put('/physical-refienry/active/{id}','activePhysical')->name('activePhysical');
    route::delete('/physical-refienry/remove/{id}','removePhysical')->name('removePhysical');

});

//bottle making related all route here..
route::middleware(ValidUser::class)->prefix("/dashboard")->name('dashboard.')->controller(BottleMakingController::class)->group(function(){
    //bottle making page all routes here..(#udayan285#)
    route::post('/bottle-making/store','storeBottle')->name('storeBottle');
    route::get('/bottle-making/preview','previewBottle')->name('previewBottle');
    route::get('/bottle-making/edit/{id}','editBottle')->name('editBottle');
    route::put('/bottle-making/update/{id}','updateBottle')->name('updateBottle');
    route::put('/bottle-making/active/{id}','activeBottle')->name('activeBottle');
    route::delete('/bottle-making/remove/{id}','removeBottle')->name('removeBottle');

});

//edible oil related all route here..
route::middleware(ValidUser::class)->prefix("/dashboard")->name('dashboard.')->controller(EdibleOilController::class)->group(function(){
    //edible oil all routes here..(#udayan285#)
    route::post('/edible-oil/store','storeEdible')->name('storeEdible');
    route::get('/edible-oil/preview','previewEdible')->name('previewEdible');
    route::get('/edible-oil/edit/{id}','editEdible')->name('editEdible');
    route::put('/edible-oil/update/{id}','updateEdible')->name('updateEdible');
    route::put('/edible-oil/active/{id}','activeEdible')->name('activeEdible');
    route::delete('/edible-oil/remove/{id}','removeEdible')->name('removeEdible');

});

//super oil related all route here..
route::middleware(ValidUser::class)->prefix("/dashboard")->name('dashboard.')->controller(SuperOilController::class)->group(function(){
    //super oil all routes here..(#udayan285#)
    route::post('/super-oil/store','storeSuper')->name('storeSuper');
    route::get('/super-oil/preview','previewSuper')->name('previewSuper');
    route::get('/super-oil/edit/{id}','editSuper')->name('editSuper');
    route::put('/super-oil/update/{id}','updateSuper')->name('updateSuper');
    route::put('/super-oil/active/{id}','activeSuper')->name('activeSuper');
    route::delete('/super-oil/remove/{id}','removeSuper')->name('removeSuper');

});

//User Management Controller route here..
route::middleware(ValidUser::class)->prefix("/dashboard")->name('dashboard.')->controller(UserManagementController::class)->group(function(){
    //user management controller here..(#udayan285#)
    route::get('/user-management','getUserManagement')->name('getUserManagement');
    route::delete('/user-remove/{slug}','removeUser')->name('removeUser');

    //user-profile
    route::get('/user-profile','getUserProfile')->name('getUserProfile');
    route::put('/update-user-profile/{id}','updateUserProfile')->name('updateUserProfile');
    route::put('/update-user-password/{id}','UpdatePassword')->name('UpdatePassword');
});

//Business activities Page related all route here..
route::middleware(ValidUser::class)->prefix("/dashboard")->name('dashboard.')->controller(BusinessActivitiesController::class)->group(function(){
   
    //Business activities page all routes here..(#udayan285#)
    route::post('/business-activity/store','storeBusinessActivity')->name('activityStore');
    route::get('/business-activity/edit/{slug}','editBusinessActivity')->name('activityEdit');
    route::put('/business-activity/update/{slug}','updateBusinessActivity')->name('activityUpdate');
    route::put('/business-activity/active/{slug}','activeBusinessActivity')->name('activityActive');
    route::delete('/business-activity/remove/{slug}','removeBusinessActivity')->name('activityRemove');

});
