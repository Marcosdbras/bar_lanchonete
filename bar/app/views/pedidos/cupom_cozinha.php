<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cupom Cozinha #<?php foreach($pedidos as $row){echo str_pad($row->id, 8, '0', STR_PAD_LEFT);} ?></title>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/cupom.css" type="text/css" />
<style>
	@media print { #noprint { display:none; }	}
</style>
</head>
<body>
<div class="cupom">
	
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <?php foreach($config as $row){ ?>
        <tr>
            <td class="titulo-cupom">Pedido da Cozinha</td>
        </tr>       
        <?php }; ?>
        <?php foreach($pedidos as $row){ ?>
				<tr>
					<td class="titulo-cupom">Senha: <?php echo str_pad($row->id, 3, '0', STR_PAD_LEFT); ?></td>
				</tr> 				
			<?php } ?>
    </table>
    
    <hr>
    
    <!-- Check List Cozinha -->
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <?php foreach($pedidos as $row){ ?>
        <tr>
            <td class="descricao_cozinha">Observações: <?php echo $row->obs; ?></td>
        </tr>
        <?php }; ?>
    </table>
    
    <hr>
    
    <p class="titulo-cupom">Produtos</p>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">      
      <tr class="descricao-produto">
        <td style="width: 23px;">Qnt.</td>
        <td colspan="3">DESC.</td>
        <!--<td>VL.UNIT.</td>
        <td>SUBTOT.</td>-->
      </tr>
      <?php $m1 = ''; $m2 = ''; $atual = ''; $n_m2 = ''; $n_a = '' ?>
      
      <?php
		  $quant_prod = 1;
		  $cont_tamanho = 0;
		  $tamanho = sizeof($produtos);
		  foreach($produtos as $row){
			  foreach($row as $item){
				 // echo $item.' - ';
			  }
			  //echo $row->nome;
			  //echo '<br>';
		  }
		  //echo mysql_result($produtos);
		  //echo "tamanho = $tamanho";
	 
      

        
        //$prod = $this->crud_model->listar('produtos WHERE id='.$row->id_produto);
        
        
		
		$n_a = '-1';
		
        foreach($produtos as $row2){ 
			
			$cont_tamanho = $cont_tamanho + 1;
			
			//echo $row2->nome;
			//echo '<br>';
			
			$m1 = $m2;
			$m2 = $atual;
			$atual = $row2->id;
			
			$n_m2 = $n_a;
			$n_a = trim(substr($row2->nome, 0, 18));

			if (($cont_tamanho != 1)||($cont_tamanho == $tamanho)){
				if ($cont_tamanho < $tamanho){
					//Quando nao for o primeiro nem o ultimo
					
					if($row2->adicional == '0'){
						
						if ($atual == $m2){
							// Mesmo produto
							$quant_prod = $quant_prod + 1;
						}else{
							//echo $quant_prod. $cont_tamanho;
							// Diferente Produto
							if ($n_m2 != '-1'){
								echo "<tr class='descricao_cozinha'><td style='padding-top:10px;'>$quant_prod</td>";
								echo "<td colspan='2' style='padding-top:10px;'>$n_m2</td></tr>";
								$quant_prod = 1;
							}
						}
					}else{
						if ($n_m2 == '-1'){
							$quant_prod = 1;
							echo "<tr class='descricao_cozinha'><td>&nbsp;</td><td>└</td>";
							echo "<td style='padding-left: 10px;'>$n_a</td></tr>";
							$n_a = '-1';
						}else{
							if ($m2 == $m1){
								// Mesmo produto
								$quant_prod = $quant_prod - 1;
								echo "<tr class='descricao_cozinha'><td style='padding-top:10px;'>$quant_prod</td>";
								echo "<td colspan='2' style='padding-top:10px;'>$n_m2</td></tr>";
								$quant_prod = 1;
								echo "<tr class='descricao_cozinha'><td style='padding-top:10px;'>1</td>";
								echo "<td colspan='2' style='padding-top:10px;'>$n_m2</td></tr>";
								
								echo "<tr class='descricao_cozinha'><td>&nbsp;</td><td>└</td>";
								echo "<td style='padding-left: 10px;'>$n_a</td></tr>";
								$n_a = '-1';
							}else{
								// Diferente Produto
								echo "<tr class='descricao_cozinha'><td style='padding-top:10px;'>$quant_prod</td>";
								echo "<td colspan='2' style='padding-top:10px;'>$n_m2</td></tr>";
								$quant_prod = 1;
								echo "<tr class='descricao_cozinha'><td>&nbsp;</td><td>└</td>";
								echo "<td style='padding-left: 10px;'>$n_a</td></tr>";
								$n_a = '-1';
							}
						}
					}
					
				}else{
					//Quando for o Ultimo
					if($row2->adicional == '0'){
						if ($atual == $m2){
															
							$quant_prod = $quant_prod + 1;

							echo "<tr class='descricao_cozinha'><td style='padding-top:10px;'>$quant_prod</td>";
							echo "<td colspan='2' style='padding-top:10px;'>$n_a</td></tr>";
						}else{
							if( $n_m2 == '-1'){
								echo "<tr class='descricao_cozinha'><td style='padding-top:10px;'>$quant_prod</td>";
								echo "<td colspan='2' style='padding-top:10px;'>$n_a</td></tr>";
							}else{
								// Diferente Produto
								echo "<tr class='descricao_cozinha'><td style='padding-top:10px;'>$quant_prod</td>";
								echo "<td colspan='2' style='padding-top:10px;'>$n_m2</td></tr>";
								$quant_prod = 1;
								echo "<tr class='descricao_cozinha'><td style='padding-top:10px;'>$quant_prod</td>";
								echo "<td colspan='2' style='padding-top:10px;'>$n_a</td></tr>";
							}
						}
					}else{
						if ($n_m2 == '-1'){
							$quant_prod = 1;
							echo "<tr class='descricao_cozinha'><td>&nbsp;</td><td>└</td>";
							echo "<td style='padding-left: 10px;'>$n_a</td></tr>";
							$n_a = '-1';
						}else{
							if ($m2 == $m1){
								// Mesmo produto
								$quant_prod = $quant_prod - 1;
								echo "<tr class='descricao_cozinha'><td style='padding-top:10px;'>$quant_prod</td>";
								echo "<td colspan='2' style='padding-top:10px;'>$n_m2</td></tr>";
								$quant_prod = 1;
								echo "<tr class='descricao_cozinha'><td style='padding-top:10px;'>1</td>";
								echo "<td colspan='2' style='padding-top:10px;'>$n_m2</td></tr>";
								
								echo "<tr class='descricao_cozinha'><td>&nbsp;</td><td>└</td>";
								echo "<td style='padding-left: 10px;'>$n_a</td></tr>";
								$n_a = '-1';
							}else{
								// Diferente Produto
								echo "<tr class='descricao_cozinha'><td style='padding-top:10px;'>$quant_prod</td>";
								echo "<td colspan='2' style='padding-top:10px;'>$n_m2</td></tr>";
								$quant_prod = 1;
								echo "<tr class='descricao_cozinha'><td>&nbsp;</td><td>└</td>";
								echo "<td style='padding-left: 10px;'>$n_a</td></tr>";
								$n_a = '-1';
							}
						}
					}
				}
			}
			
		} ?>      
    </table>

</div>
</body>
<script src="<?php echo base_url(); ?>assets/pdv/js/jquery-1.11.1.min.js"></script>
<script>
	$(document).ready(function(){
		window.print();
	});
</script>
</html>