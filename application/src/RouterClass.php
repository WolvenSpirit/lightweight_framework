<?php
namespace Application\Source;

# The public index will require this file first,

### Fetch rules ###############################################################
class RouterClass
{
  public static function init()
  {
  # $route = json_decode(file_get_contents("/home/wolven/Desktop/Litecore/application/src/router.json"));

    $route = array(
      "/" => array('MainController', 'index');
    );


### Detect the url that is trying to be accesed and see if you have the same key stored.

  foreach ($route as $key => $action)
    {
      if($_SERVER['REQUEST_URI'] == $key)
      {
        try
        {
           # require dirname(__DIR__)."/views/default_view.php"; # DEBUG
          $class_select = $action[0];
          $method = $action[1];
          
        }
        catch (\Exception $e)
        {
          $e->getMessage();
        }
      }
    }
  }
}
