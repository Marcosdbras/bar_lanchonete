        <script>
			$('#menu_Usuários').addClass('current');
		</script>
        <div class="maincontent noright">
        	<div class="maincontentinner">
            	
                <ul class="maintabmenu">
                	<li class="current"><a href="">Editar Usuario</a></li>
                </ul><!--maintabmenu-->
                
                <div class="content">
                
                    <div class="contenttitle">
                    	<h2 class="form"><span>Editar</span></h2>
                    </div><!--contenttitle-->
                                                                               
                    <?php $attributes = array('class' => 'stdform', 'id' => 'form1');echo form_open('usuarios/salvar', $attributes);?>
                    <input type="hidden" name="action" value="editar"/>
                    <?php foreach($lista as $row){ ?>
                       <input type="hidden" name="id" value="<?php echo $row->id; ?>"/>
                       <p><label>Nome Completo</label>
                       <span class="field"><input type="text" name="nome" class="mediuminput" value="<?php echo $row->nome; ?>" required/></span></p>
                       
                       <p><label>E-mail</label>
                       <span class="field"><input type="text" name="email" class="mediuminput" value="<?php echo $row->email; ?>" required/></span></p>
                       
                       <p><label>Telefone</label>
                       <span class="field"><input type="text" name="telefone" class="smallinput" value="<?php echo $row->telefone; ?>"/></span></p>
                       
                       <p><label>Celular</label>
                       <span class="field"><input type="text" name="celular" class="smallinput" value="<?php echo $row->celular; ?>"/></span></p>
                                                  
                       <p><label>Senha</label>
                       <span class="field"><input type="password" name="senha" class="smallinput" value="" required/></span></p>
                       
                       <p><label>Confirmar Senha</label>
                       <span class="field"><input type="password" name="senha2" class="smallinput" value="" required/></span></p>
                       
                       <p><label>Ativo</label>
                        <span class="formwrapper">
                            <input type="radio" name="status" value="1" <?php if($row->status == '1'){echo 'checked';} ?>/> Sim &nbsp;&nbsp;
                            <input type="radio" name="status" value="0" <?php if($row->status == '0'){echo 'checked';} ?>/> Não
                        </span></p>
                                                                        
                       <p><label>Anotações</label>
                       <span class="field"><textarea cols="80" rows="5" name="notas" class="mediuminput"><?php echo $row->notas; ?></textarea></span></p>
                                                                        
                       <br clear="all" />
                                                
                       <p class="stdformbutton">
                       		<button class="submit">Salvar</button>
                            <input type="reset" class="reset" value="Limpar" />
                       </p>                        
                    <?php }; ?>
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