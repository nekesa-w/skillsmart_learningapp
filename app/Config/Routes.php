<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();
$routes->setAutoRoute(true);
$route['default_controller'] = "welcome";
$route['404_override'] = '';

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setDefaultController('Dashboard');
$routes->setDefaultController('CreateAccount');
$routes->setTranslateURIDashes(false);
$routes->set404Override();

// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Website Routes
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('/', 'MainController::index');

$routes->get('index', 'MainController::index', ['as' => 'index']);
$routes->get('about_us', 'MainController::about_us', ['as' => 'about_us']);

$routes->get('register', 'RegisterController::register', ['as' => 'register']);
$routes->get('activate/(:any)', 'RegisterController::activate/$1');
$routes->post('save', 'RegisterController::save', ['as' => 'save']);

$routes->match(['get', 'post'], 'LoginController/loginAuth', 'LoginController::loginAuth');
$routes->get('login', 'LoginController::index');
$routes->get('logout', 'LoginController::logout');
$routes->get('forgotpassword', 'LoginController::forgotpassword');
$routes->match(['get', 'post'], 'LoginController/forgotpasswordAuth', 'LoginController::forgotpasswordAuth');
$routes->get('newpassword/(:any)', 'LoginController::newpassword/$1');
$routes->post('passwordsave', 'LoginController::passwordsave', ['as' => 'passwordsave']);

$routes->get("courses", "UserController::courses", ["filter" => "auth"]);
$routes->get('profile', 'UserController::profile', ["filter" => "auth"]);

$routes->post('getlevels', 'LevelController::getlevels', ["filter" => "auth"]);
$routes->get('levels/(:num)', 'LevelController::levels/$1', ['as' => 'levels'], ["filter" => "auth"]);
$routes->post('getcontent', 'LevelController::getcontent', ["filter" => "auth"]);
$routes->get('level_content/(:num)/(:any)', 'LevelController::level_content/$1/$2', ['as' => 'level_content'], ["filter" => "auth"]);
$routes->post('markcomplete', 'LevelController::markcomplete', ["filter" => "auth"]);
$routes->post('submitanswer/(:num)', 'LevelController::submitAnswer/$1', ['as' => 'submitanswer'], ["filter" => "auth"]);

$routes->post('getchallenge', 'ChallengeController::getchallenge', ["filter" => "auth"]);
$routes->get('challenge/(:num)/(:any)', 'ChallengeController::challenge/$1/$2', ['as' => 'challenge'], ["filter" => "auth"]);
$routes->post('markchallengecomplete', 'ChallengeController::markchallengecomplete', ["filter" => "auth"]);
$routes->post('submitchallengeanswer/(:num)', 'ChallengeController::submitchallengeanswer/$1', ['as' => 'submitchallengeanswer'], ["filter" => "auth"]);

/*
 * --------------------------------------------------------------------
 * Admin Routes
 * --------------------------------------------------------------------

 */
// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// account
$routes->get('dashboard', 'Admin\Dashboard::index', ['as' => 'dashboard'], ["filter" => "noauth"]);

$routes->match(['get', 'post'], 'create_account', 'Admin\AccountController::create_account', ["filter" => "noauth"]);
$routes->match(['get', 'post'], 'view_account', 'Admin\AccountController::view_account', ["filter" => "noauth"]);
$routes->match(['get', 'post'], 'update_account/(:num)', 'Admin\AccountController::update_account/$1', ["filter" => "noauth"]);
$routes->match(['get', 'post'], 'delete_account/(:num)', 'Admin\AccountController::delete_account/$1', ["filter" => "noauth"]);

$routes->post('admin_create_account', 'Admin\AccountController::admin_create_account', ['as' => 'admin_create_account'], ["filter" => "noauth"]);
$routes->post('admin_view_account', 'Admin\AccountController::admin_view_account', ['as' => 'admin_view_account'], ["filter" => "noauth"]);
$routes->post('admin_update_account', 'Admin\AccountController::admin_update_account', ['as' => 'admin_update_account'], ["filter" => "noauth"]);
$routes->post('admin_delete_account', 'Admin\AccountController::admin_delete_account', ['as' => 'admin_delete_account'], ["filter" => "noauth"]);

$routes->match(['get', 'post'], 'updateusergetId', 'Admin\AccountController::updateusergetId', ["filter" => "noauth"]);
$routes->match(['get', 'post'], 'deleteusergetId', 'Admin\AccountController::deleteusergetId', ["filter" => "noauth"]);


// course
$routes->match(['get', 'post'], 'create_course', 'Admin\CourseController::create_course', ["filter" => "noauth"]);
$routes->match(['get', 'post'], 'view_course', 'Admin\CourseController::view_course', ["filter" => "noauth"]);
$routes->match(['get', 'post'], 'update_course/(:num)', 'Admin\CourseController::update_course/$1', ["filter" => "noauth"]);
$routes->match(['get', 'post'], 'delete_course/(:num)', 'Admin\CourseController::delete_course/$1', ["filter" => "noauth"]);

$routes->post('admin_create_course', 'Admin\CourseController::admin_create_course', ['as' => 'admin_create_course'], ["filter" => "noauth"]);
$routes->post('admin_view_course', 'Admin\CourseController::admin_view_course', ['as' => 'admin_view_course'], ["filter" => "noauth"]);
$routes->post('admin_update_course', 'Admin\CourseController::admin_update_course', ['as' => 'admin_update_course'], ["filter" => "noauth"]);
$routes->post('admin_delete_course', 'Admin\CourseController::admin_delete_course', ['as' => 'admin_delete_course'], ["filter" => "noauth"]);

$routes->match(['get', 'post'], 'updatecoursegetId', 'Admin\CourseController::updatecoursegetId', ["filter" => "noauth"]);
$routes->match(['get', 'post'], 'deletecoursegetId', 'Admin\CourseController::deletecoursegetId', ["filter" => "noauth"]);


// level 
$routes->match(['get', 'post'], 'create_level', 'Admin\LevelController::create_level', ["filter" => "noauth"]);
$routes->match(['get', 'post'], 'view_level', 'Admin\LevelController::view_level', ["filter" => "noauth"]);
$routes->match(['get', 'post'], 'update_level/(:num)', 'Admin\LevelController::update_level/$1', ["filter" => "noauth"]);
$routes->match(['get', 'post'], 'delete_level/(:num)', 'Admin\LevelController::delete_level/$1', ["filter" => "noauth"]);

$routes->post('admin_create_level', 'Admin\LevelController::admin_create_level', ['as' => 'admin_create_level'], ["filter" => "noauth"]);
$routes->post('admin_view_level', 'Admin\LevelController::admin_view_level', ['as' => 'admin_view_level'], ["filter" => "noauth"]);
$routes->post('admin_update_level', 'Admin\LevelController::admin_update_level', ['as' => 'admin_update_level'], ["filter" => "noauth"]);
$routes->post('admin_delete_level', 'Admin\LevelController::admin_delete_level', ['as' => 'admin_delete_level'], ["filter" => "noauth"]);

$routes->match(['get', 'post'], 'updatelevelgetId', 'Admin\LevelController::updatelevelgetId', ["filter" => "noauth"]);
$routes->match(['get', 'post'], 'deletelevelgetId', 'Admin\LevelController::deletelevelgetId', ["filter" => "noauth"]);


// questions
$routes->match(['get', 'post'], 'create_question', 'Admin\QuestionController::create_question', ["filter" => "noauth"]);
$routes->match(['get', 'post'], 'view_question', 'Admin\QuestionController::view_question', ["filter" => "noauth"]);
$routes->match(['get', 'post'], 'update_question/(:num)', 'Admin\QuestionController::update_question/$1', ["filter" => "noauth"]);
$routes->match(['get', 'post'], 'delete_question/(:num)', 'Admin\QuestionController::delete_question/$1', ["filter" => "noauth"]);

$routes->post('admin_create_question', 'Admin\QuestionController::admin_create_question', ['as' => 'admin_create_question'], ["filter" => "noauth"]);
$routes->post('admin_view_question', 'Admin\QuestionController::admin_view_question', ['as' => 'admin_view_question'], ["filter" => "noauth"]);
$routes->post('admin_update_question', 'Admin\QuestionController::admin_update_question', ['as' => 'admin_update_question'], ["filter" => "noauth"]);
$routes->post('admin_delete_question', 'Admin\QuestionController::admin_delete_question', ['as' => 'admin_delete_question'], ["filter" => "noauth"]);

$routes->match(['get', 'post'], 'updatequestiongetId', 'Admin\QuestionController::updatequestiongetId', ["filter" => "noauth"]);
$routes->match(['get', 'post'], 'deletequestiongetId', 'Admin\QuestionController::deletequestiongetId', ["filter" => "noauth"]);

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
