<?php
namespace Application\Source;
session_start();

$_SESSION['cache'] = dirname(__DIR__)."/src/loadcache.php";
/*
* Load all files with utility classes to be extended or instantiated.
*/

# REQUIRE ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

require_once('RouterClass.php');

# CALL ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RouterClass::init();
