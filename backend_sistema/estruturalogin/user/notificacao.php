<!DOCTYPE html>
<html>
    <meta charset="UTF-8">
    <title> Minhas notificações </title>
    <link rel="stylesheet" href="../../../css/main.css">
    <link rel="stylesheet" href="../../../css/css_pages/notify.css">
    <body>
    <?php
        session_start();
        if($_SESSION["permissao"] != 2){
            header("Location: ../index.php");
        }
        ?>
    <?php
        include_once('../conexao.php');
        $CPF_usuario = $_SESSION["CPF_usuario"];

        // ajustando a instrução select para ordenar por data de vacina
        $query = mysqli_query($conexao,"select * from vacinas where CPF_usuario = '$CPF_usuario' and data_vac = CURDATE() order by data_vac asc");

        if (!$query) {
            echo '<input type="button" onclick="window.location='."'index.php'".';" value="Voltar"><br><br>';
            die('<b>Query Inválida:</b>' . @mysqli_error($conexao));  
        }else if(mysqli_num_rows($query) == 0){
            echo "<script>alert('Você não possui nenhuma notificação de vacinas no momento!')</script>";
            echo '<script>window.location.href="../user/index.php";</script>';
        }else{
        /*Construção da tabela de VACINAS */
        echo "
        <body>
        <div id='tabelaVacinas'>
            <div class='container not'>
                <!-- Nav Bar -->
                <h3><strong>Bem vindo!</strong></h3>
                <h3 class='cinza'>Minhas notificações:</h3><br>
                <table class='table'>
                <thead>
                    <tr>
                    <th scope='col'>Código</th>
                    <th scope='col'>Nome da Vacina</th>
                    <th scope='col'>Fabricante</th>
                    <th scope='col'>Vacinador</th>
                    <th scope='col'>Registro profissional do vacinador</th>
                    <th scope='col'>Quant. Dose</th>
                    <th scope='col'>Data de aplicação</th>
                    <th scope='col'>Situação</th>
                    </tr>
                </thead>  
        ";
        
        while($dados = mysqli_fetch_array($query)){      
        echo "<td align = 'center'>" . $dados['ID_vacina'] . "</td>";
        echo "<td align = 'center'>". $dados['nome_vacina'] . "</td>";
        echo "<td align = 'center'>". $dados['fabricante'] . "</td>";
        echo "<td align = 'center'>" . $dados['vacinador'] . "</td>";
        echo "<td align = 'center'>". $dados['regProfVacinador'] . "</td>";
        echo "<td align = 'center'>". $dados['dose'] . "</td>";
        echo "<td align = 'center'>". $dados['data_vac'] . "</td>";
        echo "</tr>";
        echo "</tbody>";
        echo "</div>";
        echo "</div>";
        echo "<body>";
        //  // buscando a na pasta imagem
        //  if (empty($dados['imagem'])) {
        //     $imagem = 'SemImagem.png';
        // } else {
        //     $imagem = $dados['imagem'];
        // }
        // echo "<td align='center'><a href='imagens/$imagem'><img src='imagens/$imagem' width='50px' heigth='50px'></a>";
        echo "</tr>";
    }
    echo "</table>";

    /*Construção da tabela de LEGENDA */
    echo "
    <div id='tabelaLegenda'>
      <div class='container tabelasInfo'>
        <div class='container tabela2' style='width: 40%;'>
          <table class='table table2'>
          <thead>
            <tr>
              <th scope='col'>Legenda</th>
              <th scope='col'>Representação</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Vacina em até 10 dias</td>
              <td><div class='bola verde'></div></td>
            </tr>
            <tr>
              <td>Vacina(s) - Hoje!</td>
              <td><div class='bola azul'></div></td>
            </tr>
            <tr>
              <td>Vacina(s) atrasadas!</td>
              <td><div class='bola vermelha'></div></td>
            </tr>
          </tbody>
          </table>
        </div>
        <div class='container info' style='width: 35%; background-color: var(--colorAzul5_20);'>
          <p class='infoP'>Você possui X vacina(s) atrasadas.<br>
          Procure a unidade de saúde mais próxima!<p>
        </div>
      </div>
    ";
    }
        mysqli_close($conexao);
    ?>
    <br>
      <div class='container botoes'>
        <div class="botaoVoltar">
          <button class='btn btn-style1' onclick='window.location.href="../user/index.php"'><strong>Voltar</strong></button>
        </div> 
        <div class="botaoAlterar">
          <button class='btn btn-style1' onclick='window.location.href="alteracao.php"'>Algo errado? Você pode alterar seus dados <strong>aqui!</strong></button>
        </div>
      </div>
    <!-- <input type='button' onclick="window.location='index.php';" value="Voltar"> -->
    </body>
</html>