<?php
	require_once __DIR__.'/Controller.php';
	require_once __DIR__.'/../models/TipoUsuario.php';
	require_once __DIR__.'/../models/Categoria.php';

	class TipoUsuarioController extends Controller {
		
		private static $viewController = "tipoUsuario";
		
		public static function adicionar() {
				
			$categoria = new Categoria();
			$categorias = $categoria->listar();

			if(!empty($_POST)) {
				$usuario = new Usuario();
				$usuario->selecionarPorId($_SESSION['auth']['id']);
			
				$tipoUsuario = new TipoUsuario();				
				$tipoUsuario->nome = $_POST['nome'];
				$tipoUsuario->modulos =  implode('|', $_POST['modulos']);
				$tipoUsuario->fkUsuario =  (!empty($usuario->fkUsuario)) ? $usuario->fkUsuario : $_SESSION['auth']['id'];
				$tipoUsuario->fkCategoria = $_POST['categoria'];


				$tipoUsuario->salvar();
				
				self::redirecionar(Configuracao::$baseUrl.self::$viewController.'/listar'.Configuracao::$extensaoPadrao);
			}
	
			self::$corpo = "adicionar";
			self::$variaveis = array('categorias' => $categorias);
			self::renderizar(self::$viewController);
				
		} 
		
		public static function listar() {
			$usuario = new Usuario();
			$usuario->selecionarPorId($_SESSION['auth']['id']);
			
			$tipoUsuario = new TipoUsuario();
			$listaDeTiposUsuarios = $tipoUsuario->listar('fkUsuario = '.(!empty($usuario->fkUsuario)) ? $usuario->fkUsuario : $_SESSION['auth']['id']);
			self::$variaveis = array('listaDeTiposUsuarios' => $listaDeTiposUsuarios);
			self::$corpo = "listar";
			self::renderizar(self::$viewController);
			
		}
		
		public static function editar() {
		
			$tipoUsuario = new TipoUsuario();
			$tipoUsuario->selecionarPorId($_GET['id']);
			$tipoUsuario->modulos = explode('|', $tipoUsuario->modulos);
			$categoria = new Categoria();
			$categorias = $categoria->listar();
		
			if(!empty($_POST)) {
				$tipoUsuario->nome = $_POST['nome'];
				$tipoUsuario->modulos = implode('|', $_POST['modulos']);
				$tipoUsuario->fkCategoria = $_POST['categoria'];
				$tipoUsuario->salvar();
				
				self::redirecionar(Configuracao::$baseUrl.self::$viewController.'/listar'.Configuracao::$extensaoPadrao);
			}
				
			self::$variaveis = array('tipoUsuario' => $tipoUsuario, 'categorias' => $categorias);
			self::$corpo = "editar";
			self::renderizar(self::$viewController);
				
		}
		
		public static function excluir() {
			
			$tipoUsuario = new TipoUsuario();
			$tipoUsuario->selecionarPorId($_POST['id']);
			$tipoUsuario->excluir();
			
		}
		
	}
