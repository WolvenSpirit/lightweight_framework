<?php

class Cache
{
  public static function load(): \stdClass
  {
    $filename = dirname(__DIR__).'/cache_var/store.json';

    $cache = json_decode(file_get_contents($filename));
    return $cache;
  }
}
