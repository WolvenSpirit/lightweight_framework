<?php
require $_SESSION['cache'];
$data = Cache::load('data');
  echo var_dump($data);

 ?>
