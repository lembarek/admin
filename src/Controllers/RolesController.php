<?php

namespace Lembarek\Admin\Controllers;

use App\Http\Requests;
use Lembarek\Auth\Repositories\UserRepositoryInterface;
use Lembarek\Roles\Repositories/RoleRepositoryInterface;

class RolesController extends Controller
{

    protected $userRepo;

    protected $roleRepo;

    public function __construct(UserRepositoryInterface $userRepo, Repositories/RoleRepositoryInterface $roleRepo)
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

    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $input = request()->only('role', 'user');

        $role = $this->roleRepo->find($input['role']);

        if(auth()->user()->canAddRole($role))

            $this->userRepo->find($input['user'])->assignRole($role);

        return back();
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($role)
    {
        $input = request()->only('user');

        $user = $this->userRepo->find($input['user']);

        if(auth()->user()->canDeleteRole($user))
            $user->roles()->detach($role);

        return back();

    }
}
