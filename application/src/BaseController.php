<?php
namespace Application\Source;
include 'CacheVar.php';
use Application\Source\CacheVar;
# session_start();

class BaseController extends CacheVar # if it implements an interface it can no longer be used without instance.
{

  public static function loadView($view, $data = null)
  {
    try
    {
        require "../application/views/".$view;
        if(null!==$data)
        {
          if(is_array($data))
          {
            foreach($data as $k => $v)
            {
              $_SESSION[$k] = $v;
            } # Be a caveman and var_dump it if you can't find what you expect.
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
