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
|	http://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'landing';
$route['404_override'] = 'Not_found';
//$route['404_override'] = 'my_404';
$route['translate_uri_dashes'] = FALSE;

$route['backend'] = "backend/signin/login";
$route['backend/signin'] = "backend/signin/login";
$route['backend/cekLogin'] = "backend/signin/cekLogin";
$route['backend/signout'] = "backend/signin/signout";
$route['backend/changePassword'] = "backend/home/changePassword";
$route['backend/doChangePassword'] = "backend/home/doChangePassword";
//$route['backend/Interior/add/'] = "backend/Content/add/";



$pathMenuAlias = PATH_ASSETS."/json/menucontent.json";
$arr_menu_alias = json_decode(file_get_contents($pathMenuAlias),TRUE);
foreach($arr_menu_alias as  $menu) {
	 $route[$menu['menu_url']]= $menu['module_path'] .'/'.$menu['menu_id'];
         //echo $menu['menu_url'];    
}




define('EXT', '.php');

require_once( BASEPATH .'database/DB'. EXT );
$db =& DB();
$query = $db->get_where( 'tbl_module',array('module_group_id <> ' => 7,'module_group_id >= ' => 2,'module_active_status' => 1,'module_type ' => 1));
$result = $query->result();


foreach( $result as $row )
{

  $module_name= str_replace(" ","%20",$row->module_path);
 
 
  $route['backend/'.$module_name] = "backend/Content";
  $route['backend/'.$module_name.'/(:any)'] = "backend/Content/$1";
  $route['backend/'.$module_name.'/(:any)/(:num)'] = "backend/Content/$1/$2";
  $route['backend/'.$module_name.'/(:any)/(:any)'] = "backend/Content/$1/$2";
  $route['backend/'.$module_name.'/child/(:num)/(:num)'] = "backend/Content/child/$1/$2";
  $route['backend/'.$module_name.'/addChild/(:num)'] = "backend/Content/editChild/$1";
  $route['backend/'.$module_name.'/addChild/(:num)/(:num)'] = "backend/Content/addChild/$1/$2";
  $route['backend/'.$module_name.'/editChild/(:num)'] = "backend/Content/editChild/$1";
  $route['backend/'.$module_name.'/editChild/(:num)/(:num)'] = "backend/Content/editChild/$1/$2";
  $route['backend/'.$module_name.'/doEditChild/(:num)'] = "backend/Content/doEditChild/$1";
  $route['backend/'.$module_name.'/doEditChild/(:num)/(:num)'] = "backend/Content/doEditChild/$1/$2";
  $route['backend/'.$module_name.'/activeChild/(:num)'] = "backend/Content/activeChild/$1";
  $route['backend/'.$module_name.'/activeChild/(:num)/(:num)'] = "backend/Content/activeChild/$1/$2";
  
  if ($row->module_group_id == 9) {
  $route[$module_name] = "Content";
  $route[$module_name.'/(:any)'] = "Content/$1";
  $route[$module_name.'/(:any)/(:num)'] = "Content/$1/$2";
  $route[$module_name.'/(:any)/(:any)'] = "Content/$1/$2";
  $route[$module_name.'/(:num)/(:num)/(:any)'] = "Content/index/$1/$2/$3";
  $route[$module_name.'/(:any)/(:any)/(:any)'] = "Content/index/$1/$2/$3";
  $route[$module_name.'/(:num)/(:num)/(:num)/(:any)'] = "Content/index/$1/$2/$3/$4";
  }
//  
}
  $route['backend/banner_retail'] = "backend/content";
  $route['backend/banner_retail/(:any)'] = "backend/content/$1";
  $route['backend/banner_retail/(:any)/(:num)'] = "backend/content/$1/$2";
  $route['backend/banner_retail/(:any)/(:any)'] = "backend/content/$1/$2";
  $route['backend/banner_retail/(:num)/(:num)/(:any)'] = "backend/content/index/$1/$2/$3";
  $route['backend/banner_retail/(:any)/(:any)/(:any)'] = "backend/content/index/$1/$2/$3";
  $route['backend/banner_retail/(:num)/(:num)/(:num)/(:any)'] = "backend/content/index/$1/$2/$3/$4";

  $route['backend/banner_contract'] = "backend/content";
  $route['backend/banner_contract/(:any)'] = "backend/content/$1";
  $route['backend/banner_contract/(:any)/(:num)'] = "backend/content/$1/$2";
  $route['backend/banner_contract/(:any)/(:any)'] = "backend/content/$1/$2";
  $route['backend/banner_contract/(:num)/(:num)/(:any)'] = "backend/content/index/$1/$2/$3";
  $route['backend/banner_contract/(:any)/(:any)/(:any)'] = "backend/content/index/$1/$2/$3";
  $route['backend/banner_contract/(:num)/(:num)/(:num)/(:any)'] = "backend/content/index/$1/$2/$3/$4";


  $route['backend/contract'] = "backend/Collection";
  $route['backend/contract/(:any)'] = "backend/Collection/$1";
  $route['backend/contract/(:any)/(:num)'] = "backend/Collection/$1/$2";
  $route['backend/contract/(:any)/(:any)'] = "backend/Collection/$1/$2";
  $route['backend/contract/child/(:num)/(:num)'] = "backend/Collection/child/$1/$2";
  $route['backend/contract/addChild/(:num)'] = "backend/Collection/editChild/$1";
  $route['backend/contract/addChild/(:num)/(:num)'] = "backend/Collection/addChild/$1/$2";
  $route['backend/contract/editChild/(:num)'] = "backend/Collection/editChild/$1";
  $route['backend/contract/editChild/(:num)/(:num)'] = "backend/Collection/editChild/$1/$2";
  $route['backend/contract/doEditChild/(:num)'] = "backend/Collection/doEditChild/$1";
  $route['backend/contract/doEditChild/(:num)/(:num)'] = "backend/Collection/doEditChild/$1/$2";
  $route['backend/contract/activeChild/(:num)'] = "backend/Collection/activeChild/$1";
  $route['backend/contract/activeChild/(:num)/(:num)'] = "backend/Collection/activeChild/$1/$2";
  
  $route['backend/retail'] = "backend/Collection";
  $route['backend/retail/(:any)'] = "backend/Collection/$1";
  $route['backend/retail/(:any)/(:num)'] = "backend/Collection/$1/$2";
  $route['backend/retail/(:any)/(:any)'] = "backend/Collection/$1/$2";
  $route['backend/retail/child/(:num)/(:num)'] = "backend/Collection/child/$1/$2";
  $route['backend/retail/addChild/(:num)'] = "backend/Collection/editChild/$1";
  $route['backend/retail/addChild/(:num)/(:num)'] = "backend/Collection/addChild/$1/$2";
  $route['backend/retail/editChild/(:num)'] = "backend/Collection/editChild/$1";
  $route['backend/retail/editChild/(:num)/(:num)'] = "backend/Collection/editChild/$1/$2";
  $route['backend/retail/doEditChild/(:num)'] = "backend/Collection/doEditChild/$1";
  $route['backend/retail/doEditChild/(:num)/(:num)'] = "backend/Collection/doEditChild/$1/$2";
  $route['backend/retail/activeChild/(:num)'] = "backend/Collection/activeChild/$1";
  $route['backend/retail/activeChild/(:num)/(:num)'] = "backend/Collection/activeChild/$1/$2";
//die;
//require_once(PATH."config/alias_routes.php");	
