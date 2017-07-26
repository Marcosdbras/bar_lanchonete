$(document).ready(function(){
	limpar_pedido();	// Inserir html do pedido
	var base_url = $('#base_url').attr('value');
	
	$("div[id=cupom_mesa]").each(function() {
		var id_ms = $(this).attr('id_mesa_c');
		if (id_ms > 0){
			$('div[id_mesa='+id_ms+']').addClass('mesa_ocupada').children('.estado_mesa').html('Ocupado');
		}
	});
/*------------------------------------------------------------------------------
	Função para funcionar menu de Produos
------------------------------------------------------------------------------*/
	$(document).delegate( "div[id=voltar_produtos]", "click", function() {
		esconder_col2();
		$('#lista_produtos').show();
	});
	$(document).delegate("div[id=cupom_pesquisar_cliente]", "click", function() {
		var id_cliente = $(this).prev().attr('cupom_id_cliente');
		if (id_cliente != ''){
			esconder_col2();
			$('#ver_historico_cliente').show();
			var url = $('#iframe_historico_clientes_pdv').attr('src', base_url+'index.php/clientes/visualizar_pdv/'+id_cliente);
		}
	});
	$(document).delegate( "div[id=cupom_mesa]", "click", function() {
		esconder_col2();
		$('#lista_mesas').show();
	});
	$(document).delegate( "div[id=cupom_cliente]", "click", function() {
		esconder_col2();
		$('#lista_clientes').show();
		
	});
	$(document).delegate( "div[id=cupom_total]", "click", function() {
		var id_prod = $("div[class=col_1]:first .cupom_produto").attr('id_prod');
		
		$('#forma_dinheiro').click();
		var desc = $('div[id=cupom_id_nota]').attr('val_desc');
		$('input[name=input_desconto]').val(desc);
		
		if (id_prod != null){
			esconder_col2();
			$('#fechar_pedido').show();
			fechar_pedido();
		}
	});
	
	$(document).delegate( "div[id=btn_pedidos_em_aberto]", "click", function() {
		esconder_col2();
		$('#pedidos_em_aberto').show();
	});
	
	function esconder_col2(){
		$('#lista_produtos').hide();
		$('#lista_clientes').hide();
		$('#lista_mesas').hide();
		$('#ver_historico_cliente').hide();
		$('#fechar_pedido').hide();
		$('#pedidos_em_aberto').hide();
	}
	
/*------------------------------------------------------------------------------
	Função para adicionar itens ao pedido
------------------------------------------------------------------------------*/
	$(document).delegate( ".produto_item_click", "click", function() {
		var id = $(this).attr('id');
		var valor_unitario = $(this).children('.desc_produto_right').children('.desc_produto_valor_unitario').text();
		valor_unitario = parseFloat(valor_unitario).toFixed(2);	// Convertendo de string para Double
		var nome = $(this).children('.nome_produto').text();
		
		nome = nome + ' ' + $(this).children('.desc_produto_right').children('.desc_produto_quantidade').text();
		
		var quantidade = 1;
		var total = 0;
		var id_prod_cupom = $('div[class=col_1]:first .cupom_produto:first').attr('id_prod');
		

		$('#cupom_id_prod').attr('id_prod', id);
		$('#cupom_descricao').html(nome);
		$('#cupom_valor_unitario').html(valor_unitario);
	
		$('#cupom_nota').prepend(
			'<div class="cupom_produto odd" id_prod="' + id + '">'
			+'	<div>'
			+'		<div class="cupom_produto_col1">'
			+'		    <div class="cupom_produto_quantidade" value="' + quantidade + '">Nome</div>'
			+'		    <div class="cupom_produto_descricao">' + nome + '</div>'
			+'		</div>'
			+'		<div class="produto_produto_deletar" title="Remover Produto">'
			+'		    <i class="fa fa-trash-o fa-2x"></i>'
			+'		</div>'
			+'		<div class="cupom_produto_col3">'
			+'		    <div class="cupom_produto_total">Total (R$)</div>'
			+'		    <div class="cupom_produto_valor_total">' + valor_unitario + '</div>'
			+'		</div>'
			+'		<div class="cupom_produto_col2">'
			+'		    <div class="cupom_produto_unitario">Valor (R$)</div>'
			+'		    <div class="cupom_produto_valor_unitario">' + valor_unitario + '</div>'
			+'		</div>'
			+'	</div>'
			+'	<div style="display:none">'
			+'		<div class="cupom_produto_mensagem_del">'
			+'			Deseja deletar esse Produto?'
			+'		</div>'
			+'		<div class="cupom_produto_cancel_del" title="Não">'
			+'		    <i class="fa fa-times fa-2x"></i>'
			+'		</div>'
			+'		<div class="cupom_produto_conf_del" title="Sim">'
			+'		    <i class="fa fa-check fa-2x"></i>'
			+'		</div>'
			+'	</div>'
			+'</div>'
		);
		
		corrigir_zebra_cupom();
		
		//total = quantidade * valor_unitario;
		//total = total.toFixed(2);
		
		//$('#cupom_quantidade').attr('value', quantidade).html(quantidade + ' X');
		
		//$('.cupom_produto_quantidade:first').attr('value', quantidade).html(quantidade + ' X');
		//$('.cupom_produto_valor_total:first').html(total);
		
		atualizar_valor_cupom();
	});
/*------------------------------------------------------------------------------
	Função para adicionar itens ao pedido
------------------------------------------------------------------------------*/
	$(document).delegate( ".produto_item_adicional", "click", function() {
		var id = $(this).attr('id');
		var valor_unitario = $(this).children('.desc_produto_right').children('.desc_produto_valor_unitario').text();
		valor_unitario = parseFloat(valor_unitario).toFixed(2);	// Convertendo de string para Double
		var nome = $(this).children('.nome_produto').text();
		
		nome = nome + ' ' + $(this).children('.desc_produto_right').children('.desc_produto_quantidade').text();
		
		var quantidade = 1;
		var total = 0;
		var id_prod_cupom = $('div[class=col_1]:first .cupom_produto:first').attr('id_prod');
		
		
		$('#cupom_id_prod').attr('id_prod', id);
		$('#cupom_descricao').html(nome);
		$('#cupom_valor_unitario').html(valor_unitario);
	
		$('.cupom_produto:first').append(
			'<div class="cupom_produto adicional_prod" id_prod="' + id + '">'
			+'	<div>'
			+'		<div class="cupom_produto_col1">'
			+'		    <div class="cupom_produto_quantidade" value="' + quantidade + '" style="display:none">' + quantidade + ' X</div>'
			+'		    <div class="cupom_produto_descricao">' + nome + '</div>'
			+'		</div>'
			+'		<div class="produto_produto_deletar" title="Remover Produto" style="padding:0px 5px 5px 10px">'
			+'		    <i class="fa fa-trash-o fa-1x"></i>'
			+'		</div>'
			+'		<div class="cupom_produto_col2">'
			+'		    <div class="cupom_produto_valor_unitario">' + valor_unitario + '</div>'
			+'		</div>'
			+'	</div>'
			+'	<div style="display:none">'
			+'		<div class="cupom_produto_mensagem_del" >'
			+'			Deseja deletar esse Produto?'
			+'		</div>'
			+'		<div class="cupom_produto_cancel_del" title="Não">'
			+'		    <i class="fa fa-times fa-2x"></i>'
			+'		</div>'
			+'		<div class="cupom_produto_conf_del" title="Sim">'
			+'		    <i class="fa fa-check fa-2x"></i>'
			+'		</div>'
			+'	</div>'
			+'</div>'
		);
		
		corrigir_zebra_cupom();
		
		//total = quantidade * valor_unitario;
		//total = total.toFixed(2);
		
		//$('#cupom_quantidade').attr('value', quantidade).html(quantidade + ' X');
		
		//$('.cupom_produto_quantidade:first').attr('value', quantidade).html(quantidade + ' X');
		//$('.cupom_produto_valor_total:first').html(total);
		
		atualizar_valor_cupom();
	});
/*------------------------------------------------------------------------------
	Funções de remover produto do Cupom
------------------------------------------------------------------------------*/
	$(document).delegate( "div[class=produto_produto_deletar]", "click", function() {
		$(this).parent().hide().next().show();
	});
	
	$(document).delegate( "div[class=cupom_produto_cancel_del]", "click", function() {
		$(this).parent().hide().prev().show();
	});
		
	$(document).delegate( "div[class=cupom_produto_conf_del]", "click", function() {
		$(this).parent().parent().remove();
		atualizar_valor_cupom();
		corrigir_zebra_cupom();
		
	});
	
/*------------------------------------------------------------------------------
	Funções de cancelar cupom
------------------------------------------------------------------------------*/
	$(document).delegate( "div[id=cupom_cancelar]", "click", function() {
		$(this).parent().hide().next().show();
	});
	
	$(document).delegate( "div[class=cupom_pedido_cancel_del]", "click", function() {
		$(this).parent().hide().prev().show();
	});
	
	$(document).delegate( "div[class=cupom_pedido_conf_del]", "click", function() {
		
		var id_nota = $('div[class=col_1]:first #cupom_id_nota').attr('id_nota');
		
		mesa_livre();
		
		if (id_nota > 0){
			jQuery.ajax({
				url		: base_url+'index.php/pdv/cancelar_pedido',
				type	: 'POST',
				data	: {'id_nota':id_nota},
				cache	: false,
				async 	: false
			}).done(function(retorno1){
				
			});
	
		}
		limpar_pedido();
		$('#voltar_produtos').click();
	});

/*------------------------------------------------------------------------------
	Funções colocar pedido em Espera
------------------------------------------------------------------------------*/
	$(document).delegate( "div[id=cupom_espera]", "click", function() {
		var estado = 0;	// Indica em espera

		var retorno = pegar_produtos_pedido(estado);
		
		if (retorno == -10){
			// Nota vazia, nao fazer nada
		}else{
			if (retorno == -5){
				// Nao foi possivel salvar	
			}else{
				limpar_pedido();
				$('#voltar_produtos').click();
			}
			
		}
	});


/*------------------------------------------------------------------------------
	Funções recuperar nota de em espera
------------------------------------------------------------------------------*/
	$(document).delegate( "div[class=espera_item_editar]", "click", function() {
		var pedido = $(this).siblings('.espera_nota_completa').html();
		
		$('#cupom_espera').click();
		
		var altura = $('.col_1_row_3:first').css('height');
		$('div[class=col_1]:first').html(pedido);
	
		$(this).parent().remove();
		
		$('#voltar_produtos').click();
	});
	
	$(document).delegate( "div[class=espera_item]", "mouseover", function() {
		$(this).find('.espera_item_editar').css('display', 'block');
		$(this).find('.espera_item_chamar').css('display', 'block');
	});
	
	$(document).delegate( "div[class=espera_item]", "mouseout", function() {
		$(this).find('.espera_item_editar').css('display', 'none');
		$(this).find('.espera_item_chamar').css('display', 'none');
	});
	
/*------------------------------------------------------------------------------
	Funções Alerta Chamar nota
------------------------------------------------------------------------------*/
	$(document).delegate( "div[class=espera_item_chamar]", "click", function() {
		var base_url = $('#base_url').attr('value');
		
		var numero = $(this).siblings('.espera_nome_cliente').attr('id_guiche');

		jQuery.ajax({
			url		: base_url+'index.php/pdv/salvar_guiche',
			type	: 'POST',
			data	: {'numero': numero},
			cache	: false,
			async 	: false
		}).done(function(retorno1){
			console.log (retorno1);
		});
		
	});

/*------------------------------------------------------------------------------
	Funções Alerta Chamar nota Manualmente
------------------------------------------------------------------------------*/	
	$("input[id=input_espera_item_chamar]").keyup(function() {
		if ( event.which == 13 ){
			var numero = $(this).val();
			if (numero != ''){
				$(this).val('');
				
				numero = parseInt(numero);
				
				if (numero < 10){
					numero = '00'+numero;
				}else{
					if (numero < 100){
						numero = '0'+numero;
					}
				}
				
				var base_url = $('#base_url').attr('value');
				jQuery.ajax({
					url		: base_url+'index.php/pdv/salvar_guiche',
					type	: 'POST',
					data	: {'numero': numero},
					cache	: false,
					async 	: false
				}).done(function(retorno1){
					console.log (retorno1);
				});
				
			}
			
		}
	});
	
/*------------------------------------------------------------------------------
	Função adicionar Cliente ao Pedido
------------------------------------------------------------------------------*/
	$(document).delegate( "div[class=lista_cliente_item]", "click", function() {
		var id_cliente = $(this).attr('id_cliente');
		var nome_cliente = $(this).children('.lista_clientes_nome').text();
		var telefone_cliente = $(this).children('.lista_clientes_telefone').text();
		var celular_cliente = $(this).children('.lista_clientes_celular').text();
		
		$('#cupom_cliente:first').attr('cupom_id_cliente', id_cliente);
		$('#cupom_nome:first').html(nome_cliente);
		
		$('#cupom_telefone:first').html(telefone_cliente+' '+celular_cliente);
		
		$('.lista_cliente_item').show();	// Exibir caso tenha algum nome oculto apos a pesquisa
		$('input[id=input_pesquisa_clientes]').blur().val('');
		
		$('#voltar_produtos').click();
		
	});
	
/*------------------------------------------------------------------------------
	Funções selecionar MESA
------------------------------------------------------------------------------*/
	$(document).delegate( "div[class=mesa_item]", "click", function() {
		
		var id = $(this).attr('id_mesa');
		var nome = $(this).attr('nome');
		
		mesa_livre();
		
		$('#cupom_mesa:first').empty().attr('id_mesa_c', id).html(nome).addClass('mesa_selecionada');
		mesa_ocupada(id);
		
		$('#voltar_produtos').click();
	});
	

/*------------------------------------------------------------------------------
	Funções Receber
------------------------------------------------------------------------------*/
	$(document).delegate( ".btn_num", "click", function() {
		var digito = $(this).attr('id');
		if (digito == '-1'){
			var valor_atual = parseFloat($('input[name=input_valor_receber]').val())*100;
			if (!valor_atual){
				valor_atual = 0;
			}
			valor_novo = (valor_atual).toFixed(2);
		}else{
			digito = parseFloat('0.0' + digito);
			var valor_atual = parseFloat($('input[name=input_valor_receber]').val())*10;
			if (!valor_atual){
				valor_atual = 0;
			}
			valor_novo = (digito + valor_atual).toFixed(2);
		}
		
		$('input[name=input_valor_receber]').val(valor_novo);
	});
	
	// Acrescenter nota (2, 5, 10 ...)
	$(document).delegate( ".btn_mais", "click", function() {
		var digito = parseFloat($(this).attr('id'));
		var valor_atual = parseFloat($('input[name=input_valor_receber]').val());
		if (!valor_atual){
			valor_atual = 0;
		}

		valor_novo = (digito + valor_atual).toFixed(2);
		
		$('input[name=input_valor_receber]').val(valor_novo);
	});
	
	// Limpar
	$(document).delegate( "#btn_limpar_total", "click", function() {
		$('input[name=input_valor_receber]').val('0.00');
	});
	
	// Receber
	$(document).delegate( "#receber_total", "click", function() {
		var valor_atual = $('input[name=input_valor_receber]').val();
		if (valor_atual != ''){
			valor_atual = parseFloat(valor_atual).toFixed(2);
			var valor_conta = parseFloat($('#valor_total_a_pagar').text()).toFixed(2);
	
			var valor_total = (valor_conta - valor_atual).toFixed(2);
			
			var id_forma_pagamento = $('div[class="formas_pagamento forma_select"]').attr('id_forma');
			var nome_forma_pagamento = $('div[class="formas_pagamento forma_select"]').text();
			
			//console.log (id_forma_pagamento +' - '+ nome_forma_pagamento);
			var receb_troco = 'Recebimento';
			inserir_recebimento(id_forma_pagamento, nome_forma_pagamento, valor_atual, receb_troco);
		}
		
		

	});
	
	$(document).delegate( "#devolver_troco", "click", function() {
		var valor_atual = parseFloat($('input[name=input_valor_receber]').val()).toFixed(2);
		var valor_conta = parseFloat($('#valor_total_a_pagar').text()).toFixed(2);

		var id_forma_pagamento = 0;
		var nome_forma_pagamento = 'Troco';
		var receb_troco = 'Troco';
		
		if (valor_atual == valor_conta) {
			inserir_recebimento(id_forma_pagamento, nome_forma_pagamento, valor_atual, receb_troco);
		}
	
	});
	
	$(document).delegate( "#fechar_caixa", "click", function() {
		var estado = 1; // Indicar Fechamento do Pedido
		var valor_desconto = parseFloat($('input[name=input_desconto]').val());
		if (!valor_desconto){
			valor_desconto = 0;	
		}
		valor_desconto = valor_desconto.toFixed(2);
		inserir_recebimento(-10, 'Desconto', valor_desconto, 'Desconto');
		
		pegar_produtos_pedido(estado);
		
		mesa_livre();
		
		limpar_pedido();
		
		$('#fechar_caixa').hide();
		//$('#imprimir_pedido').show();
		
		$('#voltar_produtos').click();
	});
	
	$(document).delegate( "#imprimir_cozinha", "click", function() {
		var base_url = $('#base_url').attr('value');
		var estado = 1; // Indicar PEDIDO EM ESPERA
		
		pegar_produtos_pedido(estado);
		
		var id_cupom = $(this).attr('id_cupom');
		
		$('#cupom_id_nota:first').attr('id_nota', id_cupom);
		
		$('body').find('iframe[id=iframe_impressao]').attr('src', base_url + 'pedidos/cupom_cozinha/'+id_cupom);
		
	});
	
	$(document).delegate( "#imprimir_cupom", "click", function() {
		var base_url = $('#base_url').attr('value');
		var estado = 1; // Indicar PEDIDO EM ESPERA
		
		pegar_produtos_pedido(estado);
		
		var id_cupom = $(this).attr('id_cupom');
		
		$('#cupom_id_nota:first').attr('id_nota', id_cupom);
		
		$('body').find('iframe[id=iframe_impressao]').attr('src', base_url + 'pedidos/cupom/'+id_cupom);
		
	});
	
	$(document).delegate( "#imprimir_senha", "click", function() {
		var base_url = $('#base_url').attr('value');
		var estado = 1; // Indicar PEDIDO EM ESPERA
		
		pegar_produtos_pedido(estado);
		
		var id_cupom = $(this).attr('id_cupom');
		
		$('#cupom_id_nota:first').attr('id_nota', id_cupom);
		
		$('body').find('iframe[id=iframe_impressao]').attr('src', base_url + 'pedidos/senha/'+id_cupom);
		
	});
		
	$("input[name=input_desconto]").keyup(function() {
		var desconto = parseFloat($(this).val()).toFixed(2);
		$('div[id=cupom_id_nota]').attr('val_desc', desconto);
		atualizar_valor_cupom();
		
	});
	
/*------------------------------------------------------------------------------
	Funções Formas pagamento
------------------------------------------------------------------------------*/
	$(document).delegate( ".formas_pagamento", "click", function() {
		$('.formas_pagamento').removeClass('forma_select');
		$(this).addClass('forma_select');
	});
	
	$(document).delegate( "#forma_cartao_credito", "click", function() {
		valor = $('#valor_total_a_pagar').text();
		$('input[name=input_valor_receber]').val(valor);
	});
	
	$(document).delegate( "#forma_cartao_debito", "click", function() {
		valor = $('#valor_total_a_pagar').text();
		$('input[name=input_valor_receber]').val(valor);
	});

});


function print_cupom(programa,janela){
	if(janela=="") janela = "janela";
	var largura = window.innerWidth - 1;
	var altura = window.innerHeight - 1;
	var tamanhos = 'width = ' + largura + ', height = '+ altura +', left = 1, top = 1';
	window.open(programa,janela,tamanhos);
}
			
			
//Inserir Recebimento no Peiddo
function inserir_recebimento(id_forma_pagamento, nome_forma_pagamento, valor_atual, receb_troco){
	$('#cupom_nota').prepend(
		'<div class="cupom_produto" id_prod="' + id_forma_pagamento + '">'
		+'	<div>'
		+'		<div class="cupom_produto_col1">'
		+'		    <div class="cupom_produto_quantidade" value="1">'+receb_troco+'</div>'
		+'		    <div class="cupom_produto_descricao">' + nome_forma_pagamento + '</div>'
		+'		</div>'
		+'		<div class="produto_produto_deletar" title="Remover Recebimento">'
		+'		    <i class="fa fa-trash-o fa-2x"></i>'
		+'		</div>'
		+'		<div class="cupom_produto_col3">'
		+'		    <div class="cupom_produto_total">Valor (R$)</div>'
		+'		    <div class="cupom_produto_valor_total">' + valor_atual + '</div>'
		+'		</div>'
		+'		<div class="cupom_produto_col2">'
		+'		    <div class="cupom_produto_unitario">Valor (R$)</div>'
		+'		    <div class="cupom_produto_valor_unitario">' + valor_atual + '</div>'
		+'		</div>'
		+'	</div>'
		+'	<div style="display:none">'
		+'		<div class="cupom_produto_mensagem_del">'
		+'			Deseja deletar esse Recebimento?'
		+'		</div>'
		+'		<div class="cupom_produto_cancel_del" title="Não">'
		+'		    <i class="fa fa-times fa-2x"></i>'
		+'		</div>'
		+'		<div class="cupom_produto_conf_del" title="Sim">'
		+'		    <i class="fa fa-check fa-2x"></i>'
		+'		</div>'
		+'	</div>'
		+'</div>'
	);
	corrigir_zebra_cupom();
	atualizar_valor_cupom();
}
// Marcar mesa como livre
function mesa_livre(){
	var id = $('#cupom_mesa:first').attr('id_mesa_c');
	if (id > 0){	// Esta trocando de mesa
		$('div[id_mesa='+id+']').removeClass('mesa_ocupada').children('.estado_mesa').html('Livre');
		
	}
}
// Marcar mesa como ocupada
function mesa_ocupada(id){
	$('div[id_mesa='+id+']').addClass('mesa_ocupada').children('.estado_mesa').html('Ocupado');
}



// Carregar Histórico do Cliente
function carregar_historico_cliente(id_cliente){
	var base_url = $('#base_url').attr('value');

	
}

//Fechamento do Peidod
function fechar_pedido(){
	//var total_pedido = $('#cupom_total:first p').text();
	
	//$('#valor_total_a_pagar').html(total_pedido);
	$('input[name=input_valor_receber]').val('0.00').focus();
	
	atualizar_valor_cupom();
}

// Pegar valores para salvar nota (em espera ou finalizar)
function pegar_produtos_pedido(estado){
	var base_url = $('#base_url').attr('value');
	var id_nota = parseInt($('div[class=col_1]:first #cupom_id_nota').attr('id_nota'));
	
	//console.log (estado);
	
	var id_prod = [];
	var quantidade = [];
	var valor_unitario = [];
	var nome_prod = [];
	
	var obs_pedido = $('input[id=obs_pedido]:first').val();
	$('input[id=obs_pedido]:first').attr('value', obs_pedido);
	
	var cont = 0;
	$("div[class=col_1]:first .cupom_produto").each(function() {
		id_prod[cont] = parseFloat($(this).attr('id_prod'));
		cont = cont + 1;
	});
	
	var cont = 0;
	$("div[class=col_1]:first div[class=cupom_produto_quantidade]").each(function() {
		quantidade[cont] = parseFloat($(this).attr('value'));
		cont = cont + 1;
	});
	
	if (cont == 0){	// Pedido vazia
		return (-10);
	}
	
	cont = 0;
	$("div[class=col_1]:first div[class=cupom_produto_valor_unitario]").each(function() {
		valor_unitario[cont] = parseFloat($(this).text());
		cont = cont + 1;
	});
	
	var nome_cliente 	= $('#cupom_nome:first').text().substr(0, 12);
	var telefone_cliente= $('#cupom_telefone:first').text();
	var id_cliente 		= $('#cupom_cliente:first').attr('cupom_id_cliente');
	
	if (id_cliente == ''){
		id_cliente = 0;
		nome_cliente = 'Sem Cliente'
	}
	
	var mesa_id			= $('#cupom_mesa:first').attr('id_mesa_c');
	var mesa_nome		= $('#cupom_mesa:first').text();
	
	var total_cupom = 0;
	var total_pago = 0;
	for(i = 0; i < cont; i++){
		if (id_prod[i] > 0){
			total_cupom = total_cupom + quantidade[i]*valor_unitario[i];
		}else{
			if (id_prod[i] == 0){
				total_pago = total_pago - valor_unitario[i];
			}else{
				if (id_prod[i] > -10){
					total_pago = total_pago + valor_unitario[i];
				}
			}
		}
	}
	total_cupom = total_cupom.toFixed(2);
	//total_pago = total_pago.toFixed(2);
	
	var cont_valor = '';// Somente para exemplo
	var cont_nome = '';	// Somente para exemplo
	cont = 0;
	$("div[class=col_1]:first div[class=cupom_produto_descricao]").each(function() {
		nome_prod[cont] = $(this).text();
		if (cont < 8){	// Numero maximo para exemplo
			cont_nome = cont_nome + nome_prod[cont].substr(0, 15);
			cont_nome = cont_nome +  '<br />';
			cont_valor = cont_valor + valor_unitario[cont].toFixed(2) + '<br />';
		}
		cont = cont + 1;
	});
		
	if (estado == 0){
		// Em espera
 		
		var nota_inteira	= $('div[class=col_1]:first').html();
		
		jQuery.ajax({
			url		: base_url+'index.php/pdv/salvar_pedido_espera',
			type	: 'POST',
			data	: {
						'id_prod':id_prod,
						'nome_prod': nome_prod, 
						'quantidade': quantidade, 
						'valor_unitario':valor_unitario, 
						'total_cupom':total_cupom,
						'id_cliente':id_cliente,
						'nome_cliente':nome_cliente, 
						'id_nota':id_nota,
						'obs_pedido':obs_pedido},
			cache	: false,
			async 	: false
		}).done(function(retorno1){
			id_nota = retorno1;
			$('#imprimir_cupom').attr('id_cupom', retorno1);
			$('#imprimir_cozinha').attr('id_cupom', retorno1);
			$('#imprimir_senha').attr('id_cupom', retorno1);
		});
		
		id_nota = parseInt(id_nota);
		
		var id_nota_guiche = 0;
		if (id_nota >= 1000){
			id_nota_guiche = id_nota%1000;
		}else{
			id_nota_guiche = id_nota;
		}
		if (id_nota_guiche < 10){
			id_nota_guiche = '00'+id_nota_guiche;
		}else{
			if (id_nota_guiche < 100){
				id_nota_guiche = '0'+id_nota_guiche;
			}
		}
		
		aux_mesa = '';
		if (mesa_nome.trim() != ''){
			aux_mesa = 'Mesa: ' + mesa_nome;
		}
		
		var retorno = -5;
		$('#pedidos_em_espera').prepend( 
			'<div class="espera_item">'
			+'	<div class="espera_nome_cliente" id_guiche="'+id_nota_guiche+'">'+ nome_cliente + ' - ' + id_nota_guiche +'</div>'
			+'	<div class="espera_lista_itens_left">'+ cont_nome +'</div>'
			+'	<div class="espera_lista_itens_right">'+ cont_valor +'</div>'
			+'	<div class="espera_titulo">'
			+'		<div class="espera_mesa" id_mesa_c="'+mesa_id+'">'
			+			aux_mesa
			+'		</div>'
			+'		<div class="espera_total">'
			+'			R$ ' + total_cupom
			+'		</div>'
			+'	</div>'
			+'	<div class="espera_nota_completa" style="display:none;">' + nota_inteira + '</div>'
			+'	<div class="espera_item_editar" style="display:none"> <i class="fa fa-sign-out fa-rotate-180"></i> </div>'
			+'	<div class="espera_item_chamar" style="display:none"> <i class="fa fa-bell"></i> </div>'
			+'</div>'
		);
		$('.espera_item:last').children('.espera_nota_completa').children('#cupom_id_nota').attr('id_nota', id_nota);
		
		nota_inteira = $('.espera_item:last').html();
		jQuery.ajax({
			url		: base_url+'index.php/pdv/salvar_pedido_html',
			type	: 'POST',
			data	: {'nota_inteira': nota_inteira, 
						'id_nota':id_nota},
			cache	: false,
			async 	: false
		}).done(function(retorno1){
			retorno = retorno1;
		});
		
		return retorno;
	}else{
		// Finalizar
		
		cont = 0;
		$("div[class=col_1]:first div[class=cupom_produto_descricao]").each(function() {
			nome_prod[cont] = $(this).text();
			cont = cont + 1;
		});
		
		var total_desconto = (total_cupom - total_pago).toFixed(2);
		jQuery.ajax({
			url		: base_url+'index.php/pdv/salvar_pedido_finalizar',
			type	: 'POST',
			data	: {
						'id_prod':id_prod,
						'nome_prod': nome_prod, 
						'quantidade': quantidade, 
						'valor_unitario':valor_unitario, 
						'total_cupom':total_cupom, 
						'total_pago':total_pago, 
						'total_desconto':total_desconto,
						'id_cliente':id_cliente,
						'nome_cliente':nome_cliente, 
						'id_nota':id_nota,
						'obs_pedido':obs_pedido},
			cache	: false,
			async 	: false
		}).done(function(retorno1){
			$('#imprimir_cupom').attr('id_cupom', retorno1);
			$('#imprimir_cozinha').attr('id_cupom', retorno1);
			$('#imprimir_senha').attr('id_cupom', retorno1);
			
		});
	}

}

// Calcula o total para o cupom
function limpar_pedido(){
	var altura = $('.col_1_row_3:first').css('height');
	$('div[class=col_1]').html(
		'<div id="cupom_id_nota" id_nota="" style="display:none;" val_desc=""></div>'
		+'<div class="col_1_row_1">'
		+'	<div id="cupom_cliente" title="Ver Histórico" cupom_id_cliente="">'
		+'		<div id="cupom_nome">Sem Cliente</div>'
		+'		<span id="cupom_telefone" ></span>'
		+'	</div>'
		+'	<div id="cupom_pesquisar_cliente" title="Selecionar Cliente">'
		+'		<i class="fa fa-search fa-2x"></i>'
		+'	</div>'
		+'	<div id="cupom_mesa" title="Selecionar Mesa" id_mesa_c="">'
		+'		<i class="fa fa-cutlery fa-2x"></i>'
		+'	</div>'
		+'</div>'
		+'<div class="col_1_row_1_5">'
		+'	Obs: <input type="text" id="obs_pedido">'
		+'</div>'
		+'<div class="col_1_row_2">'
		+'	<div class="produto_atual_left">'
		+'		<div id="cupom_id_prod" id_prod=""></div>'
		+'		<div id="cupom_quantidade" value="1"></div>'
		+'		<div id="cupom_descricao"></div>'
		+'	</div>'
		+'	<div class="produto_atual_right">'
		+'		<div id="cupom_unitario">Unitário (R$)</div>'
		+'		<div id="cupom_valor_unitario">0.00</div>'
		+'	</div>'     
		+'</div>'
		+'<div class="col_1_row_3" style="height: '+altura+';">'
		+'	<div class="col_1_row_3" id="cupom_nota"></div>'
		+'</div>'
		+'<div class="col_1_row_4">'
		+'	<div>'
		+'		<div id="cupom_cancelar" title="Cancelar Pedido">'
		+'			<i class="fa fa-trash-o fa-2x"></i><br />Cancelar'
		+'		</div>'
		+'		<div id="cupom_espera" title="Colocar Pedido em Espera">'
		+'			<i class="fa fa-exchange fa-2x"></i><br />Em Espera'
		+'		</div>'
		+'		<div id="cupom_receber" title="Fechar Pedido">'
		+'			<i class="fa fa-money fa-2x"></i><br />Receber'
		+'		</div>'
		+'		<div id="cupom_total">'
		+'			<span>A RECEBER (R$)</span>'
		+'			<p>0.00</p>'
		+'		</div>'
		+'	</div>'
		+'	<div style="display:none">'
		+'		<div class="cupom_pedido_cancel_del" title="Não">'
		+'			<i class="fa fa-times fa-3x"></i>'
		+'		</div>'
		+'		<div class="cupom_pedido_conf_del" title="Sim">'
		+'			<i class="fa fa-check fa-3x"></i>'
		+'		</div>'
		+'		<div class="cupom_pedido_mensagem_del">'
		+'			Deseja Cancelar esse Pedido?'
		+'		</div>'
		+'	</div>'
		+'</div>'
	);	
}

// Calcula o total para o cupom
function atualizar_valor_cupom(){
	var quantidade = [];
	var valor_unitario = [];
	var id_prod = [];
	
	var cont = 0;
	$("div[class=col_1]:first .cupom_produto").each(function() {
		id_prod[cont] = parseFloat($(this).attr('id_prod'));
		cont = cont + 1;
	});
	var cont = 0;
	$("div[class=col_1]:first .cupom_produto_quantidade").each(function() {
		quantidade[cont] = parseFloat($(this).attr('value'));
		cont = cont + 1;
	});
	cont = 0;
	$("div[class=col_1]:first .cupom_produto_valor_unitario").each(function() {
		valor_unitario[cont] = parseFloat($(this).text());
		cont = cont + 1;
	});
	var total_cupom = 0;
	for(i = 0; i < cont; i++){
		if (id_prod[i] >= 0){
			total_cupom = total_cupom + quantidade[i]*valor_unitario[i];
		}else{
			if (id_prod[i] != -10){	// Id do Desconto
				total_cupom = total_cupom - quantidade[i]*valor_unitario[i];
			}
			
			//console.log(id_prod[i]+' - '+quantidade[i]+' - '+valor_unitario[i]+' = '+total_cupom);
		}
	}
	var desconto = parseFloat($('input[name=input_desconto]').val());
	if (!desconto){
		desconto = 0;
	}
	total_cupom = total_cupom.toFixed(2);
	total_cupom_desc = (total_cupom - desconto).toFixed(2);
	$('#imprimir_pedido').show();
	$('#imprimir_cupom').show();
	$('#cupom_total p').html(total_cupom_desc);
	$('#valor_total_a_pagar').html(total_cupom_desc);
	if (total_cupom_desc > 0){
		$('#receber_total').show();
		$('#devolver_troco').hide();
		$('#fechar_caixa').hide();
		$('#imprimir_senha').show();
		//$('#imprimir_cupom').hide();
		$('input[name=input_valor_receber]').val('');
	}else{
		if (total_cupom_desc < 0) {
			$('#receber_total').hide();
			$('#devolver_troco').show();
			$('#fechar_caixa').hide();
			$('#imprimir_senha').show();
			//$('#imprimir_cupom').hide();
			$('input[name=input_valor_receber]').val(-total_cupom_desc);
			$('#cupom_total p').html('0.00');
			$('#valor_total_a_pagar').html(-total_cupom_desc);
		}else{
			$('#receber_total').hide();
			$('#devolver_troco').hide();
			$('#fechar_caixa').show();
			$('#imprimir_senha').hide();
			//$('#imprimir_cupom').show();
			$('input[name=input_valor_receber]').val('');
		}
	}
}

// Corrige o vizual zebra da lista
function corrigir_zebra_cupom(){
	$('.odd:even').addClass('lista_odd');
	$('.odd:odd').removeClass('lista_odd');
}