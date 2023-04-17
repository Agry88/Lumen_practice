<?php

namespace App\Http\Controllers;

use App\Models\User as UserModel;

class User extends Controller
{
  public function getAllUsers()
  {
    $userModel = new UserModel();
    return $userModel->showAll();
  }

}
