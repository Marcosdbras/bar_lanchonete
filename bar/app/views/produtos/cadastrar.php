        <script>
			$('#menu_produtos').addClass('current');
		</script>
        <div class="maincontent noright">
        	<div class="maincontentinner">
            	
                <ul class="maintabmenu">
                	<li class="current"><a href="">Cadastrar Produto</a></li>
                </ul><!--maintabmenu-->
                
                <div class="content">
                
                    <div class="contenttitle">
                    	<h2 class="form"><span>Cadastro</span></h2>
                    </div><!--contenttitle-->
                                                                               
                    <?php $attributes = array('class' => 'stdform', 'id' => 'form1');echo form_open_multipart('produtos/salvar', $attributes);?>
                    <input type="hidden" name="action" value="cadastrar"/>
                       <p><label>Nome</label>
                       <span class="field"><input type="text" name="nome" class="mediuminput" required/></span></p>
                       
                       <p><label>Ingredientes</label>
                       <span class="field"><input type="text" name="descricao" class="mediuminput"/></span><span class="field">
                       <option value="g" ></option>
                       		<option value="kg"></option>
                            <option value="ml"></option>
                            <option value="l" ></option>
                            <option value="un"></option>
                       <option value="pct"></option>
                       </span></p>

                       
                       <p><label>Valor (R$)</label>
                       <span class="field"><input type="text" name="valor" class="smallinput" /></span>
                       <small class="desc">Utilize "." Ponto como separador Ex. 1.99</small></p>
                       
                       <p><label>Categoria</label>
                       <span class="field">
                       <select name="categoria" class="smallinput" style="width:40.9% !important">
                       <option></option>
                       <?php
				foreach($categorias as $cat){
					echo '<option value="'.$cat->id.'">'.$cat->nome.'</option>';
				}									
			?>
                       </select>
                       </span></p>
                       
                       <p><label>Imagem</label>
                       <span class="field"><input type="file" name="userfile" class="smallinput" /></span>
                       <small class="desc">Tamanho máximo: 1024x800, 512 kb</small></p>
                       
                       <p><label>Adicional</label>
                        <span class="formwrapper">
                            <input type="radio" name="adicional" value="1"/> Sim &nbsp;&nbsp;
                            <input type="radio" name="adicional" value="0" checked/> Não
                        </span></p>
                                                                        
                       <p><label>Descrição Completa</label>
                       <span class="field"><textarea cols="80" rows="5" name="descricao_completa" class="mediuminput"></textarea></span></p>
                                                                        
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
			$(document).ready(function () {
			   $('input').keypress(function (e) {
					var code = null;
					code = (e.keyCode ? e.keyCode : e.which);                
					return (code == 13) ? false : true;
			   });
			});
			</script>