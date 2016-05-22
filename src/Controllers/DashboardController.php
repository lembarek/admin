<?php

namespace Lembarek\Admin\Controllers;

class DashboardController extends Controller
{


    public function __construct()
    {
    }

    /**
     * the home(index) page of the dashboard
     *
     * @return Response
     */
    public function index($page="index")
    {
        return view('admin::dashboard.index', compact('page'));
    }
}
