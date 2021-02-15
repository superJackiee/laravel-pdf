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

Route::get('lang/{locale}', 'ContactController@lang');
Route::get('/', 'ContactController@index');
Route::get('/aboutus', 'ContactController@aboutus')->name('aboutus');
Route::get('/services', 'ContactController@services')->name('services');
Route:: view('contact','contact');
Route:: post('contactsubmit','ContactController@formsubmit');
///User section
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/cv', 'CvController@index')->name('cv');
Route::post('/save-cv','CvController@save');
Route::delete('/delete-cv/{id}','CvController@delete');
Route::get('/edit-cv/{id}','CvController@edit');

Route::put('/edit-personal-info/{id}','CvController@edit_info');
Route::post('/edit-personal-info-ajax/{id}','CvController@edit_info_ajax');
Route::post('/autosave-personal-info-ajax/{id}','CvController@autosave_info_ajax');
Route::get('/edit-summary/{id}','CvController@edit_summary');
Route::put('/edit-summary/{id}','CvController@edit_summary');
Route::post('/autosave-summary-ajax/{id}','CvController@autosave_summary_ajax');

Route::get('/education/{id}','CvController@education');
Route::put('/save-education','CvController@save_education');
Route::get('/edit-education/{id}','CvController@edit_education');
Route::put('/edit-education/{id}','CvController@edit_education');
Route::delete('/delete-education/{id}','CvController@delete_education');
Route::post('/autosave-education-ajax/{id}','CvController@autosave_education_ajax');
Route::post('/autoupdate-education-ajax/{id}','CvController@autoupdate_education_ajax');

Route::delete('/delete-section/{id}','CvController@delete_section');

Route::get('/experience/{id}','CvController@experience');
Route::put('/save-experience','CvController@save_experience');
Route::get('/edit-experience/{id}','CvController@edit_experience');
Route::put('/edit-experience/{id}','CvController@edit_experience');
Route::delete('/delete-experience/{id}','CvController@delete_experience');
Route::post('/autosave-experience-ajax/{id}','CvController@autosave_experience_ajax');
Route::post('/autoupdate-experience-ajax/{id}','CvController@autoupdate_experience_ajax');

Route::get('/skills/{id}','CvController@skills');
Route::put('/save-skills','CvController@save_skills');
Route::get('/edit-skills/{id}','CvController@edit_skills');
Route::put('/edit-skills/{id}','CvController@edit_skills');
Route::delete('/delete-skills/{id}','CvController@delete_skills');
Route::post('/autosave-skills-ajax/{id}','CvController@autosave_skills_ajax');
Route::post('/autoupdate-skills-ajax/{id}','CvController@autoupdate_skills_ajax');

Route::get('/languages/{id}','CvController@languages');
Route::put('/save-languages','CvController@save_languages');
Route::get('/edit-languages/{id}','CvController@edit_languages');
Route::put('/edit-languages/{id}','CvController@edit_languages');
Route::delete('/delete-languages/{id}','CvController@delete_languages');
Route::post('/autosave-languages-ajax/{id}','CvController@autosave_languages_ajax');
Route::post('/autoupdate-languages-ajax/{id}','CvController@autoupdate_languages_ajax');

Route::get('/preview-resume/{id}','CvController@preview');
Route::get('/download-resume/{id}','CvController@generatePDF');
Route::get('/change-templet/{id}','CvController@change_templet');
Route::put('/change-templet/{id}','CvController@change_templet');
Route::get('/update-resume/{id}','CvController@update_templet');
Route::post('/update-resume/{id}','CvController@update_templet');
Route::get('/cv_section_order/{id}','CvController@cv_section_order');
Route::post('/cv_section_order/{id}','CvController@cv_section_order');

//Route::get('auth/google', 'Auth\GoogleController@redirectToGoogle');
//Route::get('auth/google/callback', 'Auth\GoogleController@handleGoogleCallback');
Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
Route::get('/callback/{provider}', 'SocialController@callback');

//// Admin Section
Route::group(['middleware' =>['auth'=>'admin']],function(){
  Route::get('/dashbord', function () {
      return view('admin.dashbord');
  });
  Route::get('/role-register','Admin\DashbordController@registerd');
  Route::get('/role-edit/{id}','Admin\DashbordController@registerdedit');
  Route::put('/role-update/{id}','Admin\DashbordController@registerdupdate');
  Route::get('/role-delete/{id}','Admin\DashbordController@registerddelete');
  //pages
  Route::get('/pages','Admin\PagesController@index');
  Route::post('/save-pages','Admin\PagesController@save');
  Route::get('/edit-pages/{id}','Admin\PagesController@edit');
  Route::put('/save-edit-pages/{id}','Admin\PagesController@save_edit');
  Route::delete('/delete-pages/{id}','Admin\PagesController@delete');
  Route::get('/manage-contact','Admin\PagesController@contactlist');
  Route::delete('/delete-contact/{id}','Admin\PagesController@deletecontact');
   ///Banners
  Route::get('/banner','Admin\BannerController@index');
  Route::post('/save-banner','Admin\BannerController@save');
  Route::get('/edit-banner/{id}','Admin\BannerController@edit');
  Route::put('/save-edit-banner/{id}','Admin\BannerController@save_edit');
  Route::delete('/delete-banner/{id}','Admin\BannerController@delete');

  Route::get('/job-category','Admin\SettingController@jobcategory');
  Route::post('/save-job-category','Admin\SettingController@add_jobcategory');
  Route::get('/edit-job-category/{id}','Admin\SettingController@edit_jobcategory');
  Route::put('/edit-job-category/{id}','Admin\SettingController@edit_jobcategory');
  Route::delete('/delete-job-category/{id}','Admin\SettingController@delete_jobcategory');

  Route::get('/experience-level','Admin\SettingController@experience_level');
  Route::post('/add-experience-level','Admin\SettingController@add_experience_level');
  Route::get('/edit-experience-level/{id}','Admin\SettingController@edit_experience_level');
  Route::put('/edit-experience-level/{id}','Admin\SettingController@edit_experience_level');
  Route::delete('/delete-experience-level/{id}','Admin\SettingController@delete_experience_level');

  Route::get('/resume-templet','Admin\SettingController@resume_templet');
  Route::post('/add-resume-templet','Admin\SettingController@add_resume_templet');
  Route::get('/edit-resume-templet/{id}','Admin\SettingController@edit_resume_templet');
  Route::put('/edit-resume-templet/{id}','Admin\SettingController@edit_resume_templet');
  Route::delete('/delete-resume-templet/{id}','Admin\SettingController@delete_resume_templet');
  //cv
  Route::get('/manage-cvs', 'Admin\CvController@index')->name('cv');


});
