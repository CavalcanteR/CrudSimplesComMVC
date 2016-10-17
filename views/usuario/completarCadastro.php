<div class="span12">
	<div class="widget stacked">
		<div class="widget-header">
			<i class="icon-check"></i>
			<h3>Complete seus dados</h3>
		</div> <!-- /widget-header -->
		<div class="widget-content">
			<br />
			<form method="post" action="" id="validation-form-usuario" class="form-horizontal">
				<input type="hidden" name="id" value="<?php echo $usuario->id; ?>" />
				<fieldset>
					<div class="control-group">
						<label class="control-label" for="nome" >Email de Notificação</label>
						<div class="controls">
							<input type="text" class="input-large" name="email_notificacao" id="email_notificacao" value="<?php echo $usuario->emailNotificacao; ?>" >
						</div>
					</div>
					<div class="control-group">
						<h4>Contas Bancárias
							<small>(Pelo menos um tipo de conta bancária deve ser criado para que seu cadastro possa ser completado)</small>
						</h4>
						<div class="control-group">
							<table border="1" width="100%">
							    <thead>
								    <th>Instituição Bancária</th>
								    <th>Agência</th>
								    <th>Número da Conta</th>
								    <th>Nome do Favorecido</th>
								    <th>CPF/CNPJ</th>
								    <th>É A Conta Principal</th>
								   	<th>Excluir</th>
							    </thead>
							    <tbody id="contabancaria_table" > 
								    <td colspan="7"></td>
								    <?php 
								    	foreach( $contasBancarias as $contaBancaria ) {
								    ?>
										    <tr id="editarContaBancaria_<?php echo $contaBancaria->id; ?>" style="cursor: pointer;" >
										    	<td width="20%"><?php echo $contaBancaria->banco; ?></td>
										    	<td><?php echo $contaBancaria->agencia; ?></td>
										    	<td><?php echo $contaBancaria->conta; ?></td>
										    	<td><?php echo $contaBancaria->favorecido; ?></td>
										    	<td><?php echo $contaBancaria->cpfCnpj; ?></td>
										    	<td width="3%"><?php echo ($contaBancaria->contaPrincipal) ? "Sim" : "Não"; ?></td>
										    	<td><input type="button" onclick="excluirContaBancaria(this);" id="exclusaoContaBancaria_<?php echo $contaBancaria->id; ?>" value="X" /></td>
										    </tr>
									<?php 
										}
									?>
							    </tbody>
							</table>
						</div>                  
						<div id="contabancaria_form" >
						  <input name="id_contabancaria" type="hidden" value="" />
						  <div class="four columns">
						    <label>Instituição Bancária *</label>
						    <select name="banco"  id="contabancaria_banco">
						    	<?php
						    		foreach ( $instituicoesBancarias as $indice => $instituicaoBancaria ) {
						    	?>
						    			<option value="<?php echo $indice; ?>" ><?php echo $instituicaoBancaria; ?></option>
						    	<?php 
						    		}
						    	?>
						    </select>
						  </div>
						  <div class="three columns">
						    <label>Agência *</label>
						    <input name="agencia" id="contabancaria_agencia" type="text">
						  </div>
						  <div class="three columns end">
						    <label>Número da Conta *</label>
						    <input name="conta"  id="contabancaria_conta" type="text" >
						  </div>
						  <div class="twelve columns">
						    <label>Nome do Favorecido *</label>
						    <input name="favorecido" id="contabancaria_favorecido" type="text">
						  </div>
						  <div class="four columns">
						    <label>CPF/CNPJ</label>
						    <input name="cpfCnpj" id="contabancaria_cpfCnpj" type="text" class="cpfCnpj" />
						    <input id="selecionaCpf" name="selecionaCpfCnpj" value="cpf" type="radio" checked="checked" />CPF
						    <input id="selecionaCnpj" name="selecionaCpfCnpj" value="cnpj" type="radio" />CNPJ
						  </div>
						  <div class="three columns end">
						    <label>Conta Principal</label>
						    <input name="contaPrincipal" id="contabancaria_contaPrincipal" type="checkbox" value="1" />
						  </div>
						  <div class="control-group" >
						  	<input type="button" id="botaoNewEditContaBancaria" onclick="newEditContaBancaria(<?php echo $_SESSION['auth_sistema']['id']; ?>);"  value="Adicionar Conta Bancária" class="button" style="float:right;">
						  </div>
						</div>
					</div>
					<div class="form-actions">
						<button type="submit" class="btn btn-danger btn">Salvar</button>&nbsp;&nbsp;
						<a href="<?php echo Configuracao::$baseUrl.'usuario/listar'.Configuracao::$extensaoPadrao; ?>" class="btn">Cancel</a>
					</div>
				</fieldset>
			</form>
		</div> <!-- /widget-content -->
	</div> <!-- /widget -->					
</div> <!-- /span12 --> 
