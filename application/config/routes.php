<?php
defined("BASEPATH") or exit("No direct script access allowed");

$route["default_controller"] = "clogin";
$route["404_override"] = "";
$route["translate_uri_dashes"] = false;

$route["dashboard"] = "cadmin/index";
//participant routes
$route["participant"] = "cadmin/participant";
$route["participant/(:num)"] = 'cadmin/participant_detail/$1';

//campaign routes
$route["campaign"] = "cadmin/campaign";
$route["campaign/(:num)"] = 'cadmin/campaign_detail/$1';
$route["newlanguage/(:num)"] = 'cadmin/newlanguage/$1';

//donation routes
$route["donation"] = "cadmin/donation";

//donation category
$route["category"] = "cadmin/category";
