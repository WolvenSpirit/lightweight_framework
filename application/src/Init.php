<?php
namespace Application\Source;
session_start();

$_SESSION['app'] = "Hosted in LiteCorePHP powered by PHP ".phpversion();
$_SESSION['cache'] = "../application/src/loadcache.php";
/*
* Load all files with utility classes to be extended or instantiated.
*/

# REQUIRE ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

require_once('RouterClass.php');

# CALL ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RouterClass::init();
