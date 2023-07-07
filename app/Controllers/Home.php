<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'ReportIT',
            'page' => 'v_home',
        ];
        return view('v_template', $data);
    }
}
