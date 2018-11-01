<?php
namespace Application\Source;
session_start();
include 'Litecore.php';
use Application\Source\Litecore;

class BaseController implements Appcore
{
  use Torch;

  public function loadView($view, $data = null)
  {
    try
    {
        require dirname(__DIR__)."/views/".$view;
        if(null!==$data)
        {
          $_SESSION['data'] = $data;
          # this will be replaced with a file which will cache this variable.
          # The view will include a class which will return the variable.
          # php session doesn't return the data on first refresh.. due to cookie storage?
        }
    }
    catch(\Exception $e)
    {
      $e->getMessage();
      return False; # For use in conditional.
    }
  }

}
