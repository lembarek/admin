<?php

namespace Lembarek\Admin\Controllers;

use Lembarek\Admin\Requests\CreateUserRequest;
use Lembarek\Admin\Requests\UpdateUserRequest;
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
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $users = $this->userRepo->getPaginatedAndOrdered();
        return view('admin::users.index', compact('users'));
    }

    /**
     * show the profile of the user in dashboard
     *
     * @param  string  $username
     * @return Response
     */
    public function show($username)
    {
        $user = $this->userRepo->byUsername($username, ['roles']);
        return view('admin::users.show', compact('user'));
    }

    /**
     * detele a user
     *
     * @param  string  $username
     * @return Response
     */
    public function destroy($username)
    {
        $user = $this->userRepo->byUsername($username);
        if(auth()->user()->isSuperiorThen($user))
            $user->delete();

        return redirect()->route('admin::dashboard.users.index');
    }

    /**
     * create a new user
     *
     * @return Reponse
     */
    public function create()
    {
        return view('admin::users.create');
    }

    /**
     * post create user
     *
     * @return Reponse
     */
    public function store(CreateUserRequest $request)
    {
        $this->userRepo->create($request->all());
        return redirect()->route('admin::dashboard.users.index');
    }

    /**
     * edit the users profile
     *
     * @param  string  $username
     * @return Response
     */
    public function edit($username)
    {
        $user = $this->userRepo->byUsername($username);
        return view('admin::users.edit', compact('user'));
    }

    /**
     * update existing user
     *
     * @param  string  $username
     * @return Response
     */
    public function update(UpdateUserRequest $request, $username)
    {
        $this->userRepo->byUsername($username)->profile()->update($request->except('_token', '_method'));;
        return back();
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
