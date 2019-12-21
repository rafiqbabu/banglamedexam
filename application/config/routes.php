<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

$route['default_controller'] = "home";
$route['404_override']       = '';
//exam show using subject
$route['subject-exam/(:num)'] = 'home/subject-exam/$1';
//news details
$route['news-details/(:num)']   = 'home/news-details/$1';
$route['exam-details/(:num)']   = 'home/exam-details/$1';
$route['registration']          = 'home/registration';
$route['user-login']            = 'home/user-login';
$route['contact-us']            = 'home/contact-us';
$route['forgot-password']       = 'home/forgot-password';
$route['reset-password/(:any)'] = 'home/reset-password/$1';
$route['institute/(:num)']      = 'home/institute-courses/$1';
$route['user-logout']           = 'home/user-logout';
$route['ipn-listener']          = 'home/ipn-listener';
$route['about-us']              = 'home/page/about-us';
$route['benefits']              = 'home/page/benefits';
$route['privacy-policy']        = 'home/page/privacy-policy';
$route['terms-and-conditions']  = 'home/page/terms-and-conditions';
$route['faqs']                  = 'home/page/faqs';
$route['feedback-form']         = 'home/feedback-form';
$route['instructions']          = 'home/page/instructions';

$route['user/(:num)']                              = 'user/user-profile/$1';
$route['user/(:num)/edit']                         = 'user/edit/$1';
$route['user/(:num)/update']                       = 'user/update/$1';
$route['user/(:num)/change-password']              = 'user/change-password/$1';
$route['user/(:num)/update-password']              = 'user/update-password/$1';
$route['user/(:num)/exam-selection']               = 'user/exam-selection/$1';
$route['user/(:num)/notice']                       = 'user/notice/$1';
$route['user/(:num)/notice-details/(:num)']        = 'user/notice-details/$1/$2';
$route['user/(:num)/save-exam']                    = 'user/save-exam/$1';
$route['user/(:num)/save-package']                 = 'user/save-package/$1';
$route['user/(:num)/purchased-exam']               = 'user/purchased-exam/$1';
$route['user/(:num)/purchased-packages']           = 'user/purchased-packages/$1';
$route['user/(:num)/exam-history']                 = 'user/exam-history/$1';
$route['user/(:num)/exam-payment/(:num)']          = 'user/exam-payment/$1/$2';
$route['user/(:num)/exam-payment/(:num)']          = 'user/exam-payment/$1/$2';
$route['user/(:num)/process-payment/(:num)']       = 'user/process-payment/$1/$2';
$route['user/(:num)/process-free-payment/(:num)']  = 'user/process-free-payment/$1/$2';
$route['user/(:num)/payment-status/(:num)/(:num)'] = 'user/payment-status/$1/$2/$3';

$route['exam-prompt/(:num)']                = 'exam/exam-prompt/$1';
$route['free-exam/(:num)']                  = 'exam/free-exam/$1';
$route['package-exam/(:num)/(:num)/(:num)'] = 'exam/package-exam/$1/$2/$3';
$route['exam-start/(:num)']                 = 'exam/exam-start/$1';
$route['exam-result/(:num)']                = 'exam/exam-result/$1';
$route['exam-answer/(:num)']                = 'exam/exam-answer/$1';
$route['exam-status']                       = 'exam/exam-status';


//Ajax Request
$route['exam-answer-save/(:num)'] = "AjaxController/exam-answer-save/$1";
$route['get-coupon-discount']     = 'AjaxController/get-coupon-discount';
//$route['registration']['POST'] = 'user/save-regstration';


//user default user page
$route['admin'] = "login";

//$route['(:any)'] = 'home/page/$1';

$route['translate_uri_dashes'] = TRUE;

//new
$route['user-login-sif']            		= 'home/user-login-sif';

$route['user/(:num)/exam-selection-sif']    = 'user/exam-selection-sif/$1';
$route['user/(:num)/exam-src-institute-sif']    = 'user/user_exam_src_institute_sif/$1';
$route['user/(:num)/exam-src-faculty-sif']    	= 'user/user_exam_src_faculty_sif/$1';
$route['user/(:num)/exam-src-candidate-sif']    = 'user/user_exam_src_candidate_sif/$1';

$route['sif-exam/(:num)/(:num)']            = 'exam/sif-exam/$1/$2';
$route['user/(:num)/exam-history-list']     = 'user/user_exam_history_list/$1';

$route['user/(:num)/exam-src-institute']    = 'user/user_exam_src_institute/$1';
$route['user/(:num)/exam-src-faculty']    	= 'user/user_exam_src_faculty/$1';
$route['user/(:num)/exam-src-candidate']    = 'user/user_exam_src_candidate/$1';
$route['user/(:num)/my-inbox']    			= 'user/my_inbox/$1';

$route['user/(:num)/current-package']    	= 'user/current_package/$1';
$route['user/(:num)/upcoming-package']    	= 'user/upcoming_package/$1';




































