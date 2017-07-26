
$(document).ready(function() {

/*------------------------------------------------------------------------------
	
------------------------------------------------------------------------------*/
	
	chamando_guiche();
	
	//window.setInterval("chamando_guiche()",1000);
	
	
});

function chamando_guiche(){
	
	var base_url = $('#base_url').attr('value');
	
	jQuery.ajax({
		url		: base_url+'index.php/pdv/chamar_guiche',
		cache	: false,
		async 	: false
	}).done(function(retorno){
		if (retorno != 0){
			
			
			
			numeros = retorno.split(' ');
			
			$('body').append('<embed src="'+base_url+'assets/pdv/som.mp3" autostart="true" hidden="true" loop="false">');
			
			console.log ('chamou: '+numeros[0]);
			
			$("#numero_guiche").children().html(numeros[0]).parent().css('display', 'flex').delay(500).queue(function (next) {
				$(this).children('div').css('opacity', 0.4).delay(300).queue(function (next) {
					$(this).css('opacity', 1).delay(500).queue(function (next) {
						$(this).css('opacity', 0.4).delay(300).queue(function (next) {
							$(this).css('opacity', 1).delay(500).queue(function (next) {
								$(this).css('opacity', 0.4).delay(300).queue(function (next) {
									$(this).css('opacity', 1).delay(2000).queue(function (next) {
										$(this).parent().fadeOut( "slow", function() {
											$(this).css('display', 'none');
										});
										next();
									});
									next();
								});
								next();
							});
							next();
						});
						next();
					});
					next();
				});
				next();
			});
			
			$('#historico_guiche').children().html(retorno);
			window.setTimeout("chamando_guiche()",6000);
		}else{
			window.setTimeout("chamando_guiche()",1000);
		}
	});
}

