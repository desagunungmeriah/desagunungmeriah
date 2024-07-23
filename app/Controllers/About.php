<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\AboutModel;

class About extends BaseController
{

	protected $aboutModel;
	protected $validation;

	public function __construct()
	{
		$this->aboutModel = new AboutModel();
		$this->validation =  \Config\Services::validation();
	}

	public function index()
	{

		$data = [
			'controller'    	=> ucwords('about'),
			'title'     		=> ucwords('Tentang Kami')
		];

		return view('about', $data);
	}

	public function getAll()
	{
		$response = $data['data'] = array();

		$result = $this->aboutModel->select()->findAll();
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
				$value->description,
				'<img src="' . base_url('uploads/about/' . $value->image) . '" class="img-fluid" width="100px">',
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
			$data = $this->aboutModel->where('id', $id)->first();
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
			// bandingkan dengan file yang ada di database
			$a = $this->aboutModel->where('id', $id)->first();

			foreach ($this->request->getFileMultiple('files') as $file) {
				if($file->getClientName() != $a->image) {
					unlink('uploads/about/' . $a->image);
				}

				$file->move('uploads/about/');

				$data = [
					'image' =>  $file->getClientName(),
				];

				$this->aboutModel->update($id, $data);
			}
		}
	}

	public function add()
	{
		$response = array();

		$fields['id'] = $this->request->getPost('id');
		$fields['title'] = $this->request->getPost('title');
		$fields['description'] = $this->request->getPost('description');
		$fields['image'] = $this->request->getPost('image');


		$this->validation->setRules([
			'title' => ['label' => 'Title', 'rules' => 'required|min_length[0]'],
			'description' => ['label' => 'Description', 'rules' => 'required|min_length[0]'],
			'image' => ['label' => 'Image', 'rules' => 'required|min_length[0]'],

		]);

		if ($this->validation->run($fields) == FALSE) {

			$response['success'] = false;
			$response['messages'] = $this->validation->getErrors(); //Show Error in Input Form

		} else {

			if ($this->aboutModel->insert($fields)) {

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
		$fields['description'] = $this->request->getPost('description');
		$fields['image'] = $this->request->getPost('image');


		$this->validation->setRules([
			'title' => ['label' => 'Title', 'rules' => 'required|min_length[0]'],
			'description' => ['label' => 'Description', 'rules' => 'required|min_length[0]'],
			'image' => ['label' => 'Image', 'rules' => 'required|min_length[0]'],

		]);

		if ($this->validation->run($fields) == FALSE) {

			$response['success'] = false;
			$response['messages'] = $this->validation->getErrors(); //Show Error in Input Form

		} else {

			if ($this->aboutModel->update($fields['id'], $fields)) {

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

			if ($this->aboutModel->where('id', $id)->delete()) {

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
