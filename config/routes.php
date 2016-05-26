<?php defined('BASEPATH') or exit('No direct script access allowed');
 
$route['default_controller'] = "newsleter";
$route['(.*)'] = "newsleter/output/$1";
$route[''] = 'newsleter/index';
