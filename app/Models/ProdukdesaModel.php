<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukdesaModel extends Model
{

	protected $table = 'produk_desa';
	protected $primaryKey = 'id';
	protected $returnType = 'object';
	protected $useSoftDeletes = false;
	protected $allowedFields = ['foto', 'nama', 'keterangan', 'deskripsi'];
	protected $useTimestamps = false;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $deletedField  = 'deleted_at';
	protected $validationRules    = [];
	protected $validationMessages = [];
	protected $skipValidation     = true;
}
