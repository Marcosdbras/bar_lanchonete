        <script>
			$('#menu_produtos').addClass('current');
		</script>
        <div class="maincontent noright">
        	<div class="maincontentinner">
            	
                <ul class="maintabmenu">
                	<li class="current"><a href="">Editar Produto</a></li>
                </ul><!--maintabmenu-->
                
                <div class="content">
                
                    <div class="contenttitle">
                    	<h2 class="form"><span>Editar</span></h2>
                    </div><!--contenttitle-->
                                                                               
                    <?php $attributes = array('class' => 'stdform', 'id' => 'form1');echo form_open_multipart('produtos/salvar', $attributes);?>
                    <input type="hidden" name="action" value="editar"/>
                    <?php foreach($lista as $row){ ?>
                       <input type="hidden" name="id" value="<?php echo $row->id; ?>"/>
                       <p><label>Nome</label>
                       <span class="field"><input type="text" name="nome" class="mediuminput" value="<?php echo $row->nome; ?>" required/></span></p>
                       
                       <p><label>Ingredientes</label>
                       <span class="field"><input type="text" name="descricao" class="mediuminput" value="<?php echo $row->descricao; ?>"/></span></p>
                                              
                       <p><label>Quantidade</label>
                       <span class="field"><input type="text" name="quantidade" class="smallinput" value="<?php echo $row->quantidade;?>" style="width: calc(20% - 3px) !important"/>
                       <select class="smallinput" name="unidade" style="width:20% !important; min-width:20%;"/>
                       		<option <?php if($row->quantidade == 'g'){ echo 'selected';} ?> value="g" >g (Gramas)</option>
                            <option <?php if($row->quantidade == 'kg'){ echo 'selected';} ?> value="kg">kg (Quilogramas)</option>
                            <option <?php if($row->quantidade == 'ml'){ echo 'selected';} ?> value="ml">ml (Mililitros)</option>
                            <option <?php if($row->quantidade == 'l'){ echo 'selected';} ?> value="l" >l (Litros)</option>
                            <option <?php if($row->quantidade == 'un'){ echo 'selected';} ?> value="un">un (Unidade)</option>
                            <option <?php if($row->quantidade == 'pct'){ echo 'selected';} ?> value="pct">pct (Pacote)</option>
                       </select></span></p>
                       
                       <p><label>Valor (R$)</label>
                       <span class="field"><input type="text" name="valor" class="smallinput" value="<?php echo $row->valor; ?>"/></span>
                       <small class="desc">Utilize "." Ponto como separador Ex. 1.99</small></p>
                       
                       <p><label>Categoria</label>
                       <span class="field">
                       <select name="categoria" class="smallinput" style="width:40.9% !important">
                       <option></option>
                       <?php foreach($categorias as $cat){ ?>
				echo '<option value="<?php echo $cat->id ?>" <?php if($row->categoria == $cat->id){echo'selected';} ?>><?php echo $cat->nome ?></option>';
			<?php }	?>
                       </select>
                       </span></p>
                       
                       <p><label>Imagem</label>
                       <span class="field"><input type="file" name="userfile" class="smallinput" /></span>
                       <small class="desc">Tamanho máximo: 1024x800, 512 kb</small></p>
                       
                       <p><label>Adicional</label>
                        <span class="formwrapper">
                            <input type="radio" name="adicional" value="1" <?php if($row->adicional == '1'){echo 'checked';} ?>/> Sim &nbsp;&nbsp;
                            <input type="radio" name="adicional" value="0" <?php if($row->adicional == '0'){echo 'checked';} ?>/> Não
                        </span></p>
                        
                       <p>
	                       <label>Imprimir</label>
	                        <span class="formwrapper">
	                            <input type="radio" name="imprimir" value="1" <?php if($row->imprimir== '1'){echo 'checked';} ?>/> Sim &nbsp;&nbsp;
	                            <input type="radio" name="imprimir" value="0" <?php if($row->imprimir== '0'){echo 'checked';} ?>/> Não
	                        </span>                        
	                       <small class="desc">Ao marcar esta opção, os produtos sairam na impressão do Cupom Interno.</small>
                       </p> 
                                                                        
                       <p><label>Descrição Completa</label>
                       <span class="field"><textarea cols="80" rows="5" name="descricao_completa" class="mediuminput"><?php echo $row->descricao_completa; ?></textarea></span></p>
                                                                        
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