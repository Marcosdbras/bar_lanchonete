        <script>
			$('#menu_clientes').addClass('current');
		</script>
        <div class="maincontent noright">
        	<div class="maincontentinner">
            	
                <ul class="maintabmenu">
                	<li class="current"><a href="">Visualizar Cliente</a></li>
                </ul><!--maintabmenu-->
                
                <div class="content">
                	<?php foreach($lista as $row){ ?>
                    <div class="content widgetgrid">
                        <div class="widgetbox" style="width:48%">
                            <div class="title"><h2 class="tabbed"><span>Dados do Cliente</span></h2></div>
                            <div class="widgetcontent padding0">
                                <ul class="activitylist">
                                    <li class="user"><a href=""><strong>Nome: 		</strong> <?php echo $row->nome; ?></a></li>
                                    <li class="call"><a href=""><strong>Telefone 01:</strong> <?php echo $row->telefone; ?></a></li>
                                    <li class="call"><a href=""><strong>Telefone 02:</strong> <?php echo $row->celular; ?></a></li>
                                    <li class="message"><a href=""><strong>E-mail:	</strong> <?php echo $row->email; ?></a></li>
                                    <li class="tables"><a href=""><strong>Endereço:	</strong> <?php echo $row->rua; ?>, 
                                    <?php echo $row->numero; ?> <?php echo $row->complemento; ?> - <?php echo $row->bairro; ?> - <?php echo $row->cidade; ?>/<?php echo $row->estado; ?></a></li>
                                </ul>
                            </div><!--widgetcontent-->
                        </div><!--widgetbox-->
                        <div class="widgetbox" style="width:46%;">
                            <div class="title"><h2 class="tabbed"><span>Anotacoes</span></h2></div>
                            <div class="widgetcontent announcement">
                                <p><?php echo $row->notas; ?></p>
                            </div><!--widgetcontent-->
                        </div><!--widgetbox-->
					</div>
					<?php }; ?>                    
                    <div class="content widgetgrid">
                        <div class="widgetbox" style="width:48%">
                        <div class="title"><h2 class="tabbed"><span>Pedidos do Cliente</span></h2></div>
                        <div class="widgetcontent padding0 statement">
                           <table cellpadding="0" cellspacing="0" border="0" class="stdtable">
                                <colgroup>
                                    <col class="con0" />
                                    <col class="con1" />
                                    <col class="con0" />
                                    <col class="con1" />
                                </colgroup>
                                <thead>
                                    <tr>
                                        <th class="head0">Número do Pedido</th>
                                        <th class="head1">Data</th>                                        
                                        <th class="head0">Hora</th>
                                        <th class="head1">Total</th>
                                        <th class="head0">Opções</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($pedidos as $row){ ?>
                                    <tr>
                                        <td><?php echo str_pad($row->id, 6, '0', STR_PAD_LEFT); ?></td>
                                        <td><?php echo $row->data; ?></td>
                                        <td><?php echo $row->hora; ?></td>
                                        <td>R$ <?php echo $row->total; ?></td>                                        
                                        <td><a href="<?php echo site_url('pedidos/cupom/'.$row->id);?>" class="btn btn3 btn_search" target="_blank" title="Visualizar"></a></td>
                                    </tr>
                              	<?php }; ?>
                                </tbody>
                            </table>
                        </div><!--widgetcontent-->
                    </div><!--widgetbox-->
					</div>
                                                            
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