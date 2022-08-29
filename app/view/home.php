<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Brenda Orlandi">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/home.css">
    <title>Sistema de Lembretes</title>
</head>

<body>

    <head>
        <h2>
            NOVO LEMBRETE
        </h2>
    </head>

    <!-- Criar novo lembrete -->
    <section id="formSection">
        <form action="lembrete/salvar" method="post">
            <div class="nome">
                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nome" placeholder="Nome do lembrete">
            </div>

            <div class="data">
                <label for="data">Data</label>
                <input type="date" id="data" name="data">
            </div>

            <button type="submit" id="bt-enviar">Criar</button>
        </form>
    </section>

    <!-- Listar lembretes -->
    <section>
        <!-- Exibe mensagem de erro -->
        <?php
        if ($params != null && $params['erro'] != null && $params['erro']  != '') {
            echo $params['erro'];
        }
        ?>

        <h3>Lista de Lembretes</h3>
        <div id="listLembretes">
            <!-- Testa se existe lembretes cadastrados -->
            <?php
            if ($model != NULL && $model->lembretes != NULL) {
                foreach ($model->lembretes as $key => $lembrete) {
            ?>
                    <table>
                        <tr>
                            <th colspan="2" align="left"><?php echo  date_format(new DateTime($key), "d/m/Y") ?></th>
                        </tr>
                        <?php

                        foreach ($lembrete as $item) {
                        ?>
                            <tr>
                                <td width="90%"><?php echo $item ?></td>
                                <td align="right">
                                    <form action="lembrete/excluir" method="post">
                                        <input type="hidden" name="id" value="<?php echo $item ?>">
                                        <button type='submit' class='btn_excluir'>Excluir</button>
                                    </form>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
            <?php
                }
            } else {
                echo "Nenhum lembrete cadastrado.";
            }
            ?>
        </div>

    </section>
    <!-- Fim listar lembretes -->
    
</body>

</html>