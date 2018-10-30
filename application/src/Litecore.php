<?php
namespace Application\Source;

trait Torch
{
  public function see($varx)
  {
    echo var_dump($varx);
  }
}

interface Appcore
{
  public function loadView($view);
  public function loadModel($model);
  public function loadController($controller);
}
