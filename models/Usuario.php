<?php
require_once __DIR__.'/Model.php';
	
class Usuario extends Model {
	
	public $id;
	public $nome;
	public $email;
	public $sexo;
	public $senha;
	public $emailNotificacao;
	public $fkTipoUsuario;
	public $fkUsuario;
	protected $conexao;
	protected static $tabela = "usuarios";

	public function Usuario() {
		parent::Model();
	}
	
	public function selecionarPorId($id) {
		parent::selecionarPorId($this, $id);
	}
	
	public function logar( $email, $senha ) {
		
		$lista = parent::listar($this,  'email = \''.$email.'\' AND senha =\''.md5($senha).'\'');
		
		return @$lista[0];
	}
	
	public function listar($condicao = '', $order = '', $limit = '') {
		return parent::listar($this, $condicao, $order, $limit);
	}
	
	public function salvar() {
		return parent::salvar($this);
	}
	
	public function verificaLogin( $email ) {
		return parent::listar($this, 'email = \''.$email.'\'') > 0 ? false : true;
	}
	
	public function excluir(){
		return parent::excluir($this);
	}
	
}
