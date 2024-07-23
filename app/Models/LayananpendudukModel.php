<?php

namespace App\Models;

use CodeIgniter\Model;

class LayananpendudukModel extends Model
{

    protected $table = 'layanan_penduduk';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['nama', 'judul', 'foto', 'keterangan'];
    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = true;
}
