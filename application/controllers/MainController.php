<?php
namespace Application\Controller;
include dirname(__DIR__).'/src/BaseController.php';
include dirname(__DIR__).'/models/mycrud.php';
use Application\Source\BaseController;
use Application\Model\mycrud;


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

  public function foo()
  {

    # TEST DEBUG ~ mapping currently functional ~ This will be called from controller, the model will only represent the table.

    $debugv = new mycrud();
    $debugv->init();
    $result = $debugv->select(['title'=>'Lorem']);
    var_dump($result);
    self::loadView('default_view_2.php',array('data'=>$result));
  }
}
