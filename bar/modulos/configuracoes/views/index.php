        <script>
			$('#menu_config').addClass('current');
		</script>
        <div class="maincontent noright">
        	<div class="maincontentinner">
            	
                <ul class="maintabmenu">
                	<li class="current"><a href="">Configuracoes</a></li>
                </ul><!--maintabmenu-->
                
                <div class="content">
                <?php $attributes = array('class' => 'stdform', 'id' => 'form1');echo form_open_multipart('configuracoes/salvar', $attributes);?>
                <input type="hidden" name="action" value="editar"/>
                    	<div class="contenttitle">
                    		<h2 class="form"><span>Sistema</span></h2>
                    	</div><!--contenttitle--> 
                    	<?php foreach($lista as $row){ ?>
                       <p><label>Texto para Guichê</label>
                       <span class="field"><input type="text" name="texto_guiche" class="mediuminput" value="<?php echo $row->texto_guiche; ?>"/></span>
                       <small class="desc">Texto para apresentação na tela de Guichê.</small></p>
                       
                       <p><label>Razão Social <span class="red">*</span></label>
                       <span class="field"><input type="text" name="razao_social" class="mediuminput" value="<?php echo $row->razao_social; ?>" required/></span></p>
                       
                       <p><label>Nome Fantazia <span class="red">*</span></label>
                       <span class="field"><input type="text" name="nome_fantasia" class="mediuminput" value="<?php echo $row->nome_fantasia; ?>" required/></span></p>
                       
                       <p><label>CNPJ/CPF <span class="red">*</span></label>
                       <span class="field"><input type="text" name="cnpj_cpf" class="mediuminput" placeholder="00.000.000/0001-00" value="<?php echo $row->cnpj_cpf; ?>" required/></span></p>
                       
                       <p><label>Telefone 01 <span class="red">*</span></label>
                       <span class="field"><input type="text" name="telefone" class="smallinput" placeholder="(DD) 3333-3333" value="<?php echo $row->telefone; ?>" required/></span></p>
                       
                       <p><label>Telefone 02</label>
                       <span class="field"><input type="text" name="celular" class="smallinput" placeholder="(DD) 9999-9999" value="<?php echo $row->celular; ?>"/></span></p>
                       
                       <p><label>E-mail <span class="red">*</span></label>
                       <span class="field"><input type="text" name="email" class="mediuminput" placeholder="contato@playsistemas.com.br" value="<?php echo $row->email; ?>" required/></span></p>
                       
                       <p><label>Website</label>
                       <span class="field"><input type="text" name="website" class="mediuminput" placeholder="www.playsistemas.com.br" value="<?php echo $row->website; ?>"/></span></p>
                       
                       <p><label>CEP <span class="red">*</span></label>
                       <span class="field"><input type="text" name="cep" class="smallinput" id="cep" onBlur="GetEndereco();" placeholder="85.800-000" value="<?php echo $row->cep; ?>" required/></span>
                       <small class="desc">Tecle "TAB" para completar o endereço.</small></p>
                       
                       <p><label>Rua <span class="red">*</span></label>
                       <span class="field"><input type="text" name="rua" class="mediuminput" id="rua" value="<?php echo $row->rua; ?>" required/></span></p>
                       
                       <p><label>Número <span class="red">*</span></label>
                       <span class="field"><input type="text" name="numero" class="smallinput" value="<?php echo $row->numero; ?>" required/></span></p>
                       
                       <p><label>Complemento </label>
                       <span class="field"><input type="text" name="complemento" class="mediuminput" value="<?php echo $row->complemento; ?>"/></span></p>
                       
                       <p><label>Bairro <span class="red">*</span></label>
                       <span class="field"><input type="text" name="bairro" class="mediuminput" id="bairro" value="<?php echo $row->bairro; ?>" required/></span></p>
                       
                       <p><label>Cidade <span class="red">*</span></label>
                       <span class="field"><input type="text" name="cidade" class="mediuminput" id="cidade" value="<?php echo $row->cidade; ?>" required/></span></p>
                       
                       <p><label>Estado <span class="red">*</span></label>
                       <span class="field"><input type="text" name="estado" class="mediuminput" id="estado" value="<?php echo $row->estado; ?>" required/></span></p>                                               
                       <?php }; ?>
                		<p class="stdformbutton">
                       		<button class="submit">Salvar</button>
                            <input type="reset" class="reset" value="Limpar" />
                		</p>                        
                        
                <?php echo form_close();?>    
                </div><!--content-->
                
            </div><!--maincontentinner-->
            <script>
			$(document).ready(function () {
			   $('input').keypress(function (e) {
					var code = null;
					code = (e.keyCode ? e.keyCode : e.which);                
					return (code == 13) ? false : true;
			   });
			});
			</script>