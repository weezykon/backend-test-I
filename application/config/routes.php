<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Dashboard/index';
$route['hashtag'] = 'Dashboard/hashtag';
$route['glogin'] = 'Dashboard/glogin';
$route['gcallback'] = 'Dashboard/gcallback';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;