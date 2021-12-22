<?php
        session_start();
        if($_SESSION["permissao"] != 2){
            header("Location: ../index.php");
        }
        include_once('../conexao.php');
    ?>
<!DOCTYPE html>
<html>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <head>
        <title> Incluir Vacinas </title>
        <link rel="stylesheet" href="../../../css/main.css">
        <link href="../../../css/css_pages/consulta.css" rel="stylesheet">
        <script src="https://kit.fontawesome.com/d1fdd19268.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container">
            <div class="info_consulta">
                <h3 class="title">Informe os dados da vacina que deseja incluir</h3>
                <form name="nome" action="inclusao.php" method="post" class="form">
                <div class="inputs">
                    <div>Nome da Vacina:</div>
                        <label class="icon-input cons">
                            <i class="fas fa-file-signature icon-mdy"></i>
                            <input type="text" name="nome_vacina">
                        </label>
                </div>
                <div class="inputs">
                    <div>Fabricante:</div>
                        <label class="icon-input cons">
                            <i class="fas fa-file-signature icon-mdy"></i>
                            <input type="text" name="fabricante">
                            <!-- resize: none -->
                        </label>
                </div>
                <div class="inputs">
                    <div>Vacinador:</div>
                        <label class="icon-input cons">
                            <i class="fas fa-file-signature icon-mdy"></i>
                            <input type="text" name="vacinador">
                        </label>
                </div>
                <div class="inputs">
                    <div>Registro profissional do vacinador:</div>
                        <label class="icon-input cons">
                            <i class="fas fa-address-book icon-mdy"></i>
                            <input type="text" name="regProfVacinador">
                        </label>
                </div>
                <div class="inputs">
                    <div>Dose:</div>
                        <label class="icon-input cons">
                            <i class="fas fa-file-medical icon-mdy"></i>
                            <input type="text" name="dose">
                        </label>
                </div>
                <div class="inputs">
                    <div>Data de aplicação:</div>
                        <label class="icon-input cons">
                            <i class="fas fa-calendar-day icon-mdy"></i>
                            <input type="date" name="data_vac">
                        </label>
                 </div>
                    <!-- <b>Dose:<select name="dose" id="cars" maxlength='80' style="width:550px">
                            <option value="primeira">1ª dose</option>
                            <option value="segunda">2ª dose</option>
                            <option value="terceira">3ª dose</option>
                            <option value="quarta">4ª dose</option>
                            <option value="quinta">5ª dose</option>
                    </select><br><br> -->
                    <div class="botoes">
                        <button class="btn btn-style2" type="submit" value="incluir" name="incluir">Incluir</button>
                        <button class="btn btn-style2" type="reset" value="Limpar">Limpar</button>
                        <button class="btn btn-style2" type='button' onclick="window.location = 'index.php';" value="Voltar">Voltar</button>
                    </div>
                </form>
            </div>
            <?php
            if(isset($_POST["incluir"])){
                $nome_vacina = $_POST['nome_vacina'];
                $fabricante = $_POST['fabricante'];
                $vacinador = $_POST['vacinador'];
                $regProfVacinador = $_POST['regProfVacinador'];
                $dose = $_POST['dose'];
                $data_vac = $_POST['data_vac'];
                $CPF_usuario = $_SESSION["CPF_usuario"];
                if(!empty($nome_vacina) && !empty($fabricante) && !empty($vacinador) && !empty($regProfVacinador) && !empty($dose) && !empty($data_vac)){
                    // criando a linha de INSERT
                    $sqlinsert = "insert into vacinas (nome_vacina, fabricante, vacinador, regProfVacinador, dose, data_vac, CPF_usuario) values ('$nome_vacina', '$fabricante', '$vacinador', '$regProfVacinador', '$dose', '$data_vac', '$CPF_usuario')";
                    // executando instrução SQL
                    $resultado = @mysqli_query($conexao, $sqlinsert);
                    if (!$resultado) {
                        echo '<input type="button" onclick="window.location=' . "'index.php'" . ';" value="Voltar"><br><br>';
                        die('<b>Query Inválida:</b>' . @mysqli_error($conexao));
                    } else { ?>
                        <div class="info_consulta">
                        <h3 class="title">Vacina registrada com sucesso!</h3>
                            <div class="botoes">
                                <button class="btn btn-style2" type='button' onclick="window.location = 'index.php';" value="Voltar">Voltar</button>
                            </div>
                        </div>
                    <?php
                    }
                    mysqli_close($conexao);
                }else{ ?>
                        <div class="info_consulta">
                            <h3 class="title">Preencha todos os campos!</h3>
                        </div>
                    <?php
                }
            } 
            ?>
            <!-- Colocar img
            <div class="imagem">
                <img src="../assets/imgs/vacincluir.jpg" alt="some text">
            </div>
            FAZER A VERIFICAÇÃO DE CAMPOS VAZIOS IGUAL A DA TELA DE CADASTRO!!!!!!!!
            -->
        </div>
    </body>
</html>