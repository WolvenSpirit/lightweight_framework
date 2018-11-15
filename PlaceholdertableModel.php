<?php
require_once("BaseModel.php"); // Edit the path.
Class Placeholdertable extends BaseModel
{
    /**
     * Declare table name in the init static call.
     */
    public function __construct()
    {
        self::init(get_class($this)); // This will not be called statically. 
        // Will be instantiated and called from controller.
    }
    /*
    * Declare all columns in the table.
    */
    protected $user;
    protected $password;
    protected $email;
}