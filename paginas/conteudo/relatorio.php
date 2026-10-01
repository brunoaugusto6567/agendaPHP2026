```php
<!-- ========================================================= -->
<!-- CONTENT WRAPPER -->
<!-- ========================================================= -->

<div class="content-wrapper">


    <!-- ===================================================== -->
    <!-- CONTENT HEADER -->
    <!-- ===================================================== -->

    <section class="content-header">

        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">

                    <h1>Contatos</h1>

                </div>

                <div class="col-sm-6">

                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item">
                            <a href="home.php">Principal</a>
                        </li>

                        <li class="breadcrumb-item active">
                            Contatos
                        </li>

                    </ol>

                </div>

            </div>

        </div>

    </section>


    <!-- ===================================================== -->
    <!-- CONTENT -->
    <!-- ===================================================== -->

    <section class="content">

        <div class="container-fluid">


            <!-- ================================================= -->
            <!-- CARD -->
            <!-- ================================================= -->

            <div class="card">


                <!-- ============================================= -->
                <!-- CARD HEADER -->
                <!-- ============================================= -->

                <div class="card-header">

                    <h3 class="card-title">
                        <i class="fas fa-address-book mr-2"></i>
                        Lista de contatos
                    </h3>


                    <!-- Botão novo contato -->

                    <div class="card-tools">

                        <a
                            href="home.php?acao=add-contato"
                            class="btn btn-primary btn-sm"
                            title="Adicionar novo contato"
                        >

                            <i class="fas fa-plus"></i>
                            Novo contato

                        </a>

                    </div>

                </div>


                <!-- ============================================= -->
                <!-- CARD BODY -->
                <!-- ============================================= -->

                <div class="card-body">


                    <!-- ========================================= -->
                    <!-- TABELA -->
                    <!-- ========================================= -->

                    <table
                        id="example1"
                        class="table table-bordered table-hover"
                        style="width:100%;"
                    >


                        <!-- ===================================== -->
                        <!-- THEAD -->
                        <!-- ===================================== -->

                        <thead>

                            <tr>

                                <th>#</th>

                                <th>Foto</th>

                                <th>Nome</th>

                                <th>Telefone</th>

                                <th>E-mail</th>

                                <th>Ações</th>

                            </tr>

                        </thead>


                        <!-- ===================================== -->
                        <!-- TBODY -->
                        <!-- ===================================== -->

                        <tbody>

                        <?php

                        // =================================================
                        // CONSULTA OS CONTATOS
                        // =================================================

                        $select = "
                            SELECT
                                id_contatos,
                                foto_contatos,
                                nome_contatos,
                                fone_contatos,
                                email_contatos
                            FROM tb_contatos
                            ORDER BY id_contatos DESC
                        ";


                        try {

                            // =================================================
                            // PREPARA A CONSULTA
                            // =================================================

                            $result = $conect->prepare($select);


                            // =================================================
                            // EXECUTA
                            // =================================================

                            $result->execute();


                            // =================================================
                            // CONTADOR
                            // =================================================

                            $cont = 1;


                            // =================================================
                            // PERCORRE OS CONTATOS
                            // =================================================

                            while (
                                $show = $result->fetch(PDO::FETCH_OBJ)
                            ) {


                                // =============================================
                                // ID DO CONTATO
                                // =============================================

                                $id = (int) $show->id_contatos;


                                // =============================================
                                // FOTO
                                // =============================================

                                $fotoOriginal = trim(
                                    $show->foto_contatos ?? ''
                                );


                                // =============================================
                                // SE NÃO TIVER FOTO, USA AVATAR PADRÃO
                                // =============================================

                                if (
                                    empty($fotoOriginal) ||
                                    $fotoOriginal === 'avatar-padrao.png'
                                ) {

                                    $foto = 'avatar-padrao.png';

                                    $pasta = '../../img/avatar_p/';

                                } else {

                                    $foto = $fotoOriginal;

                                    $pasta = '../img/cont/';

                                }


                                // =============================================
                                // PROTEÇÃO DOS DADOS
                                // =============================================

                                $foto = htmlspecialchars(
                                    $foto,
                                    ENT_QUOTES,
                                    'UTF-8'
                                );

                                $nome = htmlspecialchars(
                                    $show->nome_contatos ?? '',
                                    ENT_QUOTES,
                                    'UTF-8'
                                );

                                $fone = htmlspecialchars(
                                    $show->fone_contatos ?? '',
                                    ENT_QUOTES,
                                    'UTF-8'
                                );

                                $email = htmlspecialchars(
                                    $show->email_contatos ?? '',
                                    ENT_QUOTES,
                                    'UTF-8'
                                );

                        ?>


                            <!-- ========================================= -->
                            <!-- LINHA DO CONTATO -->
                            <!-- ========================================= -->

                            <tr>


                                <!-- ===================================== -->
                                <!-- NÚMERO -->
                                <!-- ===================================== -->

                                <td>

                                    <?php echo $cont++; ?>

                                </td>


                                <!-- ===================================== -->
                                <!-- FOTO -->
                                <!-- ===================================== -->

                                <td>

                                    <img
                                        src="<?php echo $pasta . $foto; ?>"
                                        alt="Foto de <?php echo $nome; ?>"
                                        title="<?php echo $nome; ?>"
                                        class="img-circle elevation-2"
                                        style="
                                            width:50px;
                                            height:50px;
                                            object-fit:cover;
                                        "
                                    >

                                </td>


                                <!-- ===================================== -->
                                <!-- NOME -->
                                <!-- ===================================== -->

                                <td>

                                    <?php echo $nome; ?>

                                </td>


                                <!-- ===================================== -->
                                <!-- TELEFONE -->
                                <!-- ===================================== -->

                                <td>

                                    <?php echo $fone; ?>

                                </td>


                                <!-- ===================================== -->
                                <!-- E-MAIL -->
                                <!-- ===================================== -->

                                <td>

                                    <?php echo $email; ?>

                                </td>


                                <!-- ===================================== -->
                                <!-- AÇÕES -->
                                <!-- ===================================== -->

                                <td>

                                    <div class="btn-group">


                                        <!-- ============================= -->
                                        <!-- EDITAR -->
                                        <!-- ============================= -->

                                        <a
                                            href="home.php?acao=editar&id=<?php echo $id; ?>"
                                            class="btn btn-success btn-sm"
                                            title="Editar Contato"
                                        >

                                            <i class="fas fa-user-edit"></i>

                                        </a>


                                        <!-- ============================= -->
                                        <!-- EXCLUIR -->
                                        <!-- ============================= -->

                                        <a
                                            href="conteudo/del-contato.php?idDel=<?php echo $show-> $id_contatos; ?>"
                                            class="btn btn-danger btn-sm"
                                            title="Excluir Contato"
                                            onclick="return confirm('Deseja realmente remover este contato?');"
                                        >

                                            <i class="fas fa-user-times"></i>

                                        </a>


                                    </div>

                                </td>


                            </tr>


                        <?php

                            }


                        } catch (PDOException $e) {


                            // =============================================
                            // ERRO DO BANCO
                            // =============================================

                            echo '

                                <tr>

                                    <td
                                        colspan="6"
                                        class="text-center text-danger"
                                    >

                                        <i class="fas fa-exclamation-triangle"></i>

                                        <strong>
                                            Erro ao carregar os contatos:
                                        </strong>

                                        ' .
                                        htmlspecialchars(
                                            $e->getMessage(),
                                            ENT_QUOTES,
                                            'UTF-8'
                                        )
                                        . '

                                    </td>

                                </tr>

                            ';

                        }

                        ?>

                        </tbody>


                        <!-- ===================================== -->
                        <!-- TFOOT -->
                        <!-- ===================================== -->

                        <tfoot>

                            <tr>

                                <th>#</th>

                                <th>Foto</th>

                                <th>Nome</th>

                                <th>Telefone</th>

                                <th>E-mail</th>

                                <th>Ações</th>

                            </tr>

                        </tfoot>


                    </table>

                </div>

                <!-- /.card-body -->

            </div>

            <!-- /.card -->


        </div>

        <!-- /.container-fluid -->

    </section>

    <!-- /.content -->


</div>

<!-- /.content-wrapper -->
```
