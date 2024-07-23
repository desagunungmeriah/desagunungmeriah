<?php

namespace App\Models;

use CodeIgniter\Model;

class ConfigwebModel extends Model
{

	protected $table = 'config_web';
	protected $primaryKey = 'id';
	protected $returnType = 'object';
	protected $useSoftDeletes = false;
	protected $allowedFields = ['title', 'logo', 'fb', 'no_hp', 'email', 'ig', 'tiktok', 'alamat', 'deskripsi', 'footer'];
	protected $useTimestamps = false;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $deletedField  = 'deleted_at';
	protected $validationRules    = [];
	protected $validationMessages = [];
	protected $skipValidation     = true;
}
