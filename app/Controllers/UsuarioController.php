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
	public function todosUsuarios() {
		$UsuarioModel = new \App\Models\UsuarioModel();
		$registros = $UsuarioModel -> find();
		$data['usuarios'] = $registros;

		$request = service('request');
		$codusuario = $request->getPost('codUsu');
		if($codusuario) {
			$this->deletarUsuario($codusuario);
		}

		echo view('header');
		echo view('listaUsuario', $data);
		echo view('footer');
	}
	public function listaCodUsuario() {
		$request = service('request');
		$codusuario = $request->getPost('codUsu');
		$UsuarioModel = new \App\Models\UsuarioModel();
		$registros = $UsuarioModel->find($codusuario);
		
		$data['usuario'] = $registros;

		echo view('header');
		echo view('listaCodUsu', $data);
		echo view('footer');
	}
	public function alterarUsuario() {
	}

	public function deletarUsuario($codusuario) {
		if(is_null($codusuario)) {
			return redirect()->to(base_url('UsuarioController/todosUsuarios'));
		}
		$UsuarioModel = new \App\Models\UsuarioModel();
		if($UsuarioModel->delete($codusuario)) {
			return redirect()->to(base_url('UsuarioController/todosUsuarios'));
		} else {
			return redirect()->to(base_url('UsuarioController/todosUsuarios'));;
		}
		return redirect()->to(base_url('UsuarioController/todosUsuarios'));;

	}

}

?>