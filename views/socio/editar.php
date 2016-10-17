<div class="span12">
	<div class="widget stacked">
		<div class="widget-header">
			<i class="icon-check"></i>
			<h3>Edite o sócio</h3>
		</div> <!-- /widget-header -->
		<div class="widget-content">
			<br />
			<form method="post" action="" id="validation-form-socio" class="form-horizontal socioForm" enctype="multipart/form-data">
				<fieldset>
					<div class="control-group">
						<label class="control-label" for="nome" >Nome</label>
						<div class="controls">
							<input type="text" class="input-large" name="nome" id="nome" value="<?php echo $socio->nome; ?>" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="email" >Email</label>
						<div class="controls">
							<input type="email" class="input-large" name="email" id="email" value="<?php echo $socio->email; ?>" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="documento" >Documento</label>
						<div class="controls">
							<input type="text" class="input-large" name="documento" id="documento" value="<?php echo $socio->documento; ?>" />
						</div>
					</div>
					<div class="form-actions">
						<button type="submit" class="btn btn-danger btn">Salvar</button>&nbsp;&nbsp;
						<a href="<?php echo Configuracao::$baseUrl.'socio/listar'.Configuracao::$extensaoPadrao; ?>" class="btn">Cancel</a>
					</div>
				</fieldset>
			</form>
		</div> <!-- /widget-content -->
	</div> <!-- /widget -->					
</div> <!-- /span12 -->

<script type="text/javascript">
	window.onload = function() {
    $("input[name=data]").datepicker({
        dateFormat : 'dd/mm/yy'
    });
  }
</script>
