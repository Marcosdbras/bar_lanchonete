<?php if(!$this->session->userdata('is_logged_in')){ $this->load->view('login/login'); } ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br">
<head>

<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/style.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/dialog.css" type="text/css" />
<link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/plugins/jquery-1.7.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/plugins/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/custom/tables.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/custom/form.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/custom/general.js"></script>

<meta charset="UTF-8">
<style>
.maincontent {
	margin: 0 5px 0 5px !important;
}
</style>
</head>

<body class="loggedin">
    <!-- START OF MAIN CONTENT -->
    <div class="mainwrapper">
     	<div class="mainwrapperinner">
        <div class="maincontent noright">
        	<div class="maincontentinner"> 
                	<?php foreach($lista as $row){ ?>
                    <div class="content widgetgrid">
                        <div class="widgetbox"  style="width:100%">
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
					</div>
                    <div class="content widgetgrid">
                    	<div class="widgetbox"  style="width:100%">
                            <div class="title"><h2 class="tabbed"><span>Anotacoes</span></h2></div>
                            <div class="widgetcontent announcement">
                                <p><?php echo $row->notas; ?></p>
                            </div><!--widgetcontent-->
                        </div><!--widgetbox-->
                    </div>
					<?php }; ?>                    
                    <div class="content widgetgrid">
                        <div class="widgetbox" style="width:100%">
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
            </div><!--maincontentinner-->