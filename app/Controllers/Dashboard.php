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
        // in
        $in_tajam = $this->TrashModel->sumWeighById(1, 1);
        $in_jerigen = $this->TrashModel->sumWeighById(2, 1);
        $in_cair = $this->TrashModel->sumWeighById(3, 1);
        $in_padat = $this->TrashModel->sumWeighById(4, 1);
        // out
        $out_tajam = $this->TrashModel->sumWeighById(1, 0);
        $out_jerigen = $this->TrashModel->sumWeighById(2, 0);
        $out_cair = $this->TrashModel->sumWeighById(3, 0);
        $out_padat = $this->TrashModel->sumWeighById(4, 0);
        $data = [
            'title' => 'Dashboard',
            'users' => $users,
            // in
            'in_tajam' => $in_tajam,
            'in_jerigen' => $in_jerigen,
            'in_cair' => $in_cair,
            'in_padat' => $in_padat,
            // out
            'out_tajam' => $out_tajam,
            'out_jerigen' => $out_jerigen,
            'out_cair' => $out_cair,
            'out_padat' => $out_padat
        ];

        return view('dashboard/index', $data);
    }
}
