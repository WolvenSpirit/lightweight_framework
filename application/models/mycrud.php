<?php

namespace Application\Model;
error_reporting(E_ALL);

require dirname(__DIR__)."/src/BaseModel.php"; // Edit the path.
/**
 * Declare table name/model class (should be same) in the init static call.
 */

Class mycrud extends \Application\Source\BaseModel
{

    /*
    * Declare all columns in the table.
    */
    protected $title;
    protected $body;
    protected $extra;


}
