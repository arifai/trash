<?php

namespace App\Controllers;

use App\Models\Trash;

class History extends BaseController
{
    public function __construct()
    {
        $this->Trash = new Trash();
    }

    public function index()
    {
        $items = $this->Trash->history();
        // $jerigen = $this->Trash->history();
        // $cair = $this->Trash->history();
        // $padat = $this->Trash->history();

        $datas = [
            'title' => 'Riwayat',
            'items' => $items,
        ];

        return view('history/index', $datas);
    }
}
