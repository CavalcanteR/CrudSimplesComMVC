<?php
require_once __DIR__.'/Controller.php';
require_once __DIR__.'/../models/Usuario.php';
require_once __DIR__.'/../models/TipoUsuario.php';
require_once __DIR__.'/../models/ContaBancaria.php';

class UsuarioController extends Controller {
	
	private static $viewController = "usuario";
	
	public static function adicionar() {
		
		$tipoUsuario = new TipoUsuario();
		$tiposUsuarios = $tipoUsuario->listar();
		
		if(!empty($_POST)) {
		
			$usuario = new Usuario();
			$usuario->nome = $_POST['nome'];
			$usuario->email = $_POST['email'];
			if( !$usuario->verificaLogin($_POST['email']) ) {
				echo "<script>alert('O Login já existe!'); history.back(-1);</script>";
			}
			$usuario->sexo = $_POST['sexo'];
			$usuario->senha = md5($_POST['senha']);
			$usuario->fkTipoUsuario = $_POST['fkTipoUsuario'];
			$usuario->fkUsuario = $_SESSION['auth']['id'];
			$usuario->salvar();
			self::redirecionar(Configuracao::$baseUrl.self::$viewController.'/listar'.Configuracao::$extensaoPadrao);
		}
		
		self::$variaveis = array('tiposUsuarios' => $tiposUsuarios);
		self::$corpo = "adicionar";
		self::renderizar(self::$viewController);
		
	}
	
	public static function editar() {
		
		$usuario = new Usuario();
		$id = !empty($_GET['id']) ? $_GET['id'] : $_SESSION['auth']['id'];
		$usuario->selecionarPorId($id);
		if(!empty($_POST)) {
		
			$usuario->nome = $_POST['nome'];
			$usuario->email = $_POST['email'];
			$usuario->sexo = $_POST['sexo'];
			if( !empty($_POST['senha']) ) $usuario->senha = md5($_POST['senha']);
			$usuario->fkTipoUsuario = $_POST['fkTipoUsuario'];
			$usuario->salvar();
			self::redirecionar(Configuracao::$baseUrl);
		}
		
		$tipoUsuario = new TipoUsuario();
		$tiposUsuario = $tipoUsuario->listar();
		
		self::$variaveis = array('usuario' => $usuario, 'tiposUsuario' => $tiposUsuario);
		self::$corpo = "editar";
		self::renderizar(self::$viewController);
		
	}
	
	public static function listar() {
	
		$usuario = new Usuario();
		$usuario->selecionarPorId($_SESSION['auth']['id']);

		$condicao = null;
		if( !empty($usuario->fkUsuario) ) {
			$usuarioPai = new Usuario();
			$usuarioPai->selecionarPorId($usuario->fkUsuario);
			if( !empty($usuarioPai->fkUsuario) ) {
				$usuarios = $usuario->listar('( fkUsuario = '.$usuario->fkUsuario.' OR id = '.$usuarioPai->id.')');	
			} else {
				$usuarios = $usuario->listar('( fkUsuario = '.$usuario->id.' OR id = '.$usuario->id.')');
			}
			$listUsers = array();
			foreach( $usuarios as $usu ) {
				if( !empty($usu->fkUsuario) ) {
					$listUsers[] = $usu->id;
				}
			}

			$condicao = " id IN (".implode(",", $listUsers).") ";
		}

		$listaDeUsuarios = $usuario->listar($condicao);
		
		self::$variaveis = array('listaDeUsuarios' => $listaDeUsuarios);
		self::$corpo = "listar";
		self::renderizar(self::$viewController);
	
	}
	
	public static function completarCadastro() {
			
		$usuario = new Usuario();
		$usuario->selecionarPorId($_SESSION['auth']['id']);
		$contaBancaria = new ContaBancaria();
		$contasBancarias = $contaBancaria->listarPorIdUsuario($_SESSION['auth']['id']);
		if(!empty($_POST)) {
			$usuario = new Usuario();
			$usuario->selecionarPorId($_POST['id']);
			$usuario->emailNotificacao = $_POST['email_notificacao'];
			$usuario->salvar();
			self::redirecionar(Configuracao::$baseUrl);
		}
		
		$instituicoesBancarias = Funcao::pegarValoresCampoEnum('contas_bancarias', 'banco');
			
		self::$variaveis = array('usuario' => $usuario, 'contasBancarias' => $contasBancarias, 'instituicoesBancarias' => $instituicoesBancarias);
		self::$corpo = "completarCadastro";
		self::renderizar(self::$viewController);
			
	}
	
	public static function excluir() {
		$usuario = new Usuario();
		$usuario->selecionarPorId($_POST['id']);
		$usuario->excluir();
	}
	
}

?>
