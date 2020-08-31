<?php
Route::get('/lang/{lang}','LangController@index');
Route::group(
[
	'prefix' => LaravelLocalization::setLocale(),
	'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function(){


  Route::get('/', function () {
      return view('auth.login');
  });


		// pages
	  Route::get('/icons', 'PageController@icons');
    Route::get('pdfview',array('as'=>'pdfview','uses'=>'ItemController@pdfview'));
		Route::get('pdfbooking',array('as'=>'pdfbooking','uses'=>'pdfbookingController@pdfbooking'));
    Route::get('/about', 'about@about')->name('about');
    // login in the system
    Auth::routes();
   //Auth user
    Route::get('/register', 'RegisterController@create')->name('register');
    Route::post('/register', 'RegisterController@store')->name('register');


    Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

      Route::group(['middleware' => 'auth'], function () {
  		Route::get('parking', ['as' => 'pages.parking', 'uses' => 'PageController@parking']);
		 	Route::get('parkingrtl', ['as' => 'parking.indexrtl', 'uses' => 'parkingController@index']);
		 	Route::get('rtl', ['as' => 'dashboardrtl', 'uses' => 'PageController@rtl']);
		 	Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'PageController@dashboard']);


  });

//@if (auth()->user()->id == $booking->us || auth()->user()->hasRole('super_admin') )
  Route::group(['middleware' => 'auth'], function () {
		//user 'Admin
  	Route::resource('user', 'UserController', ['except' => ['show']]);
		// booking
	  Route::resource('booking', 'BController', ['except' => ['show']]);
  	//Route::get('booking/{id}', ['as' => 'booking.index', 'uses' => 'BookingController@index']);
    //Route::resource('booking', 'BookingController', ['except' => ['index','show']]);

		//parking
		Route::resource('parking', 'ParkingController', ['except' => ['show']]);
		//user profile
  	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
  	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
  	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

//rtl

	  Route::resource('userrtl', 'UserrtlController', ['except' => ['show']]);
  	Route::get('profilertl', ['as' => 'profile.editrtl', 'uses' => 'ProfileController@editrtl']);
  	Route::put('profilertl', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
  });
	//
  // Auth::routes();
	//
  // Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
	//
  // Route::group(['middleware' => 'auth'], function () {
  // 		Route::get('parking', ['as' => 'pages.parking', 'uses' => 'PageController@parking']);
  //     Route::get('orgnazations', ['as' => 'pages.orgnazations', 'uses' => 'PageController@orgnazations']);
  // 		Route::get('rtl', ['as' => 'pages.rtl', 'uses' => 'PageController@rtl']);
  // });
	//
  // Route::group(['middleware' => 'auth'], function () {
  // 	Route::resource('user', 'UserController', ['except' => ['show']]);
  // 	Route::get('booking/{id}', ['as' => 'booking.index', 'uses' => 'BookingController@index']);
  //   Route::resource('booking', 'BookingController', ['except' => ['index','show']]);
  // 	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
  // 	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
  // 	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
  // });


});
