<?php
	require_once __DIR__.'/Controller.php';
	require_once __DIR__.'/../models/Categoria.php';
	require_once __DIR__.'/../models/TipoUsuario.php';

	class CategoriaController extends Controller {

		private static $viewController = "categoria";

		public static function adicionar() {

			$categoria = new Categoria();

			if(!empty($_POST)) {
				$usuario = new Usuario();
				$usuario->selecionarPorId($_SESSION['auth']['id']);
			
				//TODO Pegar a categoria do usuario
				if(!empty($usuario->fkUsuario)) {
					$tipoU = new TipoUsuario();
					$tipoU->selecionarPorId($usuario->fkTipoUsuario); 

					$categoria->pai = $tipoU->fkCategoria;
				}

				$categoria->nome   = $_POST['nome'];
				$categoria->descricao   = $_POST['descricao'];
				$categoria->menu   = $_POST['menu'];
				$categoria->ativar = $_POST['ativar'];
				$categoria->equipe = $_POST['equipe'];
				$categoria->fkUsuario = (!empty($usuario->fkUsuario)) ? $usuario->fkUsuario : $_SESSION['auth']['id'];
				$categoria->salvar();

				self::redirecionar(Configuracao::$baseUrl.self::$viewController.'/listar'.Configuracao::$extensaoPadrao);
			}

			self::$corpo = "adicionar";
			self::renderizar(self::$viewController);

		}

		public static function listar() {

			$usuario = new Usuario();
			$usuario->selecionarPorId($_SESSION['auth']['id']);

			if(!empty($usuario->fkUsuario)) {
				$tipoU = new TipoUsuario();
				$tipoU->selecionarPorId($usuario->fkTipoUsuario); 

				$categoria = new Categoria();
				$listaDeCategorias = $categoria->listar('pai = '.$tipoU->fkCategoria);
			} else {
				$categoria = new Categoria();
				$listaDeCategorias = $categoria->listar('fkUsuario = '.(!empty($usuario->fkUsuario)) ? $usuario->fkUsuario : $_SESSION['auth']['id']);
			}

			self::$variaveis = array('listaDeCategorias' => $listaDeCategorias);
			self::$corpo = "listar";
			self::renderizar(self::$viewController);

		}

		public static function editar() {

			$categoria = new Categoria();
			$categoria->selecionarPorId($_GET['id']);
			if(!empty($_POST)) {

				//TODO Pegar a categoria do usuario
				if(!empty($usuario->fkUsuario)) {
					$tipoU = new TipoUsuario();
					$tipoU->selecionarPorId($usuario->fkTipoUsuario); 

					$categoria->pai = $tipoU->fkCategoria;
				}

				$categoria->nome   = $_POST['nome'];
				$categoria->descricao   = $_POST['descricao'];
				$categoria->menu   = $_POST['menu']?$_POST['menu']:0;
				$categoria->ativar = $_POST['ativar']?$_POST['ativar']:0;
				$categoria->equipe = $_POST['equipe']?$_POST['equipe']:0;
				$categoria->salvar();

				self::redirecionar(Configuracao::$baseUrl.self::$viewController.'/listar'.Configuracao::$extensaoPadrao);
			}

			self::$variaveis = array('categoria' => $categoria);
			self::$corpo = "editar";
			self::renderizar(self::$viewController);

		}

		public static function excluir() {

			$categoria = new Categoria();
			$categoria->selecionarPorId($_POST['id']);
			$categoria->excluir();

		}

	}
