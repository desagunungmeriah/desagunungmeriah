<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\FotokegiatanModel;

use App\Models\JeniskegiatanModel;

class Fotokegiatan extends BaseController
{

	protected $fotokegiatanModel;
	protected $jeniskegiatanModel;
	protected $validation;

	public function __construct()
	{
		$this->fotokegiatanModel = new FotokegiatanModel();
		$this->jeniskegiatanModel = new JeniskegiatanModel();
		$this->validation =  \Config\Services::validation();
	}

	public function index()
	{

		$data = [
			'controller'    	=> ucwords('fotokegiatan'),
			'title'     		=> ucwords('foto kegiatan'),
			'jenis_kegiatan'	=> $this->jeniskegiatanModel->findAll()
		];

		return view('fotokegiatan', $data);
	}

	public function getAll()
	{
		$response = $data['data'] = array();

		$result = $this->fotokegiatanModel->select('foto_kegiatan.*,jenis_kegiatan.jenis_kegiatan')
			->join('jenis_kegiatan', 'jenis_kegiatan.id = foto_kegiatan.jenis_id')
			->findAll();
		$no = 1;
		foreach ($result as $key => $value) {
			$ops = '<div class="btn-group text-white">';
			$ops .= '<a class="btn btn-dark" onClick="save(' . $value->id . ')"><i class="fas fa-pencil-alt"></i></a>';
			$ops .= '<a class="btn btn-secondary text-dark" onClick="remove(' . $value->id . ')"><i class="fas fa-trash-alt"></i></a>';


			$ops .= '</div>';
			$data['data'][$key] = array(
				$no,
				$value->jenis_kegiatan,
				$value->foto,
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

			$data = $this->fotokegiatanModel->where('id', $id)->first();

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
			foreach ($this->request->getFileMultiple('files') as $file) {
				$file->move('uploads/fotokegiatan/' . $id);
				$data = [
					'jenis_id' => $id,
					'foto' =>  $file->getClientName(),
				];

				$this->fotokegiatanModel->insert($data);
			}
		}
	}



	public function remove()
	{
		$response = array();

		$id = $this->request->getPost('id');

		if (!$this->validation->check($id, 'required|numeric')) {

			throw new \CodeIgniter\Exceptions\PageNotFoundException();
		} else {

			if ($this->fotokegiatanModel->where('id', $id)->delete()) {

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
