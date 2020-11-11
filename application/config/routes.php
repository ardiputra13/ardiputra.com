<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller']       = 'front';
$route['404_override']             = '';
$route['translate_uri_dashes']     = FALSE;

// Front Page
$route['portofolio']               = 'Front/portofolio_detail';
$route['send_email']               = 'Send/email_to_me';

// Auth User
$route['login']                    = 'Admin/Auth/login';
$route['logout']                   = 'Admin/Auth/logout';

// Admin
$route['admin']                    = 'Admin/Overview';

$route['admin/portofolio']         = 'Admin/Portofolio';
$route['admin/portofolio/(:num)']  = 'Admin/Portofolio';
$route['admin/portofolio/add']     = 'Admin/Portofolio/add';
$route['admin/portofolio/edit']    = 'Admin/Portofolio/edit';
$route['admin/portofolio/delete']  = 'Admin/Portofolio/delete';

$route['admin/client']             = 'Admin/Client';
$route['admin/client/(:num)']      = 'Admin/Client'; // digunakan untuk pagination
$route['admin/client/add']         = 'Admin/Client/add';
$route['admin/client/edit']        = 'Admin/Client/edit';
$route['admin/client/delete']      = 'Admin/Client/delete';

$route['admin/testimoni']          = 'Admin/Testimoni';
$route['admin/testimoni/(:num)']   = 'Admin/Testimoni';
$route['admin/testimoni/add']      = 'Admin/Testimoni/add';
$route['admin/testimoni/edit']     = 'Admin/Testimoni/edit';
$route['admin/testimoni/delete']   = 'Admin/Testimoni/delete';

$route['admin/article']            = 'Admin/Article';
$route['admin/article/(:num)']     = 'Admin/Article';


$route['admin/category']           = 'Admin/Category';
$route['admin/category/(:num)']    = 'Admin/Category';
$route['admin/category/add']       = 'Admin/Category/add';
$route['admin/category/edit']      = 'Admin/Category/edit';
$route['admin/category/delete']    = 'Admin/Category/delete';