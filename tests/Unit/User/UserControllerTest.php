<?php

namespace Tests\Unit\User;

use App\User;
use Mockery as m;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Admin\Users\UsersController;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class UserControllerTest extends \TestCase
{
    protected $users;
    protected $userController;

    public function setUp()
    {
        parent::setUp();
        $this->users = m::mock(User::class);
        $this->userController = new UsersController(
            $this->users
        );
    }

    /**
     * @test
     */
    public function it_should_get_sorted_users()
    {
        $users = m::mock(LengthAwarePaginator::class);
        $this->users->shouldReceive('sortable->paginate')
            ->once()
            ->with(10)
            ->andReturn($users);

        $this->assertInstanceOf(View::class, $this->userController->index());
    }

    /**
     * @test
     */
    public function it_should_store_users()
    {
        $request = m::mock(Request::class);
        $userController = m::mock(UsersController::class.'[validate]', [
            $this->users,
        ]);
        $userController->shouldReceive('validate')
            ->once()
            ->with($request, [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required',
            ])
            ->andReturn(true);
        $userDetails = [
            'name' => 'John Doe',
            'email' => 'john@gmail.com',
            'password' => '1234567',
            'status' => 1,
        ];
        $hashedPassword = '1234567';
        $request->shouldReceive('all')
            ->once()
            ->withNoArgs()
            ->andReturn($userDetails);
        Hash::shouldReceive('make')
            ->once()
            ->with($userDetails['password'])
            ->andReturn($hashedPassword);
        $request->shouldReceive('offsetGet')
            ->once()
            ->with('password')
            ->andReturn($hashedPassword);
        $request->shouldReceive('offsetGet')
            ->once()
            ->with('status')
            ->andReturn(0);
        $this->users->shouldReceive('create')
            ->once()
            ->with($userDetails)
            ->andReturn(m::mock(User::class));
        $this->assertInstanceOf(RedirectResponse::class, $userController->store($request));
    }

    /**
     * @test
     */
    public function it_should_edit_user()
    {
        $this->users->shouldReceive('find')
            ->once()
            ->with(1)
            ->andReturn(m::mock(User::class));

        $this->assertInstanceOf(View::class, $this->userController->edit(1));
    }

    /**
     * @test
     */
    public function it_should_update_user()
    {
        $request = m::mock(Request::class);
        $userController = m::mock(UsersController::class.'[validate]', [
            $this->users,
        ]);
        $user = m::mock(User::class);
        $userController->shouldReceive('validate')
            ->once()
            ->with($request, [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'sometimes',
            ])
            ->andReturn(true);
        $userDetails = [
            'name' => 'John Doe',
            'email' => 'john@gmail.com',
            'password' => '1234567',
            'status' => 1,
        ];
        $this->users->shouldReceive('find')
            ->once()
            ->with(1)
            ->andReturn($user);
        $hashedPassword = '1234567';
        $request->shouldReceive('all')
            ->once()
            ->withNoArgs()
            ->andReturn($userDetails);
        Hash::shouldReceive('make')
            ->once()
            ->with($userDetails['password'])
            ->andReturn($hashedPassword);
        $request->shouldReceive('offsetGet')
            ->twice()
            ->with('password')
            ->andReturn($hashedPassword);
        $request->shouldReceive('offsetGet')
            ->once()
            ->with('status')
            ->andReturn(0);
        $user->shouldReceive('update')
            ->once()
            ->with($userDetails)
            ->andReturn(true);
        $this->assertInstanceOf(RedirectResponse::class, $userController->update($request, 1));
    }

    /**
     * @test
     */
    public function it_should_delete_user()
    {
        $request = m::mock(Request::class);
        $users = [1, 2];
        $user = m::mock(User::class);
        $request->shouldReceive('offsetGet')
            ->times(3)
            ->with('users')
            ->andReturn($users);
        $request->shouldReceive('user')
            ->once()
            ->withNoArgs()
            ->andReturn($user);
        $user->shouldReceive('getAttribute')
            ->once()
            ->with('id')
            ->andReturn(3);
        $this->users->shouldReceive('destroy')
            ->once()
            ->with($users)
            ->andReturn(true);
        $this->assertInstanceOf(RedirectResponse::class, $this->userController->destroy($request));
    }
}
