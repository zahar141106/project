<?php

namespace App\Controllers;

use App\Classes\User;
use App\Services\UserService;

class UserController
{
    private UserService $service;
    public function __construct()
    {
        $this->service = new UserService();
    }

    public function get(int $id): User
    {
        return $this->service->a($id);
    }
}