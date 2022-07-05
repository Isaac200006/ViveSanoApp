<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		if (!session()->get('userid')) {
			return redirect()->to(site_url('auth/index'));
		} else {
			return view('welcome_message');
		}
	}

	public function saludar($nombre, $x)
	{
		echo " Codeigniter os saluda tio.." . $nombre . ' x= ' . $x;
	}
}
