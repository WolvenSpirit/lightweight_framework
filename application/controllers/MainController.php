<?php
namespace Application\Controller;

class MainController extends Application\Source\BaseController
{
  public function index()
  {
    loadView("default_view.php");
  }
}
