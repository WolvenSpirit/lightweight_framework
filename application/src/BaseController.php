<?php
namespace Application\Source;
include 'Litecore.php';
use Application\Source\Litecore;
# session_start();

class BaseController extends CacheVar # if it implements an interface it can no longer be used without instance.
{

  public static function loadView($view, $data = null)
  {
    try
    {
        require dirname(__DIR__)."/views/".$view;
        if(null!==$data)
        {
          if(is_array($data))
          {
            foreach($data as $k => $v)
            {
              $_SESSION[$k] = $v;
            }
            $_SESSION['data'] = $data; # the raw array

            # this will be replaced with a file which will cache this variable
            # The view will include a class which will return the variable.
            # php session doesn't return the data on first refresh.. due to cookie storage?
          }
          else
          {

              die('Passed data must be an array.');

          }

        }
    }
    catch(\Exception $e)
    {
      $e->getMessage();
      return False; # For use in conditional.
    }
  }

}
