<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>PDV - <?php echo $config->nome_fantasia; ?></title>
<link href="<?php echo base_url(); ?>assets/pdv/img/favicon.ico" rel="shortcut icon" type="img/vnd.microsoft.icon">
<meta name="viewport" content="width=device-width"/>
<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<!-- CSS -->
<link href="<?php echo base_url(); ?>assets/pdv/css/style.css" rel="stylesheet"/>
<link href="<?php echo base_url(); ?>assets/pdv/css/font-awesome-4.3.0/css/font-awesome.min.css" rel="stylesheet"/>

<script src="<?php echo base_url(); ?>assets/pdv/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url(); ?>assets/pdv/js/tam_tela.js"></script>
<script src="<?php echo base_url(); ?>assets/pdv/js/menu_produtos.js"></script>
<script src="<?php echo base_url(); ?>assets/pdv/js/menu_clientes.js"></script>
<script src="<?php echo base_url(); ?>assets/pdv/js/bloqueio.js"></script>
<script src="<?php echo base_url(); ?>assets/pdv/js/pedidos.js"></script>
<script src="<?php echo base_url(); ?>assets/pdv/js/data_hora.js"></script>

</head>
	<body onselectstart='return false'>
    	<span id="data_menu_topo"></span>
        
    	<div id="base_url" style="display:none;" value="<?php echo base_url(); ?>"></div>
    	
		<iframe id="iframe_impressao" src="" style="display:none"></iframe>
		
    	<div class="menu_topo_pdv">
            <div id="menu_topo">
            	<div id="menu_topo_left">
                	<span id="nome_menu_topo"><?php echo $config->nome_fantasia; ?> </span>
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
                	<span id="nome_menu_topo"><?php echo $config->nome_fantasia; ?></span>
                	<div id="pesquisa_produtos">
                        <input id="input_pesquisa_produtos" placeholder="Pesquisar Produto"/>
                    </div>
                </div>
                <div class="col_2_row_1">
                	<div id="menu_categorias_produtos">
					<?php $cont = 0; ?>
					<?php foreach($categorias as $item){ ?>
						<?php $cont = $cont +1; ?>
                        <div class="menu <?php if($cont == 1){echo ' menu_select';} ?>" id="<?php echo $item->alias; ?>"  style="background-image:url(<?= base_url() ?>assets/pdv/img/img_produtos/<?php echo $item->img; ?>)">
                        	<?php echo $item->nome; ?>
                        </div>
					<?php } ?>
                    </div>
                    
                </div>
                
                <div class="col_2_row_2" >   
                	<?php $cont = 0; ?>             					
					<?php foreach($categorias as $cat){ ?>
                    	<?php $cont = $cont +1; ?>
						<div class="produtos produtos_itens" id="<?= $cat->alias ?>" menu="menu_<?= $cat->alias ?>" <?php if($cont != 0){echo ' style="display:none"';} ?>>
						<?php foreach($produtos as $item){ ?>
							<?php if($item->categoria == $cat->id){ ?>
								<div class="produto_item  <?php if ($item->adicional){ echo 'produto_item_adicional'; }else{ echo 'produto_item_click';}?>" id="<?= $item->id ?>"  title="<?= $item->descricao ?>">
									<div class="img_produto_left">
										<img src="<?= base_url() ?>assets/pdv/img/img_produtos/<?= $item->imagem ?>" /><br />
									</div>
									<div class="desc_produto_right">
										<div class="desc_produto_unitario">
											Preço (R$)
										</div>
										<div class="desc_produto_valor_unitario"><?= number_format((float)$item->valor, 2) ?></div>
										<div class="desc_produto_quantidade"><?php  if ($item->quantidade != 0){echo $item->quantidade. " " .$item->unidade;} ?></div>
									</div>
									<div class="nome_produto"><?= $item->nome ?></div>
								</div>
							<?php } ?>
						<?php } ?>
						</div>
					<?php } ?>          
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
                	<span id="nome_menu_topo"><?php echo $config->nome_fantasia; ?></span>
                	<div id="pesquisa_clientes">
                        <input id="input_pesquisa_clientes" placeholder="Pesquisar Cliente"/>
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
                                            <div class="lista_clientes_endereco"><?php echo $row->rua.', '.$row->numero.' - '.$row->bairro.' - '.$row->complemento; ?></div>
                                            <!--<div class="lista_clientes_opcoes_iserir">
                                                <i class="fa fa-arrow-circle-left fa-2x"></i>
                                            </div>-->
                                        </div>
                                
                                <?php endforeach;} ?>
                                
                                
                            </div> 
                           
                        </div>
                    </div>
                	<div id="clientes_cadastrar">
                    	<div id="formulario_cadastro_cliente_pdv">
                           <p><label>Nome</label>
                           <span class="field"><input type="text" name="nome" placeholder="Nome Completo" style="width:300px;"/></span></p>
                           
                           <p><label>Fone</label>
                               <span class="field"><input type="text" name="telefone" style="width:136px;" placeholder="(DD) 3333-3333"/></span>
                               <span class="field"><input type="text" name="celular" style="width:136px;" placeholder="(DD) 9999-9999"/></span>
                           </p>
                           
                           <p><label>E-mail</label>
                           <span class="field"><input type="text" name="email" style="width:300px;" placeholder="contato@e-bitsistemas.com.br"/></span></p>
                           
                           <p><label>Anotações</label>
                           <span class="field"><textarea  rows="5" name="notas" style="width:308px;" placeholder="Observações do Cliente"></textarea></span></p>
                           
                           <br />
                           <p><label>CEP</label>
                           <span class="field"><input type="text" name="cep" class="smallinput" id="cep" onBlur="GetEndereco();" style="width:300px;" placeholder="85.800-000"/></span><br />
                           <small class="desc">[TAB] completar o Endereço (Necessita Internet)</small></p>
                           
                           <p><label>Rua</label>
                           <span class="field"><input type="text" name="rua" id="rua" placeholder="Rua" style="width:300px;"/></span></p>
                           
                           <p><label>Núm./Compl.</label>
                               <span class="field"><input type="text" name="numero" placeholder="Número" style="width:72px;"/></span>
                               <span class="field"><input type="text" name="complemento" placeholder="Complemento" style="width:200px;"/></span>
                           </p>
                           
                           <p><label>Bairro</label>
                           <span class="field"><input type="text" name="bairro" id="bairro" placeholder="Bairro" style="width:300px;"/></span></p>
                           
                           <p><label>Cidade/UF</label>
                               <span class="field"><input type="text" name="cidade" id="cidade" placeholder="Cidade" style="width:200px;"/></span>
                               <span class="field"><input type="text" name="estado" id="estado" placeholder="Estado" style="width:72px;"/></span>
                           </p>
                                                                            
                           
                                                    
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
                	<span id="nome_menu_topo"><?php echo $config->nome_fantasia; ?></span>
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
                	<span id="nome_menu_topo"><?php echo $config->nome_fantasia; ?></span>
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
                	<span id="nome_menu_topo"><?php echo $config->nome_fantasia; ?></span>
                </div>
                <div class="col_2_row_21">
                	<div id="pedido_fechamento" class="col2_row2_outro">
                    	<div style="margin: auto; width: 480px; height: 450px;">
                        <div id="calculo_pagamento">
                        	<div id="texto_total_a_pagar" class="tam_2">
                            	Total
                            </div>
                            <div id="valor_total_a_pagar" class="tam_2">
                            	0.00
                            </div>
                            <div id="texto_desconto" class="tam_2">
                            	Desconto
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
                            <div id="imprimir_cozinha" class="tam_4" id_cupom="">
                            	Imprimir Interno
                            </div>
                            <div id="imprimir_cupom" class="tam_4" id_cupom="">
                            	Imprimir Cupom
                            </div>
                            <div id="imprimir_senha" class="tam_4" id_cupom="">
                            	Imprimir Senha
                            </div>
                            
                            <button onClick="" id="botao_impressao" style="display:none" ></button>
                        </div>
                        
                        <div id="formas_pagamento">
                        	<div id="formas_pagamento_titulo">
                            	Formas de Pagamento
                            </div>
                        	<div id="forma_dinheiro" class="formas_pagamento forma_select" id_forma="-1">Dinheiro</div><!-- (-1) -->
                        	<div id="forma_cartao_credito" class="formas_pagamento" id_forma="-2">Cartão de Crédito</div><!-- (-2) -->
                            <div id="forma_cartao_debito" class="formas_pagamento" id_forma="-3">Cartão de Débito</div><!-- (-3) -->
                            <div id="forma_cheque" class="formas_pagamento" id_forma="-4">Cheque</div><!-- (-4) -->
                            <div id="forma_outros" class="formas_pagamento" id_forma="-5">Outros</div><!-- (-5) -->
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
                	<span id="nome_menu_topo"><?php echo $config->nome_fantasia; ?></span>
                	<div id="pesquisa_clientes">
                        <input id="input_espera_item_chamar" placeholder="Chamar Senha Ghichê" />
                    </div>
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