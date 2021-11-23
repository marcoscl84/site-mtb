<head>
    <link rel="stylesheet" href="../main.css"/>
</head>
 
<body>
    <div class="cabecalho">
        <?php include "../header.php"; ?>
    </div>
 
    <div class="container-wout-header">
 
<?php
 
    include "../db-conexao/dbConnect.php";
   
    $usuarioLogado = 10;
   
    // INSERT OK
    if(isset($_REQUEST['cadastraProduto'])){
        $tipo = $_REQUEST['tipo'];
        $marca = $_REQUEST['marca'];
        $descricao = $_REQUEST['descricao'];
       
        $sqlInsert = "INSERT INTO produto (tipo, marca, descricao, id_usuario)
        VALUES ('$tipo', '$marca', '$descricao', '$usuarioLogado')";
        if (mysqli_query($conexao, $sqlInsert)) {
            ?> <script> alert("Registro criado!"); </script> <?php
        } else {
            echo "Ooops... algo deu errado " . $sqlInsert;
        }
    }
 
/*
    // UPDATE
    if(isset($_REQUEST['updateButton'])){
       
        $idUsuario = $_REQUEST['id_usuario'];
        if($idUsuario /** === usuário que efetuou login * /){
            $tipo = $_REQUEST['tipo'];
            $marca = $_REQUEST['marca'];
            $descricao = $_REQUEST['descricao'];
       
            $sqlUpdate = "UPDATE `usuarios` SET `name`='$tipo',
            `idade`='$marca',`telefone`='$descricao' WHERE id=$idProd";
            if (mysqli_query($conexao, $sqlUpdate)) {
                ?> <script> alert("Registro alterado!"); </script> <?php
            } else {
                ?> <script> echo "Error: " . $sqlUpdate . "<br>" . mysqli_error(); </script> <?php
            }
        } else {
            ?> <script> alert("Você não possui autorização para atualizar o produto!"); </script> <?php
        }
       
    }
*/
    // DELETE
    if(isset($_REQUEST['deleteButton'])){
        $idProd = $_REQUEST['idProduto'];
 
        $sqlDelete = "DELETE FROM produto WHERE id=$idProd";
        if (mysqli_query($conexao, $sqlDelete)) {
            ?> <script> alert("Registro Excluído!"); </script> <?php
        } else {
            ?> <script> alert("oooops! Registro não excluído"); </script> <?php
        }    
    }
?>
       
        <div class="corpo-classificados">
            <div class="tabela-classificados">  
               
                <!-- Ao logar, mostrar o botão de divulgar e deslogar -->
                <?php // if(isset(/** LOGIN */)){ ?>      
                   
                    <!-- INSERT -->
                    <form method="post" action="classificados.php">
                        <div class="insert-button">
                        </div>
                        <div class="formulario-insercao" onclick="#">
                            <h2>Insira os dados do produto</h2>
                           
                            <input type="text" name="tipo">
                            <label>Tipo</label><br>
                            <input type="text" name="marca">
                            <label>Marca</label><br>
                            <input type="text" name="descricao">
                            <label>Descrição</label><br>
                           
                            <button type="submit">Enviar</button>
                            <input type="hidden" name="cadastraProduto" value="<?php echo $usuarioLogado ?>">
                        </div>
                    </form>
                <?php // } ?>
               
<?php            
                /***** SELECT - ITERAÇÃO DB *****/
                $classificBusca = mysqli_query($conexao, "SELECT * FROM produto ORDER BY tipo");
                echo "<h1>CLASSIFICADOS</h1>";
                echo "<table class='classificTable'>";
                    echo "<tr>";
                        echo "<th>PRODUTO</th>";
                        echo "<th>MARCA</th>";
                        echo "<th>DESCRIÇÃO</th>";
                    echo "</tr>";

                    while($linha = mysqli_fetch_assoc($classificBusca)) {
                        echo "<tr>";
                            $idProd = (int)$linha['id'];
                            $id_usuario = (int)$linha['id_usuario'];
                            $tipo = $linha['tipo'];
                            $marca = $linha['marca'];
                            $descricao = $linha['descricao'];

                            echo "<td>" . $tipo . "</td>";
                            echo "<td>" . $marca . "</td>";
                            echo "<td>" . $descricao . "</td>";
                            
/*                              echo "<td>";
                                // ao clicar deve receber o telefone do proprietário em um modal
                                echo "<button name='interesse'>Estou interessado</buttom>";
                            echo "</td>";
                
                            echo "<td>";
                                echo "<button type='submit'>Atualizar</buttom>";
                                echo '<input type="hidden" name="updateButton" value="<?php echo $idProd ?>">';
                            echo "</td>";
*/                              echo "<td>";
                                ?> <form method="post" action="classificados.php"> <?php
                                    echo '<button type="submit" name="deleteButton">Excluir</buttom>';
                                    echo '<input type="hidden" name="idProduto" value="'.$linha['id'].'">';
                                    echo " ".$linha['id'];
                                ?> </form> <?php
                            echo "</td>";
                        echo "</tr>";
                    }
?>
                    
                </table>
            </div>
        </div>
        <br>
        <?php include "../footer.php"; ?>
    </div>
</body>