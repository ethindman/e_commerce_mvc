<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "carts";
$route['home'] = "carts/index";
$route['cart'] = "carts/showCart";
$route['add'] = "carts/addToCart";
$route['remove'] = "carts/removeFromCart";
$route['404_override'] = '';

//end of routes.php