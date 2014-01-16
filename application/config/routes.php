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

$route['default_controller'] = "welcome";
$route['404_override'] = '';
$route['app'] = 'app/index';
$route['about'] = 'helper/about';
$route['contact'] = 'helper/contact';
$route['global-expo-certificate'] = 'helper/global_expo_certificate';
$route['terms-of-use'] = 'helper/terms_of_use';
$route['account-membership'] = 'helper/account_membership';
$route['my-favorites'] = 'helper/my_favorites';
$route['purchase'] = "purchase/index";
$route['home/user/(:any)'] = "home/user";
$route['favorites/add_or_del/(:any)'] = "favorites/add_or_del";
$route['categories'] = "categories/index";
$route['join'] = "join/index";
$route['join/ajax_check_login_name'] = "join/ajax_check_login_name";
$route['join/ajax_check_code'] = "join/ajax_check_code";
$route['join/ajax_change_code'] = "join/ajax_change_code";
$route['join/ajax_reg'] = "join/ajax_reg";
$route['login'] = "login/index";
$route['login/out'] = "login/out";
$route['login/check'] = "login/check";
$route['login/email_validate'] = "login/email_validate";
$route['login/emailSendInfo'] = "login/emailSendInfo";
$route['password/forgot'] = "password/forgot";
$route['password/reset'] = "password/reset";
<<<<<<< HEAD
$route['exhibition'] = "exhibition/ls";
$route['exhibition/detail/(:num)'] = "exhibition/detail/$1";
$route['exhibition/ls'] = "exhibition/ls";
$route['exhibition/ls/(:any)'] = "exhibition/ls/$1";
$route['exhibition/detail'] = "exhibition/detail";
$route['meet/ls'] = "meet/ls";
$route['meet/signUp/(:num)'] = "meet/signUp/$1";
$route['meet/ls/(:any)'] = "meet/ls/$1";
$route['meet/detail/(:num)'] = "meet/detail/$1";
$route['td_code/(:any)'] = "td_code/$1";
=======
>>>>>>> 45dad3a572d5d7ea9d42e1bc662d5f932f47f01f
$route['search/index'] = "search/index";
$route['search/result'] = "search/result/$1";
$route['search/result/(:num)'] = "search/result/$1";
$route['switchLocale/(:any)'] = 'language/switchLocale';
<<<<<<< HEAD
$route['product/index'] = 'product/index';
$route['exhibition/detail'] = 'exhibition/detail';
$route['(:any)_(:num)/(:num)'] = "industry/index";
$route['(:any)-products/(:any)_(:num)'] = "company/product";
$route['(:any)-products'] = "company/ls";
$route['(:any)-products/(:num)'] = "company/ls";
$route['(:any)_(:num)/(:any)_(:num)'] = "product/index";
$route['(:any)-products'] = "company/ls";
$route['(:any)-products/(:num)'] = "company/ls/$1";
$route['product/index'] = "product/index";
$route['product/index/(:num)'] = "product/index/?page=$1";
$route['product/pro_detail/(:num)'] = "product/pro_detail/?p_id=$1";
$route['product/favorite_pro/(:num)'] = "product/favorite_pro/?$1";
$route['product/favorite_com/(:any)'] = "product/favorite_com/?$1&$2";
$route['product/result/(:any)'] = 'product/result/?industry1_id=$1&page=$2';
$route['product/result_two/(:any)'] = 'product/result_two/?industry2_id=$1&page=$2';
$route['product/result_three/(:any)'] = 'product/result_three/?industry3_id=$1&page=$2';
$route['product/result_four/(:any)'] = 'product/result_four/?industry4_id=$1&page=$2';
$route['(:any)_(:num)'] = "industry/index";
=======
$route['(:any)_(:num)/(:num)'] = "industry/index";
$route['(:any)-products/(:any)_(:num)'] = "company/product";
$route['(:any)-products'] = "company/ls";
$route['(:any)_(:num)/(:any)_(:num)'] = "product/index";
$route['(:any)_(:num)'] = "industry/index";
$route['(:any)'] = "company/index";
>>>>>>> 45dad3a572d5d7ea9d42e1bc662d5f932f47f01f


/* End of file routes.php */
/* Location: ./application/config/routes.php */