<?php

namespace App\Repositories;

use App\Models\Award;

class AwardRepository
{
    private $model;

    public function __construct()
    {
        $this->model = new Award();
    }

    public function all(): Array
    {
        return $this->model->all()->toArray();
    }

    public function store (array $request)
    {
        return $this->model->create($request);
    }

}
