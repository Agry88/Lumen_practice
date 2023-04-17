<?php

namespace App\Http\Controllers;

class ControllerSample extends Controller
{
  public function hello($name)
  {
    return "Hello $name";
  }

}

?>