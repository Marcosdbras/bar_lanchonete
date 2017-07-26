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
            	
                <div class="content">
                                
                <div class="contenttitle">
                	<h2 class="table"><span>Lista de Clientes</span></h2>
                </div><!--contenttitle-->
                <!--contenttitle-->
                <div class="tableoptions">
                	<button class="black" onclick="location.href='<?php echo site_url('clientes/cadastrar');?>';"><i class="user"></i>Cadastrar Cliente</button>
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
                            <th class="head1">Nome</th>
                            <th class="head0">Telefone/Celular</th>
                            <th class="head1">E-mail</th>
                            <th class="head0">Endereço</th>
                            <th class="head1">Opções</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th class="head0">Código</th>
                            <th class="head1">Nome</th>
                            <th class="head0">Telefone/Celular</th>
                            <th class="head1">E-mail</th>
                            <th class="head0">Endereço</th>
                            <th class="head1">Opções</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    <?php foreach($lista as $row){ ?>
                        <tr class="gradeX">
                            <td class="center"><?php echo str_pad($row->id, 6, '0', STR_PAD_LEFT); ?></td>
                            <td><?php echo $row->nome; ?></td>
                            <td class="center"><?php if($row->telefone!='0'){echo $row->telefone;} ?> <?php if($row->celular!='0'){echo '- '.$row->celular;} ?></td>
                            <td><?php echo $row->email; ?></td>
                            <td><?php echo $row->rua; ?>, <?php echo $row->numero; ?> - <?php echo $row->bairro; ?></td>
                            <td class="center">
                            	<a href="<?php echo site_url('clientes/visualizar/'.$row->id);?>" class="btn btn3 btn_search" title="Visualizar"></a>
                                <a href="<?php echo site_url('clientes/editar/'.$row->id);?>" class="btn btn3 btn_pencil" title="Editar"></a>
                                <a href="javascript:;" onclick="toggle('dialog<?php echo $row->id; ?>');" class="btn btn3 btn_trash" title="Deletar"></a>
                                <!-- Dialog window -->
                                <div id="dialog<?php echo $row->id; ?>" class="dialog" style="display:none;">
                                    <div id="dialog-bg">
                                        <div id="dialog-title">Deseja excluir este registro?</div>                                       
                                        <div id="dialog-buttons">
                                        <a href="<?php echo site_url('clientes/remover/'.$row->id);?>" class="large button" style="color:#FFF;background-color:#FF0000;">Sim</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <a href="javascript:;" onclick="toggle('dialog<?php echo $row->id; ?>');" class="large button" style="color:#FFF;background-color:#090;"">Não</a>
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