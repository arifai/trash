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
        $trash_in = $this->TrashModel->countIn();
        $trash_out = $this->TrashModel->countOut();
        $data = [
            'title' => 'Dashboard',
            'users' => $users,
            'in' => $trash_in,
            'out' => $trash_out
        ];

        return view('dashboard/index', $data);
    }
}
