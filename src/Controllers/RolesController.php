<?php

namespace Lembarek\Admin\Controllers;

use Lembarek\Admin\Requests\CreateRoleRequest;
use Lembarek\Role\Repositories\RoleRepositoryInterface;

class RolesController extends Controller
{

    protected $roleRepo;

    public function __construct(RoleRepositoryInterface $roleRepo)
    {
        $this->roleRepo = $roleRepo;
    }

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $roles = $this->roleRepo->all();
        return view('admin::roles.index', compact('roles'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('admin::roles.create');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(CreateRoleRequest $request)
    {
        $this->roleRepo->create($request->except('_token'));

        return back()->with('flash.message', trans('admin::roles.role_created'));
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
        $this->roleRepo->find($role)->delete();
        return back()->with('flash.message', trans('admin::roles.role_deleted'));;
    }
}
