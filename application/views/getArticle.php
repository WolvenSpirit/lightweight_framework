<?php
include_once('includes/header.php');
include_once($_SESSION['cache']);

$c =  Cache::load();

echo "<strong>".$_SESSION['page_title'].":</strong><hr>"
.$_SESSION['data'][0]['title']
."<hr>"
.$_SESSION['data'][0]['body']
."<hr>" // Alternate method
."id: ".$c->data[0]->id
." title of article: ".$c->data[0]->title;


 include_once('includes/footer.php');
