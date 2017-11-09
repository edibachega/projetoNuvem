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
            <form class="form-horizontal" action="movimento_cadastra.php" method="POST">
                <fieldset>
                    <!-- Form Name -->
                    <legend>Cadastro de Movimento</legend>
                    <!-- Text input-->
                    <div class="form-group">
                        <input id="empresa_id" name="empresa_id" hidden="" value="<?php echo $empresa_id ?>">

                        <label class="col-md-4 control-label" for="textinput">Entrada</label>  
                        <div class="col-md-4">
                            <input id="entrada" name="entrada" type="text" readonly="" value="<?php echo date("H:i:s d/m/Y") ?>" class="form-control input-md">
                        </div>
                    </div>
                    
                    <?php
                        $sel = mysql_query("select * from carro where empresa_id = $empresa_id");
                    ?>
                    
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">Marca</label>  
                        <div class="col-md-4">
                            <select class="form-control" id="carro" name="carro">
                            <option value="">Selecione</option>
                            <?php while ($r = mysql_fetch_array($sel, MYSQL_ASSOC)) { ?> 		
                                <option value="<?php echo utf8_encode($r['id']); ?>"> <?php echo utf8_encode($r['marca']); ?> </option> 							
                            <?php } ?>						
                        </select>
                        </div>
                    </div>
                    
                    <?php
                        $selMol = mysql_query("select * from carro where empresa_id = $empresa_id");
                    ?>
                    
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">Modelo</label>  
                        <div class="col-md-4">
                            <select class="form-control" id="modelo" name="modelo">
                            <option value="">Selecione</option>
                            <?php while ($rMol = mysql_fetch_array($selMol, MYSQL_ASSOC)) { ?> 		
                                <option value="<?php echo utf8_encode($rMol['modelo']); ?>"> <?php echo utf8_encode($rMol['modelo']); ?> </option> 							
                            <?php } ?>						
                        </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">Cor</label>  
                        <div class="col-md-4">
                            <input id="cor" name="cor" type="text" placeholder="Cor" class="form-control input-md">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">Placa</label>  
                        <div class="col-md-4">
                            <input id="placa" name="placa" type="text" placeholder="Placa" class="form-control input-md">
                        </div>
                    </div>

                    <!-- Button -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="singlebutton"></label>
                        <div class="col-md-4">
                            <button id="singlebutton" name="singlebutton" class="btn btn-success">Registrar Entrada</button>
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Carros Estacionados</legend>
                </fieldset>

            </form>
            <div class="container">
            </div> 

            <table class="table table-condensed table-hover">
                <thead>
                    <tr>
                        <th style="text-align:center">data entrada</th>
                        <th style="text-align:center">data saida</th>
                        <th style="text-align:center">valor cobrado</th>
                        <th style="text-align:center">tempo estadia</th>
                        <th style="text-align:center">placa</th>
                        <th style="text-align:center">cor</th>
                        <th style="text-align:center">marca</th>
                        <th style="text-align:center">modelo</th>
                        <th style="text-align:center">saída</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $now = date("H:i:s d/m/Y");
                        $val_minuto = 0.083;
                        $selMov = mysql_query("select m.id, m.data_entrada, m.data_saida, m.valor_cobrado, m.placa, m.cor, c.modelo, c.marca from movimento m join carro c on c.id = m.carro_id where m.empresa_id = '" . $_SESSION['empresaID'] . "'");
                        while ($rMov = mysql_fetch_object($selMov)) { ?>

                    <tr <?php if($rMov->data_saida != NULL) { ?> style="color:#CC0000"  <?php }  ?> >
                            <td align="center"><?= $rMov->data_entrada ?></td>
                            <td align="center"><?= $rMov->data_saida ?></td>
                            <td align="center">R$ 
                                <?php 
                                    $entrada = new DateTime($rMov->data_entrada); 
                                    if($rMov->data_saida == NULL)
                                    {
                                        $saida = new DateTime($now); 
                                        $interval = date_diff($saida,$entrada);
                                        $cobrar = ((($interval->format("%h") * 60) + ($interval->format("%I"))) * $val_minuto );
                                        echo number_format($cobrar,2, ',', '.');
                                    }
                                    else
                                    {
                                        $saida = new DateTime($rMov->data_saida);
                                        $interval = date_diff($saida,$entrada);
                                        $cobrar = ((($interval->format("%h") * 60) + ($interval->format("%I"))) * $val_minuto );
                                        echo number_format($cobrar,2, ',', '.');
                                    }
                                ?>
                            </td>
                            <td align="center"><?= $interval->format("%h h %I m"); echo "<br>"; ?></td>
                            <td align="center"><?= $rMov->placa ?></td>
                            <td align="center"><?= $rMov->cor ?></td>
                            <td align="center"><?= utf8_encode($rMov->marca) ?></td>
                            <td align="center"><?= utf8_encode($rMov->modelo) ?></td>
                            <td align="center">
                                
                                <?php
                                    if($rMov->data_saida == NULL) { ?>
                                        <a href="registra_saida.php?id=<?= $rMov->id ?>"<i class="fa fa-sign-out" aria-hidden="true"></i></a>
                                     <?php  }
                                ?>
                                
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
