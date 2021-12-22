<?php
    session_start();
?>
<!doctype html>
<html lang="pt-br">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,700;1,400;1,500&display=swap" rel="stylesheet">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../../../css/main.css">
        <link rel="stylesheet" href="../../../css/css_pages/footer.css">
        <link rel="stylesheet" href="../../../css/css_pages/index.css">
        <!-- Icones -->
        <script src="https://kit.fontawesome.com/d1fdd19268.js" crossorigin="anonymous"></script>
        <title>Página Inicial</title>
    </head>
    <body>
        <!-- Uso do bootstrap -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
            integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
            crossorigin="anonymous">
        </script>
        <script src="../../../js/bootstrap.min.js"></script>
        <!-- Barra de navegação -->
        <div id="header">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light justify-content-between">
                    <a class="navbar-brand" href="#">
                        <img src="../../../itens/imgs/logovacinaEscrita.ico" class="img-fluid">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="#">Sobre</a>
                        </li>
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Serviços
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="notificacao.php">Vizualizar minhas <strong>notificações</strong></a></li>
                            <li><a class="dropdown-item" href="geral.php"><strong>Carteira de Vacinação</strong> completa</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="inclusao.php"><strong>Incluir</strong> uma nova vacina</a></li>
                            <li><a class="dropdown-item" href="verdadosuser.php">Vizualizar meus <strong>dados</strong></a></li>
                            <li><a class="dropdown-item" href="consulta.php"><strong>Verificar</strong> uma vacina</a></li>
                            <li><a class="dropdown-item" href="alteracao.php"><strong>Alterar</strong> os dados</a></li>
                            <li><a class="dropdown-item" href="exclusao.php"><strong>Deletar</strong> um registro</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Precisa de<strong> ajuda?</strong></a></li>
                            <li><a class="dropdown-item" href="#">Encerrar<strong> seção</strong></a></li>
                        </ul>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="#">Contato</a>
                        </li>
                    </ul>
                    </div>
                </nav>
                <!-- ESC Barra de navegação -->
                <!-- Open SQL -->
                <?php
                if($_SESSION["permissao"] == 2){
                    echo "<strong>Bem vindo - </strong><br> CPF - " . $_SESSION["CPF_usuario"] . "<br>Código Único de Saúde: ";
                }else{
                    header("Location: ../index.php");
                }
                ?>
                <!-- 
                <h3>O que deseja fazer na carteira de vacinação digital?</h3>
                <a href='inclusao.php'>Incluir uma nova vacina em minha carteira</a><br>
                <a href='consulta.php'>Consultar uma vacina em minha carteira</a><br>
                <a href='geral.php'>Vizualizar minha carteira</a><br>
                <a href='exclusao.php'>Excluir uma vacina da minha carteira</a><br>
                <a href='alteracao.php'>Alterar os dados de uma vacina em minha carteira</a><br>
                <a href='notificacao.php'>Minhas notificações</a><br>
                <a href='verdadosuser.php'>Meus Dados</a><br>
                -->
                <div class="container menu-index">
                    <div class="container sub-menu-index1" style="width: 50%;">
                        <img src="../../../itens/imgs/campanha.jpg" class="img-fluid" width="100%">
                        <h5 class="linkcampanha">Para mais informações acesse: <a class="linkcampanha" href="https://www.noticias/campanha-de-vacinacao">https://www.noticias/campanha-de-vacinacao</a><h5>
                    </div>
                    <div class="container sub-menu-index2" style="width: 50%;">
                        <div class="itens-servicos">
                        <div class="row">
                                <div class="col">
                                    <a href='notificacao.php' class="link-edit">
                                        <label class="icon-input">
                                            <i class="fas fa-comment-medical icon-mdy"></i>
                                            Visualizar<br> as minhas notificações.
                                        </label>
                                    </a>
                                </div>
                                <div class="col">
                                    <a href='vacCompleta.php' class="link-edit">
                                        <label class="icon-input">
                                            <i class="fas fa-envelope-open-text icon-mdy"></i>
                                            Carteira de vacinação<br> completa.
                                        </label>
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <a href='inclusao.php' class="link-edit">
                                        <label class="icon-input">
                                            <i class="fas fa-syringe icon-mdy"></i>
                                            Incluir<br> uma vacina!
                                        </label>
                                    </a>
                                </div>
                                <div class="col">
                                    <a href='consulta.php' class="link-edit">
                                        <label class="icon-input">
                                            <i class="fas fa-user-md icon-mdy"></i>
                                            Consultar<br> um registro.
                                        </label>
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <a href='verdadosuser.php' class="link-edit">
                                        <label class="icon-input pad">
                                            <i class="fas fa-notes-medical icon-mdy"></i>
                                            Consultar<br> meus dados!
                                        </label>
                                    </a>
                                </div>
                                <div class="col">
                                    <a href='exclusao.php' class="link-edit">
                                        <label class="icon-input">
                                            <i class="fas fa-virus-slash icon-mdy"></i>
                                            Deletar<br> um registro.
                                        </label>
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <a href='alteracao.php' class="link-edit">
                                        <label class="icon-input">
                                            <i class="fas fa-edit icon-mdy"></i>
                                            Alterar<br> os dados!
                                        </label>
                                    </a>
                                </div>
                                <div class="col">
                                    <a href='#' class="link-edit">
                                        <label class="icon-input">
                                            <i class="fas fa-info icon-mdy"></i>
                                            Sobre o projeto.
                                        </label>
                                    </a>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="content">
                    </div>
                    <footer id="myFooter">
                        <div class="container">
                            <ul>
                                <div class="linha"></div>
                                <li><a href="#">Informações</a></li>
                                <li><a href="#">Suporte</a></li>
                                <li><a href="#">Redes Sociais</a></li>
                            </ul>
                            <p class="footer-copyright">© 2021 Copyright - Pablo Henrique e Rafaela Petelin</p>
                        </div>
                        <div class="barra">
                            <br><br>
                        </div>
                    </footer>
                    </div>
            </div>
        </div>
    </body>
</html>

