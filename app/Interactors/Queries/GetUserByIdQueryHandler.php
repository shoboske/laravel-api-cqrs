<?php

namespace App\Interactors\Queries;

use App\Dtos\Users\UserDto;
use App\Interfaces\IUserRepository;
use App\Ports\Queries\GetUserByIdQuery;
use App\Ports\Infrastructure\CustomResponse;

class GetUserByIdQueryHandler
{
    private static IUserRepository $repository;
    public function __construct(IUserRepository $repository)
    {
        $this::$repository = $repository;
    }

    public function handle(GetUserByIdQuery $request)
    {
        $user = $this::$repository->getById($request->id);
        if ($user == null) {
            return CustomResponse::Fail('UserNotFound');
        }
        return CustomResponse::Ok('UserFetchedSuccessfully',  new UserDto($user));
    }
}
