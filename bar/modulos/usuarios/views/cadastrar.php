        <script>
			$('#menu_usuarios').addClass('current');
		</script>
        <div class="maincontent noright">
        	<div class="maincontentinner">
            	
                <ul class="maintabmenu">
                	<li class="current"><a href="">Cadastrar Usuario</a></li>
                </ul><!--maintabmenu-->
                
                <div class="content">
                
                    <div class="contenttitle">
                    	<h2 class="form"><span>Cadastro</span></h2>
                    </div><!--contenttitle-->
                                                                               
                    <?php $attributes = array('class' => 'stdform', 'id' => 'form1');echo form_open('usuarios/salvar', $attributes);?>
                    <input type="hidden" name="action" value="cadastrar"/>
                       <p><label>Nome Completo</label>
                       <span class="field"><input type="text" name="nome" class="mediuminput" required/></span></p>
                       
                       <p><label>Usuário</label>
                       <span class="field"><input type="text" name="usuario" class="mediuminput" required/></span></p>
                       
                       <p><label>Telefone</label>
                       <span class="field"><input type="text" name="telefone" class="smallinput"/></span></p>
                       
                       <p><label>Celular</label>
                       <span class="field"><input type="text" name="telefone" class="smallinput" /></span></p>
                                                  
                       <p><label>Senha</label>
                       <span class="field"><input type="password" name="senha" class="smallinput" /></span></p>
                       
                       <p><label>Confirmar Senha</label>
                       <span class="field"><input type="password" name="senha2" class="smallinput"required/></span></p>
                       
                       <p><label>Ativo</label>
                        <span class="formwrapper">
                            <input type="radio" name="status" value="1" checked/> Sim &nbsp;&nbsp;
                            <input type="radio" name="status" value="0"/> Não
                        </span></p>
                                                                        
                       <p><label>Anotações</label>
                       <span class="field"><textarea cols="80" rows="5" name="notas" class="mediuminput"></textarea></span></p>
                                                                        
                       <br clear="all" />
                                                
                       <p class="stdformbutton">
                       		<button class="submit radius2">Cadastrar</button>
                            <input type="reset" class="reset radius2" value="Limpar" />
                       </p>                        
                        
                    <?php echo form_close();?>
                                                            
                    <br clear="all" />
                    
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