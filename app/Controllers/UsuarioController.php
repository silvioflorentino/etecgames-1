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
			$UsuarioModelo->set('emailUsu', $request->getPost('emailusu'));
			
			$opcao = ['cost' => 8];
			$senhacrip = password_hash($request->getPost('senhausu'), PASSWORD_BCRYPT, $opcao);

			$UsuarioModelo->set('SenhaUsu', $senhacrip);

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
			return redirect()->to(base_url('UsuarioController/todosUsuarios'));
		}
		
		$codUsuAlterar = $request->getPost('codUsuAlterar');
		if($codUsuAlterar) {
			
			$this->alterarUsuario($codUsuAlterar);
			return redirect()->to(base_url('UsuarioController/todosUsuarios'));
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
	public function alterarUsuario($codUsuAlterar=null) {
		if(is_null($codUsuAlterar)) {
			return redirect()->to(base_url('UsuarioController/todosUsuarios'));
		}
		$request = service('request');
		$emailUsu = $request->getPost('emailUsu');

		$UsuarioModel = new \App\Models\UsuarioModel();
		$registros = $UsuarioModel->find($codUsuAlterar);
	
		if($codUsuAlterar) {
			$registros->emailUsu = $emailUsu;

			$getSenha = $request->getPost('senhaUsu');
			if(isset($getSenha) && $getSenha != null) {
				$opcao = ['cost' => 8];
				$senhaUsu = password_hash($getSenha, PASSWORD_BCRYPT, $opcao);
				$registros->SenhaUsu = $senhaUsu;
			}

			if($UsuarioModel->update($codUsuAlterar, $registros)) {
				return redirect()->to(base_url('UsuarioController/todosUsuarios'));
			} else {
				return redirect()->to(base_url('UsuarioController/todosUsuarios'));
			}
		}
	}

	public function deletarUsuario($codusuario) {
		if(is_null($codusuario)) {
			return redirect()->to(base_url('UsuarioController/todosUsuarios'));
		}
		$UsuarioModel = new \App\Models\UsuarioModel();
		if($UsuarioModel->delete($codusuario)) {
			return redirect()->to(base_url('UsuarioController/todosUsuarios'));
		} else {
			return redirect()->to(base_url('UsuarioController/todosUsuarios'));
		}
	}

}

?>