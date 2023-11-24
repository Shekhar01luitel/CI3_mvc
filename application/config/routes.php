<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Shekhar';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['ecommerce/login'] = 'ecommerce/login/sign_in';
$route['ecommerce/registration'] = 'ecommerce/login/registration';
$route['ecommerce/logout'] = 'ecommerce/login/sign_out/logout';

$route['ecommerce/dashboard']= 'ecommerce/dashboard/dashboard';
$route['ecommerce/user'] = 'ecommerce/dashboard/user';

$route['ecommerce/profile'] = 'ecommerce/profile';
$route['ecommerce/profile/(:num)'] = 'ecommerce/dashboard/profile/user_get_by_id_details/$1';
$route['ecommerce/profile/update/(:num)'] = 'ecommerce/dashboard/profile/update_profile/$1';
$route['ecommerce/profile/photo/(:num)'] = 'ecommerce/dashboard/profile/update_photo/$1';
$route['ecommerce/profile/updates/(:num)'] = 'ecommerce/dashboard/profile/update_account/$1';
$route['ecommerce/profile/delete/(:num)'] = 'ecommerce/dashboard/profile/delete_user_by_id/$1';
$route['ecommerce/profile/password/(:num)'] = 'ecommerce/dashboard/profile/update_password/$1';
$route['ecommerce/profile/role/(:num)'] = 'ecommerce/dashboard/profile/update_role/$1';

$route['ecommerce/catalog/products']= 'ecommerce/product/product';
$route['ecommerce/catalog/attributes']= 'ecommerce/attributes/Attributes';
$route['ecommerce/catalog/categories']= 'ecommerce/categories/categories';
$route['ecommerce/product/product/edit_product/(:num)'] = 'ecommerce/product/product/edit_product/$1';