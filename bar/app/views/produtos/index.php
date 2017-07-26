        <script>
			$('#menu_produtos').addClass('current');
		</script>
        <div class="maincontent noright">
        	<div class="maincontentinner">
            	
                <ul class="maintabmenu">
                	<li class="current"><a href="">Produtos</a></li>
                </ul><!--maintabmenu-->
                
                <div class="content">
                                
                <div class="contenttitle">
                	<h2 class="table"><span>Lista de Produtos</span></h2>
                </div><!--contenttitle-->
                <!--contenttitle-->
                <div class="tableoptions">
                	<button class="stdbtn btn_black" onclick="location.href='<?php echo site_url('produtos/cadastrar');?>';"><i class="user"></i>Cadastrar Produto</button>
                </div><!--tableoptions-->
                <table cellpadding="0" cellspacing="0" border="0" class="stdtable" id="dyntable">
                    <colgroup>
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                    </colgroup>
                    <thead>
                        <tr>                        
                            <th class="head0">Código</th>    
                            <th class="head1">Imagem</th>
                            <th class="head1">Nome</th>
                            <th class="head0">Valor</th>
                            <th class="head1">Ingredientes</th>
                            <th class="head0">Categoria</th>
                            <th class="head1">Opções</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th class="head0">Código</th>
                            <th class="head1">Imagem</th>
                            <th class="head1">Nome</th>
                            <th class="head0">Valor</th>
                            <th class="head1">Ingredientes</th>
                            <th class="head0">Categoria</th>
                            <th class="head1">Opções</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    <?php foreach($lista as $row){ ?>
                        <tr class="gradeX">  
                            <td class="center"><?php echo str_pad($row->id, 6, '0', STR_PAD_LEFT); ?></td>	
                            <td class="center"><img src="<?php echo base_url(); ?>assets/pdv/img/img_produtos/<?php echo $row->imagem; ?>" width="50px" /></td>
                            <td><?php echo $row->nome; ?></td>
                            <td>R$ <?php echo $row->valor; ?></td>
                            <td><?php echo $row->descricao; ?></td>
                            <td class="center">
                            <?php
				foreach($categorias as $cat){
					if($row->categoria == $cat->id) {
						echo $cat->nome;
					}
				}									
				?></td>
                            <td class="center">
                            	<a href="<?php echo site_url('produtos/visualizar/'.$row->id);?>" class="btn btn3 btn_search" title="Visualizar"></a>
                                <a href="<?php echo site_url('produtos/editar/'.$row->id);?>" class="btn btn3 btn_pencil" title="Editar"></a>
                                <a href="javascript:;" onclick="toggle('dialog<?php echo $row->id; ?>');" class="btn btn3 btn_trash" title="Deletar"></a>
                                <!-- Dialog window -->
                                <div id="dialog<?php echo $row->id; ?>" class="dialog" style="display:none;">
                                    <div id="dialog-bg">
                                        <div id="dialog-title">Deseja excluir este registro?</div>                                       
                                        <div id="dialog-buttons">
                                        <a href="<?php echo site_url('produtos/remover/'.$row->id);?>" class="large button" style="color:#FFF;background-color:#090;">Sim</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <a href="javascript:;" onclick="toggle('dialog<?php echo $row->id; ?>');" class="large button" style="color:#FFF;background-color:#F00;"">Não</a>
                                        </div>
                                    </div>	
                                </div>
                                <!-- Dialog window -->
                        	</td>
                        </tr>
                    <?php }; ?>        
                    </tbody>
                </table>
                
                <br clear="all" />
                    
                </div><!--content-->
                
            </div><!--maincontentinner--> 
        
            <!-- Toggle Script -->
            <script type="text/javascript">
            function toggle(x) {
            if (document.getElementById(x).style.display == 'none') {
            	document.getElementById(x).style.display = '';
            } else {
            	document.getElementById(x).style.display = 'none';
            }}
            </script>