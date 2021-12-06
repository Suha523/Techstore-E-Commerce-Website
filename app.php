<?php

use Techstore\Classes\Request;
use Techstore\Classes\Session;

// user
define('PATH',__DIR__.'/');
define('URL','http://localhost/backend Course/Projects/Techstore/');

// admin
define('APATH',__DIR__.'/admin/');
define('AURL','http://localhost/backend Course/Projects/Techstore/admin/');

// DB

define("DB_SERVERNAME",'localhost: 3308');
define("DB_USERNAME",'root');
define("DB_PASSWORD",'');
define("DB_NAME",'techstore');


// include classes

require_once(PATH."vendor/autoload.php");
include("classes/Model/Imgs.php");

// Objects

$request = new Request;
$session = new Session;

?>
