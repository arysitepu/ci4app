<?php

namespace App\Models;

use CodeIgniter\Model;

class PakaianModel extends Model
{
    protected $table = 'pakaian';
    protected $useTimestamp = true;
    protected $allowedFields = ['nama_pakaian', 'slug', 'harga', 'jenis_pakaian', 'sampul'];

    public function getPakaian($slug = false)
    {
        if($slug == false){
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }

}