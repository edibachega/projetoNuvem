<?php
include "include/conexao_mysql.php";
session_start();

function validar_controle_acesso($id_menu) {
    $menus_user = $_SESSION['menus_acesso'];
    if ($menus_user != "0") {
        $menu_user_ex = explode(",", $menus_user);
        if (!in_array("$id_menu", $menu_user_ex)) {
            return 0;
        } else
            return 1;
    } else
        return 1;
}

function menu_portal() {
    $menus_user = $_SESSION['menus_acesso'];
    if ($menus_user != "0") {
        $menu_user_ex = explode(",", $menus_user);
        $admin = 0;
    } else {
        $admin = 1;
    }
    ?>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <div class="navbar navbar-default navbar-fixed-top" role="navigation" style="padding-left: 10px; padding-right: 10px;">
        <div class="container" >
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div>
                <ul class="nav navbar-nav">
                    <!-- HOME -->	
                    <li><a href="index.php"><i class="fa fa-home fa-fw"></i>&nbsp; Home</a></li>	
                    <li><a href="cadastra_carro.php"><i class="fa fa-car fa-fw"></i>&nbsp; Cadastra Carro</a></li>	
                    <li><a href="cadastra_movimento.php"><i class="fa fa-ticket"></i>&nbsp; Cadastra Movimento</a></li>	
                </ul>    
            </div>
            <div class="pull-right">
                <ul class="nav navbar-nav">
                    <li><a class="dropdown-toggle" data-toggle="dropdown">&nbsp; <?= $_SESSION['nomeUsuario'] ?></a></li>
                    <li><a href="logout.php"><i class="fa fa-power-off"></i>&nbsp;&nbsp; Sair</a></li>
                </ul>
            </div>
        </div>
    </div>	

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-modal/2.2.6/js/bootstrap-modal.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-modal/2.2.6/js/bootstrap-modalmanager.min.js"></script>
    <script src="js/bootstrap-waitingfor.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-modal/2.2.6/css/bootstrap-modal.min.css" />
    <script>
        $('ul.navbar-nav a[href*="php"]').click(function () {
            waitingDialog.show('Carregando');
        });
    </script>
    <?php
}
?>
