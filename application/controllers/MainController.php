<?php
namespace Application\Controller;
include dirname(__DIR__).'/src/BaseController.php';

use Application\Source\BaseController;

class MainController
{

  public function index()
  {
    $handle = new BaseController();
    $handle->loadView("default_view.php", '<p>And passing data to view.<p>');
  }

  public function home()
  {
    $handle = new BaseController();
    $handle->loadView("default_view_2.php", '<p>Home view.<p>');
  }
}
