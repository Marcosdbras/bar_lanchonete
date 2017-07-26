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
                                                                               
                    <?php $attributes = array('class' => 'stdform', 'id' => 'form1');echo form_open_multipart('categorias/salvar', $attributes);?>
                    <input type="hidden" name="action" value="cadastrar"/>
                    	<p><label>Status</label>
                        <span class="formwrapper">
                            <input type="radio" name="status" value="1" checked/> Ativo &nbsp;&nbsp;
                            <input type="radio" name="status" value="0"/> Desativado
                        </span></p>
                        
                       <p><label>Nome</label>
                       <span class="field"><input type="text" name="nome" class="mediuminput" required/></span></p>
                                              
                       <p><label>Ordem</label>
                       <span class="field"><input type="text" name="ordem" class="smallinput" style="width: calc(20% - 3px) !important"/>
                       </span></p>
                       
                       <p><label>Imagem</label>
                       <span class="field"><input type="file" name="userfile" class="smallinput" /></span>
                       <small class="desc">Tamanho máximo: 1024x800, 512 kb</small></p>
                       
                       <p><label>Descrição</label>
                       <span class="field"><textarea cols="80" rows="5" name="descricao" class="mediuminput"></textarea></span></p>
                                                                                               
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