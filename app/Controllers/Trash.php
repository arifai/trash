<?php

namespace App\Controllers;

use App\Models\Category;
use App\Models\Floor;
use App\Models\Shift;
use App\Models\Trash as ModelsTrash;
use App\Models\User;
use CodeIgniter\I18n\Time;

class Trash extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->TrashModel = new ModelsTrash();
        $this->UserModel = new User();
        $this->FloorModel = new Floor();
        $this->ShiftModel = new Shift();
        $this->CategoryModel = new Category();
    }

    public function index()
    {
        $items = $this->TrashModel->getData();
        $data = [
            'title' => 'Data Sampah',
            'items' => $items
        ];

        return view('trash/index', $data);
    }

    public function add()
    {
        // $users = $this->UserModel->getData();
        $floors = $this->FloorModel->getData();
        $shifts = $this->ShiftModel->getData();
        $categories = $this->CategoryModel->getData();
        $data = [
            'title' => 'Tambah Data Sampah',
            'floors' => $floors,
            // 'users' => $users,
            'shifts' => $shifts,
            'cats' => $categories,
            'validation' => \Config\Services::validation()
        ];

        return view('trash/add', $data);
    }

    public function save()
    {
        $rules = [
            'weight' => 'required|min_length[1]|max_length[6]',
            'category_id' => 'required',
            'floor_id' => 'required',
            // 'user_id' => 'required',
            'shift_id' => 'required',
            'is_out' => 'required',
        ];

        $errors = [
            'weight' => [
                'required' => 'Berat tidak boleh kosong',
                'min_length' => 'Berat minimal berisikan 1 angka',
                'max_length' => 'Berat maksimal berisikan 6 angka',
                // 'decimal' => 'Berat harus berupa bilangan pecahan'
            ],
            'category_id' => [
                'required' => 'Kategori tidak boleh kosong'
            ],
            'floor_id' => [
                'required' => 'Lantai tidak boleh kosong'
            ],
            // 'user_id' => [
            //     'required' => 'Nama Pegawai tidak boleh kosong'
            // ],
            'shift_id' => [
                'required' => 'Jadwal shift tidak boleh kosong'
            ],
            'is_out' => [
                'required' => 'Sampah keluar tidak boleh kosong'
            ]
        ];

        $validate = $this->validate($rules, $errors);

        if (!$validate) {
            // $data['validation'] = $this->validator;
            $validation = \Config\Services::validation();

            return redirect()->to('/trash/add')->withInput()->with('validation', $validation);
        } else {
            $newData = [
                'weight' => floatval($this->request->getVar('weight')),
                'category_id' => $this->request->getVar('category_id'),
                'floor_id' => $this->request->getVar('floor_id'),
                'user_id' => session()->get('user_id'),
                'shift_id' => $this->request->getVar('shift_id'),
                'is_out' => $this->request->getVar('is_out'),
                'entry_time' => Time::now('Asia/Jakarta', 'en_US')
            ];

            $this->TrashModel->save($newData);
            $session = session();
            $session->setFlashdata('success', 'Data sampah berhasil ditambahkan');

            return redirect()->to('/trash');
        }
    }

    public function delete(int $id)
    {
        $this->TrashModel->delData($id);

        $session = session();
        $session->setFlashdata('success', 'Data sampah berhasil dihapus');

        return redirect()->to('/trash');
    }

    public function delDataOut(int $id)
    {
        $this->TrashModel->delData($id);

        $session = session();
        $session->setFlashdata('success', 'Data sampah keluar berhasil dihapus');

        return redirect()->to('/trash/out');
    }

    public function edit(int $id)
    {
        // $users = $this->UserModel->getData();
        $floors = $this->FloorModel->getData();
        $shifts = $this->ShiftModel->getData();
        $categories = $this->CategoryModel->getData();
        $item = $this->TrashModel->getDataById($id);
        $data = [
            'title' => 'Tambah Data Sampah',
            'floors' => $floors,
            // 'users' => $users,
            'shifts' => $shifts,
            'cats' => $categories,
            'item' => $item,
            'validation' => \Config\Services::validation()
        ];

        return view('trash/update', $data);
    }

    public function update(int $id)
    {
        $rules = [
            'weight' => 'required|min_length[1]|max_length[6]',
            'category_id' => 'required',
            'floor_id' => 'required',
            // 'user_id' => 'required',
            'shift_id' => 'required',
            'is_out' => 'required',
        ];

        $errors = [
            'weight' => [
                'required' => 'Berat tidak boleh kosong',
                'min_length' => 'Berat minimal berisikan 1 angka',
                'max_length' => 'Berat maksimal berisikan 6 angka',
                // 'decimal' => 'Berat harus berupa bilangan pecahan'
            ],
            'category_id' => [
                'required' => 'Kategori tidak boleh kosong'
            ],
            'floor_id' => [
                'required' => 'Lantai tidak boleh kosong'
            ],
            'shift_id' => [
                'required' => 'Jadwal shift tidak boleh kosong'
            ],
            'is_out' => [
                'required' => 'Sampah keluar tidak boleh kosong'
            ]
        ];

        $validate = $this->validate($rules, $errors);

        if (!$validate) {
            $validation = \Config\Services::validation();

            return redirect()->to('/trash/edit/' . $id)->withInput()->with('validation', $validation);
        } else {
            $newData = [
                'weight' => floatval($this->request->getVar('weight')),
                'category_id' => $this->request->getVar('category_id'),
                'floor_id' => $this->request->getVar('floor_id'),
                // 'user_id' => $this->request->getVar('user_id'),
                'shift_id' => $this->request->getVar('shift_id'),
                'is_out' => $this->request->getVar('is_out'),
                // 'entry_time' => Time::now('Asia/Jakarta', 'en_US')
            ];

            $this->TrashModel->updateData($id, $newData);
            $session = session();
            $session->setFlashdata('success', 'Data sampah berhasil diperbarui');

            return redirect()->to('/trash');
        }
    }

    public function out()
    {
        $items = $this->TrashModel->getDataOut();
        $data = [
            'title' => 'Data Sampah Keluar',
            'items' => $items
        ];

        return view('trash/out', $data);
    }
}
