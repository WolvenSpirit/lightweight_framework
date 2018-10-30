<?php
namespace Application\Source;

class BaseController implements Appcore
{
  use Torch;

  public function loadView($view)
  {
    try
    {   # this should load the view in the public index.php
        /*
        $index = new DOMDocument();
        $index->loadHTMLFile("../../public/index.php");
        $index_node = $index->getElementById("render");
        $index_container = array();
        foreach ($index_node as $item)
        {
            array_push($index_container, $item->textContent);
        }
        */
        $contents = file_get_contents($view);
        file_put_contents("../../public/index.php", $contents);
    }
    catch(\Exception $e)
    {
      $e->getMessage();
      return False;
    }
  }

  public function loadModel($model);
  {
    try
    {
        # Return the requested model class.
        require "../models/".$model;
        return $model;
    }
    catch(\Exception $e)
    {
      $e->getMessage();
      return False;
    }
  }

  public function loadController($controller)
  {
    try
    {   # Return the requested controller class.
        require "../controllers/".$controller;
        return $controller;
    }
    catch(\Exception $e)
    {
      $e->getMessage();
      return False;
    }
  }
}
