<div class="span12">
	<div class="widget stacked">
		<div class="widget-header">
			<i class="icon-check"></i>
			<h3>Sócios</h3>
		</div> <!-- /widget-header -->
		<div class="widget-content">
			<form class="navbar-form navbar-left" name="formulario_busca" id="formulario_busca" method="post" action="" >
			  <div class="form-group">
			    <input type="text" class="form-control" name="documento" placeholder="Documento" >
			    <button type="submit" class="btn btn-default">Pesquisar</button>
			  </div>
			  
			</form>
			<br />
			<?php if(!empty($listaDeSocios)) : ?>
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th width="10%" >ID</th>
							<th width="60%" >Nome</th>
							<th width="20%" >Documento</th>
							<th width="10%" class="td-actions"></th>
						</tr>
					</thead>
					<tbody>
					<?php 
						foreach($listaDeSocios AS $socio) :
					?>
							<tr>
								<td><?php echo $socio->id; ?></td>
								<td><?php echo $socio->nome; ?></td>
								<td><?php echo $socio->documento; ?></td>
								<td class="td-actions">
									<a title="Editar" href="<?php echo Configuracao::$baseUrl.'socio/editar/'.$socio->id.'-'.Funcao::prepararLink($socio->nome).Configuracao::$extensaoPadrao; ?>" class="btn btn-small btn-warning">
										<i class="btn-icon-only icon-ok"></i>
									</a>
									<a title="Excluir" href="javascript:;" class="btn btn-small" id="<?php echo 'socio-'.$socio->id; ?>">
										<i class="btn-icon-only icon-remove"></i>
									</a>
								</td>
							</tr>
					<?php
						endforeach;
					?>
					</tbody>
				</table>
			<?php else : ?>	
				<div class="control-group" >
					<h3 style="text-align:center;" >Não há sócios cadastrados</h3>
				</div>
			<?php endif; ?>
		</div> <!-- /widget-content -->
	</div> <!-- /widget -->
</div> <!-- /span12 -->
