$(document).ready(function() {

	//$('#div_bloqueio').hide();
	
	/*$(document).keyup(function (e) {
		if(e.which == 18){
			if(window.outerHeight != window.innerHeight){
				$('#div_bloqueio').hide();
				if(document.documentElement.requestFullscreen) {
					document.documentElement.requestFullscreen();
				} else if(document.documentElement.mozRequestFullScreen) {
					document.documentElement.mozRequestFullScreen();
				} else if(document.documentElement.webkitRequestFullscreen) {
					document.documentElement.webkitRequestFullscreen();
				} else if(document.documentElement.msRequestFullscreen) {
					document.documentElement.msRequestFullscreen();
				}
			}else {
				if(document.exitFullscreen) {
					document.exitFullscreen();
				} else if(document.mozCancelFullScreen) {
					document.mozCancelFullScreen();
				} else if(document.webkitExitFullscreen) {
					document.webkitExitFullscreen();
				}
				setTimeout(function(){
					if(window.outerHeight != window.innerHeight){
						$('#div_bloqueio').show();
					}
				}, 100);
				
			}
		}else{
			if(e.which == 27){	
				if(document.exitFullscreen) {
					document.exitFullscreen();
				} else if(document.mozCancelFullScreen) {
					document.mozCancelFullScreen();
				} else if(document.webkitExitFullscreen) {
					document.webkitExitFullscreen();
				}
				if(window.outerHeight != window.innerHeight){
					$('#div_bloqueio').show();
				}
			}else{
				if(e.which == 122){
					if(window.outerHeight == window.innerHeight){
						$('#div_bloqueio').hide();
					}else {
						$('#div_bloqueio').show();
					}
				}
			}
		}
	});*/
	
	
	// BLoquear botao direito
	$(document).bind("contextmenu",function(e){
		//return false;
	});
});
