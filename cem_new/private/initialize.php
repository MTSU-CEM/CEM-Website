<?php
ob_start(); // output buffering is turned on

// Assign file paths to PHP constants
// __FILE__ returns the current path to this file
// dirname() returns the path to the parent directory
define("PRIVATE_PATH", dirname(__FILE__));
define("PROJECT_PATH", dirname(PRIVATE_PATH));
define("PUBLIC_PATH", PHP_FOLDER_PATH . '/php');
define("SHARED_PATH", PRIVATE_PATH . '/shared');