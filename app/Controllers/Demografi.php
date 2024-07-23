<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\DemografiModel;

class Demografi extends BaseController
{

	protected $demografiModel;
	protected $validation;

	public function __construct()
	{
		$this->demografiModel = new DemografiModel();
		$this->validation =  \Config\Services::validation();
	}

	public function index()
	{

		$data = [
			'controller'    	=> ucwords('demografi'),
			'title'     		=> ucwords('demografi')
		];

		return view('demografi', $data);
	}

	public function getAll()
	{
		$response = $data['data'] = array();

		$result = $this->demografiModel->select()->findAll();
		$no = 1;
		foreach ($result as $key => $value) {
			$ops = '<div class="btn-group text-white">';
			$ops .= '<a class="btn btn-dark" onClick="save(' . $value->id . ')"><i class="fas fa-pencil-alt"></i></a>';
			$ops .= '<a class="btn btn-secondary text-dark" onClick="remove(' . $value->id . ')"><i class="fas fa-trash-alt"></i></a>';
			$ops .= '</div>';
			$data['data'][$key] = array(
				$no,
				$value->angka,
				$value->satuan,
				$value->label,

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

			$data = $this->demografiModel->where('id', $id)->first();

			return $this->response->setJSON($data);
		} else {
			throw new \CodeIgniter\Exceptions\PageNotFoundException();
		}
	}

	public function add()
	{
		$response = array();

		$fields['id'] = $this->request->getPost('id');
		$fields['angka'] = $this->request->getPost('angka');
		$fields['satuan'] = $this->request->getPost('satuan');
		$fields['label'] = $this->request->getPost('label');


		$this->validation->setRules([
			'angka' => ['label' => 'Angka', 'rules' => 'required|min_length[0]|max_length[200]'],
			'satuan' => ['label' => 'Satuan', 'rules' => 'min_length[0]|max_length[200]'],
			'label' => ['label' => 'Label', 'rules' => 'required|min_length[0]|max_length[200]'],

		]);

		if ($this->validation->run($fields) == FALSE) {

			$response['success'] = false;
			$response['messages'] = $this->validation->getErrors(); //Show Error in Input Form

		} else {

			if ($this->demografiModel->insert($fields)) {

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
		$fields['angka'] = $this->request->getPost('angka');
		$fields['satuan'] = $this->request->getPost('satuan');
		$fields['label'] = $this->request->getPost('label');


		$this->validation->setRules([
			'angka' => ['label' => 'Angka', 'rules' => 'required|min_length[0]|max_length[200]'],
			'satuan' => ['label' => 'Satuan', 'rules' => 'min_length[0]|max_length[200]'],
			'label' => ['label' => 'Label', 'rules' => 'required|min_length[0]|max_length[200]'],

		]);

		if ($this->validation->run($fields) == FALSE) {

			$response['success'] = false;
			$response['messages'] = $this->validation->getErrors(); //Show Error in Input Form

		} else {

			if ($this->demografiModel->update($fields['id'], $fields)) {

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

			if ($this->demografiModel->where('id', $id)->delete()) {

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
