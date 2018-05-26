<html>
    <head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        
        <title>Colemax</title>
    </head>
    <body>
    <div class="container">    
        <div style="text-align:center; font-size: 50px; text-decoration: underline; text-shadow: 0.1em 0.1em 0.2em black; font-style:italic; color:blue">COLEMAX</div>
        <div id="loginbox" style="margin-top:50px; " class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >

                    <div class="panel-heading">
                        <div class="panel-title" style=" text-align:center;" >Entrar no Sistema</div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>  
                        <?php
				        	if($msg = get_msg()):
			                    echo '<div class="msg-box">'.$msg.'</div>';
                            endif;
			                echo form_open('Autenticacao/login');
                            ?>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="login-username" type="text" class="form-control" name="l_usuario" value="" placeholder="Usuário ou email">                                        
                                    </div>
                                
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="login-password" type="password" class="form-control" name="l_senha" placeholder="Senha">
                                    </div>
                                
                                    <!-- Button -->

                                    <div class="col-sm-12 controls center">
                                        
                                      
                                      <?php
				                    	echo form_submit('enviar', 'LOGIN', array('class' => 'btn btn-info', 'id'=>'btnEntrar'));
					                    echo form_close();
	        	                    	?>    
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12 control">
                                        <br>
                                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                           Ainda não tenho uma conta!
                                        <a href="#" onClick="$('#loginbox').hide(); $('#signupbox').show()">
                                            Nova conta
                                        </a>
                                        </div>
                                    </div>
                                </div>    
                            
                                  
                        </div>                     
                    </div>  
        </div>
        <div id="signupbox" style="display:none; margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title" >Cadastros de Usuário</div>
                            <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="#" onclick="$('#signupbox').hide(); $('#loginbox').show()">Login</a></div>
                        </div>
                      
                        <div class="panel-body" >
                                <?php
				            	if($msg = get_msg()):
			                        echo '<div class="msg-box">'.$msg.'</div>';
                                endif;
			                    echo form_open('Usuario/Adicionar_Usuario');
                            ?>   
                                 
                                <div class="form-group">
                                    <label for="nome" class="col-md-3 control-label">Nome:</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="nome" placeholder="Digite seu nome completo ">
                                    </div>
                                </div>
                                <br><br>
                                <div class="form-group"><br>
                                    <label for="idade" class="col-md-3 control-label">Idade:</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="idade" placeholder="Digite sua idade ">
                                    </div>
                                </div>
                                <br>
                                <div class="form-group"><br>
                                    <label for="profissao" class="col-md-3 control-label">Profissão:</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="profissao" placeholder="Digite sua profissão ">
                                    </div>
                                </div>
                                <br>
                                <div class="form-group"><br>
                                    <label for="login" class="col-md-3 control-label">Login:</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="login" placeholder="Digite seu login ">
                                    </div>
                                </div>

                                <br>
                                <div class="form-group"><br>
                                    <label for="login" class="col-md-3 control-label">Email:</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="email" placeholder="Digite seu login ">
                                    </div>
                                </div>
                                <br>
                                <div class="form-group"><br>
                                    <label for="senha" class="col-md-3 control-label">Senha: </label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="senha" placeholder="Digite sua senha">
                                  
                                    </div>
                                </div>

                                <div class="form-group"><br>
                                    <label for="senha" class="col-md-3 control-label">Conf. Senha: </label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="csenha" placeholder="Confirme sua  senha">
                                    </div>
                                </div>
                                <br>
                                <div class="form-group"><br>
                                    <div class="col-md-12 control">
                                    <?php
				                    	echo form_submit('enviar', 'Cadastrar', array('class' => 'btn btn-info', 'id'=>'btnEntrar'));
					                    echo form_close();
	        	                    	?>   
                                    <br><br>
                                    
                                </div>
                            </div>                 
                        </div>
                    </div>                                      
                </div>
            </div>    
        </div>
	</body>
</html>
