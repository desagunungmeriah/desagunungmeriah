<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\JeniskegiatanModel;

class Jeniskegiatan extends BaseController
{

	protected $jeniskegiatanModel;
	protected $validation;

	public function __construct()
	{
		$this->jeniskegiatanModel = new JeniskegiatanModel();
		$this->validation =  \Config\Services::validation();
	}

	public function index()
	{

		$data = [
			'controller'    	=> ucwords('jeniskegiatan'),
			'title'     		=> ucwords('jenis kegiatan')
		];

		return view('jeniskegiatan', $data);
	}

	public function getAll()
	{
		$response = $data['data'] = array();

		$result = $this->jeniskegiatanModel->select()->findAll();
		$no = 1;
		foreach ($result as $key => $value) {
			$ops = '<div class="btn-group text-white">';
			$ops .= '<a class="btn btn-dark" onClick="save(' . $value->id . ')"><i class="fas fa-pencil-alt"></i></a>';
			$ops .= '<a class="btn btn-secondary text-dark" onClick="remove(' . $value->id . ')"><i class="fas fa-trash-alt"></i></a>';
			$ops .= '<a class="btn btn-secondary text-dark" onClick="upload(' . $value->id . ')"><i class="fas fa-upload"></i></a>';
			$ops .= '</div>';
			$data['data'][$key] = array(
				$no,
				$value->jenis_kegiatan,
				$value->keterangan,
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

			$data = $this->jeniskegiatanModel->where('id', $id)->first();

			return $this->response->setJSON($data);
		} else {
			throw new \CodeIgniter\Exceptions\PageNotFoundException();
		}
	}

	public function add()
	{
		$response = array();

		$fields['id'] = $this->request->getPost('id');
		$fields['jenis_kegiatan'] = $this->request->getPost('jenis_kegiatan');
		$fields['keterangan'] = $this->request->getPost('keterangan');


		$this->validation->setRules([
			'jenis_kegiatan' => ['label' => 'Jenis kegiatan', 'rules' => 'required|min_length[0]'],
			'keterangan' => ['label' => 'Keterangan', 'rules' => 'permit_empty|min_length[0]'],

		]);

		if ($this->validation->run($fields) == FALSE) {

			$response['success'] = false;
			$response['messages'] = $this->validation->getErrors(); //Show Error in Input Form

		} else {

			if ($this->jeniskegiatanModel->insert($fields)) {

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
		$fields['jenis_kegiatan'] = $this->request->getPost('jenis_kegiatan');
		$fields['keterangan'] = $this->request->getPost('keterangan');


		$this->validation->setRules([
			'jenis_kegiatan' => ['label' => 'Jenis kegiatan', 'rules' => 'required|min_length[0]'],
			'keterangan' => ['label' => 'Keterangan', 'rules' => 'permit_empty|min_length[0]'],

		]);

		if ($this->validation->run($fields) == FALSE) {

			$response['success'] = false;
			$response['messages'] = $this->validation->getErrors(); //Show Error in Input Form

		} else {

			if ($this->jeniskegiatanModel->update($fields['id'], $fields)) {

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

		helper(['form', 'url', 'filesystem']);

		$id = $this->request->getPost('id');

		if (!$this->validation->check($id, 'required|numeric')) {

			throw new \CodeIgniter\Exceptions\PageNotFoundException();
		} else {

			if ($this->jeniskegiatanModel->where('id', $id)->delete()) {
				delete_files('uploads/fotokegiatan/' . $id, true);
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
