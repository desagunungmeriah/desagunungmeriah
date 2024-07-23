<?php
namespace App\Models;
use CodeIgniter\Model;

class JeniskegiatanModel extends Model {
    
	protected $table = 'jenis_kegiatan';
	protected $primaryKey = 'id';
	protected $returnType = 'object';
	protected $useSoftDeletes = false;
	protected $allowedFields = ['jenis_kegiatan', 'keterangan'];
	protected $useTimestamps = false;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $deletedField  = 'deleted_at';
	protected $validationRules    = [];
	protected $validationMessages = [];
	protected $skipValidation     = true;    
	
}