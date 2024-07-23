<?php

namespace App\Models;

use CodeIgniter\Model;

class HubungikamiModel extends Model
{

    protected $table = 'hubungikami';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['nama', 'email', 'subject', 'phone', 'message'];
    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = true;
}
