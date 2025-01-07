<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
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
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('about', 'Home::about');
$routes->get('service', 'Home::service');
$routes->get('blog', 'Home::blog');
$routes->get('category/(:num)', 'Home::category/$1');
$routes->get('blog-details/(:num)', 'Home::blogDetails/$1');
$routes->post('postComment', 'Home::postComment');
$routes->get('contact', 'Home::contact');
$routes->post('postContact', 'Home::postContact');
$routes->get('register', 'AuthController::index');
$routes->post('newRegister', 'AuthController::postRegister');
$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::postLogin');
$routes->post('newslatter','Home::subscribe');


$routes->group('', ['filter' => 'AuthCheck'], function($routes){  
 $routes->get('/dashboard','AdminController::dashboard');
 $routes->get('adminEnquiry','AdminController::adminEnquiry');

 $routes->get('adminAbout','AdminController::adminAbout');
 $routes->get('adminNewAbout','AdminController::adminNewAbout');
 $routes->post('adminNewPostAbout','AdminController::adminNewPostAbout');
 $routes->get('adminEditAbout/(:num)','AdminController::adminEditAbout/$1');
 $routes->post('adminEditPostAbout/(:num)','AdminController::adminEditPostAbout/$1');
 $routes->post('adminDeleteAbout/(:num)','AdminController::adminDeleteAbout/$1');

 $routes->get('adminServices','AdminController::adminServices');
 $routes->get('adminNewService','AdminController::adminNewService');
 $routes->post('adminNewPostService','AdminController::adminNewPostService');
 $routes->get('adminEditService/(:num)','AdminController::adminEditService/$1');
 $routes->post('adminEditPostService/(:num)','AdminController::adminEditPostService/$1');
 $routes->post('adminDeleteService/(:num)','AdminController::adminDeleteService/$1');


 $routes->get('adminSEOServices','AdminController::adminSEOServices');
 $routes->get('adminNewSEOService','AdminController::adminNewSEOService');
 $routes->post('adminNewPostSEOService','AdminController::adminNewPostSEOService');
 $routes->get('adminEditSEOService/(:num)','AdminController::adminEditSEOService/$1');
 $routes->post('adminEditPostSEOService/(:num)','AdminController::adminEditPostSEOService/$1');
 $routes->post('adminDeleteSEOService/(:num)','AdminController::adminDeleteSEOService/$1');

 $routes->get('adminPlan','AdminController::adminPlans');
 $routes->get('adminNewPlan','AdminController::adminNewPlan');
 $routes->post('adminNewPostPlan','AdminController::adminNewPostPlan');
 $routes->get('adminEditPlan/(:num)','AdminController::adminEditPlan/$1');
 $routes->post('adminEditPostPlan/(:num)','AdminController::adminEditPostPlan/$1');
 $routes->post('adminDeletePlan/(:num)','AdminController::adminDeletePlan/$1');


 $routes->get('adminCategory','AdminController::adminCategory');
 $routes->get('adminNewCategory','AdminController::adminNewCategory');
 $routes->post('adminNewPostCategory','AdminController::adminNewPostCategory');
 $routes->get('adminEditCategory/(:num)','AdminController::adminEditCategory/$1');
 $routes->post('adminEditPostCategory/(:num)','AdminController::adminEditPostCategory/$1');
 $routes->post('adminDeleteCategory/(:num)','AdminController::adminDeleteCategory/$1');


 $routes->get('adminBlog','AdminController::adminBlog');
 $routes->get('adminNewBlog','AdminController::adminNewBlog');
 $routes->post('adminNewPostBlog','AdminController::adminNewPostBlog');
 $routes->get('adminEditBlog/(:num)','AdminController::adminEditBlog/$1');
 $routes->post('adminEditPostBlog/(:num)','AdminController::adminEditPostBlog/$1');
 $routes->post('adminDeleteBlog/(:num)','AdminController::adminDeleteBlog/$1');

  $routes->get('adminLink','AdminController::adminLink');
  $routes->get('adminNewLink','AdminController::adminNewLink');
  $routes->post('adminNewPostLink','AdminController::adminNewPostLink');
  $routes->get('adminEditLink/(:num)','AdminController::adminEditLink/$1');
  $routes->post('adminEditPostLink/(:num)','AdminController::adminEditPostLink/$1');
  $routes->post('adminDeleteLink/(:num)','AdminController::adminDeleteLink/$1');


 $routes->post('logout','AdminController::logout');
});


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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
