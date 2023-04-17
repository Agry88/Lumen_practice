<?php
namespace App\Models;

use Illuminate\Support\Facades\DB;

class User
{
  public function showAll()
  {
    $sql = "select * from user";
    $response = DB::select($sql);
    return $response;
  }

}