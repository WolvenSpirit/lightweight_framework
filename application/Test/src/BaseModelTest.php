<?php
namespace Application\Test;
require './cfg.php';
require_once(APP_BASEROOT.'vendor/autoload.php');
require_once(APP_BASEROOT.'application/src/BaseModel.php');
use \PHPUnit\Framework\TestCase;
class BaseModelTest extends TestCase
{
  public $x;
  public function testBaseModelInit()
    {

      $this->x = new \Application\Source\BaseModel();
      $this->assertTrue($this->x->init("mycrud"));
    }
}
