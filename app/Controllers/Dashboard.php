<?php

namespace App\Controllers;

use App\Models\Trash;
use App\Models\User;

class Dashboard extends BaseController
{
    public function __construct()
    {
        $this->UserModel = new User();
        $this->TrashModel = new Trash();
    }

    public function index()
    {
        $users = $this->UserModel;
        $trashes = $this->TrashModel;
        $data = [
            'title' => 'Dashboard',
            'users' => $users,
            'trashes' => $trashes
        ];

        return view('dashboard/index', $data);
    }
}
