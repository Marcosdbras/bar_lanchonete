        <script>
			$('#menu_pedidos').addClass('current');
		</script>
        <div class="maincontent noright">
        	<div class="maincontentinner">
            	
                <ul class="maintabmenu">
                	<li class="current"><a href="">Pedidos</a></li>
                </ul><!--maintabmenu-->
                
                <div class="content">
                                
                <div class="contenttitle">
                	<h2 class="table"><span>Lista de Pedidos</span></h2>
                </div><!--contenttitle-->
                <!--contenttitle-->
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
                            <th class="head0">Número Pedido</th>
                            <th class="head1">Cliente</th>
                            <th class="head0">Data do Pedido</th>
                            <th class="head1">Total</th>
                            <th class="head0">Status</th>
                            <th class="head1">Opções</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th class="head0">Número Pedido</th>
                            <th class="head1">Cliente</th>
                            <th class="head0">Data do Pedido</th>
                            <th class="head1">Total</th>
                            <th class="head0">Status</th>
                            <th class="head1">Opções</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    <?php foreach($lista as $row){ ?>
                        <tr class="gradeX">
                            <td class="center"><?php echo str_pad($row->id, 6, '0', STR_PAD_LEFT); ?></td>
                            <td><?php echo $row->cliente; ?></td>
                            <td class="center"><?php echo $row->data; ?> <?php echo $row->hora; ?></td>
                            <td>R$ <?php echo number_format(($row->total), 2, '.', ','); ?></td>
                            <td><?php if($row->estado=='0'){echo 'Em aberto';}elseif($row->estado=='1'){echo 'Fechado';} ?></td>
                            <td class="center">
                                <a href="<?php echo site_url('pedidos/cupom/'.$row->id);?>" class="btn btn3 btn_search" title="Visualizar Cupom" target="_blank"></a>                            
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