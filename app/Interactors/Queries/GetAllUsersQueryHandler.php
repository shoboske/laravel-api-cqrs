<?php

namespace App\Interactors\Queries;

use App\Dtos\UserDto;
use App\Dtos\Users\UserListDto;
use App\Interfaces\IUserRepository;
use App\Ports\Queries\GetAllUsersQuery;
use App\Ports\Infrastructure\CustomResponse;

class GetAllUsersQueryHandler
{
    private IUserRepository $repository;
    public function __construct(IUserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle(GetAllUsersQuery $event)
    {
        $users = $this->repository->getAll();

        return CustomResponse::Ok(
            count($users) < 1 ? 'NoUsersExist' : 'UsersFetchedSuccessFully',
            new UserListDto($users)
        );
    }
}
