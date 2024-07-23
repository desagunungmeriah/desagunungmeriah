<?php

namespace App\Controllers;

use App\Controllers\BaseController;

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
use App\Models\LayananpendudukModel;

class LayananPenduduk extends BaseController
{

    protected $layananpenduduk;
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
        $this->layananpenduduk = new LayananpendudukModel();
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
            'controller'        => ucwords('layananpenduduk'),
            'title'             => ucwords('Layanan Penduduk')
        ];

        return view('layananpenduduk', $data);
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
            'layanan' => $this->layananpenduduk->findAll(),
        ];
        return view('menu/v_layananpenduduk', $data);
    }

    public function getAll()
    {
        $response = $data['data'] = array();

        $result = $this->layananpenduduk->select()->findAll();
        foreach ($result as $key => $value) {
            $ops = '<div class="btn-group text-white">';
            $ops .= '<a class="btn btn-dark" onClick="save(' . $value->id . ')"><i class="fas fa-pencil-alt"></i></a>';
            $ops .= '<a class="btn btn-secondary text-dark" onClick="remove(' . $value->id . ')"><i class="fas fa-trash-alt"></i></a>';
            $ops .= '</div>';
            $data['data'][$key] = array(
                $value->nama,
                $value->judul,
                $value->keterangan,
                $value->foto,

                $ops
            );
        }

        return $this->response->setJSON($data);
    }

    public function getOne()
    {
        $response = array();

        $id = $this->request->getPost('id');

        if ($this->validation->check($id, 'required|numeric')) {

            $data = $this->layananpenduduk->where('id', $id)->first();

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
        $fields['judul'] = $this->request->getPost('judul');
        $fields['keterangan'] = $this->request->getPost('keterangan');

        // Handle the file upload
        $foto = $this->request->getFile('foto');
        if ($foto) {
            $newName = $foto->getRandomName();
            $foto->move('uploads/layananpenduduk', $newName);
            $fields['foto'] = $newName;
        } else {
            $fields['foto'] = null; // or handle error appropriately
        }

        if ($this->layananpenduduk->insert($fields)) {
            $response['success'] = true;
            $response['messages'] = lang("App.insert-success");
        } else {
            $response['success'] = false;
            $response['messages'] = lang("App.insert-error");
        }

        return $this->response->setJSON($response);
    }

    public function edit()
    {
        $response = array();

        // Get form fields
        $fields['id'] = $this->request->getPost('id');
        $fields['nama'] = $this->request->getPost('nama');
        $fields['judul'] = $this->request->getPost('judul');
        $fields['keterangan'] = $this->request->getPost('keterangan');

        // Handle the file upload
        $foto = $this->request->getFile('foto');
        if ($foto) {
            $newName = $foto->getRandomName();
            $foto->move('uploads/layananpenduduk', $newName);
            $fields['foto'] = $newName;
        } else {
            $fields['foto'] = null;
        }

        if ($this->layananpenduduk->update($fields['id'], $fields)) {
            $response['success'] = true;
            $response['messages'] = lang("App.update-success");
        } else {
            $response['success'] = false;
            $response['messages'] = lang("App.update-error");
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
            $record = $this->layananpenduduk->find($id);

            if ($record) {
                // Delete the file from the server if it exists
                unlink('uploads/layananpenduduk/' . $record->foto);

                // Delete the record from the database
                if ($this->layananpenduduk->delete($id)) {
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
