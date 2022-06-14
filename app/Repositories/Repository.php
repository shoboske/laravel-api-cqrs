<?php

namespace App\Repositories;

use App\Interfaces\IRepository;
use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;

class  Repository implements IRepository
{
    private static Builder $instance;
    public function __construct(Builder $model)
    {
        $this::$instance = $model;
    }

    public function getAll()
    {
        return $this::$instance->get();
    }

    public function getById($id)
    {
        return $this::$instance->where('id', $id)->first();
    }

    public function query()
    {
        return $this::$instance;
    }
}
