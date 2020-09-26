<?php

namespace App\Controllers;

use App\Models\RolesLevel;
use App\Models\User as ModelsUser;
use CodeIgniter\I18n\Time;

class User extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->UserModel = new ModelsUser();
        $this->RoleModel = new RolesLevel();
    }

    /**
     * Menampilkan halaman index `user`
     */
    public function index()
    {
        $items = $this->UserModel->getData();
        $data = [
            'title' => 'Data Pengguna',
            'items' => $items
        ];

        return view('user/index', $data);
    }

    /**
     * Menambahkan data
     */
    public function add()
    {
        $items = $this->RoleModel->getData();
        $data = [
            'title' => 'Tambah Pengguna Baru',
            'items' => $items,
            'validation' => \Config\Services::validation()
        ];

        return view('user/add', $data);
    }

    /**
     * Method untuk save
     */
    public function save()
    {
        $rules = [
            'full_name' => 'required|min_length[3]|max_length[50]|alpha_space',
            'employee_id' => 'required|min_length[6]|max_length[8]|numeric|is_unique[users.employee_id]',
            'role_level' => 'required',
            'password' => 'required|min_length[8]|max_length[50]'
        ];

        $errors = [
            'full_name' => [
                'required' => 'Nama Lengkap tidak boleh kosong',
                'min_length' => 'Nama Lengkap minimal 3 angka',
                'max_length' => 'Nama Lengkap maksimal 50 angka',
                'alpha_space' => 'Nama Lengkap hanya boleh mengandung huruf dan spasi'
            ],
            'employee_id' => [
                'required' => 'ID Pegawai tidak boleh kosong',
                'min_length' => 'ID Pegawai minimal 6 angka',
                'max_length' => 'ID Pegawai maksimal 8 angka',
                'numeric' => 'ID Pegawai harus berisi angka',
                'is_unique' => 'ID Pegawai sudah terdaftar'
            ],
            'role_level' => [
                'required' => 'Hak Akses tidak boleh kosong'
            ],
            'password' => [
                'required' => 'Kata sandi tidak boleh kosong',
                'min_length' => 'Kata sandi minimal 8 karakter',
                'max_length' => 'Kata sandi maksimal 50 karakter',
            ]
        ];

        $validate = $this->validate($rules, $errors);

        if (!$validate) {
            $validation = \Config\Services::validation();

            return redirect()->to('/user/add')->withInput()->with('validation', $validation);
        } else {
            $newData = [
                'full_name' => $this->request->getVar('full_name'),
                'employee_id' => $this->request->getVar('employee_id'),
                'role_level_id' => $this->request->getVar('role_level'),
                'password' => $this->request->getVar('password'),
                'register_time' => Time::now('Asia/Jakarta', 'en_US')
            ];

            $this->UserModel->save($newData);
            $session = session();
            $session->setFlashdata('success', 'Pengguna baru berhasil ditambahkan');

            return redirect()->to('/user');
        }
    }

    /**
     * Menghapus data
     */
    public function delete(int $id)
    {
        $this->UserModel->delData($id);

        $session = session();
        $session->setFlashdata('success', 'Pengguna berhasil dihapus');

        return redirect()->to('/user');
    }

    /**
     * Menampilkan data berdasarkan `user_id`
     * di halaman view `/user/update`
     */
    public function edit(int $id)
    {
        $items = $this->RoleModel->getData();
        $user = $this->UserModel->getDataById($id);
        $data = [
            'title' => 'Perbarui Pengguna',
            'items' => $items,
            'user' => $user,
            'validation' => \Config\Services::validation()
        ];

        return view('user/update', $data);
    }

    /**
     * Method update data
     */
    public function update(int $id)
    {
        $rules = [
            'full_name' => 'required|min_length[3]|max_length[50]|alpha_space',
            'employee_id' => "required|min_length[6]|max_length[8]|numeric|is_unique[users.employee_id,user_id,{$id}]",
            'role_level' => 'required',
            // 'password' => 'required|min_length[8]|max_length[50]'
        ];

        $errors = [
            'full_name' => [
                'required' => 'Nama Lengkap tidak boleh kosong',
                'min_length' => 'Nama Lengkap minimal 3 angka',
                'max_length' => 'Nama Lengkap maksimal 50 angka',
                'alpha_space' => 'Nama Lengkap hanya boleh mengandung huruf dan spasi'
            ],
            'employee_id' => [
                'required' => 'ID Pegawai tidak boleh kosong',
                'min_length' => 'ID Pegawai minimal 6 angka',
                'max_length' => 'ID Pegawai maksimal 8 angka',
                'numeric' => 'ID Pegawai harus berisi angka',
                'is_unique' => 'ID Pegawai sudah terdaftar'
            ],
            'role_level' => [
                'required' => 'Hak Akses tidak boleh kosong'
            ],
            // 'password' => [
            //     'required' => 'Kata sandi tidak boleh kosong',
            //     'min_length' => 'Kata sandi minimal 8 karakter',
            //     'max_length' => 'Kata sandi maksimal 50 karakter',
            // ]
        ];

        $validate = $this->validate($rules, $errors);

        if (!$validate) {

            $validation = \Config\Services::validation();

            return redirect()->to('/user/edit/' . $id)->withInput()->with('validation', $validation);
        } else {
            $updateData = [
                // 'user_id' => $id,
                'full_name' => $this->request->getVar('full_name'),
                'employee_id' => $this->request->getVar('employee_id'),
                'role_level_id' => $this->request->getVar('role_level'),
            ];

            $this->UserModel->updateData($id, $updateData);
            $session = session();
            $session->setFlashdata('success', 'Pengguna berhasil diperbarui');

            return redirect()->to('/user');
        }
    }
}
