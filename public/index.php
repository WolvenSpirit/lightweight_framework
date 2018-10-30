<html>
<head>
</head>
<body>
  <div class="container">
  <?php
  # Main entry point.
  #load!
  function load_core()
  {
  # Load views defined in the router class... yes we need a router class that reads the router.json
  require '../application/src/Init.php';
  }
  load_core();
  ?>
  </div>
</body>
</html>
