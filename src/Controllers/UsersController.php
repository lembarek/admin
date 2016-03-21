<?php

namespace Lembarek\Admin\Controllers;

use Lembarek\Auth\Repositories\UserRepositoryInterface;

class UsersController extends Controller
{


    protected $userRepo;

    public function __construct(UserRepositoryInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    /**
     * show all users
     *
     * @return Response
     */
    public function show_users()
    {
        $users = $this->userRepo->allWith('profile');
        return view('admin::users.index', compact('users'));
    }
}
