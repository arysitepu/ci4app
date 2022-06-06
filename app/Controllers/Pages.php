<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' =>'Home | Toko Ary & Indri',
            'test' => ['satu', 'dua', 'tiga'],
        ];
        
        
        return view('pages/home', $data);
        
    }

    public function about()
    {
        $data = [
            'title' =>'About | Toko Ary & Indri'
        ];
        
        return view('pages/about', $data);   
    }

    public function contact()
    {
        $data = [
            'title' => 'Contact kami',
            'alamat' => [

                [
                    'tipe' => 'rumah',
                    'alamat' => 'JL. Abc No.123',
                    'kota' => 'Bandung'
                ],


                [
                    'tipe' => 'Kantor',
                    'alamat' => 'JL. Setia Budi No.193',
                    'kota' => 'Bandung'
                ],

            ]
        ];

        return view('pages/contact', $data);
    }
}
