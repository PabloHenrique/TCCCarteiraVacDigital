<?php
        session_start();
        if($_SESSION["permissao"] != 2){
            header("Location: ../index.php");
        }
        include_once('../conexao.php');
?>
<html>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title> Excluir Vacinas </title>
    <link rel="stylesheet" href="../../../css/main.css">
    <link href="../../../css/css_pages/consulta.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/d1fdd19268.js" crossorigin="anonymous"></script>
    <body>
    <div class="container">
        <div class="info_consulta">
            <h3 class="title"> Exclusão de Vacinas</h3>
            <form name="nome" action="exclusao.php" method="post" class="form">     
                        <div>Informe o código da vacina que deseja excluir:</div>
                        <label class="icon-input cons">
                            <i class="fas fa-file-signature icon-mdy"></i>
                            <input type="number" name="ID_vacina" placeholder="Exemplo: 2"><br><br>
                        </label>
                    <div class="botoes">
                        <button button class="btn btn-style2" type="submit" value="deletar" name="deletar">Deletar</button>
                        <button class="btn btn-style2" type="reset" value="Limpar">Limpar</button>
                        <button class="btn btn-style2" type='button' onclick="window.location = 'index.php';" value="Voltar">Voltar</button>
                    </div>
            </form>
        </div>
        <?php
        if(isset($_POST["deletar"])){
            $ID_vacina = $_POST['ID_vacina'];
            $CPF_usuario = $_SESSION["CPF_usuario"];
                if(!empty($ID_vacina)){
                    // criando a linha do  DELETE
                    $sqldelete = "delete from  vacinas where ID_vacina = '$ID_vacina' and CPF_usuario = '$CPF_usuario'";

                    // executando instrução SQL
                    $resultado = @mysqli_query($conexao, $sqldelete);
                    if (!$resultado) {
                        echo '<input type="button" onclick="window.location=' . "'index.php'" . ';" value="Voltar"><br><br>';
                        die('<b>Query Inválida:</b>' . @mysqli_error($conexao));
                    }else{ ?>
                        <div class="info_consulta">
                            <h3 class="title">Vacina deletada com sucesso!</h3>
                                <div class="botoes">
                                    <button class="btn btn-style2" type='button' onclick="window.location = 'index.php';" value="Voltar">Voltar</button>
                                </div>
                            </div>
                            <?php
                    }
                    mysqli_close($conexao);
            }else{ ?>
                <div class="info_consulta">
                    <h3 class="title">Preencha o campo!</h3>
                </div>
            <?php
            }
        }
        ?>
    </div>
    </body>
</html>