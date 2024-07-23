<?php

namespace App\Controllers;

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

class Home extends BaseController
{
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

    public function index(): string
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
            'lokasi' => $this->lokasiModel->first()
        ];
        return view('menu/main',  $data);
    }
}
