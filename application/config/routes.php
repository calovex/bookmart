<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] 	= 'home';
$route['404_override'] 			= 'errors/page_missing';

$route['about-us'] 										= 'pages/view/1';
$route['user-agreement'] 								= 'pages/view/2';
$route['privacy'] 										= 'pages/view/3';
$route['contact-us'] 									= 'pages/view/4';
$route['customer-service'] 								= 'pages/view/5';
$route['product-recalls'] 								= 'pages/view/6';
$route['order-status-tracking']							= 'pages/view/7';
$route['shipping-policy'] 								= 'pages/view/8';
$route['warranty'] 										= 'pages/view/9';
$route['tips-advice'] 									= 'pages/view/10';
$route['read-instantly-on-your-web-browser'] 			= 'pages/view/11';
$route['also-read-on-ios-android-and-windowsphone'] 	= 'pages/view/12';

$route['category/(:any)/(:num)'] 	= "category/products/$1/$2";
$route['category/(:any)'] 			= "category/products/$1";

$route['product/(:num)/(:any)'] 	= "product/view/$1/$2";

/* End of file routes.php */
/* Location: ./application/config/routes.php */