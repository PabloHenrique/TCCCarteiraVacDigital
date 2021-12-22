<?php
        session_start();
        if($_SESSION["permissao"] != 2){
            header("Location: ../index.php");
        }
        include_once('../conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
    <meta charset="UTF-8">
    <head>
       <title> Consultar Vacinas</title>
       <link rel="stylesheet" href="../../../css/main.css">
        <link rel="stylesheet" href="../../../css/css_pages/consulta.css">
        <script src="https://kit.fontawesome.com/d1fdd19268.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container">
            <div class="info_consulta">
                <h3 class="title"> Consultar Vacina </h3>
                <form name="nome" action="consulta.php" method="post" class="form">
                Insira o código da vacina que você deseja consultar:
                    <label class="icon-input cons">
                            <i class="fas fa-address-book icon-mdy"></i>
                            <input type="number" name="ID_vacina" placeholder="Exemplo: 2">
                    </label>   
                    <div class="botoes">
                        <button class="btn btn-style2" type="submit" value="consultar" name="consultar">Consultar</button>
                        <button class="btn btn-style2" type="reset" value="Limpar">Limpar</button>
                        <button class="btn btn-style2" type='button' onclick="window.location = 'index.php';" value="Voltar">Voltar</button>
                    </div>
                </form>
            </div>

            <?php
            if(isset($_POST["consultar"])){
                $ID_vacina = $_POST['ID_vacina'];
                $CPF_usuario = $_SESSION["CPF_usuario"];

                // criando comando SELECT
                $sqlconsulta =  "select * from vacinas where ID_vacina = '$ID_vacina' and CPF_usuario = '$CPF_usuario'";
                
                // executando SQL
                $resultado = @mysqli_query($conexao, $sqlconsulta);
                if (!$resultado) {
                    echo '<input type="button" onclick="window.location='."'index.php'".';" value="Voltar"><br><br>';
                    die('<b>Query Inválida:</b>' . @mysqli_error($conexao)); 
                } else {
                    $num = @mysqli_num_rows($resultado);
                    if ($num==0){ ?>
                    <div class="info_consulta">
                     <h3 class="title">Código não localizado!</h3>
                        <div class="botoes">
                            <button class="btn btn-style2" type='button' onclick="window.location = 'index.php';" value="Voltar">Voltar</button>
                        </div>
                    </div>
                    <?php
                    exit;		
                    }else{
                        $dados=mysqli_fetch_array($resultado);
                    }
                } 
                mysqli_close($conexao);
            ?>
            <div class="info_consulta">
                <h3 class="title">Dados da vacina em consulta:</h3>
                <form name="nome" class="form">
                    <div class="inputs">
                    <div>Código da vacina:</div>
                        <label class="icon-input cons">
                                <i class="fas fa-address-book icon-mdy"></i>
                                <input type="number"  value="<?php echo $dados['ID_vacina']; ?>" readonly >
                        </label>
                    </div>
                    <div class="inputs">
                    <div>Nome da Vacina:</div>
                        <label class="icon-input cons">
                            <i class="fas fa-file-signature icon-mdy"></i>
                            <input type="text"  value="<?php echo $dados['nome_vacina']; ?>" readonly >
                        </label>
                    </div>
                    <div class="inputs">
                    <div> Fabricante:</div>
                        <label class="icon-input cons">
                            <i class="fas fa-file-signature icon-mdy"></i>
                            <input type="text" value="<?php echo $dados['fabricante']; ?>" readonly >
                            <!-- resize: none -->
                        </label>
                    </div>
                    <div class="inputs">
                    <div>Vacinador:</div>
                        <label class="icon-input cons">
                            <i class="fas fa-file-signature icon-mdy"></i>
                            <input type="text"  value="<?php echo $dados['vacinador']; ?>" readonly >
                        </label>
                    </div>
                    <div class="inputs">
                         <div>Reg. profissional vacinador:</div>
                         <label class="icon-input cons">
                            <i class="fas fa-address-book icon-mdy"></i>
                             <input type="text"  value="<?php echo $dados['regProfVacinador']; ?>" readonly >
                        </label>
                    </div>
                    <div class="inputs">
                        <div>Dose</div>
                        <label class="icon-input cons">
                            <i class="fas fa-file-medical icon-mdy"></i>
                            <input type="text" value="<?php echo $dados['dose']; ?>" readonly >
                        </label>
                    </div>
                    <div class="inputs">
                        <div> Data de aplicação:</div>
                        <label class="icon-input cons">
                            <i class="fas fa-calendar-day icon-mdy"></i>
                            <input type="text" value="<?php echo $dados['data_vac']; ?>" readonly >
                        </label>
                    </div>
                </form>
                <br>
                <div class="botoes">
                        <button class="btn btn-style2" type='button' onclick="window.location = 'index.php';" value="Voltar">Voltar</button>
                 </div>
            </div>
            <?php
            } ?>
        </div>
    </body>
</html>



                
                  
                   