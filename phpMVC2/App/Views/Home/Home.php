<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="<?php 
use App\Lib\Sessao;
echo APP_HOST?>/public/assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo APP_HOST?>/public/assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo APP_HOST?>/public/assets/css/form-elements.css">
        <link rel="stylesheet" href="<?php echo APP_HOST?>/public/assets/css/style.css">
        <link rel="stylesheet" href="<?php echo APP_HOST?>/App/Views/home/home.css">


        <!-- Paradinha identificar -->
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo APP_HOST?>/public/assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo APP_HOST?>/public/assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="<?php echo APP_HOST?>/public/assets/ico/apple-touch-icon-57-precomposed.png">
         
    </head>

    <body>

        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1">
                        	<div class="form-top">
                                 <div class="form-top-left">
                                    <img src="<?php echo APP_HOST?>/public/assets/img/backgrounds/8.png" class="form-top" style="padding-left: 195px;">
                                 </div>
                                 <div>
                                    <table id="homeTable" style="width:90%; margin:5%">
                                      <tr>
                                        <th>Nome</th>
                                        <th>Setor</th> 
                                        <th>Telefone</th>
                                        <th>CPF</th>
                                      </tr>
                                      <tr>
                                        <td>Jill</td>
                                        <td>Smith</td> 
                                        <td>50</td>
                                        <td>50</td>
                                      </tr>
                                      <tr>
                                        <td>Eve</td>
                                        <td>Jackson</td> 
                                        <td>94</td>
                                        <td>50</td>
                                      </tr>
                                    </table>
                                 </div>
                            </div>
                        </div>
                    </div>
                    <div class="row"></div>
                  
                        </div>
                    </div>
                </div>
            </div>
            
        </div>


        <!-- Javascript -->
        <script src="<?php echo APP_HOST?>/public/assets/js/jquery-1.11.1.min.js"></script>
        <script src="<?php echo APP_HOST?>/public/assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo APP_HOST?>/public/assets/js/jquery.backstretch.min.js"></script>
        <script src="<?php echo APP_HOST?>/public/assets/js/scripts.js"></script>


    </body>

</html>



