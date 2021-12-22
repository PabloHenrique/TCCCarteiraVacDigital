<!DOCTYPE html>
<html lang="pt-br">
    <meta charset="UTF-8">
    <head>
        <title> Exclusão de Vacinas </title>
    </head>
    <body>
        <h3> Exclusão de Vacinas </h3>
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
                echo '<input type="button" onclick="window.location=' . "'exclusao.php'" . ';" value="Voltar"><br><br>';
                exit;
            } else {
                $dados = mysqli_fetch_array($resultado);
            }
        }
        mysqli_close($conexao);
        ?>
        <form name="vacinas" action="excluir.php" method="post">
            <b>Código da vacina:</b> <input type="number"  value="<?php echo $dados['ID_vacina']; ?>" readonly ><br><br>
            <b>Nome da Vacina:</b> <input type="text"  maxlength='80' style="width:550px" value="<?php echo $dados['nome_vacina']; ?>" readonly ><br><br>
            <b>Fabricante: </b><br><textarea  rows='3' cols='100' style="resize: none;" readonly ><?php echo $dados['fabricante']; ?></textarea><br><br>
            <b>Vacinador:</b> <input type="text"  maxlength='80' style="width:550px" value="<?php echo $dados['vacinador']; ?>" readonly ><br><br>
            <b>Registro profissional do vacinador:</b> <input type="text"  maxlength='80' style="width:550px" value="<?php echo $dados['regProfVacinador']; ?>" readonly ><br><br>
             <b>Dose:</b> <input type="text"  maxlength='80' style="width:550px" value="<?php echo $dados['dose']; ?>" readonly ><br><br>
            <b>Data de aplicação:</b> <input type="text"  maxlength='80' style="width:550px" value="<?php echo $dados['data_vac']; ?>" readonly ><br><br>
            <input type='hidden' name='ID_vacina' value="<?php echo $dados['ID_vacina']; ?>">
            <input type='submit' value='Apagar'>
            <input type='button' onclick="window.location = 'exclusao.php';" value="Voltar">
        </form>
    </body>
</html>
