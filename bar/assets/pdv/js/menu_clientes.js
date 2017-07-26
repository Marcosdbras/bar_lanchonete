$(document).ready(function(){
	var base_url = $('#base_url').attr('value');
/*------------------------------------------------------------------------------
	Função para funcionar menu de Produos
------------------------------------------------------------------------------*/

	$(document).delegate("div[id=menu_clientes_listar]", "click", function() {
		esconder_menus_clientes();
		$('#clientes_listar').show();
		$('#menu_clientes_listar').addClass('menu_select');
	});
	$(document).delegate( "div[id=menu_clientes_cadastrar]", "click", function() {
		esconder_menus_clientes();
		$('#clientes_cadastrar').show();
		$('#menu_clientes_cadastrar').addClass('menu_select');
		$('input[id=input_pesquisa_clientes]').blur().val('');
	});
	
	function esconder_menus_clientes(){
		$('#clientes_listar').hide();
		$('#clientes_cadastrar').hide();
		
		$('#menu_clientes_listar').removeClass('menu_select');
		$('#menu_clientes_cadastrar').removeClass('menu_select');
		
		//$('#input_pesquisa_produtos').val('');
		//$('.produto_item').show();
	}
/*------------------------------------------------------------------------------
	Função de pesquisa de produtos
------------------------------------------------------------------------------*/
	$("input[id=input_pesquisa_clientes]").keyup(function() {
		if ( event.which != 27 ){
		
			$('.lista_cliente_item').show();
			
			var texto = $(this).val();
			$('input[name=telefone]').val(texto);
			texto = texto.toLowerCase();;
			
			if (texto != ''){
				
				$("div[class=lista_cliente_item]").each(function() {
					var nome = $(this).children('.lista_clientes_nome').text().toLowerCase();

					if (nome.indexOf(texto)<0){
						var telefone = $(this).children('.lista_clientes_telefone').text();
						if (telefone.indexOf(texto)<0){
							var celular = $(this).children('.lista_clientes_celular').text();
							if (celular.indexOf(texto)<0){
								var endereco = $(this).children('.lista_clientes_endereco').text().toLowerCase();
								if (endereco.indexOf(texto)<0){
									$(this).hide();	
								}
							}
						}
					}
				});
				
			}
		}else{
			$(this).blur().val('');
			$('input[name=nome]').val('');
			$('.lista_cliente_item').show();
		}
	});
	

/*------------------------------------------------------------------------------
	Função para funcionar menu de Produos
------------------------------------------------------------------------------*/

	$(document).delegate("div[id=btn_cadastro_cliente_pdv]", "click", function() {
		
		var nome = $('input[name=nome]').val();

		if (nome != ''){
			var email = $('input[name=email]').val();
			var telefone = $('input[name=telefone]').val();
			var celular = $('input[name=celular]').val();
			var cep = $('input[name=cep]').val();
			var rua = $('input[name=rua]').val();
			var numero = $('input[name=numero]').val();
			var complemento = $('input[name=complemento]').val();
			var bairro = $('input[name=bairro]').val();
			var cidade = $('input[name=cidade]').val();
			var estado = $('input[name=estado]').val();
			var notas = $('textarea[name=notas]').val();
			
			jQuery.ajax({
				url		: base_url+'index.php/pdv/cadastrar_cliente',
				type	: 'POST',
				data	: {
							'nome':nome,
							'email': email, 
							'telefone': telefone, 
							'celular':celular, 
							'cep':cep, 
							'rua':rua, 
							'numero':numero,
							'complemento':complemento,
							'bairro':bairro, 
							'cidade':cidade,
							'estado':estado,
							'notas':notas},
				cache	: false,
				async 	: false
			}).done(function(retorno1){
				if (retorno1 > 0){
					$('#cupom_cliente:first').attr('cupom_id_cliente', retorno1);
					$('#cupom_nome:first').html(nome);
					
					$('#cupom_telefone:first').html(telefone+' '+celular);
					
					$('div[class=lista_clientes_itens]').append(
						'<div class="lista_cliente_item" id_cliente="'+retorno1+'">'
						+'	<div class="lista_clientes_nome">'+nome+'</div>'
						+'	<div class="lista_clientes_telefone">'+telefone+'</div>'
						+'	<div class="lista_clientes_celular">'+celular+'</div>'
						+'	<div class="lista_clientes_endereco">'+rua+', '+numero+' - '+bairro+'</div>'
						+'</div>'
					);
					
					$('#formulario_cadastro_cliente_pdv input').val('');
					$('#formulario_cadastro_cliente_pdv textarea').val('');
					
					$('div[id=menu_clientes_listar]').click();
					
					$('#voltar_produtos').click();
				}
			});
		}
		
		
	});

});

// Pegar endereço pelo CEP
function GetEndereco() {			
	if($.trim($("#cep").val()) != ""){
		$.getScript("http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+$("#cep").val(), function(){
		if(resultadoCEP["resultado"]){					
			$("#rua").val(unescape(resultadoCEP["tipo_logradouro"]) + " " + unescape(resultadoCEP["logradouro"]));
			$("#bairro").val(unescape(resultadoCEP["bairro"]));
			$("#cidade").val(unescape(resultadoCEP["cidade"]));
			$("#estado").val(unescape(resultadoCEP["uf"]));
		}else{
			alert("Endereço não encontrado");
		}
	});				
	}			
}