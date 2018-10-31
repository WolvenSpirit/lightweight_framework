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
     $class_select = $action[0];
     $controller_full_path = dirname(__DIR__).'/controllers/'.$class_select;
     $method = $action[1];
     include $controller_full_path;
    
      if($_SERVER['REQUEST_URI'] == $route_key)
      {
        try
        {       
          $class_select::$method();
        }
        catch (\Exception $e)
        {
          if($_SERVER['PHP_SELF'] == $route_key)
          {
            try
            {
            $class_select::$method();
            }
            catch(\Exception $e)
            {
              $e->getMessage(); # DEBUG only, will return a generic error view.
            }
          }
          $e->getMessage(); # DEBUG only, will return a generic error view.
        }
      }
    }
  }
}
