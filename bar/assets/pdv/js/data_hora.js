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
		$('#data_menu_topo').html(hora+' <br> '+data1); 
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