<?php

trait Properties
{
  function getProperties()
  {
    $properties = get_class_vars(get_class());
    $properties_array = [];
    foreach($properties as $k => $v)
    {
      array_push($properties_array, $k);
    }
    return $properties_array;
  }
}
 ?>
