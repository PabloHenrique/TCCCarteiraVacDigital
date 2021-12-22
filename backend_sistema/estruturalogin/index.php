<?php
    include_once("funcoes.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Tela de Login</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Required itens -->
        <link href="../../css/main.css" rel="stylesheet">
        <link href="../../css/css_pages/login.css" rel="stylesheet">
        <script src="https://kit.fontawesome.com/d1fdd19268.js" crossorigin="anonymous"></script>
        <!-- Required Verification -->
        <script>
            function funcao1()
            {
                alert("Cadastro realizado!!")
            }
        </script>
    </head>
    <body>
        <div class="main">
            <div class="content primeiro-conteudo">
                <div class="segunda-coluna">
                    <h2 class="title title-colorBlue">Fazer Login</h2>
                    <br>
                    <p class="descripcion desc-style2">Informe os dados abaixo para realizar seu login</p>
                    <p class="descripcion desc-style2">ou acesse sua conta usando uma rede social abaixo:</p>
                    
                    <!-- redes sociais -->
                    <div class="social-media">
                        <ul class="list-social-media">
                            <a class="link-social-media" href="#">
                                <li class="item-social-media">
                                    <i class="fab fa-facebook-f"></i>        
                                </li>
                            </a>
                            <a class="link-social-media" href="#">
                                <li class="item-social-media">
                                    <i class="fab fa-google-plus-g"></i>
                                </li>
                            </a>
                            <a class="link-social-media" href="#">
                                <li class="item-social-media">
                                    <i class="fab fa-linkedin-in"></i>
                                </li>
                            </a>
                        </ul>
                    </div>
                    <!-- /social media -->
                    <form action="index.php" class="form" method="POST">
                        <label class="icon-input">
                            <i class="fas fa-user icon-mdy"></i>
                            <input type="text" name="cpfusuario" placeholder="Informe seu CPF">
                        </label>
                        <label class="icon-input">
                            <i class="fas fa-file-alt icon-mdy"></i>
                            <input type="password" name="senha" placeholder="Senha">
                        </label>
                        <button class="btn btn-style2" type="submit" name="acessar" value="ACESSAR">Logar</button>
                    </form>
                </div>
                <div class="primeira-coluna">
                    <h2 class="title title-colorWhite">Olá!</h2>
                    <p class="description desc-style1">Você não possui uma conta?</p>
                    <p class="description desc-style1">Faça seu cadastro agora mesmo!</p>
                    <button class="btn btn-style1" onclick="window.location.href='cadastro.php'">Cadastrar</button>
                </div>
            </div>
        </div>
    </body>
</html>

<?php
    if(isset($_POST["acessar"])){
    $cpfusuario = addslashes($_POST["cpfusuario"]);
    $senha = addslashes($_POST["senha"]);
    if(!empty($cpfusuario) && !empty($senha)){
        logar($cpfusuario, $senha);
    }else{
        echo "<script>alert('Preencha todos os campos!')</script>";
    }
    }
?>