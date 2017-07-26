        <script>
			$('#menu_index').addClass('current');
		</script>
        <div class="maincontent noright">
        	<div class="maincontentinner">
            	
                <ul class="maintabmenu">
                	<li class="current"><a href="<?php echo base_url(); ?>index.php/home">Pagina Inicial</a></li>
                </ul><!--maintabmenu-->
                <div class="content">  
                
	                    <div class="contenttitle">
                            <h2 class="chart"><span>Grafico - EM TESTE</span></h2>
                        </div>
                        <br />
                        <?php
							#echo $this->gcharts->LineChart('Pedidos')->outputInto('stock_div');	
												
							#echo $this->gcharts->div(1200, 300);
														
							#if($this->gcharts->hasErrors())	{
														
								#echo $this->gcharts->getErrors();	
													
							#}			
						?>
                        <iframe src="http://euroburger.com.br/Graficos/Grafico.php" scrolling="no" frameborder="0" width="100%" height="350px"></iframe>
                        
                                       
                        <div class="widgetbox">
                        <div class="title"><h2 class="tabbed"><span>Ultimos Pedidos Realizados</span></h2></div>
                        <div class="widgetcontent padding0 statement">
                           <table cellpadding="0" cellspacing="0" border="0" class="stdtable">
                           		<colgroup>
                                    <col class="con0" />
                                    <col class="con1" />
                                    <col class="con0" />
                                </colgroup>
                                <thead>
                                    <tr>
                                        <th class="head0"># Pedido</th>
                                        <th class="head1">Cliente</th>
                                        <th class="head0">Data do Pedido</th>
                                        <th class="head1">Total</th>
                                        <th class="head0">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($pedidos as $row){ ?>
                                    <tr>
                                        <td class="center"><?php echo str_pad($row->id, 6, '0', STR_PAD_LEFT); ?></td>
                                        <td><?php echo $row->cliente; ?></td>
                                        <td class="center"><?php echo $row->data; ?> <?php echo $row->hora; ?></td>
                                        <td>R$ <?php echo $row->total; ?></td>
                                        <td><?php if($row->estado=='0'){echo 'Em aberto';}elseif($row->estado=='1'){echo 'Fechado';} ?></td>
                                    </tr>
                                <?php }; ?> 
                                </tbody>
                            </table>
                        </div><!--widgetcontent-->
                        
                    </div><!--widgetbox-->
                                  
                    <div class="widgetbox">
                        <div class="title"><h2 class="tabbed"><span>Ultimos Clientes Cadastrados</span></h2></div>
                        <div class="widgetcontent padding0 statement">
                           <table cellpadding="0" cellspacing="0" border="0" class="stdtable">
                           		<colgroup>
                                    <col class="con0" />
                                    <col class="con1" />
                                    <col class="con0" />
                                </colgroup>
                                <thead>
                                   	<tr>
                                   		<th class="head0">Código</th>
                                        <th class="head1">Nome</th>
                                        <th class="head0">Telefone</th>
                                        <th class="head1">Celular</th>
                                        <th class="heado">Endereço</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($clientes as $row){ ?>
                                    <tr>
                                        <td class="center"><?php echo str_pad($row->id, 6, '0', STR_PAD_LEFT); ?></td>
                                        <td><?php echo $row->nome; ?></td>
                                        <td class="center"><?php echo $row->telefone; ?></td>
                                        <td><?php echo $row->celular; ?></td>
                                        <td><?php echo $row->rua; ?>, <?php echo $row->numero; ?> - <?php echo $row->bairro; ?> - <?php echo $row->cidade; ?> - <?php echo $row->estado; ?></td>
                                    </tr>
                                <?php }; ?> 
                                </tbody>
                            </table>
                        </div><!--widgetcontent-->
                    </div><!--widgetbox-->                                            
                    <br clear="all" /><br />                    
                </div><!--content-->                
            </div><!--maincontentinner-->   
                   