<html>

<head>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <link href="<?php
               use App\Lib\Sessao;

               echo APP_HOST; ?>/public/css/mainPublic.css" rel="stylesheet" type="text/css">
   <script src="<?php echo APP_HOST; ?>/public/js/jquery-3.2.1.min.js" type="text/javascript"></script>
   <script src="<?php echo APP_HOST; ?>/public/js/jquery.validate.min.js" type="text/javascript"></script>
   <script type="text/javascript" src="<?php echo APP_HOST; ?>/public/js/Mask-Plugin/dist/jquery-3.2.1.min.js"></script>
   <script type="text/javascript" src="<?php echo APP_HOST; ?>/public/js/Mask-Plugin/dist/jquery.mask.min.js"></script>
   <script src="<?php echo APP_HOST; ?>/public/js/validacao.js" type="text/javascript"></script>
   <script type="text/javascript">
      $(document).ready(function() {
         $("#cpass").keyup(function() {
            var valido = false;

            if ($("#pass").val() != $("#cpass").val()) {
               $("#messagem").html("*Senhas Diferentes").css("color", "red");
               $("button[type=submit]").attr("disabled", "disabled");

            } else {
               $("#messagem").html("Senhas Validas").css("color", "green");
               $("button[type=submit]").removeAttr("disabled");
            }
         });
      });
      $(document).ready(function() {
         $('#cpf').mask('000-000-000-00');
         $('#tel').mask('(00)-00000-0000');

      });
   </script>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width">
   <title>cadastro</title>
</head>

<body>
   <?php if ($Sessao::retornaMensagem()) { ?>
                                          <div class="alert alert-warning" role="alert"><?php echo $Sessao::retornaMensagem(); ?></div>
                                                                                                      <?php
                                                } ?>
   <div class="container vertical-center col-12 ">
      <div class="card centerx1 border-primary ">
         <img src="<?php echo APP_HOST; ?>\public\Icons\imgcad.png" class="card-top" style="max-height: 300px; max-width: 300px;">
         <form action="<?php echo APP_HOST; ?>/cadastro/cadastrar" method="post" id="form_cadastro">
            <div class="form-group col-md-12">

               <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome de usuario" value="<?php echo Sessao::retornaValorFormulario('nome')?>">
            </div>
            <div class="form-group col-md-12">

               <div class="form-group col-md-14">
                  <input type="text" class="form-control " name="cpf" id="cpf" placeholder="CPF" value="<?php echo Sessao::retornaValorFormulario('cpf')?>">
               </div>

               <div class="form-group col-md-14">
                  <input type="text" class="form-control" id="tel" name="tel" placeholder="Celular" value="<?php echo Sessao::retornaValorFormulario('tel') ?>">
               </div>


               <div class="form-group col-md-14">
                  <select class="form-control" id="setor" name="setor">
                     <option value="1">teste</option>
                     <option value="2">tabela setor</option>
                  </select>
               </div>

               <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo Sessao::retornaValorFormulario('email') ?>">
            </div>
            <div class="form-group col-md-12">

               <input type="password" class="form-control" id="pass" name="pass" placeholder="Senha" required>
               <div id="messagem"></div>

            </div>
            <div class="form-group col-md-12">

               <input type="password" class="form-control" id="cpass" name="cpass" placeholder="Digite sua senha novamente" required>
               <p><span class="emsg hidden">Senhas Divergentes</span></p>

            </div>
            <div class="form-group">

            </div>
            <div class="form-group col-md-12">
               <button type="submit" class="btn btn-primary">Cadastrar</button>
            </div>
         </form>
      </div>
   </div>
</body>

</html>