<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\AdminModel;

class Admin extends BaseController
{

	protected $adminModel;
	protected $validation;

	public function __construct()
	{
		$this->adminModel = new AdminModel();
		$this->validation =  \Config\Services::validation();
	}

	public function index()
	{
		$user = session()->get('auth');
		if ($user && $user['level'] == 0) {
			$data = [
				'controller' => ucwords('admin'),
				'title' => ucwords('admin')
			];
			return view('admin', $data);
		} else {
			$alert = [
				'type' => 'warning',
				'message' => 'Anda tidak memiliki izin untuk mengakses halaman tersebut!.'
			];
			session()->setFlashdata('alert', $alert);
			return redirect()->to('dashboard');
		}
	}

	public function getAll()
	{
		$response = $data['data'] = array();

		$result = $this->adminModel->select()->where('role', 1)->findAll();
		$no = 1;
		foreach ($result as $key => $value) {
			$ops = '<div class="btn-group text-white">';
			$ops .= '<a class="btn btn-dark" onClick="save(' . $value->id . ')"><i class="fas fa-pencil-alt"></i></a>';
			$ops .= '<a class="btn btn-secondary text-dark" onClick="remove(' . $value->id . ')"><i class="fas fa-trash-alt"></i></a>';
			$ops .= '</div>';
			$data['data'][$key] = array(
				$no,
				$value->nama,
				$value->username,
				$value->email,

				$ops
			);
			$no++;
		}

		return $this->response->setJSON($data);
	}

	public function getOne()
	{
		$response = array();

		$id = $this->request->getPost('id');

		if ($this->validation->check($id, 'required|numeric')) {

			$data = $this->adminModel->where('id', $id)->first();

			return $this->response->setJSON($data);
		} else {
			throw new \CodeIgniter\Exceptions\PageNotFoundException();
		}
	}

	public function add()
	{
		$response = array();

		$fields['id'] = $this->request->getPost('id');
		$fields['nama'] = $this->request->getPost('nama');
		$fields['username'] = $this->request->getPost('username');
		$fields['email'] = $this->request->getPost('email');
		$fields['password'] = password_hash((string)$this->request->getPost('password'), PASSWORD_DEFAULT);
		$fields['role'] = 1;

		$this->validation->setRules([
			'nama' => ['label' => 'Nama', 'rules' => 'required|min_length[0]|max_length[200]'],
			'username' => ['label' => 'Username', 'rules' => 'required|min_length[0]|max_length[200]'],
			'email' => ['label' => 'Email', 'rules' => 'required|valid_email|min_length[0]|max_length[200]'],
			'password' => ['label' => 'Password', 'rules' => 'required|min_length[0]|max_length[200]'],
		]);

		if ($this->validation->run($fields) == FALSE) {

			$response['success'] = false;
			$response['messages'] = $this->validation->getErrors(); //Show Error in Input Form

		} else {

			if ($this->adminModel->insert($fields)) {

				$response['success'] = true;
				$response['messages'] = lang("App.insert-success");
			} else {

				$response['success'] = false;
				$response['messages'] = lang("App.insert-error");
			}
		}

		return $this->response->setJSON($response);
	}

	public function edit()
	{
		$response = array();

		$fields['id'] = $this->request->getPost('id');
		$fields['nama'] = $this->request->getPost('nama');
		$fields['username'] = $this->request->getPost('username');
		$fields['email'] = $this->request->getPost('email');
		$fields['password'] = password_hash((string)$this->request->getPost('password'), PASSWORD_DEFAULT);

		$this->validation->setRules([
			'nama' => ['label' => 'Nama', 'rules' => 'required|min_length[0]|max_length[200]'],
			'username' => ['label' => 'Username', 'rules' => 'required|min_length[0]|max_length[200]'],
			'email' => ['label' => 'Email', 'rules' => 'required|valid_email|min_length[0]|max_length[200]'],
			'password' => ['label' => 'Password', 'rules' => 'required|min_length[0]|max_length[200]'],

		]);

		if ($this->validation->run($fields) == FALSE) {

			$response['success'] = false;
			$response['messages'] = $this->validation->getErrors(); //Show Error in Input Form

		} else {

			if ($this->adminModel->update($fields['id'], $fields)) {

				$response['success'] = true;
				$response['messages'] = lang("App.update-success");
			} else {

				$response['success'] = false;
				$response['messages'] = lang("App.update-error");
			}
		}

		return $this->response->setJSON($response);
	}

	public function remove()
	{
		$response = array();

		$id = $this->request->getPost('id');

		if (!$this->validation->check($id, 'required|numeric')) {

			throw new \CodeIgniter\Exceptions\PageNotFoundException();
		} else {

			if ($this->adminModel->where('id', $id)->delete()) {

				$response['success'] = true;
				$response['messages'] = lang("App.delete-success");
			} else {

				$response['success'] = false;
				$response['messages'] = lang("App.delete-error");
			}
		}

		return $this->response->setJSON($response);
	}
}
