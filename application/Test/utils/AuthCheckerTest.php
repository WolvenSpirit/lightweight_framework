<?php
namespace Application\Test;
require './cfg.php';
require_once(APP_BASEROOT.'vendor/autoload.php');
require_once(APP_BASEROOT.'application/utils/AuthChecker.php');

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
