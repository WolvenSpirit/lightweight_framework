<?php
namespace Application\Source;

# The public index will require this file first,

/*
* ROUTER FILE
*/
class RouterClass
{
  public static function init()
  {
    # Enter your routes into the array below.
    # Relative url path as key => an array containing controller and method as its value.
    $route = array(
      "/" => array('MainController', 'index'),
      "/home" => array('MainController', 'home'),
      "/foo" => array('MainController', 'foo')
    );


    # Detects the url that is trying to be accesed and checks the $route array for the matching key.
  foreach ($route as $route_key => $action)
    {
     $class_select = $action[0];
     $controller_full_path = dirname(__DIR__).'/controllers/'.$class_select.'.php';
     $method = $action[1];

     require_once($controller_full_path);

      if($_SERVER['REQUEST_URI'] == $route_key)
      {
        try
        {
          # So, apparently if you declare the namespace as string it doesn't bring
          # error while trying the normal way with variable raises error.
          $class_select = 'Application\Controller\\'.$class_select;
          #$class_select::$method();
          $active_controller = new $class_select();
          $active_controller->$method();
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
