<?php if(!$this->session->userdata('is_logged_in')){ redirect('login/login'); } ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br">
<head>

<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title><?php echo $pagina; ?> - Euro Burger</title>
<link href="<?php echo base_url(); ?>assets/pdv/img/favicon.ico" rel="shortcut icon" type="img/vnd.microsoft.icon">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/style.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/dialog.css" type="text/css" />
<link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/plugins/jquery-1.7.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/plugins/jquery.effects.explode.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/plugins/jquery.effects.core.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/plugins/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/plugins/jquery.colorbox-min.js"></script>
<!--<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/custom/elements.js"></script>
<!--<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/custom/general.js"></script>-->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/custom/tables.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/custom/media.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/custom/form.js"></script>

<script type="text/javascript" src="http://demo.themepixels.com/webpage/starlight/js/custom/charts.js"></script>
<script type="text/javascript" src="http://demo.themepixels.com/webpage/starlight/js/plugins/jquery.flot.min.js"></script>

<meta charset="UTF-8"></head>

<body class="loggedin">

	<!-- START OF HEADER -->
	<div class="header">
    	<div class="headerinner">
        	
            <a href="" class="logo_a">Euro Burger</a>            
              
            <div class="headright">
            	<div class="headercolumn">&nbsp;</div>            	
            	<div id="notiPanel" class="headercolumn">
                	<div class="notiwrapper">
                        <a href="<?php echo base_url(); ?>guiche" class="noalert" target="_blank"> Guichê </a>
                    </div><!--notiwrapper-->
                    <div class="notiwrapper">
                        <a href="<?php echo base_url(); ?>pdv" class="noalert" target="_blank" <?php if($pdv == '1'){echo 'style="background:#228B22;"';} ?>>
						<?php if($pdv == '1'){echo 'PDV Aberto';}else{echo 'PDV Fechado';} ?></a>
                    </div><!--notiwrapper-->
                </div><!--headercolumn-->
                <div id="userPanel" class="headercolumn">
                    <a href="" class="userinfo">
                        <img src="<?php echo base_url(); ?>assets/admin/images/avatar.png" alt="" class="radius2" />
                        <span><strong><?php foreach($user as $usuario){ echo $usuario->nome; } ?></strong></span>
                    </a>
                </div><!--headercolumn-->
            </div><!--headright-->        
        </div><!--headerinner-->
	</div><!--header-->
    <!-- END OF HEADER -->
        
    <!-- START OF MAIN CONTENT -->
    <div class="mainwrapper">
    
     	<div class="mainwrapperinner">
         	
        <div class="mainleft">
        
          	<div class="mainleftinner">
            
              	<div class="leftmenu">
            		<ul>
                    	<li id="menu_index"><a href="<?php echo site_url('home/index'); ?>" class="dashboard"><span>Página Inicial</span></a></li>
                        <li id="menu_clientes"><a href="<?php echo site_url('clientes/index'); ?>" class="clients"><span>Clientes</span></a></li>
                        <li id="menu_categorias"><a href="<?php echo site_url('categorias/index'); ?>" class="clients"><span>Categorias</span></a></li>
                        <li id="menu_produtos"><a href="<?php echo site_url('produtos/index'); ?>" class="produtos"><span>Produtos</span></a></li>
                        <li id="menu_pedidos"><a href="<?php echo site_url('pedidos/index'); ?>" class="pedidos"><span>Pedidos</span></a></li>
                        <li id="menu_mesas"><a href="<?php echo site_url('mesas/index'); ?>" class="table"><span>Mesas</span></a></li>
                        <li id="menu_usuarios"><a href="<?php echo site_url('usuarios/index'); ?>" class="users"><span>Usuários</span></a></li>
                        <li id="menu_config"><a href="<?php echo site_url('configuracoes/index'); ?>" class="config"><span>Configurações</span></a></li>
                    </ul>
                        
                </div><!--leftmenu-->
            </div><!--mainleftinner-->
        </div><!--mainleft-->