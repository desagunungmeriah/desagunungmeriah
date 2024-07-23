<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\PerangkatdesaModel;

// menu
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

class Perangkatdesa extends BaseController
{

	protected $perangkatdesaModel;
	protected $validation;

	// menu
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
		$this->perangkatdesaModel = new PerangkatdesaModel();
		$this->validation =  \Config\Services::validation();

		// menu
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
			'controller'    	=> ucwords('perangkatdesa'),
			'title'     		=> ucwords('perangkat desa')
		];

		return view('perangkatdesa', $data);
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
			'perangkat' => $this->perangkatdesaModel->findAll(),
		];
		return view('menu/pemerintah', $data);
	}

	public function getAll()
	{
		$response = $data['data'] = array();

		$result = $this->perangkatdesaModel->select()->findAll();
		$no = 1;
		foreach ($result as $key => $value) {
			$ops = '<div class="btn-group text-white">';
			$ops .= '<a class="btn btn-dark" onClick="save(' . $value->id . ')"><i class="fas fa-pencil-alt"></i></a>';
			$ops .= '<a class="btn btn-secondary text-dark" onClick="remove(' . $value->id . ')"><i class="fas fa-trash-alt"></i></a>';
			$ops .= '</div>';
			$data['data'][$key] = array(
				$no,
				$value->nama,
				$value->jabatan,
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

			$data = $this->perangkatdesaModel->where('id', $id)->first();

			return $this->response->setJSON($data);
		} else {
			throw new \CodeIgniter\Exceptions\PageNotFoundException();
		}
	}

	public function add()
	{
		$response = array();

		// Get form fields
		$fields['id'] = $this->request->getPost('id');
		$fields['nama'] = $this->request->getPost('nama');
		$fields['jabatan'] = $this->request->getPost('jabatan');

		// Handle the file upload
		$foto = $this->request->getFile('foto');
		if ($foto) {
			$newName = $foto->getRandomName();
			$foto->move('uploads/fotoperangkatdesa', $newName);
			$fields['foto'] = $newName;
		} else {
			$fields['foto'] = null; // or handle error appropriately
		}

		// Set validation rules
		$this->validation->setRules([
			'nama' => ['label' => 'Nama', 'rules' => 'required|min_length[1]|max_length[100]'],
			'jabatan' => ['label' => 'Jabatan', 'rules' => 'required|min_length[1]|max_length[100]'],
		]);

		if ($this->validation->run($fields) == FALSE) {
			$response['success'] = false;
			$response['messages'] = $this->validation->getErrors(); // Show error in input form
		} else {
			if ($this->perangkatdesaModel->insert($fields)) {
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

		// Get form fields
		$fields['id'] = $this->request->getPost('id');
		$fields['nama'] = $this->request->getPost('nama');
		$fields['jabatan'] = $this->request->getPost('jabatan');

		// Handle the file upload
		$foto = $this->request->getFile('foto');
		if ($foto) {
			$newName = $foto->getRandomName();
			$foto->move('uploads/fotoperangkatdesa', $newName);
			$fields['foto'] = $newName;
		} else {
			$fields['foto'] = null; // or handle error appropriately
		}

		// Set validation rules
		$this->validation->setRules([
			'nama' => ['label' => 'Nama', 'rules' => 'required|min_length[1]|max_length[100]'],
			'jabatan' => ['label' => 'Jabatan', 'rules' => 'required|min_length[1]|max_length[100]'],
		]);

		if ($this->validation->run($fields) == FALSE) {
			$response['success'] = false;
			$response['messages'] = $this->validation->getErrors(); // Show error in input form
		} else {
			if ($this->perangkatdesaModel->update($fields['id'], $fields)) {
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
			// Retrieve the record to get the file name
			$record = $this->perangkatdesaModel->find($id);

			if ($record) {
				// Delete the file from the server if it exists
				unlink('uploads/fotoperangkatdesa/' . $record->foto);

				// Delete the record from the database
				if ($this->perangkatdesaModel->delete($id)) {
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
