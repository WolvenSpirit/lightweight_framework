<?php
namespace Application\Controller;
include dirname(__DIR__).'/src/BaseController.php';

use Application\Source\BaseController;

class MainController extends BaseController
{

  public function index()
  {

    self::loadView("default_view.php", ['var1' => '<p>And passing data to view.<p>']);
  }

  public function home()
  {

    self::loadView("default_view_2.php", ['var2' => '<p>Home view.<p>']);
    self::save(array('var2'=>'test'));
  }
}
