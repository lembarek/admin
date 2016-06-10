<?php

namespace Lembarek\Admin\Controllers;

use Lembarek\Auth\Repositories\UserRepository;

class UsersController extends Controller
{


    protected $userRepo;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
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


}
