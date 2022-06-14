<?php

namespace App\Interactors\Queries;

use App\Interfaces\IUserRepository;
use App\Ports\Infrastructure\CustomResponse;
use App\Ports\Queries\GetAllUsersQuery;

class GetAllUsersQueryHandler
{
    private static IUserRepository $repository;
    public function __construct(IUserRepository $repository)
    {
        $this::$repository = $repository;
    }

    public function handle(GetAllUsersQuery $event)
    {
        $users = $this::$repository->getAll();

        return CustomResponse::Ok($users->count() < 1 ? 'NoUsersExist' : 'UsersFetchedSuccessFully', $users);
    }
}
