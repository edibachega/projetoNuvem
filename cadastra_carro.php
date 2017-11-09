<?php
include "funcoes_comum.php";
include "include/conexao_mysql.php";
session_start();
if (!isset($_SESSION['usuarioID'])) {
    session_destroy();
    header("Location: login.php");
    exit;
}
?>
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

        <title>Sistema de Estacionamentos</title>

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
    </head>
    <body>
        <?php
        menu_portal();
        $empresa_id = $_SESSION['empresaID'];
        ?>

        <div class="form container" style="margin-top: 50px;">
            <form class="form-horizontal" action="carro_cadastra.php" method="POST">
            <fieldset>
                <!-- Form Name -->
                <legend>Cadastro de Carros</legend>
                <!-- Text input-->
                <div class="form-group">
                    <input id="empresa_id" name="empresa_id" hidden="" value="<?php echo $empresa_id ?>">
                    
                    <label class="col-md-4 control-label" for="textinput">Marca</label>  
                    <div class="col-md-4">
                        <input id="marca" name="marca" type="text" placeholder="Marca" class="form-control input-md">
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">Modelo</label>  
                    <div class="col-md-4">
                        <input id="modelo" name="modelo" type="text" placeholder="Modelo" class="form-control input-md">
                    </div>
                </div>

                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="singlebutton"></label>
                    <div class="col-md-4">
                        <button id="singlebutton" name="singlebutton" class="btn btn-primary">Salvar</button>
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <legend></legend>
            </fieldset>
        </form>
        <table class="table table-condensed table-hover">
            <thead>
                <tr>
                    <th style="text-align:center">#</th>
                    <th style="text-align:center">marca</th>
                    <th style="text-align:center">modelo</th>
                    <th style="text-align:center">ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sel = mysql_query("select * from carro where empresa_id = '" . $_SESSION['empresaID'] . "'");
                    while($r = mysql_fetch_object($sel)) { 
                ?>
                <tr> 
                    <td align="center"><?=$r->id?></td>
                    <td align="center"><?=$r->marca?></td>
                    <td align="center"><?=$r->modelo?></td>
                    <td align="center">
                        <a href="edita_carro.php?id=<?=$r->id?>"<i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;
                        <a href="deleta_carro.php?id=<?=$r->id?>"<i class="fa fa-trash" aria-hidden="true"></i></a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>    
            
    </div>
    <?php
    rodape();
    ?>
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
</body>
</html>
