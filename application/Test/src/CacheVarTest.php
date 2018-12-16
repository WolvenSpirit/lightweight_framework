<?php
namespace Application\Test;
require_once '/home/wolven/Desktop/ws_fw_php/vendor/autoload.php';
require_once '/home/wolven/Desktop/ws_fw_php/application/src/CacheVar.php';
use \PHPUnit\Framework\TestCase;
use Application\Source\CacheVar;

class CacheVarTest extends TestCase
{
/*  public function testLoadReturnType()
  {
    $c = new CacheVar(); # Careful! Place the placeholder:[ ... ] inside your json before testing!
    $cache = $c->load();
    $this->assertInternalType('array',$cache->placeholder);
  }
  public function testLoadReturnData()
  {
    $c = new CacheVar();
    $cache = $c->load();
    $this->assertNotEmpty($cache->placeholder);
  } */
  public function testCacheVarSaveLoadData()
  {
    $c = new CacheVar();
    $data = array("something"=>"Foo");
    $c->save($data);
    $stdc = $c->load();
    $this->assertNotEmpty($stdc->something);
  }
}
