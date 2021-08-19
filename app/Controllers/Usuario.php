<?php

namespace App\Controllers;

class Usuario extends BaseController {
	public function index()
	{
		echo view('header');
		echo view('cadUsuario');
		echo view('footer');
	}
}
