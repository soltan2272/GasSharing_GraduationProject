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

/*Route::get('/', function () {
    return view('welcome');
});*/


Route::get('/', 'userController@index')->name('home');

Route::get('/aboutus','userController@aboutus')->name('aboutus');

Route::get('login','userController@login')->name('login');

Route::get('signup','registerController@signup')->name('signup');

Route::post('signup','registerController@store')->name('store');

Route::get('login','sessionController@login')->name('login');
Route::post('login','sessionController@store')->name('store_login');

Route::get('edit','userController@editProfile')->name('edit_profile');
Route::post('edit','userController@storeEdit')->name('store_editProfile');




Route::get('myrequest/{id}','userController@myrequest')->name('myrequest');

Route::get('cancelmyrequest/{id}','userController@cancelmyrequest')->name('cancelmyrequest');

Route::get('profile','userController@profile')->name('profile');

Route::get('showrequests','userController@showrequests')->name('showrequests');

Route::get('acceptrequest/{id}','userController@acceptrequest')->name('acceptrequest');

Route::get('refuserequest/{id}','userController@refuserequest')->name('refuserequest');

Route::get('/map','userController@map')->name('map');



Route::group(['middleware'=>'roles', 'roles'=>['carowner']],function(){
    Route::post('insertpost','userController@insertpost')->name('insertpost');
    Route::get('/newpost','userController@newpost')->name('newpost');

    Route::get('editPost/{id}','userController@editPost')->name('edit_post');
    Route::post('editPost/{id}','userController@storeEditPost')->name('store_editPost');


}
);

Route::get('logout','sessionController@destroy')->name('destroy');



Route::post('searching','userController@search')->name('search');
Route::get('getsearching','userController@getsearch')->name('getsearch');

Route::get('showpost/{id}','userController@showpost')->name('showpost');




Route::get('/loginadmin','adminController@loginadmin')->name('loginadmin');
Route::post('/loginenter','adminController@loginenter')->name('loginenter');

Route::group(['middleware'=>'roles', 'roles'=>['admin']],function(){
    Route::get('/editwebhome','adminController@editweb_home')->name('editweb_home');

    Route::get('/editwebhome','adminController@editweb_home')->name('editweb_home');
    Route::post('/websitelogo','adminController@websitelogo')->name('websitelogo');
    Route::post('/websitewelcome','adminController@websitewelcome')->name('websitewelcome');
    Route::post('/animationphoto','adminController@animationphoto')->name('animationphoto');
    Route::post('/gallaryphoto','adminController@gallaryphoto')->name('gallaryphoto');
    Route::post('/info','adminController@info')->name('info');


    Route::get('/adminaboutus','adminController@aboutus')->name('adminaboutus');
    Route::post('/saveinfo','adminController@saveinfo')->name('saveinfo');



    Route::get('/index','adminController@index')->name('index');

    Route::post('/addadmin','adminController@addadmin')->name('addadmin');
    Route::post('/editadmin','adminController@editadmin')->name('editadmin');
    Route::post('/deleteadmin','adminController@deleteadmin')->name('deleteadmin');

    Route::get('/allposts','adminController@allposts')->name('allposts');
    Route::get('/newposts','adminController@newposts')->name('newposts');
    Route::post('/deletepost','adminController@deletepost')->name('deletepost');
    Route::post('/acceptpost','adminController@acceptpost')->name('acceptpost');
    Route::post('/refusepost','adminController@refusepost')->name('refusepost');

    Route::post('/editpassword','adminController@editpassword')->name('editpassword');

    Route::get('/logoutadmin','adminController@logoutadmin')->name('logoutadmin');

}
);


Route::get('refusetrip/{id}','userController@refusetrip')->name('refusetrip');


Route::get('showacceptedrequests','userController@showacceptedrequests')->name('showacceptedrequests');



