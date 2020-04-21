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
$route['default_controller'] = 'Usr';
$route['Fpass'] = 'Usr/forgotpass';
$route['Login'] = 'Usr/Admin';
$route['Dashboard_Display'] = 'Usr/Dashboard';
$route['Create_Exam'] = 'Usr/CreateExam';
$route['You_Are_Adding_Question'] = 'Usr/Add_Question';
$route['Jump_Admin_delete/(:any)'] = 'Usr/JumpQuestion_Admin_delete';
$route['Add_admin_now_'] = 'Usr/Add_admin_now_function';
$route['BroadSheet'] = 'Usr/BroadSheet_result_now_function';
$route['You_Are_Adding_Question_Old_Exam'] = 'Usr/Add_Question_Old_Exam';
$route['You_Are_Viewing_Question'] = 'Usr/DisplayExamDetails';
$route['Create_Question_Old'] = 'Usr/Add_Question_To_Old_Exam';
$route['Show_Student_Registered'] = 'Usr/ShowStudent';
$route['Add_Student_To_Access_Specific_Exam'] = 'Usr/ShowStudent_Availabe_for_Exam';
$route['View_Candidate_For_Exam'] = 'Usr/ShowStudent_Availabe_for_Specific_Exam';
$route['View_Candidate_For_Exam_Search'] = 'Usr/ShowStudent_Availabe_for_Specific_Exam_show';
$route['Just_say_Logout'] = 'Usr/logout';
$route['Upload_Student_CSV'] = 'Usr/Student_Upload';
$route['Update_Exam_to_Enable'] = 'Usr/Update_Exam_to_Enable_Controler';
$route['Register_Student'] = 'Usr/Add_Student';
$route['Unlock_LockScreen'] = 'Usr/LockScreen';
$route['Login_Student_'] = 'Welcome/Login_Student_Now';
$route['Start_Exam_Now'] = 'Welcome/Start_Exam_Now_Fresh';
$route['save_answer_selected'] = 'Welcome/save_answer_selected_now';
$route['JumpQuestion/(:any)'] = 'Welcome/JumpQuestion_Exam';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;