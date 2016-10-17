<?php
require_once __DIR__.'/Model.php';
	
class Socio extends Model {
	
	public $id;
	public $nome;
	public $email;
	public $documento;
	protected $conexao;
	protected static $tabela = "socios";
	
	public function Socio() {
		parent::Model();
	}
	
	public function salvar() {
		return parent::salvar($this);
	}
	
	public function excluir() {
		parent::excluir($this);
	}
	
	public function listar($condicao = '', $order = '', $limit = '') {
		return parent::listar($this, $condicao, $order, $limit);
	}	

	public function verificaDocumento( $documento ) {
		return parent::listar($this, 'documento = \''.$documento.'\'') > 0 ? false : true;
	}

	public function selecionarPorId( $id ) {
		parent::selecionarPorId($this, $id);
	}

}
