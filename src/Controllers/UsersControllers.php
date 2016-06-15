<?php

namespace Lembarek\Admin\Controllers;

use Lembarek\Admin\Requests\CreateUserRequest;
use Lembarek\Auth\Repositories\UserRepositoryInterface;
use Lembarek\Role\Repositories\RoleRepositoryInterface;

class UsersController extends Controller
{


    protected $userRepo;

    protected $roleRepo;

    public function __construct(UserRepositoryInterface $userRepo, RoleRepositoryInterface $roleRepo)
    {
        $this->userRepo = $userRepo;
        $this->roleRepo = $roleRepo;
    }


    /**
     * show the profile of the user in dashboard
     *
     * @param  string  $username
     * @return Response
     */
    public function profile($username)
    {
        $user = $this->userRepo->byUsername($username, ['roles']);
        return view('admin::dashboard.partials.profile', compact('user'));
    }


    /**
     * detele a user
     *
     * @param  string  $username
     * @return Response
     */
    public function delete($username)
    {
        $user = $this->userRepo->byUsername($username);
        if(auth()->user()->isSuperiorThen($user))
            $user->delete();

        return redirect()->route('admin::dashboard', ['page' => 'users']);
    }

    /**
     * create a new user
     *
     * @return Reponse
     */
    public function createUser()
    {
        return view('admin::dashboard.partials.createUser', ['page' => 'createUser']);
    }

    /**
     * post create user
     *
     * @return Reponse
     */
    public function postCreateUser(CreateUserRequest $request)
    {
        $this->userRepo->create($request->all());
        return redirect()->route('admin::dashboard', ['page' => 'users']);
    }

    /**
     * add a role to a user
     *
     * @return Reponse
     */
    public function addRole()
    {
        $input = request()->only('role', 'user');

        $role = $this->roleRepo->find($input['role']);

        if(auth()->user()->canAddRole($role))

            $this->userRepo->find($input['user'])->assignRole($role);

        return back();
    }

    /**
     * delete a role
     *
     * @param  Role  $role
     * @return Response
     */
    public function deleteRole($role)
    {
        $input = request()->only('user');

        $user = $this->userRepo->find($input['user']);

        if(auth()->user()->canDeleteRole($user))
            $user->roles()->detach($role);

        return back();
    }
}
