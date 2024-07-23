<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\SliderModel;

class Slider extends BaseController
{

	protected $sliderModel;
	protected $validation;

	public function __construct()
	{
		$this->sliderModel = new SliderModel();
		$this->validation =  \Config\Services::validation();
	}

	public function index()
	{

		$data = [
			'controller'    	=> ucwords('slider'),
			'title'     		=> ucwords('slider')
		];

		return view('slider', $data);
	}

	public function getAll()
	{
		$response = $data['data'] = array();

		$result = $this->sliderModel->select()->findAll();
		$no = 1;
		foreach ($result as $key => $value) {
			$ops = '<div class="btn-group text-white">';
			$ops .= '<a class="btn btn-dark" onClick="save(' . $value->id . ')"><i class="fas fa-pencil-alt"></i></a>';
			$ops .= '<a class="btn btn-secondary text-dark" onClick="remove(' . $value->id . ')"><i class="fas fa-trash-alt"></i></a>';
			$ops .= '<a class="btn btn-secondary text-dark" onClick="upload(' . $value->id . ')"><i class="fas fa-upload"></i></a>';
			$ops .= '</div>';
			$data['data'][$key] = array(
				$no,
				$value->judul,
				'<img src="' . base_url('uploads/slider/' . $value->slider_img) . '" class="img-fluid" width="100px">',
				$value->redirect,
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

			$data = $this->sliderModel->where('id', $id)->first();

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
			$slider = $this->sliderModel->where('id', $id)->first();

			foreach ($this->request->getFileMultiple('files') as $file) {

				if ($file->getClientName() != $slider->slider_img) {
					// hapus file yang ada di folder uploads/slider
					unlink('uploads/slider/' . $slider->slider_img);
				}

				$file->move('uploads/slider/');

				$data = [
					'slider_img' =>  $file->getClientName(),
				];

				$this->sliderModel->update($id, $data);
			}
		}
	}

	public function add()
	{
		$response = array();

		$fields['id'] = $this->request->getPost('id');
		$fields['judul'] = $this->request->getPost('judul');
		$fields['slider_img'] = $this->request->getPost('slider_img');
		$fields['redirect'] = $this->request->getPost('redirect');


		$this->validation->setRules([
			'judul' => ['label' => 'Judul', 'rules' => 'required|min_length[0]|max_length[200]'],
			'slider_img' => ['label' => 'Gambar Slider', 'rules' => 'required|min_length[0]|max_length[200]'],
			'redirect' => ['label' => 'Redirect', 'rules' => 'required|min_length[0]|max_length[200]'],

		]);

		if ($this->validation->run($fields) == FALSE) {

			$response['success'] = false;
			$response['messages'] = $this->validation->getErrors(); //Show Error in Input Form

		} else {

			if ($this->sliderModel->insert($fields)) {

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
		$fields['judul'] = $this->request->getPost('judul');
		$fields['slider_img'] = $this->request->getPost('slider_img');
		$fields['redirect'] = $this->request->getPost('redirect');


		$this->validation->setRules([
			'judul' => ['label' => 'Judul', 'rules' => 'required|min_length[0]|max_length[200]'],
			'slider_img' => ['label' => 'Gambar Slider', 'rules' => 'required|min_length[0]|max_length[200]'],
			'redirect' => ['label' => 'Redirect', 'rules' => 'required|min_length[0]|max_length[200]'],

		]);

		if ($this->validation->run($fields) == FALSE) {

			$response['success'] = false;
			$response['messages'] = $this->validation->getErrors(); //Show Error in Input Form

		} else {

			if ($this->sliderModel->update($fields['id'], $fields)) {

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

			if ($this->sliderModel->where('id', $id)->delete()) {

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
