<?php
require_once("BaseModel.php"); // Edit the path.
Class mycrud extends BaseModel
{
    /**
     * Declare table name/model class (should be same) in the init static call.
     */

    /*
    * Declare all columns in the table.
    */
    protected $title;
    protected $body;
    protected $extra;
}

# TEST DEBUG ~ mapping currently functional ~
$debugv = new mycrud();
$debugv->init();
$result = $debugv->select();
foreach ($result as $elem) {
  print($elem['title']." : ".$elem['body']."</br>");
}
