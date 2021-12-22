<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title> Alteração de Vacinas </title>
        <link rel="stylesheet" href="../../../css/main.css">
        <link href="../../../css/css_pages/consulta.css" rel="stylesheet">
        <script src="https://kit.fontawesome.com/d1fdd19268.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <?php
        session_start();
        if($_SESSION["permissao"] != 2){
            header("Location: ../index.php");
        }

        include_once('../conexao.php');
        // recuperando 
        $ID_vacina = $_POST['ID_vacina'];
        $CPF_usuario = $_SESSION["CPF_usuario"];

        // criando a linha do  SELECT
        $sqlconsulta = "select * from vacinas where ID_vacina = '$ID_vacina' and CPF_usuario = '$CPF_usuario'";

        // executando instrução SQL
        $resultado = @mysqli_query($conexao, $sqlconsulta);
        if (!$resultado) {
            echo '<input type="button" onclick="window.location=' . "'index.php'" . ';" value="Voltar"><br><br>';
            die('<b>Query Inválida:</b>' . @mysqli_error($conexao));
        } else {
            $num = @mysqli_num_rows($resultado);
            if ($num == 0) {
                echo "<b>Código: </b>não localizado !!!!<br><br>";
                echo '<input type="button" onclick="window.location=' . "'alteracao.php'" . ';" value="Voltar"><br><br>';
                exit;
            } else {
                $dados = mysqli_fetch_array($resultado);
            }
        }
        mysqli_close($conexao);
        ?>
        <div class="container">
            <div class="info_consulta">
            <h3 class="title"> Alteração de Vacinas </h3>
                <form name="nome" action="alterar.php" method="post">
                <div class="inputs">
                    <div>Código da vacina:</div> 
                        <label class="icon-input cons">
                                <i class="fas fa-address-book icon-mdy"></i>
                                 <input type="number" name="ID_vacina" style="width:1000px" value="<?php echo $dados['ID_vacina']; ?>">
                        </label>
                </div>
                <div class="inputs">
                    <div>Nome da Vacina:</div>
                        <label class="icon-input cons">
                            <i class="fas fa-file-signature icon-mdy"></i>
                            <input type="text" name="nome_vacina" maxlength='80' style="width:1000px" value="<?php echo $dados['nome_vacina']; ?>">
                        </label>
                </div>
                <div class="inputs">
                    <div> Fabricante:</div>
                        <label class="icon-input cons">
                            <i class="fas fa-file-signature icon-mdy"></i>
                            <textarea name="fabricante" rows='3' cols='100' style="resize: none;"  ><?php echo $dados['fabricante']; ?></textarea>
                            <!-- resize: none -->
                        </label>
                </div>
                <div class="inputs">
                    <div>Vacinador:</div>
                        <label class="icon-input cons">
                            <i class="fas fa-file-signature icon-mdy"></i>
                            <input type="text" name="vacinador" maxlength='80' style="width:1000px" value="<?php echo $dados['vacinador']; ?>">
                        </label>
                </div>
                <div class="inputs">
                         <div>Reg. profissional vacinador:</div>
                         <label class="icon-input cons">
                            <i class="fas fa-address-book icon-mdy"></i>
                            <input type="text" name="regProfVacinador" maxlength='80' style="width:1000px" value="<?php echo $dados['regProfVacinador']; ?>">
                        </label>
                </div>
                <div class="inputs">
                        <div>Dose:</div>
                        <label class="icon-input cons">
                            <i class="fas fa-file-medical icon-mdy"></i>
                            <input type="text" name="dose"  maxlength='80' style="width:1000px" value="<?php echo $dados['dose']; ?>">
                        </label>
                </div>
                <div class="inputs">
                        <div> Data de aplicação:</div>
                        <label class="icon-input cons">
                            <i class="fas fa-calendar-day icon-mdy"></i>
                            <input type="text" name="data_vac" maxlength='80' style="width:1000px" value="<?php echo $dados['data_vac']; ?>">
                        </label>
                </div>
                <div class="botoes">
                        <button class="btn btn-style2" type="submit" value="alterar" name="alterar">Alterar</button>
                        <button class="btn btn-style2" type="reset" value="Limpar">Limpar</button>
                        <button class="btn btn-style2" type='button' onclick="window.location = 'alteracao.php';" value="Voltar">Voltar</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
