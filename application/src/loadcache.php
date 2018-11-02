<?php

class Cache
{
  public static function load($key)
  {
    $filename = dirname(__DIR__).'/cache_var/store.json';

    $cache = json_decode(file_get_contents($filename));
    foreach ($cache as $ckey => $cvalue) {
      if($ckey == $key)
      {
        print($cvalue);
      }
      else
      {
        return False;
      }
    }
  }
}
