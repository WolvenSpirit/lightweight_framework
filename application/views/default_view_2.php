<?php
echo $_SESSION['var2'];

require $_SESSION['cache'];
Cache::load('var2');
 ?>
