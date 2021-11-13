<?php

    $conexao = mysqli_connect('localhost','root','');
    $banco = mysqli_select_db($conexao,'apresenta-bike-classificado');
    mysqli_set_charset($conexao,'utf8');
    
    if(isset($_REQUEST['updateButtom'])){
        #
    }

    if(isset($_REQUEST['deleteButtom'])){
        #
    }

?>

<head>
    <link rel="stylesheet" href="../main.css"/>
</head>
<body>
    <div class="cabecalho">
        <?php include "../header.php"; ?>
    </div>

    <div class="container-wout-header">
        
        <div class="corpo-classificados">
            <div class="tabela-classificados">  
                
            <div class="login-container">
                <!-- criar modal pra fazer login ou criar usuário - botões deverão ficar sobre a lista -->
                <button name='novoUsuario'>NOVO USUÁRIO</buttom>
                <button name='loginButtom'>LOGIN</buttom>    
                
                <!-- Ao logar, mostrar o botão de divulgar -->
                <button name='inserirProd'>Divulgar</buttom>
               
            </div>
<?php            
                /***** ITERAÇÃO DB *****/
                $classificBusca = mysqli_query($conexao, "SELECT * FROM produto ORDER BY tipo");
                echo "<table class='classificTable'>";
                    echo "<tr>";
                        echo "<th>PRODUTO</th>";
                        echo "<th>MARCA</th>";
                        echo "<th>DESCRIÇÃO</th>";
                    echo "</tr>";
?>                    
                    <form method="post" action="classificados.php">
<?php
                    while($linha = mysqli_fetch_assoc($classificBusca)) {
                        echo "<tr>";
                            $idProd = (int)$linha['id'];
                            $id_usuario = (int)$linha['id_usuario'];
                            $prod = $linha['tipo'];
                            $modelo = $linha['marca'];
                            $descr = $linha['descricao'];

                            echo "<td>" . $linha['tipo'] . "</td>";
                            echo "<td>" . $linha['marca'] . "</td>";
                            echo "<td>" . $linha['descricao'] . "</td>";
                            echo "<td>";
                                // ao clicar deve receber o telefone do proprietário em um modal
                                echo "<button name='interesse'>Estou interessado</buttom>";
                            echo "</td>";
                    //      if(isset(/** LOGIN */)){
                                echo "<td>";
                                    echo "<button name='updateButtom'>Atualizar</buttom>";
                                echo "</td>";
                                echo "<td>";
                                    echo "<button name='deleteButtom'>Excluir</buttom>";
                                echo "</td>";
                    //        }
?>
                            <input type="hidden" name="idProd" value="<?php echo $idProd ?>">
<?php               
                        echo "</tr>";
                    }
?>
                    </form>
<?php
?>
                </table>
            </div>
        </div>
        <br>
        <?php include "../footer.php"; ?>
    </div>
</body>