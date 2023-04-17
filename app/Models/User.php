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

  public function showUser($id)
  {
    $sql = "select * from user where id=?";
    $response = DB::select($sql, [$id]);
    return $response;
  }

  public function addUser($email, $password)
  {
    $sql = "insert into user (email, password) values (:email, :password)";
    $response = DB::insert(
      $sql,
      array(
        "email" => $email,
        "password" => $password
      )
    );
    return $response;
  }

  public function updateUser($id, $email, $password)
  {
    $sql = "update user set email=:email, password=:password where id=:id";
    $response = DB::update(
      $sql,
      array(
        "email" => $email,
        "password" => $password,
        "id" => $id
      )
    );
    return $response;
  }

}