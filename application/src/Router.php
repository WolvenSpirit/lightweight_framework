<?php
namespace Application\Source;
# The public index will require this file first,
# this file should read the json for configured routes and rewrite accordingly.

### Fetch rules ###############################################################
class Router
{
  public static function init()
  {
  $route = json_decode(file_get_contents("/home/wolven/Desktop/Litecore/application/src/router.json"));

### Detect the url that is trying to be accesed and see if you have the same key stored.

  foreach ($route as $key => $value)
    {
      if($_SERVER['REQUEST_URI'] == $key)
      {
        try
        {
          require dirname(__DIR__)."/views/$value";
        }
        catch (\Exception $e)
        {
          $e->getMessage();
        }
      }
    }
  }
}
