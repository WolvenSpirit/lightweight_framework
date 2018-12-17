<?php
namespace Application\Test;

require_once '/home/wolven/Desktop/ws_fw_php/vendor/autoload.php';
require_once('/home/wolven/Desktop/ws_fw_php/application/utils/AuthChecker.php');

use PHPUnit\Framework\TestCase;

class AuthCheckerTest extends TestCase
{
  public function testStringCheckMethod()
  {
    $string = "Foooooo";
    $rules = array('min-length'=>5,'utf8'=>True);
    $c = new \AuthChecker();
    $returned = $c->check_string($string, $rules);
    $this->assertTrue($returned);
  }
}
