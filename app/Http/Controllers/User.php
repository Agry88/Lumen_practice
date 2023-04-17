<?php

namespace App\Http\Controllers;

use App\Models\User as UserModel;

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

}