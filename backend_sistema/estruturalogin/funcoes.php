<?php
 function logar($cpfusuario, $senha){
    include_once('conexao.php');
        $sql = "select * from usuarios where CPF_usuario = '$cpfusuario' and senha = '".md5($senha)."' ";
        $result = mysqli_query($conexao, $sql);
        $dados = mysqli_fetch_array($result);
        if($dados == 0){
            echo "O usuário informado não está cadastrado!<br><br>"; 
            echo '<input type="button" onclick="window.location='."'cadastro.php'".';" value="Cadastrar-se"><br><br>';
        }else{
            $permissao = $dados["permissao"];
            $CPF_usuario = $dados["CPF_usuario"];
            session_start();
            if($permissao == 1){
                $_SESSION["permissao"] = 1;
                $_SESSION["CPF_usuario"] = $CPF_usuario;
                header("Location: adm");
            }else if($permissao == 2){
                $_SESSION["permissao"] = 2;
                $_SESSION["CPF_usuario"] =  $CPF_usuario;
                header("Location: user/index.php");
            }else{
                $_SESSION["permissao"] = 0;
                header("Location: index.php");
            }
        }
 }

function logout(){
     session_destroy();
     header("Location: ../index.php");
}

function cadastrar($CPF_usuario, $nome_completo, $cod_SUS, $email, $senha){
    include_once('conexao.php');
        $sql = "select * from usuarios where CPF_usuario = '$CPF_usuario'";
        $result = mysqli_query($conexao, $sql);
        $dados = mysqli_fetch_array($result);
        if($dados != 0){
            echo "O CPF informado já está cadastrado!<br><br>"; 
            echo '<input type="button" onclick="window.location='."'index.php'".';" value="Fazer Login"><br><br>';
        }else{
            $sqlinsert = "insert into usuarios (CPF_usuario,nome_completo,cod_SUS,email,senha) values ('$CPF_usuario', '$nome_completo', '$cod_SUS', '$email', md5('$senha'))";
            $resultinsert = @mysqli_query($conexao, $sqlinsert);
        if (!$resultinsert) {
            echo '<input type="button" onclick="window.location=' . "'cadastro.php'" . ';" value="Voltar"><br><br>';
            die('<b>Query Inválida:</b>' . @mysqli_error($conexao));
        } else {
            echo "<script>alert('Cadastrado com sucesso!')</script>";
        }
        mysqli_close($conexao);
        }
    }
?>