// Tamanhos importantes
var fullscreen = 1;
		var margem_pagina = 0; //pixels
		var margem = -1; //pixels
		var h_header = 0;//135;
		var h_col1 = 150;
		var h_col2 = 200;
		
				  // 35% = 0.35 // 100% = 1
		var h_cupom = 1;					// Altura do cupom
		var h_produtos = 1;					// Altura do cupom

		var height = 0;
		var height2 = 0;

//pega a altura da resolução da tela
function altura_janela(){
	return window.innerHeight - margem_pagina;
}

function altura_tela(){
	return window.outerHeight;
}
function altura_monitor(){
	return window.innerHeight;
}

$(document).ready(function(){
	screemchange();
});

function corrigir_altura(){
	height = altura_janela() - margem - margem_pagina - h_header;
	
	col_1_row_3 = h_cupom * (height - h_col1);
	col_2_row_2 = h_produtos * (height - h_col2);
	
	$('.col_1_row_3').css({"height": col_1_row_3});
	$('.col_2_row_2').css({"height": col_2_row_2});
	
	col_2_row_2a = col_2_row_2 -20;
	$('.produtos_itens').css({'height':col_2_row_2a});
	$('#formulario_cadastro_cliente_pdv').css({'height':col_2_row_2a});
	clientes_cadastrar
	col_2_row_21 = col_2_row_2 + 80;
	$('.col_2_row_21').css({"height": col_2_row_21});
	col_2_row_21 = col_2_row_21 -20;
	$('.col2_row2_outro').css({"height": col_2_row_21});
	
	col_2_row_21 = col_2_row_21 -96;
	$('.lista_clientes_itens').css({"height": col_2_row_21});
	
}

window.setInterval("screemchange()",200);
function screemchange(){
	height2 =  altura_janela();
	
	
	if (height == height2){
		
	}else{
		
		corrigir_altura();
	}

}






	
	
	
	
	