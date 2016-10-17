<?php
	class Configuracao {

		public static $versao  = "";
		public static $baseUrl = "localhost";
		public static $itensMenu = array(
									'seus_dados' => array(
										'icone' => 'icon-user',
										'link' => 'usuario',
										'label' => 'Seus Dados',
										'sub_itens' => array(
											'editar' => array('link' => 'editar', 'label' => 'Editar'),
										)
									),
									
									'usuarios' => array(
											'icone' => 'icon-user',
											'link' => 'usuario',
											'label' => 'Usuários',
											'sub_itens' => array(
													'listar' => array('link' => 'listar', 'label' => 'Listar'),
													'adicionar' => array('link' => 'adicionar', 'label' => 'Adicionar')
											)
									),
									'tiposUsuarios' => array(
											'icone' => 'icon-list',
											'link' => 'tipoUsuario',
											'label' => 'Tipos de Usuários',
											'sub_itens' => array(
													'listar' => array('link' => 'listar', 'label' => 'Listar'),
													'adicionar' => array('link' => 'adicionar', 'label' => 'Adicionar')
											)
									),
									
                  					'socios' => array(
										'icone' => 'icon-file',
										'link' => 'socio',
										'label' => 'Sócio',
										'sub_itens' => array(
											'listar' => array('link' => 'listar', 'label' => 'Listar'),
											'adicionar' => array('link' => 'adicionar', 'label' => 'Adicionar')
										)
									),
		);

		public static $extensaoPadrao = ".html";

}
