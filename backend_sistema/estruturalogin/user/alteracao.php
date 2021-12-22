<!DOCTYPE html>
<html lang="pt-br">
    <meta charset="UTF-8">
    <head>
        <title> Alterar Dados de Vacina </title>
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
    ?>
        <div class="container">
            <div class="info_consulta">
                <h3 class="title">Alterar Dados de Vacina</h3>
                <form name="nome" action="veralteracao.php" method="post" class="form">
                    Insira o código da vacina que você deseja alterar:
                    <label class="icon-input cons">
                            <i class="fas fa-address-book icon-mdy"></i>
                            <input type="number" name="ID_vacina" placeholder="Exemplo: 2">
                    </label>   
                    <div class="botoes">
                        <button class="btn btn-style2" type="submit" value="Ok">Alterar</button>
                        <button class="btn btn-style2" type="reset" value="Limpar">Limpar</button>
                        <button class="btn btn-style2" type='button' onclick="window.location = 'index.php';" value="Voltar">Voltar</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>