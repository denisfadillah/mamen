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

$route['default_controller'] = "home";
$route['404_override'] = 'error';

/*********** USER SITE DEFINED ROUTES *******************/
$route['home'] = 'home';
$route['news/page/(:num)'] = 'news/index/$1';
$route['news/page'] = 'news/index/1';
$route['news/(:any)'] = 'news/view/$1';
$route['news'] = 'news/index/1';

/*********** USER DEFINED ROUTES *******************/
$route['admin'] = 'login';
$route['loginMe'] = 'login/loginMe';
$route['dashboard'] = 'user';
$route['logout'] = 'user/logout';
$route['userListing'] = 'user/userListing';
$route['userListing/(:num)'] = "user/userListing/$1";
$route['addNew'] = "user/addNew";

$route['addNewUser'] = "user/addNewUser";
$route['editOld'] = "user/editOld";
$route['editOld/(:num)'] = "user/editOld/$1";
$route['editUser'] = "user/editUser";
$route['deleteUser'] = "user/deleteUser";
$route['loadChangePass'] = "user/loadChangePass";
$route['changePassword'] = "user/changePassword";
$route['pageNotFound'] = "user/pageNotFound";
$route['checkEmailExists'] = "user/checkEmailExists";
$route['login-history'] = "user/loginHistoy";
$route['login-history/(:num)'] = "user/loginHistoy/$1";
$route['login-history/(:num)/(:num)'] = "user/loginHistoy/$1/$2";

$route['forgotPassword'] = "login/forgotPassword";
$route['resetPasswordUser'] = "login/resetPasswordUser";
$route['resetPasswordConfirmUser'] = "login/resetPasswordConfirmUser";
$route['resetPasswordConfirmUser/(:any)'] = "login/resetPasswordConfirmUser/$1";
$route['resetPasswordConfirmUser/(:any)/(:any)'] = "login/resetPasswordConfirmUser/$1/$2";
$route['createPasswordUser'] = "login/createPasswordUser";

$route['blogListing'] = 'blog/blogListing';
$route['blogListing/(:num)'] = "blog/blogListing/$1";
$route['showEditBlog'] = "blog/showEditBlog";
$route['showEditBlog/(:num)'] = "blog/showEditBlog/$1";
$route['editBlog'] = "blog/editBlog";
$route['showNewBlog'] = "blog/showNewBlog";
$route['addNewBlog'] = "blog/addNewBlog";
$route['deleteBlog'] = "blog/deleteBlog";

$route['workListing'] = 'work/workListing';
$route['workListing/(:num)'] = "work/workListing/$1";
$route['showNewWork'] = "work/showNewWork";
$route['addNewWork'] = "work/addNewWork";
$route['showEditWork'] = "work/showEditWork";
$route['showEditWork/(:num)'] = "work/showEditWork/$1";
$route['editWork'] = "work/editWork";
$route['deleteWork'] = "work/deleteWork";

$route['portfolioListing'] = 'portfolio/portfolioListing';
$route['portfolioListing/(:num)'] = "portfolio/portfolioListing/$1";
$route['showNewPortfolio'] = "portfolio/showNewPortfolio";

$route['setting'] = 'setting';
$route['editSetting'] = 'setting/editSetting';

/* End of file routes.php */
/* Location: ./application/config/routes.php */