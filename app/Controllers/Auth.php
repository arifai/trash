<?php

namespace App\Controllers;

use App\Models\User as ModelUser;

class Auth extends BaseController
{
	public function __construct()
	{
		helper('form');
		$this->UserModel = new ModelUser();
	}

	/**
	 * Menampilkan halaman `index` dari `/auth/login`
	 */
	public function index()
	{
		$data = [];

		if ($this->request->getPost()) {
			$rules = [
				'employee_id' => 'required|min_length[6]|max_length[8]|numeric',
				'password' => 'required|min_length[8]|max_length[50]|validateUser[employee_id, password]'
			];

			$errors = [
				'employee_id' => [
					'required' => 'ID Pegawai tidak boleh kosong',
					'min_length' => 'ID Pegawai minimal 6 angka',
					'max_length' => 'ID Pegawai maksimal 8 angka',
					'numeric' => 'ID Pegawai harus berisi angka'
				],
				'password' => [
					'required' => 'Kata sandi tidak boleh kosong',
					'min_length' => 'Kata sandi minimal 8 karakter',
					'max_length' => 'Kata sandi maksimal 50 karakter',
					'validateUser' => 'ID Pegawai atau kata sandi tidak ditemukan'
				]
			];

			$validate = $this->validate($rules, $errors);

			if (!$validate) {
				$data['validation'] = $this->validator;
			} else {
				$getEmployeeId = $this->request->getVar('employee_id');
				$user = $this->UserModel->where('employee_id', $getEmployeeId)->first();
				$this->_setSession($user);

				return redirect()->to('dashboard');
			}
		}

		return view('auth/login', $data);
	}

	/**
	 * Untuk menyimpan `session` di dalam browser.
	 * Method ini bersifat private
	 */
	private function _setSession($user)
	{
		$data = [
			'user_id' => $user['user_id'],
			'full_name' => $user['full_name'],
			'employee_id' => $user['employee_id'],
			'role_level_id' => $user['role_level_id'],
			'isLoggedIn' => true
		];

		session()->set($data);

		return true;
	}

	/**
	 * Method untuk logout/keluar
	 */
	public function logout()
	{
		session()->destroy();

		return redirect()->to('/');
	}
}
