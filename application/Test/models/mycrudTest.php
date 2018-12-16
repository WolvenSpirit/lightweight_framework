<?php
namespace Application\Test;
require_once '/home/wolven/Desktop/ws_fw_php/vendor/autoload.php';
require_once '/home/wolven/Desktop/ws_fw_php/application/models/mycrud.php';
use \PHPUnit\Framework\TestCase;

class mycrudTest extends TestCase
{
  public $x;
  public function testInitTrue() // means it sucesfully injects it's name.
  {
    $this->x = new \Application\Model\mycrud();
    $this->assertTrue($this->x->init());
  }

  public function testSelectFromDatabase()
  {
    $this->x = new \Application\Model\mycrud();
    $this->x->init();
    $z = $this->x->select(['title'=>'Lorem']);
    $this->assertInternalType('array',$z);
    $this->assertNotEmpty($z);
  }
/*  public function testClassMapsCorrectly() ### INFO ### MAKE model and con_object protected from private to run these tests.
  {
    $this->x = new \Application\Model\mycrud();
    $this->x->init();
    $this->x->select(array('title'=>'Lorem'));
    // This was the BIG obvious fail.
    // The flow relies on get_class php function which returns too much if it is namespaced.
    $this->assertEquals($this->x->model,'mycrud'); // translates correctly now
    # $this->assertEquals($this->x->columns,['columns']);
  }
  public function testDatabaseDriverObjectCreation()
  {
    $this->x = new \Application\Model\mycrud();
    $this->x->init();
    $this->assertNotEmpty($this->x->con_object);
    $this->assertTrue(is_object($this->x->con_object));
  } */
  public function testTableSelectReturnsArray()
  {
    $this->x = new \Application\Model\mycrud();
    $this->x->init();
    $result = $this->x->select(array('title'=>'Lorem')); # Replace with existing column in your database.
    $this->assertInternalType('array',$result);
  }
  public function testTableSelectReturnedArrayNotEmpty()
  {
    $this->x = new \Application\Model\mycrud();
    $this->x->init();
    $result = $this->x->select(array('title'=>'Lorem')); # Replace with existing column in your database.# Not very dry...
    $this->assertNotEmpty($result);
  }
  public function testModelInsertsDataIntoDatabaseMysql()
  {
    $this->x = new \Application\Model\mycrud();
    $this->x->init();
    $data_to_insert = array('foo','bar','baz');
    $this->assertTrue($this->x->insert($this->x->getProperties(),$data_to_insert));
  }

  public function testThatOnlyColumnsGetReturnedFromClassAsProperties()
  {
    $this->x = new \Application\Model\mycrud();
    $this->x->init();
    $k = get_object_vars($this->x);
    $this->assertInternalType('array',$k);
  }
}
