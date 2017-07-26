        <script>
			$('#menu_categorias').addClass('current');
		</script>
        <div class="maincontent noright">
        	<div class="maincontentinner">
            	
                <ul class="maintabmenu">
                	<li class="current"><a href="">Categorias</a></li>
                </ul><!--maintabmenu-->
                
                <div class="content">
                                
                <div class="contenttitle">
                	<h2 class="table"><span>Lista de Categorias</span></h2>
                </div><!--contenttitle-->
                <!--contenttitle-->
                <div class="tableoptions">
                	<button class="stdbtn btn_black" onclick="location.href='<?php echo site_url('categorias/cadastrar');?>';"><i class="user"></i>Cadastrar Categoria</button>
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
                            <th class="head0">Descrição</th>
                            <th class="head1">Ordem</th>
                            <th class="head0">Status</th>
                            <th class="head1">Opções</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>                        
                            <th class="head0">Código</th>    
                            <th class="head1">Imagem</th>
                            <th class="head1">Nome</th>
                            <th class="head0">Descrição</th>
                            <th class="head1">Ordem</th>
                            <th class="head0">Status</th>
                            <th class="head1">Opções</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    <?php foreach($lista as $row){ ?>
                        <tr class="gradeX">  
                            <td class="center"><?php echo str_pad($row->id, 6, '0', STR_PAD_LEFT); ?></td>	
                            <td class="center">
                            <?php if($row->img == ''){ ?>
                            	<img src="<?php echo base_url(); ?>assets/pdv/img/img_produtos/sem_imagem.png" width="50px" />
                            <?php }else{ ?>
                            	<img src="<?php echo base_url(); ?>assets/pdv/img/img_produtos/<?php echo $row->img; ?>" width="50px" />
                            <?php } ?>
                            </td>
                            <td><?php echo $row->nome; ?></td>
                            <td><?php echo $row->descricao; ?></td>
                            <td class="center"><?php echo $row->ordem; ?></td>
                            <td class="center">
                            <?php
                            	if($row->status == 1) {
					echo "Ativo";
				}else{
					echo "Desativado";
				}									
				?>
				</td>
                            <td class="center">
                                <a href="<?php echo site_url('categorias/editar/'.$row->id);?>" class="btn btn3 btn_pencil" title="Editar"></a>
                                <a href="javascript:;" onclick="toggle('dialog<?php echo $row->id; ?>');" class="btn btn3 btn_trash" title="Deletar"></a>
                                <!-- Dialog window -->
                                <div id="dialog<?php echo $row->id; ?>" class="dialog" style="display:none;">
                                    <div id="dialog-bg">
                                        <div id="dialog-title">Deseja excluir este registro?</div>                                       
                                        <div id="dialog-buttons">
                                        <a href="<?php echo site_url('categorias/remover/'.$row->id);?>" class="large button" style="color:#FFF;background-color:#090;">Sim</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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