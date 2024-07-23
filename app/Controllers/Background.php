<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\BackgroundModel;

class Background extends BaseController
{

	protected $backgroundModel;
	protected $validation;

	public function __construct()
	{
		$this->backgroundModel = new BackgroundModel();
		$this->validation =  \Config\Services::validation();
	}

	public function index()
	{

		$data = [
			'controller'    	=> ucwords('background'),
			'title'     		=> ucwords('background')
		];

		return view('background', $data);
	}

	public function getAll()
	{
		$response = $data['data'] = array();

		$result = $this->backgroundModel->select()->findAll();
		$no = 1;
		foreach ($result as $key => $value) {
			$ops = '<div class="btn-group text-white">';
			// $ops .= '<a class="btn btn-dark" onClick="save(' . $value->id . ')"><i class="fas fa-pencil-alt"></i></a>';
			//buat upload
			$ops .= '<a class="btn btn-secondary text-dark" onClick="upload(' . $value->id . ')"><i class="fas fa-upload"></i></a>';
			// $ops .= '<a class="btn btn-secondary text-dark" onClick="remove(' . $value->id . ')"><i class="fas fa-trash-alt"></i></a>';
			$ops .= '</div>';
			$data['data'][$key] = array(
				$no,
				'<img src="' . base_url('uploads/background/' . $value->bg_footer_demografi) . '" class="img-fluid" width="100px">',
				$ops
			);
			$no++;
		}

		return $this->response->setJSON($data);
	}

	public function upload($id)
	{
		$db = db_connect();
		helper(['form', 'url', 'filesystem']);
		if ($this->request->getFileMultiple('files')) {
			// bandingkan dengan file yang ada di database
			$slider = $this->backgroundModel->where('id', $id)->first();

			foreach ($this->request->getFileMultiple('files') as $file) {

				// if ($file->getClientName() != $slider->slider_img) {
				// 	// hapus file yang ada di folder uploads/slider
				// 	unlink('uploads/slider/' . $slider->slider_img);
				// }

				$file->move('uploads/background/');

				$data = [
					'bg_footer_demografi' =>  $file->getClientName(),
				];

				$this->backgroundModel->update($id, $data);
			}
		}
	}

	public function getOne()
	{
		$response = array();

		$id = $this->request->getPost('id');

		if ($this->validation->check($id, 'required|numeric')) {

			$data = $this->backgroundModel->where('id', $id)->first();

			return $this->response->setJSON($data);
		} else {
			throw new \CodeIgniter\Exceptions\PageNotFoundException();
		}
	}

	
	public function add()
	{
		$response = array();

		$fields['id'] = $this->request->getPost('id');
		$fields['bg_footer_demografi'] = $this->request->getPost('bg_footer_demografi');


		$this->validation->setRules([
			'bg_footer_demografi' => ['label' => 'Bg footer demografi', 'rules' => 'required|min_length[0]'],

		]);

		if ($this->validation->run($fields) == FALSE) {

			$response['success'] = false;
			$response['messages'] = $this->validation->getErrors(); //Show Error in Input Form

		} else {

			if ($this->backgroundModel->insert($fields)) {

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
		$fields['bg_footer_demografi'] = $this->request->getPost('bg_footer_demografi');


		$this->validation->setRules([
			'bg_footer_demografi' => ['label' => 'Bg footer demografi', 'rules' => 'required|min_length[0]'],

		]);

		if ($this->validation->run($fields) == FALSE) {

			$response['success'] = false;
			$response['messages'] = $this->validation->getErrors(); //Show Error in Input Form

		} else {

			if ($this->backgroundModel->update($fields['id'], $fields)) {

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

			if ($this->backgroundModel->where('id', $id)->delete()) {

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
