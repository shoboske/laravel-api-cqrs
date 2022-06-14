<?php

namespace App\Interactors\Queries;

use App\Interfaces\IUserRepository;
use App\Ports\Infrastructure\CustomResponse;
use App\Ports\Queries\GetUserByIdQuery;

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
        return CustomResponse::Ok('UserFetchedSuccessfully', $user);
    }
}
