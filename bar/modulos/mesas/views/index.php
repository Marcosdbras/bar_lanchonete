        <script>
			$('#menu_mesas').addClass('current');
		</script>
        <div class="maincontent noright">
        	<div class="maincontentinner">
            	
                <ul class="maintabmenu">
                	<li class="current"><a href="">Mesas</a></li>
                </ul><!--maintabmenu-->
                
                <div class="content">
                                
                <div class="contenttitle">
                	<h2 class="table"><span>Lista de Mesas</span></h2>
                </div><!--contenttitle-->
                <!--contenttitle-->
                <div class="tableoptions">
                	<button class="stdbtn btn_black" onclick="toggle('cadastra');"><i class="user"></i>Cadastrar Mesa</button>
                </div><!--tableoptions-->
                <!-- Dialog Cadastrar -->
                <div id="cadastra" class="dialog2" style="display:none;">
                    <div id="dialog-bg2">
                        <?php $attributes = array('class' => 'stdform', 'id' => 'form1');echo form_open('mesas/salvar', $attributes);?>
                        <div id="dialog-title2">Cadastrar Mesa</div> 
                        <div align="left" style="margin-left:-80px;"> 
                            <input type="hidden" name="action" value="cadastrar"/>                                      
                            <p><label>Nome</label>
                            <span class="field"><input style="text-align:center !important;" type="text" name="nome" class="mediuminput"/></span></p> 
                            <p><label>Número de Lugares</label>
                            <span class="field"><input style="text-align:center !important;" type="number" name="lugares" class="mediuminput"/></span></p>                                         
                        </div>                                     
                        <div id="dialog-buttons">   
                            <button onClick="javascript:submit();" class="large button" style="color:#FFF;background-color:#090;">Salvar</button>&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="javascript:;" onclick="toggle('cadastra');" class="large button" style="color:#FFF;background-color:#F00;"">Cancelar</a>
                        </div>
                        <?php echo form_close();?>
                    </div>	
                </div>
                <!-- Dialog Cadastrar -->
                <table cellpadding="0" cellspacing="0" border="0" class="stdtable" id="dyntable">
                    <colgroup>
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                    </colgroup>
                    <thead>
                        <tr>
                            <th class="head0">Código</th>
                            <th class="head1">Nome da Mesa</th>
                            <th class="head0">Número de Lugares</th>
                            <th class="head1">Status</th>
                            <th class="head0">Opções</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th class="head0">Código</th>
                            <th class="head1">Nome da Mesa</th>
                            <th class="head0">Número de Lugares</th>
                            <th class="head1">Status</th>
                            <th class="head0">Opções</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    <?php foreach($lista as $row){ ?>
                        <tr class="gradeX">
                            <td class="center"><?php echo str_pad($row->id, 6, '0', STR_PAD_LEFT); ?></td>
                            <td class="center"><?php echo $row->nome; ?></td>
                            <td class="center"><?php echo $row->lugares; ?> Lugar(es)</td>
                            <td class="center"> -- </td>
                            <td class="center">
                                <a href="javascript:;" onclick="toggle('edita<?php echo $row->id; ?>');" class="btn btn3 btn_settings3" title="Editar"></a>
                                <!-- Dialog Editar -->
                                <div id="edita<?php echo $row->id; ?>" class="dialog2" style="display:none;">
                                    <div id="dialog-bg2">
                                    	<?php $attributes = array('class' => 'stdform', 'id' => 'form1');echo form_open('mesas/salvar', $attributes);?>
                                        <div id="dialog-title2">Mesa <?php echo $row->nome; ?></div> 
                                        <div align="left" style="margin-left:-80px;"> 
                                        	<input type="hidden" name="action" value="editar"/>
                                            <input type="hidden" name="id" value="<?php echo $row->id; ?>"/>                                       
                                            <p><label>Nome</label>
                                            <span class="field"><input style="text-align:center !important;" type="text" name="nome" class="mediuminput" value="<?php echo $row->nome; ?>"/></span></p> 
                                            <p><label>Número de Lugares</label>
                                            <span class="field"><input style="text-align:center !important;" type="number" name="lugares" class="mediuminput" value="<?php echo $row->lugares; ?>"/></span></p>                                         
                                        </div>                                     
                                        <div id="dialog-buttons">   
                                        	<button onClick="javascript:submit();" class="large button" style="color:#FFF;background-color:#090;">Salvar</button>&nbsp;&nbsp;&nbsp;&nbsp;
                                        	<a href="javascript:;" onclick="toggle('edita<?php echo $row->id; ?>');" class="large button" style="color:#FFF;background-color:#F00;"">Cancelar</a>
                                        </div>
                                        <?php echo form_close();?>
                                    </div>	
                                </div>
                                <!-- Dialog Editar -->
                                <a href="javascript:;" onclick="toggle('delete<?php echo $row->id; ?>');" class="btn btn3 btn_trash" title="Deletar"></a>
                                <!-- Dialog Remover -->
                                <div id="delete<?php echo $row->id; ?>" class="dialog" style="display:none;">
                                    <div id="dialog-bg">
                                        <div id="dialog-title">Deseja excluir este registro?</div>                                       
                                        <div id="dialog-buttons">
                                        <a href="<?php echo site_url('mesas/remover/'.$row->id);?>" class="large button" style="color:#FFF;background-color:#090;">Sim</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <a href="javascript:;" onclick="toggle('delete<?php echo $row->id; ?>');" class="large button" style="color:#FFF;background-color:#F00;"">Não</a>
                                        </div>
                                    </div>	
                                </div>
                                <!-- Dialog Remover -->
                        	</td>
                        </tr>
                    <?php }; ?>        
                    </tbody>
                </table>
                
                <br clear="all" />
                    
                </div><!--content-->
                
            </div><!--maincontentinner--> 
        
            <!-- Toggle Script -->
            <script type="text/javascript">
            function toggle(x) {
            if (document.getElementById(x).style.display == 'none') {
            	document.getElementById(x).style.display = '';
            } else {
            	document.getElementById(x).style.display = 'none';
            }}
            </script>