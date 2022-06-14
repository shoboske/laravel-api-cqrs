<?php

namespace App\Http\Controllers;

use App\Interfaces\IUserRepository;
use App\Ports\Queries\GetAllUsersQuery;
use App\Ports\Queries\GetUserByIdQuery;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public static IUserRepository $repository;
    public function __construct(IUserRepository $repository)
    {
        $this::$repository = $repository;
    }
    public function getAllUsers()
    {
        return $this->process("Getting all users", new GetAllUsersQuery);
    }

    public function getSingleUser($id)
    {
        return $this->process("Getting single user", new GetUserByIdQuery($id));
    }
}
