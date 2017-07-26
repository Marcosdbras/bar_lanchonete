        <script>
			$('#menu_produtos').addClass('current');
		</script>
        <div class="maincontent noright">
        	<div class="maincontentinner">
            	
                <ul class="maintabmenu">
                	<li class="current"><a href="">Visualizar Produto</a></li>
                </ul><!--maintabmenu-->
                
                <div class="content">
                
                    <div class="contenttitle">
                    	<h2 class="form"><span>Visualizar</span></h2>
                    </div><!--contenttitle-->
                                                                               
                    <?php $attributes = array('class' => 'stdform', 'id' => 'form1');echo form_open_multipart('produtos/salvar', $attributes);?>
                    <input type="hidden" name="action" value="editar"/>
                    <?php foreach($lista as $row){ ?>
                       <input type="hidden" name="id" value="<?php echo $row->id; ?>"/>
                       <p><label>Nome</label>
                       <span class="field"><input type="text" name="nome" class="mediuminput" value="<?php echo $row->nome; ?>" disabled/></span></p>
                       
                       <p><label>Ingredientes</label>
                       <span class="field"><input type="text" name="descricao" class="mediuminput" value="<?php echo $row->descricao; ?>" disabled/></span></p>
                                              
                       <p><label>Quantidade</label>
                       <span class="field"><input type="text" name="quantidade" class="smallinput" value="<?php echo $row->quantidade; ?>" disabled/></span></p>
                       
                       <p><label>Unidade</label>
                       <span class="field"><input type="text" name="unidade" class="smallinput" value="<?php echo $row->unidade; ?>" disabled/></span></p>
                       
                       <p><label>Valor (R$)</label>
                       <span class="field"><input type="text" name="valor" class="smallinput" value="<?php echo $row->valor; ?>" disabled/></span>
                       <small class="desc">Utilize "." Ponto como separador Ex. 1.99</small></p>
                       
                       <p><label>Categoria</label>
                       <span class="field">
                       <select name="categoria" class="smallinput" disabled>
                           <option value="1" <?php if($row->categoria == '1'){echo 'selected';} ?>>Lanche</option>
                           <option value="2" <?php if($row->categoria == '2'){echo 'selected';} ?>>Bebida</option>
                           <option value="3" <?php if($row->categoria == '3'){echo 'selected';} ?>>Porção</option>
                           <option value="4" <?php if($row->categoria == '4'){echo 'selected';} ?>>Combo</option>
                           <option value="5" <?php if($row->categoria == '5'){echo 'selected';} ?>>Item</option>
                           <option value="6" <?php if($row->categoria == '6'){echo 'selected';} ?>>Entrega</option>
                       </select>
                       </span></p>
                       <p><label>Imagem</label>
                       <span class="field"><img src="<?php echo base_url(); ?>assets/pdv/img/img_produtos/<?php echo $row->imagem; ?>" width="130px" style="border:1px solid #aaa; background:#ebebeb;"/></span></p>                       
                       
                       <p><label>Adicional</label>
                        <span class="formwrapper">
                            <input type="radio" name="adicional" value="1" <?php if($row->adicional == '1'){echo 'checked';} ?> disabled/> Sim &nbsp;&nbsp;
                            <input type="radio" name="adicional" value="0" <?php if($row->adicional == '0'){echo 'checked';} ?> disabled/> Não
                        </span></p>
                                                                        
                       <p><label>Descrição Completa</label>
                       <span class="field"><textarea cols="80" rows="5" name="descricao_completa" class="mediuminput" disabled><?php echo $row->descricao_completa; ?></textarea></span></p>
                                                                        
                       <br clear="all" />
                                                
                       <p class="stdformbutton">
                       		<input type="reset" onclick="location.href='<?php echo site_url('produtos/editar/'.$row->id);?>';" value="Editar Dados">
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