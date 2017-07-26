<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Login - Euro Burger</title>
<link href="<?php echo base_url(); ?>assets/pdv/img/favicon.ico" rel="shortcut icon" type="img/vnd.microsoft.icon">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/style.css" type="text/css" />
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/plugins/jquery-1.7.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('.loginform button').hover(function(){
		$(this).stop().switchClass('default','hover');
	},function(){
		$(this).stop().switchClass('hover','default');
	});
	
	$('#login').submit(function(){
		var u = jQuery(this).find('#username');
		if(u.val() == '') {
			jQuery('.loginerror').slideDown();
			u.focus();
			return false;	
		}
	});
	
	$('#username').keypress(function(){
		jQuery('.loginerror').slideUp();
	});
});
</script>
<!--[if lt IE 9]>
	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->
<meta charset="UTF-8"></head>

<body class="login">

<div class="loginbox radius3">
	<div class="loginboxinner radius3">
    	<div class="loginheader">
    		<h1 class="bebas">Login Sistema</h1>
        	<div class="logo"><iframe width="120" height="39" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://e-bitsistemas.com.br/developed_by/developed_by_white.html" ></iframe></div>
    	</div><!--loginheader-->
        
        <div class="loginform">
        	<div class="loginerror"><p><?php if($msg){ echo 'E-mail ou senha incorreto.'; } ?></p></div>
        	<?php echo form_open('login/valida');?>
            	<p>
                	<label for="username" class="bebas">E-mail</label>
                    <input type="text" id="username" name="email" class="radius2" />
                </p>
                <p>
                	<label for="password" class="bebas">Senha</label>
                    <input type="password" id="password" name="senha" class="radius2" />
                </p>
                <p>
                	<button class="radius3 bebas">Acessar</button>
                </p>
            <?php echo form_close();?>
        </div><!--loginform-->
    </div><!--loginboxinner-->
</div><!--loginbox-->
</body>
</html>
