<?php

namespace App\Http\Controllers;

class ControllerSample extends Controller
{
  public function hello($name)
  {
    return "Hello $name";
  }

  public function sum($a, $b)
  {
    return "A + B = " . $a + $b;
  }

}

?>