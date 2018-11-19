<?php
require_once("BaseModel.php"); // Edit the path.

/**
 * Declare table name/model class (should be same) in the init static call.
 */

Class mycrud extends BaseModel
{

    /*
    * Declare all columns in the table.
    */
    protected $title = 'title';
    protected $body;
    protected $extra;
}

# TEST DEBUG ~ mapping currently functional ~
$debugv = new mycrud();
$debugv->init();
$result = $debugv->select(['title'=>'Lorem']);
foreach ($result as $elem) {
  print($elem['title']." : ".$elem['body']."</br>");
}
