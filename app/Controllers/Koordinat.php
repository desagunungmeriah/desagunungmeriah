<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LokasiModel;

class Koordinat extends BaseController
{
    protected $lokasiModel;
    public function __construct()
    {
        $this->lokasiModel = new LokasiModel();
    }
    public function index()
    {
        $data  = [
            'lokasi' => $this->lokasiModel->first(),
        ];

        return view('koordinat', $data);
    }
}
