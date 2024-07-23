<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BeritaModel;
use App\Models\DemografiModel;

use App\Models\AboutModel;
use App\Models\GambaranumumModel;
use App\Models\MisiModel;
use App\Models\SliderModel;
use App\Models\JeniskegiatanModel;
use App\Models\FotokegiatanModel;
use App\Models\BackgroundModel;
use App\Models\LokasiModel;
use App\Models\VisiModel;

class Berita extends BaseController
{
    protected $validation;
    protected $beritaModel;
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
        $this->demografiModel = new DemografiModel();
        $this->beritaModel = new BeritaModel();
        $this->validation = \Config\Services::validation();

        $this->sliderModel = new SliderModel();
        $this->aboutModel = new AboutModel();
        $this->gambaranumumModel = new GambaranumumModel();
        $this->visiModel = new VisiModel();
        $this->misiModel = new MisiModel();
        $this->jeniskegiatanModel = new JeniskegiatanModel();
        $this->fotokegiatanModel = new FotokegiatanModel();
        $this->backgroundModel = new BackgroundModel();
        $this->lokasiModel = new LokasiModel();
    }

    public function index()
    {
        $data = [
            'controller' => ucwords('berita'),
            'title' => ucwords('berita')
        ];

        return view('berita', $data);
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
            'berita' => $this->beritaModel->findAll(),
        ];
        return view('menu/informasi', $data);
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
            'berita' => $this->beritaModel->find($id),
        ];

        if (!$data) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Berita dengan ID $id tidak ditemukan.");
        }
        return view('menu/detailinformasi', $data);
    }

    public function getAll()
    {
        $response = $data['data'] = array();

        $result = $this->beritaModel->select()->findAll();
        $no = 1;
        foreach ($result as $key => $value) {
            $ops = '<div class="btn-group text-white">';
            $ops .= '<a class="btn btn-dark" onClick="save(' . $value->id . ')"><i class="fas fa-pencil-alt"></i></a>';
            $ops .= '<a class="btn btn-secondary text-dark" onClick="remove(' . $value->id . ')"><i class="fas fa-trash-alt"></i></a>';
            $ops .= '</div>';
            $data['data'][$key] = array(
                $value->judul,
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
            $data = $this->beritaModel->where('id', $id)->first();
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
        $fields['judul'] = $this->request->getPost('judul');
        $fields['keterangan'] = $this->request->getPost('keterangan');
        $fields['tanggal'] = date('Y-m-d');

        // Handle the file upload
        $foto = $this->request->getFile('foto');
        if ($foto) {
            $newName = $foto->getRandomName();
            $foto->move('uploads/fotoberita', $newName);
            $fields['foto'] = $newName;
        } else {
            $fields['foto'] = null; // or handle error appropriately
        }

        // Set validation rules
        $this->validation->setRules([
            'judul' => 'required',
            'keterangan' => 'required',
        ]);

        if ($this->validation->run($fields) == FALSE) {
            $response['success'] = false;
            $response['messages'] = $this->validation->getErrors();
        } else {
            if ($this->beritaModel->insert($fields)) {
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
        $fields['keterangan'] = $this->request->getPost('keterangan');

        $foto = $this->request->getFile('foto');
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $newName = $foto->getRandomName();
            $foto->move('uploads/fotoberita', $newName);
            $fields['foto'] = $newName;
        } else {
            $fields['foto'] = $this->request->getPost('foto');
        }

        $this->validation->setRules([
            'judul' => 'required|max_length[200]',
            'keterangan' => 'required',
        ]);

        if ($this->validation->run($fields) == FALSE) {
            $response['success'] = false;
            $response['messages'] = $this->validation->getErrors();
        } else {
            if ($this->beritaModel->update($fields['id'], $fields)) {
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
            if ($this->beritaModel->where('id', $id)->delete()) {
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
