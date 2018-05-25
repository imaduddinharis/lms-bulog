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
$route['default_controller'] = 'admin';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/* new routes */
$route['employee-learning-dashboard'] = 'maintenance';
$route['employee-learning-dashboard/melaksanakan-pelatihan'] = 'maintenance';
$route['employee-learning-dashboard/report-hasil-pelatihan'] = 'maintenance';

$route['learning-management'] = 'maintenance';
$route['learning-management/manage-learning-plan'] = 'manage_learning_plan';
$route['learning-management/manage-learning-plan/add-learning-plan'] = 'manage_learning_plan/add';
$route['learning-management/manage-learning-plan/detail/(:any)'] = 'manage_learning_plan/detail/$1';
$route['learning-management/manage-learning-plan/update/(:any)'] = 'manage_learning_plan/update/$1';

$route['learning-management/manage-diklat'] = 'manage_diklat';
$route['learning-management/manage-diklat/add-diklat'] = 'manage_diklat/add';
$route['learning-management/manage-diklat/detail/(:any)'] = 'manage_diklat/detail/$1';
$route['learning-management/manage-diklat/update/(:any)'] = 'manage_diklat/update/$1';

$route['learning-management/delivery-pelatihan'] = 'maintenance';

$route['skill-competency-management'] = 'maintenance';
$route['skill-competency-management/manage-skill-competency'] = 'maintenance';
$route['skill-competency-management/perencanaan-career-path'] = 'maintenance';

$route['report-management'] = 'maintenance';
$route['report-management/monitoring-evaluasi'] = 'maintenance';

$route['learning-assignment'] = 'maintenance';
$route['learning-assignment/penugasan-pelatihan'] = 'maintenance';
$route['learning-assignment/report-hasil-pelatihan'] = 'maintenance';

$route['content-management'] = 'maintenance';
$route['content-management/persiapan-pelatihan'] = 'maintenance';
$route['content-management/evaluasi-pelatihan'] = 'maintenance';

/* routes parameter */
$route['business-issue'] = 'business_issue';
$route['business-issue/add'] = 'maintenance';
$route['business-issue/detail/(:any)'] = 'maintenance';
$route['business-issue/update/(:any)'] = 'maintenance';

$route['performance-issue'] = 'performance_issue';
$route['performance-issue/add'] = 'maintenance';
$route['performance-issue/detail/(:any)'] = 'maintenance';
$route['performance-issue/update/(:any)'] = 'maintenance';

$route['competence-issue'] = 'competence_issue';
$route['competence-issue/add'] = 'maintenance';
$route['competence-issue/detail/(:any)'] = 'maintenance';
$route['competence-issuee/update/(:any)'] = 'maintenance';

$route['strategic-innitiative'] = 'strategic_innitiative';
$route['strategic-innitiative/add'] = 'maintenance';
$route['strategic-innitiative/detail/(:any)'] = 'maintenance';
$route['strategic-innitiative/update/(:any)'] = 'maintenance';




/* routes action */
$route['add-learning-plan'] = 'manage_learning_plan/post';
$route['update-learning-plan'] = 'manage_learning_plan/put';
$route['delete-learning-plan/(:any)'] = 'maintenance';

$route['add-diklat'] = 'manage_diklat/post';
$route['update-diklat'] = 'manage_diklat/put';
$route['delete-diklat/(:any)'] = 'maintenance';








