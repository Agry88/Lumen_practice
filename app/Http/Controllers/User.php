<?php

namespace App\Http\Controllers;

use App\Models\User as UserModel;
use Illuminate\Http\Request;

class User extends Controller
{
  protected $userModel;
  public function __construct()
  {
    $this->userModel = new UserModel;
  }
  public function getAllUsers()
  {
    return $this->userModel->showAll();
  }

  public function getUser($id)
  {
    return $this->userModel->showUser($id);
  }

  public function newUser(Request $request)
  {
    $email = $request->input("email");
    $password = $request->input("password");
    return $this->userModel->addUser($email, $password);
  }

  public function updateUser(Request $request)
  {
    $id = $request->input("id");
    $email = $request->input("email");
    $password = $request->input("password");
    return $this->userModel->updateUser($id, $email, $password);
  }

}