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
        $id = $_GET['id'];
        $sel = mysql_query("select * from carro where id = $id");
        $r = mysql_fetch_object($sel);
        ?>

        <div class="form container" style="margin-top: 50px;">
            <form class="form-horizontal" action="carro_edita.php" method="POST">
            <fieldset>
                <!-- Form Name -->
                <legend>Edição de Carro</legend>
                <!-- Text input-->
                <div class="form-group">
                    <input id="carro_id" name="carro_id" hidden="" value="<?php echo $id ?>">
                    
                    <label class="col-md-4 control-label" for="textinput">Marca</label>  
                    <div class="col-md-4">
                        <input id="marca" name="marca" type="text" value="<?php echo $r->marca?>" class="form-control input-md">
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">Modelo</label>  
                    <div class="col-md-4">
                        <input id="modelo" name="modelo" type="text" value="<?php echo $r->modelo?>" class="form-control input-md">
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
