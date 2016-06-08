<?php

namespace Lembarek\Admin\Controllers;

use Lembarek\Auth\Repositories\UserRepository;

class DashboardController extends Controller
{


    protected $userRepo;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    /**
     * the home(index) page of the dashboard
     *
     * @return Response
     */
    public function index($page="dashboard")
    {
        return view('admin::dashboard.index', compact('page'));
    }

    /**
     * show the profile of the user in dashboard
     *
     * @param  string  $username
     * @return Response
     */
    public function profile($username)
    {
        $user = $this->userRepo->where(['username' => $username])->with('roles')->first();
        return view('admin::dashboard.partials.profile', compact('user'));
    }
}
