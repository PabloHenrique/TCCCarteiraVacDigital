<?php
    include_once("funcoes.php");
?>
<!DOCTYPE html>
<html>
    <head lang="pt-br">
        <meta charset="utf8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tela de Cadastro</title>
        <!--
        <link href="../../assets/mainEstilos/mainstyle.css" rel="stylesheet">
        <link href="../../assets/mainEstilos/mediasCadastro/1500px.css" rel="stylesheet">
        <link href="../../assets/mainEstilos/mediasCadastro/1200px.css" rel="stylesheet">
        <link href="../../assets/mainEstilos/mediasCadastro/800px.css" rel="stylesheet">
        <link href="../../assets/mainEstilos/mediasCadastro/576px.css" rel="stylesheet"> 
        -->
        <link href="../../css/main.css" rel="stylesheet">
        <link href="../../css/css_pages/cadastro.css" rel="stylesheet">
        <script src="https://kit.fontawesome.com/d1fdd19268.js" crossorigin="anonymous"></script>
        <script>
            function funcao1()
            {
                alert("Cadastro realizado!")
            }
        </script>
        <title>Página de Login!</title>
    </head>
    <body>
        <!-- Formação do menu inicial, apresentando logo, serviços do site, informações de contato etc
        <input type="checkbox" id="check">
        <label for="check">
            <i class="fas fa-bars" id="btn"></i>
            <i class="fas fa-times" id="cancel"></i>
        </label>
        <div class="sidebar">
            <header>Gestão</header>
                <ul>
                    <li><a href=""><i class="fas fa-qrcode"></i>Home</a></li>
                    <li><a href=""><i class="fas fa-link"></i>Serviços</a></li>
                    <li><a href=""><i class="fas fa-stream"></i>Sobre</a></li>
                    <li><a href=""><i class="fas fa-calendar-week"></i>Contato</a></li>
                </ul>
        </div>
        -->
        <!-- Conteúdo principal -->
        <div class="main">
            <div class="content primeiro-conteudo">
                <div class="primeira-coluna">
                    <h2 class="title title-colorWhite">Bem vindo!</h2>
                    <p class="description desc-style1">Faça seu login agora mesmo</p>
                    <p class="description desc-style1">para usufruir de benefícios!</p>
                    <button class="btn btn-style1" onclick="window.location.href='index.php'">Logar</button>
                </div>
                <div class="segunda-coluna">
                    <h2 class="title title-colorBlue">Deseja criar uma conta?</h2>
                    <br>
                    <p class="descripcion desc-style2">Informe os dados abaixo para realizar seu cadastro!</p>
                    <form action="cadastro.php" class="form" method="POST">
                        <label class="icon-input">
                            <i class="fas fa-user icon-mdy"></i>
                            <input type="text" name="nome_completo" placeholder="Digite seu nome completo">
                        </label>
                        <label class="icon-input">
                            <i class="fas fa-envelope icon-mdy"></i>
                            <input type="email" name="email" placeholder="Digite o seu email">
                        </label>
                        <label class="icon-input">
                            <i class="fas fa-file-alt icon-mdy"></i>
                            <input type="text" name="CPF_usuario" placeholder="Digite seu CPF">
                        </label>
                        <label class="icon-input">
                            <i class="fas fa-lock icon-mdy"></i>
                            <input type="password" name="senha" id="" placeholder="Digite uma senha para login:">
                        </label>
                        <label class="icon-input">
                            <i class="fas fa-lock icon-mdy"></i>
                            <input type="password" name="senhaConf" placeholder="Confirme sua senha de login">
                        </label>
                        <label class="icon-input">
                            <i class="fas fa-file-medical icon-mdy"></i>
                            <input type="text" name="cod_SUS" placeholder="Digite o número do seu cartão SUS">
                        </label>
                        <button type="submit" class="btn btn-style2" name="cadastrar" value="CADASTRAR">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>

<?php
    if(isset($_POST["cadastrar"])){
        $CPF_usuario = addslashes($_POST["CPF_usuario"]);
        $nome_completo = addslashes($_POST["nome_completo"]);
        $cod_SUS = addslashes($_POST["cod_SUS"]);
        $email = addslashes($_POST["email"]);
        $senha = addslashes($_POST["senha"]);
        $senhaConf = addslashes($_POST["senhaConf"]);
        if(!empty($CPF_usuario) && !empty($nome_completo) && !empty($cod_SUS) && !empty($email) && !empty($senha) && !empty($senhaConf) && ($senha == $senhaConf)){
        cadastrar($CPF_usuario, $nome_completo, $cod_SUS, $email, $senha);
        }else if($senha != $senhaConf){
            echo "<script>alert('Senhas não correspondem!')</script>";
        }else{
            echo "<script>alert('Preencha todos os campos!')</script>";
        }
    }
 ?>

