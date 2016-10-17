<?php
require_once __DIR__.'/Model.php';
	
class Categoria extends Model {
	
	public $id;
	public $nome;
	public $fkUsuario;
	public $menu;
	public $ativar;
	public $descricao;
	public $equipe;
	protected $conexao;
	protected static $tabela = "categorias";
	
	public function Categoria() {
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

	public function selecionarPorId( $id ) {
		parent::selecionarPorId($this, $id);
	}

	public function listarSemParticipacao($participante) {

		$query = $this->conexao->query('SELECT C.id
										FROM categorias C
										WHERE C.id NOT IN (
											SELECT E.categoria 
											FROM equipes E
											JOIN equipes_participantes EP ON EP.equipe = E.id AND EP.excluido = 0
											WHERE EP.participante = '.$participante.' 
											GROUP BY E.categoria
										) AND C.equipe = 1 AND C.excluido = 0
										ORDER BY C.nome');

		$idsCategorias = $query->fetchAll(PDO::FETCH_ASSOC);
		$categorias = array();
		foreach ($idsCategorias as $idCategoria) {
			$categoria = new Categoria();
			$categoria->selecionarPorId($idCategoria['id']);
			$categorias[] = $categoria;
		}

		return $categorias;
	}

}
