$(document).ready(function(){
/*------------------------------------------------------------------------------
	Função para funcionar menu de Produos
------------------------------------------------------------------------------*/

	$(document).delegate( ".menu", "click", function() {
		$(this).siblings().removeClass('menu_select')
		$('.produtos').hide()
		
		$(this).addClass('menu_select')
		var menu = $(this).attr('id')
		$('.col_2_row_2').find('[id='+menu+']').show()
	});
/*------------------------------------------------------------------------------
	Função de pesquisa de produtos
------------------------------------------------------------------------------*/
	$("input[id=input_pesquisa_produtos]").keyup(function() {
		if ( event.which != 27 ){
		
			$('.produto_item').show();
			var texto = $(this).val().toLowerCase();
			
			if (texto != ''){
				var menu_produto = $('.menu_select').attr('id');
				
				$("div[menu=menu_"+menu_produto+"]").children('div').each(function() {
					var nome = $(this).children().next().next().text().toLowerCase();
					if (nome.indexOf(texto)<0){
						$(this).hide();
					}
				});
				
			}
		}else{
			$(this).blur().val('');
			$('.produto_item').show();
		}
	});
});