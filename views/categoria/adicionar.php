<div class="span12">
	<div class="widget stacked">
		<div class="widget-header">
			<i class="icon-check"></i>
			<h3>Adicione uma nova categoria</h3>
		</div> <!-- /widget-header -->
		<div class="widget-content">
			<br />
			<form method="post" action="" id="validation-form-categoria" class="form-horizontal" enctype="multipart/form-data">
				<fieldset>
					<div class="control-group">
						<label class="control-label" for="nome" >Nome</label>
						<div class="controls">
							<input type="text" class="input-large" name="nome" />
						</div>

					</div>

					<div class="control-group">
						<label class="control-label" for="ativar" >Ativar</label>
						<div class="controls">
							<input type="checkbox" class="" name="ativar" value="1" />
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="menu" >Menu</label>
						<div class="controls">
							<input type="checkbox" class="" name="menu" value="1" />
						</div>
					</div>
					<?php
						$usuario = new Usuario();
						$usuario->selecionarPorId($_SESSION['auth']['id']);

						if(!empty($usuario->fkUsuario)) {
					?>
							<div class="control-group">
								<label class="control-label" for="descricao" >Descrição</label>
								<div class="controls">
									<textarea name="descricao" class="input-large" ></textarea>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="equipe" >Equipe</label>
								<div class="controls">
									<input type="checkbox" <?php echo $categoria->equipe?'checked="checked"':''; ?> class="" name="equipe" value="1" />
								</div>
							</div>
					<?php							
						}
					?>

					<div class="form-actions">
						<button type="submit" class="btn btn-danger btn">Salvar</button>&nbsp;&nbsp;
						<a href="<?php echo Configuracao::$baseUrl.'categoria/listar'.Configuracao::$extensaoPadrao; ?>" class="btn">Cancel</a>
					</div>
				</fieldset>
			</form>
		</div> <!-- /widget-content -->
	</div> <!-- /widget -->					
</div> <!-- /span12 --> 
