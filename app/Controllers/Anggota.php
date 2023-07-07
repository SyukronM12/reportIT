<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Anggota extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Dashboard',
            'page' => 'v_dashboard_anggota',
        ];
        return view('v_template_anggota', $data);
    }
}
