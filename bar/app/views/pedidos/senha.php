<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Senha #<?php foreach($pedidos as $row){echo str_pad($row->id, 8, '0', STR_PAD_LEFT);} ?></title>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/cupom.css" type="text/css" />
<style>
	@media print { #noprint { display:none; }	}
</style>
</head>
<body>
<div class="cupom">
	<center><img src="<?php echo base_url(); ?>assets/pdv/img/logoguiche.png" width="180px" /></center><br />
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <?php foreach($config as $row){ ?>
        <tr>
            <td class="titulo-cupom">Pedido de Venda</td>
        </tr>
        <tr>
            <td class="titulo-cupom"><?php echo $row->nome_fantasia; ?><br><br></td>
        </tr>
        <!--<tr>
            <td class="descricao"><?php echo $row->rua; ?>, <?php echo $row->numero; ?> <?php echo $row->bairro; ?> <?php echo $row->cidade; ?>/<?php echo $row->estado; ?></td>
        </tr>
        <tr>
            <td class="descricao">CNPJ/CPF: <?php echo $row->cnpj_cpf; ?></td>
        </tr>-->
        <tr>
            <td class="descricao"><?php echo $row->website; ?></td>
        </tr>
        <tr>
            <td class="descricao">TEL: <?php echo $row->telefone; ?></td>
        </tr>
        <?php }; ?>
    </table>
    
    <hr>
        <p class="titulo-cupom" style="line-height:20px;"><font size="5">Senha:
			<?php
			foreach($pedidos as $row){
				if($row->id > 1000){ 
					echo str_pad(substr($row->id,(strlen($row->id)-3),strlen($row->id)), 3, '0', STR_PAD_LEFT); 
				} else {
					echo str_pad($row->id, 3, '0', STR_PAD_LEFT); 
				}
			}
			?></font>
        </p>
    <hr>
    <?php foreach($pedidos as $row){ ?>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr class="descricao">
        <td width="50%" align="left">Data: <?php echo $row->data; ?></td>
        <td width="50%" align="right">Hora: <?php echo $row->hora; ?></td> 
      </tr>
      <!--<tr class="descricao">   
        <td colspan=2 align="left">E-BIT SISTEMAS E DESIGN LTDA - WWW.E-BITSISTEMAS.COM.BR</td>
      </tr>-->
    </table>
    <?php }; ?>

</div>
</body>
<script src="<?php echo base_url(); ?>assets/pdv/js/jquery-1.11.1.min.js"></script>
<script>
	$(document).ready(function(){
		window.print();
	});
</script>
</html>