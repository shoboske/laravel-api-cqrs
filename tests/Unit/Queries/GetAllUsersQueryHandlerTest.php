<?php

namespace Tests\Unit\Queries;

use App\Interactors\Queries\GetAllUsersQueryHandler;
use App\Interfaces\IUserRepository;
use App\Models\User;
use App\Ports\Queries\GetAllUsersQuery;
use PHPUnit\Framework\MockObject\MockObject;
use Tests\TestCase;

class GetAllUsersQueryHandlerTest extends TestCase
{
    public MockObject $userRepositoryMock;
    public GetAllUsersQuery $request;
    public GetAllUsersQueryHandler $handler;
    public function setUp(): void
    {
        parent::setUp();
        $this->userRepositoryMock =  $this->createMock(IUserRepository::class);

        $this->request = $this->createMock(GetAllUsersQuery::class);
        $this->handler = new GetAllUsersQueryHandler($this->userRepositoryMock);
    }
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_should_return_usersFetchedSuccessfully_when_users_are_more_than_zero()
    {
        $this->userRepositoryMock->expects($this->once())->method('getAll')
            ->will($this->returnValue(collect(User::factory(mt_rand(0, 100))->make())));

        $result = $this->handler->handle($this->request);

        $this->assertFalse($result['error']);
        $this->assertEquals("UsersFetchedSuccessFully", $result["message"]);
    }

    public function test_should_return_noUsersExist_when_users_are_less_than_one()
    {
        $this->userRepositoryMock->expects($this->once())->method('getAll')
            ->will($this->returnValue(collect([])));

        $result = $this->handler->handle($this->request);

        $this->assertFalse($result['error']);
        $this->assertEquals("NoUsersExist", $result["message"]);
    }
}
