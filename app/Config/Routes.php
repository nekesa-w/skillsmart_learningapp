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
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'MainController::index');

$routes->get('index', 'MainController::index', ['as' => 'index']);
$routes->get('about_us', 'MainController::about_us', ['as' => 'about_us']);

$routes->get('register', 'AuthController::register', ['as' => 'register']);
$routes->get('activate/(:any)', 'AuthController::activate/$1');
$routes->post('save', 'AuthController::save', ['as' => 'save']);

$routes->match(['get', 'post'], 'LoginController/loginAuth', 'LoginController::loginAuth');
$routes->get('login', 'LoginController::index');
$routes->get('logout', 'LoginController::logout');

$routes->get('profile', 'MainController::profile', ['as' => 'profile']);

$routes->get('courses', 'MainController::courses', ['as' => 'courses']);
$routes->post('getlevels', 'LevelController::getlevels');
$routes->get('levels/(:num)', 'LevelController::levels/$1', ['as' => 'levels']);
$routes->post('getcontent', 'LevelController::getcontent');
$routes->get('level_content/(:num)', 'LevelController::level_content/$1', ['as' => 'level_content']);

$routes->get('dashboard', 'Admin\Dashboard::index', ['as' => 'dashboard']);


/*
 * --------------------------------------------------------------------
 * Additional Routing by Terry
 * --------------------------------------------------------------------

 */

$routes->match(['get', 'post'], 'create_account', 'Admin\CreateAccount::create_account');
$routes->match(['get', 'post'], 'create_course', 'Admin\CreateCourse::create_course');
$routes->match(['get', 'post'], 'create_level', 'Admin\CreateLevel::create_level');
$routes->match(['get', 'post'], 'create_quizz', 'Admin\CreateQuizz::create_quizz');
$routes->match(['get', 'post'], 'delete_account', 'Admin\DeleteAccount::delete_account');
$routes->match(['get', 'post'], 'delete_course', 'Admin\DeleteCourse::delete_course');
$routes->match(['get', 'post'], 'delete_level', 'Admin\DeleteLevel::delete_level');
$routes->match(['get', 'post'], 'delete_quizz', 'Admin\DeleteQuizz::delete_quizz');
$routes->match(['get', 'post'], 'update_account', 'Admin\UpdateAccount::update_account');
$routes->match(['get', 'post'], 'update_course', 'Admin\UpdateCourse::update_level');
$routes->match(['get', 'post'], 'update_level', 'Admin\UpdateLevel::update_level');
$routes->match(['get', 'post'], 'update_quizz', 'Admin\UpdateQuizz::update_quizz');
$routes->match(['get', 'post'], 'view_account', 'Admin\ViewAccount::view_account');
$routes->match(['get', 'post'], 'view_course', 'Admin\ViewCourse::view_course');
$routes->match(['get', 'post'], 'view_level', 'Admin\ViewLevel::view_level');
$routes->match(['get', 'post'], 'view_quizz', 'Admin\ViewQuizz::view_quizz');

$routes->get('/admin/view_account', 'Home::viewaccount');
$routes->match(['get', 'post'], 'forgotpassword', 'ForgotPassword::ForgotPassword');



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
