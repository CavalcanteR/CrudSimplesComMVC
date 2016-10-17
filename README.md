# CrudSimplesComCPF
CRUD Simples com login e cadastro de dados em PHP com PDO e MVC

#Controllers
/controllers

/controllers/Controller.php

/controllers/IndexController.php
/controllers/UsuarioController.php

#Model
/models
/models/Model.php -> Core de acesso
/models/Usuario.php

#Views
/views

/views/layout -> Layout base do sistema
/views/layout/header.php
/views/layout/topo.php
/views/layout/menu.php
/views/layout/footer.php
/views/layout/header_login.php

/views/index
/views/index/login.php -> Tela de login e pg principal

/views/usuario
/views/usuario/adicionar.php
/views/usuario/editar.php
/views/usuario/listar.php

#Configuração
Ativar em /componentes/configuracao.php e em /js/scripts.js 
-> $baseUrl: Local base do sistema. Ex: http://localhost/pastaDoSistema

/conecxao/Conexao.php
-> Ativar acesso ao banco pelo PDO
-> Pode usar para enviar email de mensagens com erros no sistema

