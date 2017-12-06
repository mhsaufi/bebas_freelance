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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();



Route::group(['middleware'=>'auth'],function(){

	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('/profile',	'HomeController@profile');
	Route::get('/editprofile', 'HomeController@editprofile');
	Route::post('/updateprofile',	'HomeController@updateProfile');
	Route::post('/upload_dp',		'HomeController@uploadProfilePicture');

	Route::get('/viewportfolio',	'PortfolioController@viewPortfolio');
	Route::get('/viewmyportfolio',	'PortfolioController@viewMyPortfolio');

	Route::get('profilepicture/{filename}/{id}',function($filename,$id)
	{
		return Storage::get('profilepicture/'.$id.'/'.$filename);
	});

	Route::get('attachments/{id}/{filename}', function ($id,$filename)
	{
	    return Storage::get('attachments/'.$id.'/'.$filename);
	});

	Route::get('portfolios/{id}/{filename}', function ($id,$filename)
	{
	    return Storage::get('portfolios/'.$id.'/'.$filename);
	});

	// JOBS
	Route::get('/createjob',				'JobController@index');
	Route::post('/upload_attachment',		'JobController@uploadAttachment');
	Route::post('/postnewjob',				'JobController@createNewJob');
	Route::get('/getjobs',					'JobController@jobListing');
	Route::get('/myjob',					'JobController@myJobListing');
	Route::get('/joboverview',				'ApplicationController@overviewJob');
	Route::get('/viewjob',					'JobController@JobView');
	Route::post('/takejob',					'JobController@TakeJob');
	Route::get('/application',				'ApplicationController@myApplication');

	// ON HAND JOB
	Route::get('/jobstatus',				'JobController@jobStatusView');
	Route::get('/progressoverview',			'JobController@progressOverview');
	Route::post('/postissue',				'JobController@postIssue');
	Route::post('/markpaid',				'JobController@markPaid');
	Route::get('/markcomplete',				'JobController@markComplete');
	Route::post('/upload_final',			'JobController@finalAttachment');
	Route::post('/completejob',				'JobController@completeJob');
	Route::post('/rateclient',				'JobController@rateClient');

	// PORTFOLIO
	Route::get('/portfolio',				'PortfolioController@index');
	Route::get('/createportfolio',			'PortfolioController@createNewPortfolio');
	Route::post('/upload_portfolio',		'PortfolioController@uploadPortfolioFiles');
	Route::post('/save_portfolio',			'PortfolioController@saveNewPortfolio');

	Route::get('/userportfolio',			'PortfolioController@userPortfolio');
	Route::get('/reviewportfolio',			'PortfolioController@reviewPortfolio');
	Route::post('/rejectapp',				'ApplicationController@rejectApplication');
	Route::get('/acceptapp',				'ApplicationController@acceptApplication');
	Route::post('/confirmaccept',			'ApplicationController@confirmAccept');

	// MANAGE
	Route::get('/manage',					'ManagementController@index');
	Route::get('/managecredit',				'ManagementController@credit');

	// MAIL
	Route::get('/inbox',					'MailingController@index');
	Route::get('/message',					'MailingController@viewMail');
	Route::get('/composenew',				'MailingController@composeNew');
	Route::post('/sendemail',				'MailingController@sendmail');

});
