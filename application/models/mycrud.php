<?php
namespace Application\Model;
error_reporting(E_ALL);

// Edit the paths.
require "../cfg.php";
require_once(APP_BASEROOT."application/src/BaseModel.php");
require_once(APP_BASEROOT."application/src/Properties.php");
//**************************************************************************************
/**
 * Declare table name/model class (should be same) in the init static call.
 */

Class mycrud extends \Application\Source\BaseModel
{

    /*
    * Declare all columns in the table.
    */
    public $title;
    public $body;
    public $extra;
    use \Properties;
}
