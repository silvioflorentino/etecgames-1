<?php

namespace App\Controllers;

class UsuarioController extends BaseController {
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
			
			$opcao = ['cost' => 8];
			$senhacrip = password_hash($request->getPost('senhausu'), PASSWORD_BCRYPT, $opcao);

			$UsuarioModelo->set('senhausu', $senhacrip);

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