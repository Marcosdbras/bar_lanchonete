<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cupom #<?php foreach($pedidos as $row){echo str_pad($row->id, 8, '0', STR_PAD_LEFT);} ?></title>
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
        <tr>
            <td class="descricao"><?php echo $row->rua; ?>, <?php echo $row->numero; ?> <?php echo $row->bairro; ?> <?php echo $row->cidade; ?>/<?php echo $row->estado; ?></td>
        </tr>
        <tr>
            <td class="descricao">CNPJ/CPF: <?php echo $row->cnpj_cpf; ?></td>
        </tr>
        <tr>
            <td class="descricao"><?php echo $row->website; ?></td>
        </tr>
        <tr>
            <td class="descricao">TEL: <?php echo $row->telefone; ?></td>
        </tr>
        <?php }; ?>
    </table>
    
    <hr>
    
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <?php foreach($pedidos as $row){ ?>
        <!--<tr>
            <td class="titulo-cupom"><?php echo str_pad($row->id, 8, '0', STR_PAD_LEFT); ?></td>
        </tr>-->
        <tr>
            <td class="titulo-cupom" ><?php echo $cliente_nome; ?></td>
        </tr>
        <!--<tr>
            <td class="descricao"><?php echo $cliente_nome; ?></td>
        </tr>-->
        <tr>
            <td class="descricao" style="font-size:15px; line-height:14px;"><?php echo $cliente_rua; ?> <?php echo $cliente_numero; ?> <?php echo $cliente_complemento; ?> <?php echo $cliente_bairro; ?> <?php echo $cliente_cidade; ?> <?php echo $cliente_estado; ?></td>
        </tr>
        <tr>
            <td class="descricao" style="font-size:15px; line-height:14px;">TEL: <?php echo $cliente_telefone; ?> <?php echo $cliente_celular; ?></td>
        </tr>
        <tr>
            <td class="descricao">Observações:</td>
        </tr>
        <tr>
            <td class="descricao" style="font-size:15px; line-height:14px;"><?php echo $row->obs; ?></td>
        </tr>
        <?php }; ?>
    </table>
    
    <hr>
    <p class="titulo-cupom">Produtos</p>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">      
      <tr class="descricao-produto">
        <td>CÓD.</td>
        <td>QTD.</td>
        <td colspan=2>DESC.</td>
        <td>V.UNIT. </td>
        <td>SUBT.</td>
      </tr>
      <?php foreach($produtos as $row){ ?>
      <tr class="descricao">
        <td><?php echo str_pad($row->id_produto, 3, '0', STR_PAD_LEFT); ?>&nbsp;</td>
        <td><?php echo $row->quantidade; ?>&nbsp;</td>
        <td colspan=2 style="width: 90px;"> <?php echo trim(substr($row->nome_produto, 0, 14)) ?></td>
        <td style="text-align:right"><?php echo number_format($row->valor, 2, '.', ','); ?>&nbsp;</td>
        <td style="text-align:right"><?php echo number_format(($row->quantidade * $row->valor), 2, '.', ','); ?></td>
      </tr>
      <?php }; ?>
    </table>
    
    <br>
    
    <?php foreach($pedidos as $row){ ?>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr class="descricao">
        <td>SUBTOTAL:</td>
        <td align="right"><?php echo number_format($row->sub_total, 2, '.', ','); ?></td>
      </tr>
      <tr class="descricao">
        <td>DESCONTO:</td>
        <td align="right"><?php echo number_format($row->desconto, 2, '.', ','); ?></td>
      </tr>
      <tr class="descricao destaque">
        <td>TOTAL:</td>
        <td align="right"><?php echo number_format($row->total, 2, '.', ','); ?></td>
      </tr>
    </table>
    <?php }; ?>
    
    <hr>
        
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <?php foreach($dinheiro as $row){?>
      <tr class="descricao">
        <td>Dinheiro:</td>
        <td align="right"><?php echo number_format($row->valor, 2, '.', ','); ?></td>
      </tr>
      <?php }; ?>
      <?php foreach($credito as $row){?>
      <tr class="descricao">
        <td>Cartão de Crédito:</td>
        <td align="right"><?php echo number_format($row->valor, 2, '.', ','); ?></td>
      </tr>
      <?php }; ?>
      <?php foreach($debito as $row){?>
      <tr class="descricao">
        <td>Cartão de Débito:</td>
        <td align="right"><?php echo number_format($row->valor, 2, '.', ','); ?></td>
      </tr>
      <?php }; ?>
      <?php foreach($cheque as $row){?>
      <tr class="descricao">
        <td>Cheque:</td>
        <td align="right"><?php echo number_format($row->valor, 2, '.', ','); ?></td>
      </tr> 
      <?php }; ?>
      <?php foreach($outros as $row){?>     
      <tr class="descricao">
        <td>Outros:</td>
        <td align="right"><?php echo number_format($row->valor, 2, '.', ','); ?></td>
      </tr>
      <?php }; ?>
      <?php foreach($troco as $row2){?>
      <tr class="descricao">
        <td>TROCO:</td>
        <td align="right"><?php echo number_format(($row2->valor), 2, '.', ','); ?></td>
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
    
    <div class="titulo-cupom">NÃO É DOCUMENTO FISCAL</div>
    
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