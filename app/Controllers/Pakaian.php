<?php

namespace App\Controllers;

use App\Models\PakaianModel;

class Pakaian extends BaseController
{
    protected $pakaianModel;

    public function __construct()
    {
        $this->pakaianModel = new PakaianModel();
    }

    public function index()
    {
        // $pakaian = $this->pakaianModel->findAll();

        $data = [
            'title' => 'Daftar Pakaian',
            'pakaian' => $this->pakaianModel->getPakaian()
        ];
        return view ('pakaian/index', $data);
    }

    public function detail($slug)
    {
        
        $data = [
            'title' => 'Detail Pakaian',
            'pakaian' =>  $this->pakaianModel->getPakaian($slug)
        ];

        //jika pakaian tidak ada di table 
        if(empty($data['pakaian'])){
            throw new \CodeIgniter\Exceptions\PageNotFoundException('nama pakaian'.$slug.'tidak ditemukan.');
        }

        return view('pakaian/detail', $data);
    }

    public function create()
    {
        // session();
        $data = [
            'title' => 'Form Tambah Data Pakaian',
            'validation' => \Config\Services::validation()
        ];

        return view('pakaian/create', $data);
    }

    public function save()
    {
        //validasi input

        if(!$this->validate([
            'nama_pakaian' =>[
                'rules' => 'required|is_unique[pakaian.nama_pakaian]',
                'errors' => [
                    'required' => '{field}  harus diisi.',
                    'is_unique' => '{field} sudah terdaftar'
                ]
            ],
            
        ])){

            $validation = \Config\Services::validation();
            

            return redirect()->to('Pakaian/create')->withInput()->with('validation', $validation);
        }

        $slug = url_title($this->request->getVar('nama_pakaian'), '-', true);
        $this->pakaianModel->save([
            'nama_pakaian' => $this->request->getVar('nama_pakaian'),
            'slug' => $slug,
            'harga' => $this->request->getVar('harga'),
            'jenis_pakaian' => $this->request->getVar('jenis_pakaian'),
            'sampul' => $this->request->getVar('sampul')

        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahakan');

        return redirect()->to('/pakaian');  
    }

    public function delete($id)
    {
        $this->pakaianModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to('/pakaian');
    }

    public function edit($slug)
    {
          // session();
          $data = [
            'title' => 'Form Ubah Data Pakaian',
            'validation' => \Config\Services::validation(),
            'pakaian' => $this->pakaianModel->getPakaian($slug)
        ];

        return view('pakaian/edit', $data);
    }

    public function update($id)
    {
        //cek nama pakaian
        $pakaianLama = $this->pakaianModel->getPakaian($this->request->getVar('slug'));
        if($pakaianLama['nama_pakaian'] == $this->request->getVar('nama_pakaian')){
            $rule_pakaian = 'required';
        }else{
            $rule_pakaian = 'required|is_unique[pakaian.nama_pakaian]';
        }
        //validasi input

        if(!$this->validate([
            'nama_pakaian' =>[
                'rules' => $rule_pakaian,
                'errors' => [
                    'required' => '{field}  harus diisi.',
                    'is_unique' => '{field} sudah terdaftar'
                ]
            ],
            
        ])){

            $validation = \Config\Services::validation();
            

            return redirect()->to('Pakaian/edit')->withInput()->with('validation', $validation);
        }

        $slug = url_title($this->request->getVar('nama_pakaian'), '-', true);
        $this->pakaianModel->save([
            'id' => $id,
            'nama_pakaian' => $this->request->getVar('nama_pakaian'),
            'slug' => $slug,
            'harga' => $this->request->getVar('harga'),
            'jenis_pakaian' => $this->request->getVar('jenis_pakaian'),
            'sampul' => $this->request->getVar('sampul')

        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Diubah');

        return redirect()->to('/pakaian');  
    }
}