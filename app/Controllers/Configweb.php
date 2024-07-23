<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\ConfigwebModel;

class Configweb extends BaseController
{

	protected $configwebModel;
	protected $validation;

	public function __construct()
	{
		$this->configwebModel = new ConfigwebModel();
		$this->validation =  \Config\Services::validation();
	}

	public function index()
	{

		$data = [
			'controller'    	=> ucwords('configweb'),
			'title'     		=> ucwords('config web')
		];

		return view('configweb', $data);
	}

	public function getAll()
	{
		$response = $data['data'] = array();

		$result = $this->configwebModel->select()->findAll();
		$no = 1;
		foreach ($result as $key => $value) {
			$ops = '<div class="btn-group text-white">';
			$ops .= '<a class="btn btn-dark" onClick="save(' . $value->id . ')"><i class="fas fa-pencil-alt"></i></a>';
			// $ops .= '<a class="btn btn-secondary text-dark" onClick="remove(' . $value->id . ')"><i class="fas fa-trash-alt"></i></a>';
			$ops .= '<a class="btn btn-secondary text-dark" onClick="upload(' . $value->id . ')"><i class="fas fa-upload"></i></a>';
			$ops .= '</div>';
			$data['data'][$key] = array(
				$no,
				$value->title,
				$value->logo,
				$value->fb,
				$value->no_hp,
				$value->email,
				$value->ig,
				$value->tiktok,
				$value->alamat,
				$value->deskripsi,
				$value->footer,

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

			$data = $this->configwebModel->where('id', $id)->first();

			return $this->response->setJSON($data);
		} else {
			throw new \CodeIgniter\Exceptions\PageNotFoundException();
		}
	}

	public function upload($id)
	{
		$db = db_connect();
		helper(['form', 'url', 'filesystem']);
		if ($this->request->getFileMultiple('files')) {
			delete_files('uploads/logo/', true);
			foreach ($this->request->getFileMultiple('files') as $file) {
				$file->move('uploads/logo/');
				$data = [
					'logo' =>  $file->getClientName(),
				];

				$this->configwebModel->update($id, $data);
			}
		}
	}

	public function add()
	{
		$response = array();

		$fields['id'] = $this->request->getPost('id');
		$fields['title'] = $this->request->getPost('title');
		$fields['logo'] = $this->request->getPost('logo');
		$fields['fb'] = $this->request->getPost('fb');
		$fields['no_hp'] = $this->request->getPost('no_hp');
		$fields['email'] = $this->request->getPost('email');
		$fields['ig'] = $this->request->getPost('ig');
		$fields['tiktok'] = $this->request->getPost('tiktok');
		$fields['alamat'] = $this->request->getPost('alamat');
		$fields['deskripsi'] = $this->request->getPost('deskripsi');
		$fields['footer'] = $this->request->getPost('footer');


		$this->validation->setRules([
			'title' => ['label' => 'Title', 'rules' => 'required|min_length[0]'],
			'logo' => ['label' => 'Logo', 'rules' => 'permit_empty|min_length[0]'],
			'fb' => ['label' => 'Fb', 'rules' => 'permit_empty|min_length[0]'],
			'no_hp' => ['label' => 'No hp', 'rules' => 'permit_empty|min_length[0]'],
			'email' => ['label' => 'Email', 'rules' => 'permit_empty|min_length[0]'],
			'ig' => ['label' => 'Ig', 'rules' => 'permit_empty|min_length[0]'],
			'tiktok' => ['label' => 'Tiktok', 'rules' => 'permit_empty|min_length[0]'],
			'alamat' => ['label' => 'Alamat', 'rules' => 'permit_empty|min_length[0]'],
			'deskripsi' => ['label' => 'Deskripsi', 'rules' => 'permit_empty|min_length[0]'],
			'footer' => ['label' => 'Footer', 'rules' => 'permit_empty|min_length[0]'],

		]);

		if ($this->validation->run($fields) == FALSE) {

			$response['success'] = false;
			$response['messages'] = $this->validation->getErrors(); //Show Error in Input Form

		} else {

			if ($this->configwebModel->insert($fields)) {

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
		$fields['title'] = $this->request->getPost('title');
		$fields['logo'] = $this->request->getPost('logo');
		$fields['fb'] = $this->request->getPost('fb');
		$fields['no_hp'] = $this->request->getPost('no_hp');
		$fields['email'] = $this->request->getPost('email');
		$fields['ig'] = $this->request->getPost('ig');
		$fields['tiktok'] = $this->request->getPost('tiktok');
		$fields['alamat'] = $this->request->getPost('alamat');
		$fields['deskripsi'] = $this->request->getPost('deskripsi');
		$fields['footer'] = $this->request->getPost('footer');


		$this->validation->setRules([
			'title' => ['label' => 'Title', 'rules' => 'required|min_length[0]'],
			'logo' => ['label' => 'Logo', 'rules' => 'permit_empty|min_length[0]'],
			'fb' => ['label' => 'Fb', 'rules' => 'permit_empty|min_length[0]'],
			'no_hp' => ['label' => 'No hp', 'rules' => 'permit_empty|min_length[0]'],
			'email' => ['label' => 'Email', 'rules' => 'permit_empty|min_length[0]'],
			'ig' => ['label' => 'Ig', 'rules' => 'permit_empty|min_length[0]'],
			'tiktok' => ['label' => 'Tiktok', 'rules' => 'permit_empty|min_length[0]'],
			'alamat' => ['label' => 'Alamat', 'rules' => 'permit_empty|min_length[0]'],
			'deskripsi' => ['label' => 'Deskripsi', 'rules' => 'permit_empty|min_length[0]'],
			'footer' => ['label' => 'Footer', 'rules' => 'permit_empty|min_length[0]'],

		]);

		if ($this->validation->run($fields) == FALSE) {

			$response['success'] = false;
			$response['messages'] = $this->validation->getErrors(); //Show Error in Input Form

		} else {

			if ($this->configwebModel->update($fields['id'], $fields)) {

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

			if ($this->configwebModel->where('id', $id)->delete()) {

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
