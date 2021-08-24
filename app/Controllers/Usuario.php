<?php

namespace App\Controllers;

class Usuario extends BaseController {
	public function index()
	{
		echo view('header');
		echo view('cadUsuario');
		echo view('footer');
	}

	public function inserirUsuario()
	{
		$data['msg'] = '';
		$request = service('request');
		if($request -> getMethod() === 'post') {
			$UsuarioModelo = new \App\Models\UsuarioModel();
			$UsuarioModelo->set('emailusu', $request->getPost('emailusu'));
			$UsuarioModelo->set('senhausu', $request->getPost('senhausu'));

			if($UsuarioModelo->insert()) {
				$data['msg'] = 'Informações cadastradas com sucesso';
			}
			else {
				$data['msg'] = 'Falha ao cadastrar as Informações';
			}
		}
		echo view('header');
		echo view('cadUsuario', $data);
		echo view('footer');
	}
}

?>