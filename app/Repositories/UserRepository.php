<?php

namespace App\Repositories;

use App\Interfaces\IRepository;
use App\Interfaces\IUserRepository;
use App\Models\User;

class UserRepository extends Repository implements IUserRepository
{
    public function __construct()
    {
        parent::__construct(User::query());
    }
}
