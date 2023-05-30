<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository 
{
    private $model;

    public function __construct()
    {
        $this->model = new User();
    }

    public function create(array $request)
    {   
        return $this->model->create($request);
    }

}