<?php

namespace App\Controllers;

use App\Models\HubungikamiModel;


class Pesan extends BaseController
{
    protected $hubungikamimodel;

    public function __construct()
    {
        $this->hubungikamimodel = new HubungikamiModel();
    }
    public function index()
    {
        $data = [
            'controller' => ucwords('pesan'),
            'title' => ucwords('pesan')
        ];

        return view('pesan', $data);
    }
    public function getAll()
    {
        $response = $data['data'] = array();

        $result = $this->hubungikamimodel->select()->findAll();
        foreach ($result as $key => $value) {
            $data['data'][$key] = array(
                $value->nama,
                $value->email,
                $value->subject,
                $value->phone,
                $value->message,
            );
        }

        return $this->response->setJSON($data);
    }
}
