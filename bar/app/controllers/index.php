<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>..:: PDV Online ::..</title>
<meta name="viewport" content="width=device-width"/>
<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<!-- CSS -->
<link href="<?php echo base_url(); ?>assets/pdv/css/style.css" rel="stylesheet"/>
<link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">


<script src="<?php echo base_url(); ?>assets/pdv/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url(); ?>assets/pdv/js/tam_tela.js"></script>
<script src="<?php echo base_url(); ?>assets/pdv/js/menu_produtos.js"></script>
<script src="<?php echo base_url(); ?>assets/pdv/js/menu_clientes.js"></script>
<script src="<?php echo base_url(); ?>assets/pdv/js/bloqueio.js"></script>
<script src="<?php echo base_url(); ?>assets/pdv/js/pedidos.js"></script>

<script> 

	$(document).ready(function() {
		function myDate(){
			var now = new Date();
			var hora = '';
			var outHour = now.getHours();
			if (outHour >12){
				newHour = outHour;
				outHour = newHour;
			}
			if(outHour<10){
				hora = hora + "0"+outHour;
			}else{
				hora = hora + outHour;
			}
			hora = hora + ':';
			
			var outMin = now.getMinutes();
			if(outMin<10){
				hora = hora + "0"+outMin;
			}else{
				hora = hora + outMin;
			}
			hora = hora + ':';
			
			var outSec = now.getSeconds();
			if(outSec<10){
				hora = hora + "0"+outSec;
			}else{
				hora = hora + outSec;
			}
			
			data1 = data();
			$('#menu_topo_right').html(data1+' - '+hora); 
		} 
		myDate();
		setInterval(function(){   myDate();}, 1000);
	});
	
	function data(){
		Hoje = new Date();
		Data = Hoje.getDate();
		Dia = Hoje.getDay();
		Mes = Hoje.getMonth();
		Ano = Hoje.getFullYear();
		
		if(Data < 10) {
			Data = "0" + Data;
		}
		NomeDia = new Array(7)
		NomeDia[0] = "domingo"
		NomeDia[1] = "segunda-feira"
		NomeDia[2] = "terça-feira"
		NomeDia[3] = "quarta-feira"
		NomeDia[4] = "quinta-feira"
		NomeDia[5] = "sexta-feira"
		NomeDia[6] = "sábado"
	
		NomeMes = new Array(12)
		NomeMes[0] = "Janeiro"
		NomeMes[1] = "Fevereiro"
		NomeMes[2] = "Março"
		NomeMes[3] = "Abril"
		NomeMes[4] = "Maio"
		NomeMes[5] = "Junho"
		NomeMes[6] = "Julho"
		NomeMes[7] = "Agosto"
		NomeMes[8] = "Setembro"
		NomeMes[9] = "Outubro"
		NomeMes[10] = "Novembro"
		NomeMes[11] = "Dezembro"
	
		return (Data + " de " + NomeMes[Mes] + " de " + Ano);
	}
	
</script>
<!-- CSS -->
</head>
	<body>
    	<div id="base_url" style="display:none;" value="<?php echo base_url(); ?>"></div>
    	<div id="div_bloqueio">
        	<p>
            	Sistema Bloqueado<br />
                <span>Tecle F11 para desbloquear</span>
            </p>
        </div>
    	<div class="menu_topo_pdv">
            <div id="menu_topo">
            	<div id="menu_topo_left">
                	<span id="nome_menu_topo"><?php foreach ($list_config as $row){echo $row->nome_fantasia;} ?></span> <span id="data_menu_topo"></span>
                </div>
                <div id="menu_topo_right">
                	<span></span>
                </div>
            </div>
        </div> 

        <div class="body">
        
            <div class="col_1" id="cupom_div_pai">
            	
            </div>
            
            <!-- Produtos -->
            <div class="col_2" id="lista_produtos">
            	<div class="col_2_row_11">
                	<div id="pesquisa_produtos">
                        <input id="input_pesquisa_produtos" placeholder="Pesquise pelo nome do Produto"/>
                    </div>
                </div>
                <div class="col_2_row_1">
                	<div id="menu_categorias_produtos">
                        <div id="menu_lanches" class="menu_select">
                        	LANCHES
                        </div>
                        <div id="menu_bebidas">
                        	BEBIDAS
                        </div>
                        <div id="menu_porcoes">
                        	PORÇÕES
                        </div>
                        <div id="menu_kits">
                        	COMBOS
                        </div>
                        <div id="menu_adicionais">
                        	ADICIONAIS
                        </div>
                    </div>
                    
                </div>
                
                <div class="col_2_row_2" >
                	<!-- Lanches -->
                    <div id="produtos_lanches" menu="menu_lanches" class="produtos_itens">
                    	<?php if (isset($list_lanches)){ foreach($list_lanches as $row) : ?>
                            <div class="produto_item" id="<?php echo $row->id; ?>" title="<?php echo $row->descricao; ?>">
                                <div class="img_produto_left">
                                    <img src="<?php echo base_url(); ?>assets/pdv/img/img_produtos/<?php echo $row->imagem; ?>" /><br />
                                </div>
                                <div class="desc_produto_right">
                                    <div class="desc_produto_unitario">
                                        Preço (R$)
                                    </div>
                                    <div class="desc_produto_valor_unitario"><?php echo $row->valor; ?></div>
                                    <div class="desc_produto_quantidade"><?php echo $row->quantidade. " " .$row->unidade; ?></div>
                                </div>
                                <div class="nome_produto"><?php echo $row->nome; ?></div>
                            </div>
                        <?php endforeach;} ?>
                    </div>
                       
                    <!-- Bebidas -->
                    <div id="produtos_bebidas" menu="menu_bebidas" class="produtos_itens">
                        <?php if (isset($list_bebidas)){ foreach($list_bebidas as $row) : ?>
                            <div class="produto_item" id="<?php echo $row->id; ?>"  title="<?php echo $row->descricao; ?>">
                                <div class="img_produto_left">
                                    <img src="<?php echo base_url(); ?>assets/pdv/img/img_produtos/<?php echo $row->imagem; ?>" /><br />
                                </div>
                                <div class="desc_produto_right">
                                    <div class="desc_produto_unitario">
                                        Preço (R$)
                                    </div>
                                    <div class="desc_produto_valor_unitario"><?php echo $row->valor; ?></div>
                                    <div class="desc_produto_quantidade"><?php echo $row->quantidade. " " .$row->unidade; ?></div>
                                </div>
                                <div class="nome_produto"><?php echo $row->nome; ?></div>
                            </div>
                        <?php endforeach;} ?>
                    </div>
                    
                    <!-- Porcoes -->
                    <div id="produtos_porcoes" menu="menu_porcoes" class="produtos_itens">
                        <?php if (isset($list_porcoes)){ foreach($list_porcoes as $row) : ?>
                            <div class="produto_item" id="<?php echo $row->id; ?>"  title="<?php echo $row->descricao; ?>">
                                <div class="img_produto_left">
                                    <img src="<?php echo base_url(); ?>assets/pdv/img/img_produtos/<?php echo $row->imagem; ?>" /><br />
                                </div>
                                <div class="desc_produto_right">
                                    <div class="desc_produto_unitario">
                                        Preço (R$)
                                    </div>
                                    <div class="desc_produto_valor_unitario"><?php echo $row->valor; ?></div>
                                    <div class="desc_produto_quantidade"><?php echo $row->quantidade. " " .$row->unidade; ?></div>
                                </div>
                                <div class="nome_produto"><?php echo $row->nome; ?></div>
                            </div>
                        <?php endforeach;} ?>
                    </div>
                    
                    <!-- Kits -->
                    <div id="produtos_kits" menu="menu_kits" class="produtos_itens">
                        <?php if (isset($list_kits)){ foreach($list_kits as $row) : ?>
                            <div class="produto_item" id="<?php echo $row->id; ?>"  title="<?php echo $row->descricao; ?>">
                                <div class="img_produto_left">
                                    <img src="<?php echo base_url(); ?>assets/pdv/img/img_produtos/<?php echo $row->imagem; ?>" /><br />
                                </div>
                                <div class="desc_produto_right">
                                    <div class="desc_produto_unitario">
                                        Preço (R$)
                                    </div>
                                    <div class="desc_produto_valor_unitario"><?php echo $row->valor; ?></div>
                                    <div class="desc_produto_quantidade"><?php echo $row->quantidade. " " .$row->unidade; ?></div>
                                </div>
                                <div class="nome_produto"><?php echo $row->nome; ?></div>
                            </div>
                        <?php endforeach;} ?>
                    </div>
                    
                    <!--  Adicionais -->
                    <div id="produtos_adicionais" menu="menu_adicionais" class="produtos_itens">
                        <?php if (isset($list_adicionais)){ foreach($list_adicionais as $row) : ?>
                            <div class="produto_item" id="<?php echo $row->id; ?>"  title="<?php echo $row->descricao; ?>"> 
                                <div class="img_produto_left">
                                    <img src="<?php echo base_url(); ?>assets/pdv/img/img_produtos/<?php echo $row->imagem; ?>" /><br />
                                </div>
                                <div class="desc_produto_right">
                                    <div class="desc_produto_unitario">
                                        Preço (R$)
                                    </div>
                                    <div class="desc_produto_valor_unitario"><?php echo $row->valor; ?></div>
                                    <div class="desc_produto_quantidade"><?php echo $row->quantidade. " " .$row->unidade; ?></div>
                                </div>
                                <div class="nome_produto"><?php echo $row->nome; ?></div>
                            </div>
                        <?php endforeach;} ?>
                    </div>
                </div>
                <div class="col_2_row_3">
                	<div id="btn_pedidos_em_aberto">
                    	<i class="fa fa-bars fa-2x"></i><br />Pedidos
                    </div>
                </div>
            </div>
            <!-- Fim Produtos -->
            
            <!-- Lista de CLientes -->
            <div class="col_2" id="lista_clientes">
            	<div class="col_2_row_11">
                	<div id="pesquisa_clientes">
                        <input id="input_pesquisa_clientes" placeholder="Pesquise por Cliente"/>
                    </div>
                </div>
            	<div class="col_2_row_1">
                	<div id="menu_clientes">
                        <div id="menu_clientes_listar" class="menu_select">
                        	LISTAR
                        </div>
                        <div id="menu_clientes_cadastrar">
                        	CADASTRAR
                        </div>
                    </div>
                </div>
                
                <div class="col_2_row_2" >
                	<div id="clientes_listar" class="clientes_itens">
                        <div class="lista_clientes_tudo">
                            <div class="lista_clientes_header">
                                <div class="lista_clientes_nome">
                                    Nome
                                </div>
                                <div class="lista_clientes_telefone">
                                    Telefone
                                </div>
                                <div class="lista_clientes_celular">
                                    Celular
                                </div>
                                <div class="lista_clientes_endereco_header">
                                    Endereço
                                </div>
                                <!--<div class="lista_clientes_opcoes">
                                    Opções
                                </div>-->
                            </div>
                            <div class="lista_clientes_itens">
                            
                                
                                <?php if (isset($list_clientes)){ foreach($list_clientes as $row) : ?>
                                	
                                        <div class="lista_cliente_item" id_cliente="<?php echo $row->id; ?>">
                                            <div class="lista_clientes_nome"><?php echo $row->nome; ?></div>
                                            <div class="lista_clientes_telefone"><?php echo $row->telefone; ?></div>
                                            <div class="lista_clientes_celular"><?php echo $row->celular; ?></div>
                                            <div class="lista_clientes_endereco"><?php echo $row->rua.', '.$row->numero.' - '.$row->bairro; ?></div>
                                            <!--<div class="lista_clientes_opcoes_iserir">
                                                <i class="fa fa-arrow-circle-left fa-2x"></i>
                                            </div>-->
                                        </div>
                                
                                <?php endforeach;} ?>
                                
                                
                            </div> 
                            <div class="lista_clientes_header">
                                <div class="lista_clientes_nome">
                                    Nome
                                </div>
                                <div class="lista_clientes_telefone">
                                    Telefone
                                </div>
                                <div class="lista_clientes_celular">
                                    Celular
                                </div>
                                <div class="lista_clientes_endereco_header">
                                    Endereço
                                </div>
                                <!--<div class="lista_clientes_opcoes">
                                    Opções
                                </div>-->
                            </div>
                        </div>
                    </div>
                	<div id="clientes_cadastrar">
                    	<div id="formulario_cadastro_cliente_pdv">
                           <p><label>Nome Completo</label>
                           <span class="field"><input type="text" name="nome" style="width:300px;"/></span></p>
                           
                           <p><label>Telefone</label>
                           <span class="field"><input type="text" name="telefone" style="width:200px;" placeholder="(DD) 3333-3333"/></span></p>
                           
                           <p><label>Celular</label>
                           <span class="field"><input type="text" name="celular" style="width:200px;" placeholder="(DD) 9999-9999"/></span></p>
                           
                           <p><label>E-mail</label>
                           <span class="field"><input type="text" name="email" style="width:300px;" placeholder="contato@e-bitsistemas.com.br"/></span></p>
                           
                           <p><label>CEP</label>
                           <span class="field"><input type="text" name="cep" class="smallinput" id="cep" onBlur="GetEndereco();" style="width:200px;" placeholder="85.800-000"/></span><br />
                           <small class="desc">Tecle "TAB" para completar o Endereço.</small></p>
                           
                           <p><label>Rua</label>
                           <span class="field"><input type="text" name="rua" id="rua" style="width:300px;"/></span></p>
                           
                           <p><label>Número</label>
                           <span class="field"><input type="text" name="numero" style="width:200px;"/></span></p>
                           
                           <p><label>Complemento</label>
                           <span class="field"><input type="text" name="complemento" style="width:300px;"/></span></p>
                           
                           <p><label>Bairro</label>
                           <span class="field"><input type="text" name="bairro" id="bairro" style="width:300px;"/></span></p>
                           
                           <p><label>Cidade</label>
                           <span class="field"><input type="text" name="cidade" id="cidade" style="width:300px;"/></span></p>
                           
                           <p><label>Estado</label>
                           <span class="field"><input type="text" name="estado" id="estado" style="width:200px;"/></span></p>
                                                                            
                           <p><label>Anotações</label>
                           <span class="field"><textarea cols="50" rows="5" name="notas"></textarea></span></p>
                                                    
                           <p>
                                <div id="btn_cadastro_cliente_pdv"><i class="fa fa-plus-circle"></i> Cadastrar</div>
                           </p> 
                       </div>
                    </div>
                </div>
                
                <div class="col_2_row_3">
                	<div id="btn_pedidos_em_aberto">
                    	<i class="fa fa-bars fa-2x"></i><br />Pedidos
                    </div>
                	<div id="voltar_produtos">
                    	<i class="fa fa-reply-all fa-2x"></i><br />Voltar
                    </div>
                </div>
            </div>
            <!-- Fim Lista de CLientes-->
            
            <!-- Selecão de Mesas -->
            <div class="col_2" id="lista_mesas">
            	<div class="col_2_row_11">
                	<span>Selecionar Mesa</span>
                </div>
                <div class="col_2_row_21">
                	<div class="mesas_itens">
                    
                    	<?php if (isset($list_mesas)){ foreach($list_mesas as $row) : ?>
                            <div class="mesa_item" id_mesa="<?php echo $row->id; ?>" nome="<?php echo $row->nome; ?>">
                            	<div class="icon_mesa">
                                	<i class="fa fa-cutlery fa-3x"></i>
                                </div>
                                <div class="nome_mesa">
                                    Mesa <?php echo $row->nome; ?>
                                </div>
                                <div class="lugares_mesa">
                                    Lugares: <?php echo $row->lugares; ?>
                                </div>
                                <div class="estado_mesa">
                                    Livre
                                </div>
                            </div>
                        <?php endforeach;} ?>
                        
                    </div>
                </div>
                <div class="col_2_row_3">
                	<div id="btn_pedidos_em_aberto">
                    	<i class="fa fa-bars fa-2x"></i><br />Pedidos
                    </div>
                	<div id="voltar_produtos">
                    	<i class="fa fa-reply-all fa-2x"></i><br />Voltar
                    </div>
                </div>
            </div>
            <!-- Fim Selecão de Mesas -->
            
            <!-- Historico Cliente -->
            <div class="col_2" id="ver_historico_cliente">
            	<div class="col_2_row_11">
                	<span>Histórico do Cliente</span>
                </div>
                <div class="col_2_row_21">
                	<iframe class="col_2_row_21" src="" width="100%" frameborder="0" id="iframe_historico_clientes_pdv">
                    </iframe>
                </div>
                <div class="col_2_row_3">
                	<div id="btn_pedidos_em_aberto">
                    	<i class="fa fa-bars fa-2x"></i><br />Pedidos
                    </div>
                	<div id="voltar_produtos">
                    	<i class="fa fa-reply-all fa-2x"></i><br />Voltar
                    </div>
                </div>
            </div>
            <!-- Fim Historico Cliente -->
            
            <!-- Historico Cliente -->
            <div class="col_2" id="fechar_pedido">
            	<div class="col_2_row_11">
                	<span>Fechar Pedido</span>
                </div>
                <div class="col_2_row_21">
                	<div id="pedido_fechamento" class="col2_row2_outro">
                    	<div id="formas_pagamento">
                        	<div id="formas_pagamento_titulo">
                            	Forma de Pagamento
                            </div>
                        	<div id="forma_dinheiro" class="formas_pagamento forma_select" id_forma="-1">Dinheiro</div><!-- (-1) -->
                        	<div id="forma_cartao_credito" class="formas_pagamento" id_forma="-2">Cartão de Crédito</div><!-- (-2) -->
                            <div id="forma_cartao_debito" class="formas_pagamento" id_forma="-3">Cartão de Débito</div><!-- (-3) -->
                            <div id="forma_cheque" class="formas_pagamento" id_forma="-4">Cheque</div><!-- (-4) -->
                            <div id="forma_outros" class="formas_pagamento" id_forma="-5">Outros</div><!-- (-5) -->
                        </div>
                        <div id="calculo_pagamento">
                        	<div id="texto_total_a_pagar" class="tam_2">
                            	Total (R$)
                            </div>
                            <div id="valor_total_a_pagar" class="tam_2">
                            	0.00
                            </div>
                            <div id="texto_desconto" class="tam_2">
                            	Total Desc.(R$)
                            </div>
                            <input type="text" name="input_desconto"  class="input_2" value="" placeholder="0.00"/>
                            
                            <input type="text" name="input_valor_receber"  class="input_3" value="" placeholder="0.00"/>
                            
                            <div class="btn_mais tam_1" id="2">+ 2</div>
                            
                            <div class="btn_num tam_1" id="1">1</div>
                            <div class="btn_num tam_1" id="2">2</div>
                            <div class="btn_num tam_1" id="3">3</div>
                            <div class="btn_mais tam_1" id="5">+ 5</div>
                            
                            <div class="btn_num tam_1" id="4">4</div>
                            <div class="btn_num tam_1" id="5">5</div>
                            <div class="btn_num tam_1" id="6">6</div>
                            <div class="btn_mais tam_1" id="10">+ 10</div>
                            
                            <div class="btn_num tam_1" id="7">7</div>
                            <div class="btn_num tam_1" id="8">8</div>
                            <div class="btn_num tam_1" id="9">9</div>
                            <div class="btn_mais tam_1" id="20">+ 20</div>
                            
                            <div id="btn_limpar_total" class="tam_1">
                            	C
                            </div>
                            <div class="btn_num tam_1" id="0">0</div>
                            <div class="btn_num tam_1" id="-1">.00</div>
                            <div class="btn_mais tam_1" id="50">+ 50</div>
                            
                            <div id="receber_total" class="tam_4">
                            	Receber
                            </div>
                            <div id="devolver_troco" class="tam_4">
                            	Devolver Troco
                            </div>
                            <div id="fechar_caixa" class="tam_4">
                            	Fechar Pedido
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col_2_row_3">
                	<div id="btn_pedidos_em_aberto">
                    	<i class="fa fa-bars fa-2x"></i><br />Pedidos
                    </div>
                	<div id="voltar_produtos">
                    	<i class="fa fa-reply-all fa-2x"></i><br />Voltar
                    </div>
                </div>
            </div>
            <!-- Fim Historico Cliente -->
            
            <!-- Pedidos em Aberto -->
            <div class="col_2" id="pedidos_em_aberto">
            	<div class="col_2_row_11">
                	<span>Pedidos em Aberto</span>
                </div>
                <div class="col_2_row_21">
                
                	<div id="pedidos_em_espera" class="col2_row2_outro">
                        <?php if (isset($list_pedidos_abertos)){ foreach($list_pedidos_abertos as $row) : ?>
                        	<div class="espera_item">
                        		<?php echo $row->html?>
                            </div>
                        <?php endforeach;} ?>
                    </div>
                    
                    
                </div>
                <div class="col_2_row_3">
                	<div id="btn_pedidos_em_aberto">
                    	<i class="fa fa-bars fa-2x"></i><br />Pedidos
                    </div>
                	<div id="voltar_produtos">
                    	<i class="fa fa-reply-all fa-2x"></i><br />Voltar
                    </div>
                </div>
            </div>
            <!-- Fim Pedidos em Aberto -->
        </div>
	</body>
</html>