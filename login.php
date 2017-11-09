<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="favicon.ico">

        <title>Sistema Estacionamento</title>

        <!-- Bootstrap core CSS -->
        <link href="dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/style.css" rel="stylesheet">

        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
        <script src="assets/js/ie-emulation-modes-warning.js"></script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    </head>
    <body background="imagens/fundo2.jpg">	
        <div class="container login-form" align="center">
            <span>
                <h3 id="errolog"><img src="imagens/x.png" style="padding: 3px 0;" width=" 30px;"> Usuário ou senha inválido!</h3>
                <h3 id="erromaillog"><img src="imagens/x.png" style="padding: 3px 0;" width=" 30px;"> Email não cadastrado!</h3>
                <h3 id="sucessomaillog"><img src="imagens/x.png" style="padding: 3px 0;" width=" 30px;"> Enviado com sucesso!</h3>
            </span>
            <img src="imagens/cadeado.png" width="100px;" align="left" style="margin-bottom: 20px;" />
            <h2>Bem Vindo!</h2>	
            <form id="formlogin" class="form" novalidate>
                <input class="form-control" style="width: 400px" type="text" id="login" name="login" placeholder="Login" required="" /><br>
                <input class="form-control" style="width: 400px" type="password" id="senha" name="senha" placeholder="Senha" required="" /><br>
                <button type="submit" class="button button2" style="vertical-align:middle" id="btnEnviar"><span>Login</span></button>
            </form>	
        </div>

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>
            window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')
        </script>
        <script src="dist/js/bootstrap.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
        <script>
            $(document).ready(function () {
                $('#errolog').hide(); 
                $('#erromaillog').hide(); 
                $('#sucessomaillog').hide(); 
                $('#formlogin').submit(function () { 	
                    if ($('#login').is(":visible")) { 
                        var login = $('#login').val();	
                        var senha = $('#senha').val();	
                        $.ajax({
                            url: "login_valida.php", 
                            type: "post", 
                            data: "login=" + login + "&senha=" + senha, 
                            success: function (result) {
                                console.log(result);
                                if (result == 1) {
                                    location.href = 'index.php'	
                                } else {
                                    $('#errolog').show();	
                                }
                            }
                        })
                        return false;
                    }
                })
            })

        </script>
    <</body>
</htm
