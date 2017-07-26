        <script>
			$('#menu_clientes').addClass('current');
		</script>
        <div class="maincontent noright">
        	<div class="maincontentinner">
            	
                <ul class="maintabmenu">
                	<li class="current"><a href="">Cadastrar Cliente</a></li>
                </ul><!--maintabmenu-->
                
                <div class="content">
                
                    <div class="contenttitle">
                    	<h2 class="form"><span>Cadastro</span></h2>
                    </div><!--contenttitle-->
                                                                               
                    <?php $attributes = array('class' => 'stdform', 'id' => 'form1');echo form_open('clientes/salvar', $attributes);?>
                    <input type="hidden" name="action" value="cadastrar"/>
                       <p><label>Nome Completo <span class="red">*</span></label>
                       <span class="field"><input type="text" name="nome" class="mediuminput" required/></span></p>
                       
                       <p><label>Telefone 01</label>
                       <span class="field"><input type="text" name="telefone" class="smallinput" placeholder="(DD) 3333-3333"/></span></p>
                       
                       <p><label>Telefone 02</label>
                       <span class="field"><input type="text" name="celular" class="smallinput" placeholder="(DD) 9999-9999"/></span></p>
                       
                       <p><label>E-mail</label>
                       <span class="field"><input type="text" name="email" class="mediuminput" placeholder="contato@e-bitsistemas.com.br"/></span></p>
                       
                       <p><label>CEP</label>
                       <span class="field"><input type="text" name="cep" class="smallinput" id="cep" onBlur="GetEndereco();" placeholder="85.800-000"/></span>
                       <small class="desc">Tecle "TAB" para completar o endereço.</small></p>
                       
                       <p><label>Rua</label>
                       <span class="field"><input type="text" name="rua" class="longinput" id="rua" /></span></p>
                       
                       <p><label>Número</label>
                       <span class="field"><input type="text" name="numero" class="smallinput" /></span></p>
                       
                       <p><label>Complemento</label>
                       <span class="field"><input type="text" name="complemento" class="longinput" /></span></p>
                       
                       <p><label>Bairro</label>
                       <span class="field"><input type="text" name="bairro" class="longinput" id="bairro" /></span></p>
                       
                       <p><label>Cidade</label>
                       <span class="field"><input type="text" name="cidade" class="longinput" id="cidade" /></span></p>
                       
                       <p><label>Estado</label>
                       <span class="field"><input type="text" name="estado" class="longinput" id="estado" /></span></p>
                                                                        
                       <p><label>Anotações</label>
                       <span class="field"><textarea cols="80" rows="5" name="notas" class="longinput"></textarea></span></p>
                                                                        
                       <br clear="all" />
                                                
                       <p class="stdformbutton">
                       		<button class="submit">Cadastrar</button>
                            <input type="reset" class="reset" value="Limpar" />
                       </p>                        
                        
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