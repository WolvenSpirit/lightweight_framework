<?php
namespace Application\Source;

trait Torch
{
  public function see($varx)
  {
    echo var_dump($varx);
  }
}

Class CacheVar
{ # A different class should provide this utility to views.

  public static function save($arr_arg)
  {
    $filename = dirname(__DIR__).'/cache_var/store.json';

    if(is_file($filename))
    {
      $json_cache = fopen($filename, 'w+');
      $cache = json_decode(file_get_contents($filename));

      foreach ($arr_arg as $key => $value)
      {
        $cache[$key] = $value;
      }
      fwrite($json_cache, json_encode($cache));
      fclose($json_cache);
    }
    else
    {
      $json_cache = fopen($filename, 'w+');
      fwrite($json_cache, json_encode($arr_arg));
      fclose($json_cache);
    }
  }
  public static function load($key)
  {
    $filename = dirname(__DIR__).'/cache_var/store.json';

    $cache = json_decode(file_get_contents($filename));
    foreach ($cache as $ckey => $cvalue) {
      if($ckey == $key)
      {
        return $cvalue;
      }
      else
      {
        return False;
      }
    }
  }
}
