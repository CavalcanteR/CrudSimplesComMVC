<?php
    require_once __DIR__.'/Controller.php';
    require_once __DIR__.'/../models/Socio.php';
    class SocioController extends Controller {

        private static $viewController = "socio";
        private static $diretorio = "/../../socios/";

        public static function adicionar() {

            $socio = new Socio();

            if(!empty($_POST)) {

                $socio->nome = $_POST['nome'];
                $socio->email = $_POST['email'];
                $socio->documento = $_POST['documento'];

                if( $socio->verificaDocumento($_POST['documento']) ) {
                    echo "<script>alert('O Sócio já existe!'); history.back(-1);</script>";
                    exit;
                }

                $socio->salvar();

                self::redirecionar(Configuracao::$baseUrl.self::$viewController.'/listar'.Configuracao::$extensaoPadrao);
            }

            self::$corpo = "adicionar";
            self::renderizar(self::$viewController);

        }

        public static function listar() {

            $socio = new Socio();
    
            $where = '';

            if(!empty($_POST['documento'])) {
                $where = " documento LIKE '%".$_POST['documento']."%'";
            }

            $listaDeSocios = $socio->listar($where);

            self::$variaveis = array('listaDeSocios' => $listaDeSocios);
            self::$corpo = "listar";
            self::renderizar(self::$viewController);

        }

        public static function editar() {

            $socio = new Socio();
            $socio->selecionarPorId($_GET['id']);

            if(!empty($_POST)) {

                $socio->nome = $_POST['nome'];
                $socio->email = $_POST['email'];
                $socio->documento = $_POST['documento'];
                
                if( $socio->verificaDocumento($_POST['documento']) ) {
                    echo "<script>alert('O Sócio já existe!'); history.back(-1);</script>";
                    exit;
                }
                $socio->salvar();

                self::redirecionar(Configuracao::$baseUrl.self::$viewController.'/listar'.Configuracao::$extensaoPadrao);
            }

            self::$variaveis = array('socio' => $socio);
            self::$corpo = "editar";
            self::renderizar(self::$viewController);

        }

        public static function excluir() {

            $socio = new Socio();
            $socio->selecionarPorId($_POST['id']);
            
            $socio->excluir();

        }

    }
