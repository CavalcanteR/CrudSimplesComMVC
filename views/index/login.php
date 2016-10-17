<link href="<?php echo Configuracao::$baseUrl; ?>css/pages/signin.css" rel="stylesheet" type="text/css">
<style>
	.no-display{ display: none; }
</style>
<div class="account-container stacked">
	<div class="content clearfix">
		<form action="" method="post">
			<h1>Login</h1>
			<div class="login-fields">
				<p>Coloque o seu email e senha:</p>
				<div class="field">
					<label for="login">Email:</label>
					<input type="text" id="email" name="email" value="" placeholder="Email" class="login username-field" />
				</div> <!-- /field -->
				<div class="field">
					<label for="senha">Senha:</label>
					<input type="password" id="password" name="senha" value="" placeholder="Senha" class="login password-field"/>
				</div> <!-- /password -->
			</div> <!-- /login-fields -->
			<div class="login-actions">
				<span class="login-checkbox no-display">
					<input id="Field" name="Field" type="checkbox" class="field login-checkbox" value="First Choice" tabindex="4" />
					<label class="choice" for="Field">Keep me signed in</label>
				</span>
				<span><?php echo $aviso; ?></span>
				<button class="button btn btn-warning btn-large">Entrar</button>
			</div> <!-- .actions -->

		</form>
	</div> <!-- /content -->
</div> <!-- /account-container -->

<br />

