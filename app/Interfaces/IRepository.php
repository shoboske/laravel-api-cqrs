<?php

namespace App\Interfaces;

interface IRepository
{
    public function getAll();
    public function getById($id);
}
