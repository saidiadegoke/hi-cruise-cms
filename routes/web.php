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

Auth::routes();

Route::post('/test', 'HomeController@test');

Route::get('/', 'HomeController@index')->name('home');

Route::get('/about', 'CruiseController@about')->name('about');
Route::get('/testmail', 'CruiseController@testmail')->name('testmail');
Route::any('/contact', 'CruiseController@contact')->name('contact');
Route::get('/eugene', 'CruiseController@eugene')->name('eugene');
Route::get('/eugene1', 'CruiseController@eugene1')->name('eugene1');
Route::get('/gallery', 'CruiseController@gallery')->name('gallery');
Route::get('/packages', 'CruiseController@packages')->name('packages');
Route::any('/subscribe', 'CruiseController@subscribe')->name('subscribe');

Route::any('/details', 'ReservationController@fetchDetails')->name('details');
Route::any('/package/{package}', 'ReservationController@details')->name('package_details');
Route::any('/check-availability', 'ReservationController@check_availability')->name('check_availability');
Route::post("verify-code", "PaymentController@verifyCode")->name("verify-code");

Route::group(['middleware' => ['web']], function () {
    // your routes here
});
Route::any('/pay', 'PaymentController@redirectToGateway')->name('pay');
Route::get('/payment/offline', 'PaymentController@offlinePayment')->name('offline_payment');
Route::get('/payment/callback', 'PaymentController@handleGatewayCallback');
Route::get('/{customer}/reservations', 'ReservationController@all')->name('reservations');
Route::post('/reservations/new', 'ReservationController@store')->name('reserve');
Route::post('/reservations/send-mail', 'ReservationController@sendMail')->name('reservation.sendMail');

Route::get('/toc', 'CruiseController@toc')->name('toc');

Route::get('/support', "HomeController@support")->name('support')->middleware('auth');
Route::post('/support', "HomeController@contactSupport")->name('support');

Route::any('/verify-ticket', "PaymentController@verifyTicket")->name("verify-ticket");

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', 'Admin\AdminController@index')->name('admin');
    Route::resource('slides', 'Admin\SlidesController');
    Route::resource('yachts', 'Admin\YachtController');
    Route::resource('packages', 'Admin\PackageController');
    Route::resource('events', 'Admin\EventController');
    Route::resource('media-files', 'Admin\MediaFilesController');
    Route::resource('media-file-purposes', 'Admin\MediaFilePurposesController');
    Route::resource('pages', 'Admin\PagesController');
    Route::resource('page-categories', 'Admin\PageCategoriesController');
    Route::resource('payments', 'Admin\PaymentsController');
    Route::resource('bookings', 'Admin\ReservationsController');
    Route::get('bookings-export_pdf', 'Admin\ReservationsController@export_pdf')->name('bookings.export_pdf');
    Route::get('/customers/pdf','CustomerController@export_pdf');
    Route::any('/emaillist', 'Admin\AdminController@emaillist')->name('emaillist');
    Route::any('/emaillist/export', 'Admin\AdminController@export')->name('emaillist.export');
    Route::any('/export-reservation', 'Admin\AdminController@exportReservations')->name('export.reservation');
    Route::any('/export-payment', 'Admin\AdminController@exportPayments')->name('export.payments');
	Route::get('page-categories/pages/{category_id}', 'Admin\PageCategoriesController@pages')->name('page-categories.pages');
    Route::get('/settings', 'Admin\SettingsController@index')->name('admin.settings');
    Route::post('/settings/update', 'Admin\SettingsController@update')->name('admin.settings.update');
    Route::get('/settings/cruise', 'Admin\SettingsController@cruise')->name('admin.settings.cruise');
    Route::post('/settings/cruise-update', 'Admin\SettingsController@cruiseUpdate')->name('admin.settings.cruise.update');

    Route::resource('questionaires', 'Admin\QuestionairesController');

    Route::get('/tickets', 'Admin\TicketsController@index')->name('tickets.index');
    Route::any('/tickets/export', 'Admin\TicketsController@export')->name('tickets.export');
    Route::get('/tickets/{id}', 'Admin\TicketsController@show')->name('tickets.show');

});

Route::get('/events', "Admin\EventController@all");
Route::get('/packages/{yacht}', "Admin\YachtController@packages");
Route::get('/package_details/{package}', "Admin\PackageController@single");

Route::get('/yacht/{yacht}', "Admin\YachtController@detail")->name('package');
Route::post('/dropzone/store', 'Admin\SlidesController@fileStore')->name('dropzone.store');

Route::middleware(['auth', 'owner'])->group(function() {
	Route::resource('customer', 'CustomerController');
	Route::get('/my/reservations', 'CustomerController@reservations')->name('customer.reservations');
	Route::get('/my/notifications', 'CustomerController@notifications')->name('customer.notifications');
	Route::get('/my/support', 'CustomerController@support')->name('customer.support');
    Route::get('/my/reservation', 'CustomerController@reservation')->name('customer.reservation');

    Route::post('/reservation/book', 'ReservationController@book')->name('reservation.book');
    Route::get('/reservation/submitted', 'ReservationController@submitted')->name('reservation.submitted');

    Route::get('/offlines/submitted', 'OfflinesController@submitted')->name('offlines.submitted');
    Route::post('/offlines/pay', 'OfflinesController@pay')->name('offlines.pay');
    Route::post('/offlines/approve', 'OfflinesController@approve')->name('offlines.approve');
    Route::post('/offlines/reservation', 'OfflinesController@reservation')->name('offlines.reservation');
    Route::resource('offlines', 'OfflinesController');

    Route::post('/flutterwave/pay', 'FlutterwaveController@pay')->name('flutterwave.pay');
    Route::any('/flutterwave/process', 'FlutterwaveController@process')->name('flutterwave.process');
    //Route::any('/response', 'FlutterwaveController@process');
    Route::get('/print_receipt/{reservation}', "ReservationController@printReciept")->name('print_receipt');

    Route::get('/payments', "PaymentController@index")->name('payments.index');
    Route::get('payments/{reference?}/{reservation?}', "PaymentController@paymentResponse")->name('response');

});

Route::get('mailable', function () {

    $event = [
        "fullname" => "Test User",
        "organization" => "Organization Name",
        "contact_email" => "required@email.com",
        "contact_number" => "67859458678",
        "event_type" => "Type",
        "guests" => "10",
        "event_date" => "2000-04-03",
        "catering" => "Yes",
        "yacht_state" => "Good",
        "event_duration" => "1 week",
        "event_setup_duration" => "2 days",
        "decoration" => "Screen, Outdoor, Carpet",
        "entertainment" => "Life Band, Karoke, Photographer",
    ];

    return new App\Mail\EventFormSubmitted($event);
});
