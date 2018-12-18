<?php
include_once('includes/header.php');
 ?>
 <div id="main" class="row">
     <div id="section" class="col-md-5">
         <p id="item-p">LitecorePHP aka lightweight_framework is a project of mine which was started out of curiosity regarding how MVC frameworks are structured under the hood.<br>
         It can be a stepping stone to anybody who considers using MVC pattern in PHP by learning how a basic framework can be wired from this example.
         <br>I encourage you to take a look at the core code to understand the mappings that take place.<br>
         The only outsider is <a href="https://phpunit.de/" target="_blank">PHPUnit</a> which I use for testing my newly created classes.
         <a href="https://github.com/WolvenSpirit/lightweight_framework" target="_blank"><hr>
           Code repository:<br>
           <img src="assets/img/litecore.png" height="250"></a>
         </p>
     </div>
     <div id="section" class="col-md-6">
       Router file complete with matching:
       <hr>
       <div id="scrollWrap"><script src="https://gist.github.com/WolvenSpirit/d2e740ad7a732394874b84aa70eb6231.js"></script></div>
     </div>
     <div id="section" class="col-md-5">
       Example of model that maps with the database table.
       <hr>
       <script src="https://gist.github.com/WolvenSpirit/59af9a482ba5c0ca2cfc0680cf63016c.js"></script>
     </div>
     <div id="section" class="col-md-5">
       Example of controller that queries the model and loads view.
       <hr>
       <script src="https://gist.github.com/WolvenSpirit/d78e77a06d80365d5de5c1613d31de7b.js"></script>
     </div>
 <?php
 include_once('includes/footer.php');
  ?>
