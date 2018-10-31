<?php
namespace Application\Source;

class BaseController implements Appcore
{
  use Torch;

  public function loadView($view)
  {
    try
    {
        require dirname(__DIR__)."/views/".$view;
    }
    catch(\Exception $e)
    {
      $e->getMessage();
      return False;
    }
  }

}
