<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Guichê - Euro Burger</title>
<link href="<?php echo base_url(); ?>assets/pdv/img/favicon.ico" rel="shortcut icon" type="img/vnd.microsoft.icon">
<meta name="viewport" content="width=device-width"/>
<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<!-- CSS -->
<link href="<?php echo base_url(); ?>assets/pdv/css/style.css" rel="stylesheet"/>
<link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

<style>
	html, body{
		overflow:hidden;
		//background:#000;
	}
	body{
		background:url(<?php echo base_url(); ?>assets/pdv/img/fundo.jpg);
		background-position:bottom right;
	}
	
</style>
<script src="<?php echo base_url(); ?>assets/pdv/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url(); ?>assets/pdv/js/bloqueio.js"></script>
<script src="<?php echo base_url(); ?>assets/pdv/js/data_hora.js"></script>
<script src="<?php echo base_url(); ?>assets/pdv/js/guiche.js"></script>

</head>
	<body onselectstart='return false'>
    	<div id="base_url" style="display:none;" value="<?php echo base_url(); ?>"></div>
        <div id="video_guiche" style="display:none">
            <div id="message" style="display:none"></div>
            <video controls="controls" autoplay style="width:100%" loop="loop"></video>
		</div>
        
        <div id="marquee"><marquee scrollamount="10"><p><?php foreach ($config as $row){echo $row->texto_guiche;} ?></p></marquee></div>
        
        <div id="input_video_guiche">
        	<div><input type="file" accept="video/*"/></div><div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-video-camera"></i></div>
        </div>
        
        <div id="historico_guiche"><p><?php foreach ($numeros as $row){echo $row->pedido.' ';} ?></p></div>
        
        <div id="numero_guiche"><div></div></div>
	</body>
</html>


<script>
(function localFileVideoPlayerInit(win) {
    var URL = win.URL || win.webkitURL,
        displayMessage = (function displayMessageInit() {
            var node = document.querySelector('#message');

            return function displayMessage(message, isError) {
                node.innerHTML = message;
                node.className = isError ? 'error' : 'info';
            };
        }()),
        playSelectedFile = function playSelectedFileInit(event) {
			
			$('body' ).css('background', '#000');
			$('#video_guiche').show();
			
            var file = this.files[0];

            var type = file.type;

            var videoNode = document.querySelector('video');

            var canPlay = videoNode.canPlayType(type);

            canPlay = (canPlay === '' ? 'no' : canPlay);

            var message = 'Can play type "' + type + '": ' + canPlay;

            var isError = canPlay === 'no';

            displayMessage(message, isError);

            if (isError) {
                return;
            }

            var fileURL = URL.createObjectURL(file);

            videoNode.src = fileURL;
        },
        inputNode = document.querySelector('input');
		
                                                                                                     
    if (!URL) {
        displayMessage('Your browser is not ' + 
           '<a href="http://caniuse.com/bloburls">supported</a>!', true);
        
        return;
    }                
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          
    inputNode.addEventListener('change', playSelectedFile, false);
}(window));
</script>