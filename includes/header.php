```php
<?php

// ============================================================
// INICIA O BUFFER DE SAÍDA
// ============================================================

ob_start();


// ============================================================
// INICIA A SESSÃO
// ============================================================

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


// ============================================================
// VERIFICA SE O USUÁRIO ESTÁ LOGADO
// ============================================================

if (!isset($_SESSION['loginUser'])) {

    header("Location: ../index.php?acao=negado");
    exit;
}


// ============================================================
// INCLUI O ARQUIVO DE SAÍDA/LOGOUT
// ============================================================

include_once('sair.php');


// ============================================================
// CONEXÃO COM O BANCO DE DADOS
// ============================================================

include_once('../config/conexao.php');


// ============================================================
// DADOS DO USUÁRIO LOGADO
// ============================================================

$usuarioLogado = $_SESSION['loginUser'];

$selectUser = "
    SELECT *
    FROM tb_user
    WHERE email_user = :emailUserLogado
    LIMIT 1
";

try {

    $resultadoUser = $conect->prepare($selectUser);

    $resultadoUser->bindValue(
        ':emailUserLogado',
        $usuarioLogado,
        PDO::PARAM_STR
    );

    $resultadoUser->execute();

    $show = $resultadoUser->fetch(PDO::FETCH_OBJ);


    // ========================================================
    // VERIFICA SE O USUÁRIO FOI ENCONTRADO
    // ========================================================

    if ($show) {

        $id_user   = (int) $show->id_user;
        $foto_user = $show->foto_user;
        $nome_user = $show->nome_user;
        $email_user = $show->email_user;

    } else {

        $id_user    = 0;
        $foto_user  = 'avatar-padrao.png';
        $nome_user  = 'Usuário';
        $email_user = '';

    }

} catch (PDOException $e) {

    error_log(
        "ERRO DE LOGIN DO PDO: " . $e->getMessage()
    );

    $id_user    = 0;
    $foto_user  = 'avatar-padrao.png';
    $nome_user  = 'Usuário';
    $email_user = '';
}


// ============================================================
// PROTEÇÃO DOS DADOS PARA HTML
// ============================================================

$nome_user = htmlspecialchars(
    $nome_user ?? 'Usuário',
    ENT_QUOTES,
    'UTF-8'
);

$foto_user = htmlspecialchars(
    $foto_user ?? 'avatar-padrao.png',
    ENT_QUOTES,
    'UTF-8'
);

$email_user = htmlspecialchars(
    $email_user ?? '',
    ENT_QUOTES,
    'UTF-8'
);


// ============================================================
// DEFINE A PASTA DA FOTO DO USUÁRIO
// ============================================================

if ($foto_user === 'avatar-padrao.png') {

    $pastaFotoUser = '../img/avatar_p/';

} else {

    $pastaFotoUser = '../img/user/';

}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >

    <title>Agenda Eletrônica</title>


    <!-- ===================================================== -->
    <!-- FONT AWESOME -->
    <!-- ===================================================== -->

    <link
        rel="stylesheet"
        href="../plugins/fontawesome-free/css/all.min.css"
    >


    <!-- ===================================================== -->
    <!-- IONICONS -->
    <!-- ===================================================== -->

    <link
        rel="stylesheet"
        href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"
    >


    <!-- ===================================================== -->
    <!-- TEMPUSDOMINUS BOOTSTRAP 4 -->
    <!-- ===================================================== -->

    <link
        rel="stylesheet"
        href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css"
    >


    <!-- ===================================================== -->
    <!-- ICHECK -->
    <!-- ===================================================== -->

    <link
        rel="stylesheet"
        href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css"
    >


    <!-- ===================================================== -->
    <!-- JQVMap -->
    <!-- ===================================================== -->

    <link
        rel="stylesheet"
        href="../plugins/jqvmap/jqvmap.min.css"
    >


    <!-- ===================================================== -->
    <!-- ADMINLTE -->
    <!-- ===================================================== -->

    <link
        rel="stylesheet"
        href="../dist/css/adminlte.min.css"
    >


    <!-- ===================================================== -->
    <!-- OVERLAY SCROLLBARS -->
    <!-- ===================================================== -->

    <link
        rel="stylesheet"
        href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css"
    >


    <!-- ===================================================== -->
    <!-- DATERANGEPICKER -->
    <!-- ===================================================== -->

    <link
        rel="stylesheet"
        href="../plugins/daterangepicker/daterangepicker.css"
    >


    <!-- ===================================================== -->
    <!-- SUMMERNOTE -->
    <!-- ===================================================== -->

    <link
        rel="stylesheet"
        href="../plugins/summernote/summernote-bs4.css"
    >


    <!-- ===================================================== -->
    <!-- DATATABLES -->
    <!-- Versão compatível com AdminLTE 3 / Bootstrap 4 -->
    <!-- ===================================================== -->

    <link
        rel="stylesheet"
        href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css"
    >

    <link
        rel="stylesheet"
        href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css"
    >


    <!-- ===================================================== -->
    <!-- GOOGLE FONT -->
    <!-- ===================================================== -->

    <link
        rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700"
    >


    <!-- ===================================================== -->
    <!-- CSS PERSONALIZADO -->
    <!-- ===================================================== -->

    <link
        rel="stylesheet"
        href="../dist/css/estilo.css"
    >

</head>


<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">


    <!-- ===================================================== -->
    <!-- NAVBAR -->
    <!-- ===================================================== -->

    <nav class="main-header navbar navbar-expand navbar-white navbar-light">


        <!-- ================================================= -->
        <!-- MENU ESQUERDO -->
        <!-- ================================================= -->

        <ul class="navbar-nav">

            <li class="nav-item">

                <a
                    class="nav-link"
                    data-widget="pushmenu"
                    href="#"
                    role="button"
                    title="Abrir menu"
                >

                    <i class="fas fa-bars"></i>

                </a>

            </li>

        </ul>


        <!-- ================================================= -->
        <!-- MENU DIREITO -->
        <!-- ================================================= -->

        <ul class="navbar-nav ml-auto">


            <!-- ============================================= -->
            <!-- PERFIL / SAÍDA -->
            <!-- ============================================= -->

            <li class="nav-item dropdown">

                <a
                    class="nav-link"
                    data-toggle="dropdown"
                    href="#"
                    title="Perfil e Saída"
                >

                    <i class="fas fa-user-circle"></i>

                </a>


                <div
                    class="dropdown-menu dropdown-menu-lg dropdown-menu-right"
                >


                    <!-- ALTERAR PERFIL -->

                    <a
                        href="home.php?acao=perfil"
                        class="dropdown-item"
                    >

                        <i class="fas fa-user-alt mr-2"></i>

                        Alterar Perfil

                    </a>


                    <div class="dropdown-divider"></div>


                    <!-- SAIR -->

                    <a
                        href="?sair"
                        class="dropdown-item"
                    >

                        <i class="fas fa-sign-out-alt mr-2"></i>

                        Sair da Agenda

                    </a>

                </div>

            </li>


            <!-- ============================================= -->
            <!-- CONTROL SIDEBAR -->
            <!-- ============================================= -->

            <li class="nav-item">

                <a
                    class="nav-link"
                    data-widget="control-sidebar"
                    data-slide="true"
                    href="#"
                    role="button"
                    title="Painel lateral"
                >

                    <i class="fas fa-th-large"></i>

                </a>

            </li>

        </ul>

    </nav>

    <!-- /.navbar -->



    <!-- ===================================================== -->
    <!-- MAIN SIDEBAR -->
    <!-- ===================================================== -->

    <aside
        class="main-sidebar sidebar-dark-primary elevation-4"
    >


        <!-- ================================================= -->
        <!-- LOGO -->
        <!-- ================================================= -->

        <a
            href="home.php"
            class="brand-link"
        >

            <span class="brand-text font-weight-light">
                Agenda Eletrônica
            </span>

        </a>


        <!-- ================================================= -->
        <!-- SIDEBAR -->
        <!-- ================================================= -->

        <div class="sidebar">


            <!-- ================================================= -->
            <!-- USUÁRIO LOGADO -->
            <!-- ================================================= -->

            <div class="user-panel mt-3 pb-3 mb-3 d-flex">


                <!-- FOTO -->

                <div class="image">

                    <img
                        src="<?php echo $pastaFotoUser . $foto_user; ?>"
                        class="img-circle elevation-2"
                        alt="<?php echo $nome_user; ?>"
                        title="<?php echo $nome_user; ?>"
                        style="
                            width: 40px;
                            height: 40px;
                            object-fit: cover;
                        "
                    >

                </div>


                <!-- NOME -->

                <div class="info">

                    <a
                        href="home.php"
                        class="d-block"
                    >

                        <?php echo $nome_user; ?>

                    </a>

                </div>

            </div>


            <!-- ================================================= -->
            <!-- MENU -->
            <!-- ================================================= -->

            <nav class="mt-2">

                <ul
                    class="nav nav-pills nav-sidebar flex-column"
                    data-widget="treeview"
                    role="menu"
                    data-accordion="false"
                >


                    <!-- ========================================= -->
                    <!-- PRINCIPAL -->
                    <!-- ========================================= -->

                    <li class="nav-item">

                        <a
                            href="home.php?acao=bemvindo"
                            class="nav-link"
                        >

                            <i
                                class="nav-icon fas fa-tachometer-alt"
                            ></i>

                            <p>
                                Principal
                            </p>

                        </a>

                    </li>


                    <!-- ========================================= -->
                    <!-- CONTATOS -->
                    <!-- ========================================= -->

                    <li class="nav-item">

                        <a
                            href="home.php?acao=contatos"
                            class="nav-link"
                        >

                            <i
                                class="nav-icon fas fa-address-book"
                            ></i>

                            <p>
                                Contatos
                            </p>

                        </a>

                    </li>


                    <!-- ========================================= -->
                    <!-- RELATÓRIO -->
                    <!-- ========================================= -->

                    <li class="nav-item">

                        <a
                            href="home.php?acao=relatorio"
                            class="nav-link"
                        >

                            <i
                                class="nav-icon fas fa-chart-pie"
                            ></i>

                            <p>
                                Relatório
                            </p>

                        </a>

                    </li>


                </ul>

            </nav>

            <!-- /.sidebar-menu -->

        </div>

        <!-- /.sidebar -->

    </aside>

    <!-- /.main-sidebar -->
```
