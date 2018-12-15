<?php
namespace Application\Test;
require_once '/home/wolven/Desktop/ws_fw_php/vendor/autoload.php';
require_once('/home/wolven/Desktop/ws_fw_php/application/src/BaseModel.php');
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
