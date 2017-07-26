        <script>
			$('#menu_clientes').addClass('current');
		</script>
        <div class="maincontent noright">
        	<div class="maincontentinner">
            	
                <ul class="maintabmenu">
                	<li class="current"><a href="">Editar Cliente</a></li>
                </ul><!--maintabmenu-->
                
                <div class="content">
                
                    <div class="contenttitle">
                    	<h2 class="form"><span>Editar</span></h2>
                    </div><!--contenttitle-->
                                                                               
                    <?php $attributes = array('class' => 'stdform', 'id' => 'form1');echo form_open('clientes/salvar', $attributes);?>
                    <input type="hidden" name="action" value="editar"/>
                    <?php foreach($lista as $row){ ?>
                       <input type="hidden" name="id" value="<?php echo $row->id; ?>"/>
                       <p><label>Nome Completo <span class="red">*</span></label>
                       <span class="field"><input type="text" name="nome" class="mediuminput" value="<?php echo $row->nome; ?>" required/></span></p>
                       
                       <p><label>E-mail</label>
                       <span class="field"><input type="text" name="email" class="mediuminput" value="<?php echo $row->email; ?>" /></span></p>
                       
                       <p><label>Telefone</label>
                       <span class="field"><input type="text" name="telefone" class="smallinput" value="<?php if($row->telefone!='0'){echo $row->telefone;} ?>"/></span></p>
                       
                       <p><label>Celular</label>
                       <span class="field"><input type="text" name="celular" class="smallinput" value="<?php if($row->celular!='0'){echo $row->celular;} ?>"/></span></p>
                       
                       <p><label>CEP</label>
                       <span class="field"><input type="text" name="cep" class="smallinput" id="cep" onBlur="GetEndereco();" value="<?php echo $row->cep; ?>" /></span>
                       <small class="desc">Consulta automatica do endereço ao sair do campo CEP.</small></p>
                       
                       <p><label>Rua</label>
                       <span class="field"><input type="text" name="rua" class="longinput" id="rua" value="<?php echo $row->rua; ?>" /></span></p>
                       
                       <p><label>Número</label>
                       <span class="field"><input type="text" name="numero" class="smallinput" value="<?php echo $row->numero; ?>"/></span></p>
                       
                       <p><label>Complemento</label>
                       <span class="field"><input type="text" name="complemento" class="longinput"  value="<?php echo $row->complemento; ?>"/></span></p>
                       
                       <p><label>Bairro</label>
                       <span class="field"><input type="text" name="bairro" class="longinput" id="bairro" value="<?php echo $row->bairro; ?>" /></span></p>
                       
                       <p><label>Cidade</label>
                       <span class="field"><input type="text" name="cidade" class="longinput" id="cidade" value="<?php echo $row->cidade; ?>" /></span></p>
                       
                       <p><label>Estado</label>
                       <span class="field"><input type="text" name="estado" class="longinput" id="estado" value="<?php echo $row->estado; ?>" /></span></p>
                                                                        
                       <p><label>Anotações</label>
                       <span class="field"><textarea cols="80" rows="5" name="notas" class="longinput"><?php echo $row->notas; ?></textarea></span></p>
                                                                        
                       <br clear="all" />
                                                
                       <p class="stdformbutton">
                       		<button class="submit">Salvar Alterações</button>
                            <input type="reset" class="reset" value="Limpar" />
                       </p>                        
                    <?php }; ?>    
                    <?php echo form_close();?>
                                                            
                    <br clear="all" />
                    
                </div><!--content-->
                
            </div><!--maincontentinner-->
            <script>
			function GetEndereco() {			
				if($.trim($("#cep").val()) != ""){
					$.getScript("http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+$("#cep").val(), function(){
					if(resultadoCEP["resultado"]){					
						$("#rua").val(unescape(resultadoCEP["tipo_logradouro"]) + " " + unescape(resultadoCEP["logradouro"]));
						$("#bairro").val(unescape(resultadoCEP["bairro"]));
						$("#cidade").val(unescape(resultadoCEP["cidade"]));
						$("#estado").val(unescape(resultadoCEP["uf"]));
					}else{
						alert("Endereço não encontrado");
					}
				});				
				}			
			}
			$(document).ready(function () {
			   $('input').keypress(function (e) {
					var code = null;
					code = (e.keyCode ? e.keyCode : e.which);                
					return (code == 13) ? false : true;
			   });
			});
			</script>