<?php
namespace Application\Source;

# The public index will require this file first,

/*
* ROUTER FILE
*/
class RouterClass
{
  protected $route;
  
  public static function init()
  { 
    # Enter your routes into the array below. 
    # Relative url path as key => an array containing controller and method as its value.
    $this->route = array(
      "/" => array('MainController', 'index');
    );


    # Detects the url that is trying to be accesed and checks the $route array for the matching key.
  foreach ($this->route as $route_key => $action)
    {
      if($_SERVER['REQUEST_URI'] == $route_key)
      {
        try
        {
          
          $class_select = $action[0];
          $method = $action[1];
          $class_select::$method();
          
        }
        catch (\Exception $e)
        {
          $e->getMessage();
        }
      }
    }
  }
}
