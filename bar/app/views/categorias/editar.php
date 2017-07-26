        <script>
			$('#menu_categorias').addClass('current');
		</script>
        <div class="maincontent noright">
        	<div class="maincontentinner">
            	
                <ul class="maintabmenu">
                	<li class="current"><a href="">Editar Categoria</a></li>
                </ul><!--maintabmenu-->
                
                <div class="content">
                
                    <div class="contenttitle">
                    	<h2 class="form"><span>Editar</span></h2>
                    </div><!--contenttitle-->
                                                                               
                    <?php $attributes = array('class' => 'stdform', 'id' => 'form1');echo form_open_multipart('categorias/salvar', $attributes);?>
                    <input type="hidden" name="action" value="editar"/>
                    <?php foreach($lista as $row){ ?>
                       <input type="hidden" name="id" value="<?php echo $row->id; ?>"/>
                       
                       <p><label>Status</label>
                        <span class="formwrapper">
                            <input type="radio" name="status" value="1" <?php if($row->status== '1'){echo 'checked';} ?>/> Ativo &nbsp;&nbsp;
                            <input type="radio" name="status" value="0" <?php if($row->status== '0'){echo 'checked';} ?>/> Desativado
                        </span></p>
                        
                       <p><label>Nome</label>
                       <span class="field"><input type="text" name="nome" class="mediuminput" value="<?php echo $row->nome; ?>" required/></span></p>
                                              
                       <p><label>Ordem</label>
                       <span class="field"><input type="text" name="ordem" class="smallinput" value="<?php echo $row->ordem;?>" style="width: calc(20% - 3px) !important"/>
                       </span></p>
                       
                       <p><label>Imagem</label>
                       <span class="field"><input type="file" name="userfile" class="smallinput" /></span>
                       <small class="desc">Tamanho máximo: 1024x800, 512 kb</small></p>
                                                                        
                       <p><label>Descrição</label>
                       <span class="field"><textarea cols="80" rows="5" name="descricao" class="mediuminput"><?php echo $row->descricao; ?></textarea></span></p>
                                                                        
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