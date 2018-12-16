<?php
include_once('includes/header.php');

echo "<strong>".$_SESSION['page_title'].":</strong><hr>"
.$_SESSION['data'][0]['title']
."<hr>"
.$_SESSION['data'][0]['body']
."<hr>";

 include_once('includes/footer.php');
