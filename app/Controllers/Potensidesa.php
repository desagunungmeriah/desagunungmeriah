<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PotensidesaModel;

// 
use App\Models\AboutModel;
use App\Models\GambaranumumModel;
use App\Models\MisiModel;
use App\Models\SliderModel;
use App\Models\JeniskegiatanModel;
use App\Models\FotokegiatanModel;
use App\Models\BackgroundModel;
use App\Models\LokasiModel;
use App\Models\VisiModel;
use App\Models\DemografiModel;


class Potensidesa extends BaseController
{

	protected $potensidesaModel;
	protected $validation;
	// 
	protected $sliderModel;
	protected $aboutModel;
	protected $visiModel;
	protected $misiModel;
	protected $gambaranumumModel;
	protected $fotokegiatanModel;
	protected $jeniskegiatanModel;
	protected $backgroundModel;
	protected $demografiModel;
	protected $lokasiModel;

	public function __construct()
	{
		$this->potensidesaModel = new PotensidesaModel();
		$this->validation =  \Config\Services::validation();

		$this->sliderModel = new SliderModel();
		$this->aboutModel = new AboutModel();
		$this->gambaranumumModel = new GambaranumumModel();
		$this->visiModel = new VisiModel();
		$this->misiModel = new MisiModel();
		$this->jeniskegiatanModel = new JeniskegiatanModel();
		$this->fotokegiatanModel = new FotokegiatanModel();
		$this->backgroundModel = new BackgroundModel();
		$this->lokasiModel = new LokasiModel();
		$this->demografiModel = new DemografiModel();
	}

	public function index()
	{

		$data = [
			'controller'    	=> ucwords('potensidesa'),
			'title'     		=> ucwords('potensi desa')
		];

		return view('potensidesa', $data);
	}

	public function indexMenu()
	{
		$data = [
			'slider' => $this->sliderModel->select()->findAll(),
			'about' => $this->aboutModel->first(),
			'gu' => $this->gambaranumumModel->first(),
			'visi' => $this->visiModel->findAll(),
			'misi' => $this->misiModel->findAll(),
			'jenis_kegiatan' => $this->jeniskegiatanModel->findAll(),
			'foto_kegiatan' => $this->fotokegiatanModel->findAll(),
			'demografi' => $this->demografiModel->findAll(),
			'background' => $this->backgroundModel->first(),
			'lokasi' => $this->lokasiModel->first(),
			'potensi' => $this->potensidesaModel->findAll(),
		];
		return view('menu/v_potensidesa', $data);
	}
	public function indexMenuDetail($id)
	{
		$data = [
			'slider' => $this->sliderModel->select()->findAll(),
			'about' => $this->aboutModel->first(),
			'gu' => $this->gambaranumumModel->first(),
			'visi' => $this->visiModel->findAll(),
			'misi' => $this->misiModel->findAll(),
			'jenis_kegiatan' => $this->jeniskegiatanModel->findAll(),
			'foto_kegiatan' => $this->fotokegiatanModel->findAll(),
			'demografi' => $this->demografiModel->findAll(),
			'background' => $this->backgroundModel->first(),
			'lokasi' => $this->lokasiModel->first(),
			'potensi' => $this->potensidesaModel->find($id),
		];
		return view('menu/detailpotensi', $data);
	}

	public function getAll()
	{
		$response = $data['data'] = array();

		$result = $this->potensidesaModel->select()->findAll();
		$no = 1;
		foreach ($result as $key => $value) {
			$ops = '<div class="btn-group text-white">';
			$ops .= '<a class="btn btn-dark" onClick="save(' . $value->id . ')"><i class="fas fa-pencil-alt"></i></a>';
			$ops .= '<a class="btn btn-secondary text-dark" onClick="remove(' . $value->id . ')"><i class="fas fa-trash-alt"></i></a>';
			$ops .= '</div>';
			$data['data'][$key] = array(
				$value->nama,
				$value->keterangan,
				$value->tanggal,
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

			$data = $this->potensidesaModel->where('id', $id)->first();

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
		$fields['keterangan'] = $this->request->getPost('keterangan');
		$fields['tanggal'] = date('Y-m-d');

		var_dump($fields);

		// File Upload Handling
		$foto = $this->request->getFile('foto');
		if ($foto) {
			$newName = $foto->getRandomName();
			$foto->move('uploads/fotopotensidesa', $newName);
			$fields['foto'] = $newName;
		} else {
			$fields['foto'] = null;
		}

		// Validation Rules
		$this->validation->setRules([
			'nama' => 'required',
			'keterangan' => 'required',
		]);

		if ($this->validation->run($fields)) {
			// Insert to Database
			if ($this->potensidesaModel->insert($fields)) {
				$response['success'] = true;
				$response['messages'] = lang("App.insert-success");
			} else {
				$response['success'] = false;
				$response['messages'] = lang("App.insert-error");
			}
		} else {
			// Validation Errors
			$response['success'] = false;
			$response['messages'] = $this->validation->getErrors();
		}

		return $this->response->setJSON($response);
	}


	public function edit()
	{
		$response = array();

		$fields['id'] = $this->request->getPost('id');
		$fields['nama'] = $this->request->getPost('nama');
		$fields['keterangan'] = $this->request->getPost('keterangan');

		$foto = $this->request->getFile('foto');
		if ($foto && $foto->isValid() && !$foto->hasMoved()) {
			$newName = $foto->getRandomName();
			$foto->move('uploads/fotopotensidesa', $newName);
			$fields['foto'] = $newName;
		} else {
			$fields['foto'] = $this->request->getPost('foto');
		}

		// Validation Rules
		$this->validation->setRules([
			'nama' => 'required',
			'keterangan' => 'required',
		]);

		if ($this->validation->run($fields)) {
			// Update in Database
			if ($this->potensidesaModel->update($fields['id'], $fields)) {
				$response['success'] = true;
				$response['messages'] = lang("App.update-success");
			} else {
				$response['success'] = false;
				$response['messages'] = lang("App.update-error");
			}
		} else {
			// Validation Errors
			$response['success'] = false;
			$response['messages'] = $this->validation->getErrors();
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
			// Retrieve the record to get the file name
			$record = $this->potensidesaModel->find($id);

			if ($record) {
				// Delete the file from the server if it exists
				unlink('uploads/fotopotensidesa/' . $record->foto);

				// Delete the record from the database
				if ($this->potensidesaModel->delete($id)) {
					$response['success'] = true;
					$response['messages'] = lang("App.delete-success");
				} else {
					$response['success'] = false;
					$response['messages'] = lang("App.delete-error");
				}
			} else {
				$response['success'] = false;
				$response['messages'] = lang("App.record-not-found");
			}
		}


		return $this->response->setJSON($response);
	}
}
