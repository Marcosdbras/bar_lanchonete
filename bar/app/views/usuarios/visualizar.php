        <script>
			$('#menu_Usuários').addClass('current');
		</script>
        <div class="maincontent noright">
        	<div class="maincontentinner">
            	
                <ul class="maintabmenu">
                	<li class="current"><a href="">Visualizar Usuario</a></li>
                </ul><!--maintabmenu-->
                
                <div class="content">
                
                    <div class="contenttitle">
                    	<h2 class="form"><span>Visualizar</span></h2>
                    </div><!--contenttitle-->
                                                                               
                    <?php $attributes = array('class' => 'stdform', 'id' => 'form1');echo form_open('usuarios/salvar', $attributes);?>
                    <?php foreach($lista as $row){ ?>
                       <p><label>Nome Completo</label>
                       <span class="field"><input type="text" name="nome" class="mediuminput" value="<?php echo $row->nome; ?>" disabled/></span></p>
                       
                       <p><label>E-mail</label>
                       <span class="field"><input type="text" name="email" class="mediuminput" value="<?php echo $row->email; ?>" disabled/></span></p>
                       
                       <p><label>Telefone</label>
                       <span class="field"><input type="text" name="telefone" class="smallinput" value="<?php echo $row->telefone; ?>" disabled/></span></p>
                       
                       <p><label>Celular</label>
                       <span class="field"><input type="text" name="celular" class="smallinput" value="<?php echo $row->celular; ?>" disabled/></span></p>
                                              
                       <p><label>Ativo</label>
                        <span class="formwrapper">
                            <input type="radio" name="status" value="1" <?php if($row->status == '1'){echo 'checked';} ?> disabled/> Sim &nbsp;&nbsp;
                            <input type="radio" name="status" value="0" <?php if($row->status == '0'){echo 'checked';} ?> disabled/> Não
                        </span></p>
                                                                        
                       <p><label>Anotações</label>
                       <span class="field"><textarea cols="80" rows="5" name="notas" class="mediuminput" disabled><?php echo $row->notas; ?></textarea></span></p>
                                                                        
                       <br clear="all" />
                                                
                       <p class="stdformbutton">
                       		<input type="reset" onclick="location.href='<?php echo site_url('usuarios/editar/'.$row->id);?>';" value="Editar Dados">
                            <input type="reset" class="reset radius2" value="Limpar" />
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