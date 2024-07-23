<?php

namespace App\Controllers;

use App\Models\AboutModel;
use App\Models\GambaranumumModel;
use App\Models\MisiModel;
use App\Models\SliderModel;
use App\Models\HubungikamiModel;
use App\Models\FotokegiatanModel;
use App\Models\BackgroundModel;
use App\Models\LokasiModel;
use App\Models\VisiModel;
use App\Models\DemografiModel;

class Hubungikami extends BaseController
{
    protected $sliderModel;
    protected $aboutModel;
    protected $visiModel;
    protected $misiModel;
    protected $gambaranumumModel;
    protected $fotokegiatanModel;
    protected $hubungikamimodel;
    protected $backgroundModel;
    protected $demografiModel;
    protected $lokasiModel;

    public function __construct()
    {
        $this->hubungikamimodel = new HubungikamiModel();

        $this->sliderModel = new SliderModel();
        $this->aboutModel = new AboutModel();
        $this->gambaranumumModel = new GambaranumumModel();
        $this->visiModel = new VisiModel();
        $this->misiModel = new MisiModel();
        $this->fotokegiatanModel = new FotokegiatanModel();
        $this->backgroundModel = new BackgroundModel();
        $this->lokasiModel = new LokasiModel();
        $this->demografiModel = new DemografiModel();
    }

    public function index(): string
    {
        $data = [
            'slider' => $this->sliderModel->select()->findAll(),
            'about' => $this->aboutModel->first(),
            'gu' => $this->gambaranumumModel->first(),
            'visi' => $this->visiModel->findAll(),
            'misi' => $this->misiModel->findAll(),
            'foto_kegiatan' => $this->fotokegiatanModel->findAll(),
            'demografi' => $this->demografiModel->findAll(),
            'background' => $this->backgroundModel->first(),
            'lokasi' => $this->lokasiModel->first(),
            'hubungi' => $this->hubungikamimodel->findAll(),
        ];
        return view('menu/hubungikami',  $data);
    }

    public function add()
    {
        $response = array();

        $fields['nama'] = $this->request->getPost('nama');
        $fields['email'] = $this->request->getPost('email');
        $fields['subject'] = $this->request->getPost('subject');
        $fields['phone'] = $this->request->getPost('phone');
        $fields['message'] = $this->request->getPost('message');

        var_dump($fields);

        if ($this->hubungikamimodel->insert($fields)) {
            $response['success'] = true;
            $response['messages'] = lang("App.insert-success");
            return redirect()->to('hubungikami');
        } else {
            $response['success'] = false;
            $response['messages'] = lang("App.insert-error");
        }

        return $this->response->setJSON($response);
    }
}
