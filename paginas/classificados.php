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
            ?> <script> alert("Oooops! Não deu certo..."); </script> <?php
        }
    }
 
    // UPDATE
    if(isset($_REQUEST['updateForm'])){
        $idProd = $_REQUEST['idProduto'];
        $tipo = $_REQUEST['tipo'];
        $marca = $_REQUEST['marca'];
        $descricao = $_REQUEST['descricao'];
    
        $sqlUpdate = "UPDATE `produto` SET `tipo`='$tipo',
        `marca`='$marca',`descricao`='$descricao' WHERE id=$idProd";
        if (mysqli_query($conexao, $sqlUpdate)) {
            ?> <script> alert("Registro alterado!"); </script> <?php
        } else {
            ?> <script> alert("Oooops! Não deu certo...") </script> <?php
        }       
    }

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
               
                <!-- INSERT -->
                <?php if(!isset($_REQUEST['updateId'])){ ?>      
                    <form method="post" action="classificados.php">
                        <div class="formulario-insercao">
                            <h2>Insira os dados do produto</h2>
                           
                            <input type="text" name="tipo">
                            <label>Tipo</label><br>
                            <input type="text" name="marca">
                            <label>Marca</label><br>
                            <input type="text" name="descricao">
                            <label>Descrição</label><br>
                           
                            <button type="submit">Enviar</button>
                            <input type="hidden" name="cadastraProduto" value="cadastra">
                        </div>
                    </form>
                <?php } ?>
               
                <!-- UPDATE -->
                <?php if(isset($_REQUEST['updateId'])){ ?>  
                    <form method="post" action="classificados.php">
                        <?php $idProd = $_REQUEST['idProduto']; ?>
                        
                        <div class="formulario-insercao">
                            <h2>ATUALIZAR DADOS</h2>
                            
                            <input type="text" name="tipo">
                            <label>Tipo</label><br>
                            <input type="text" name="marca">
                            <label>Marca</label><br>
                            <input type="text" name="descricao">
                            <label>Descrição</label><br>
                           
                            <button type="submit" name="updateForm">Enviar</button>
                            <input type="text" name="idProduto" value="<?php echo $_REQUEST['idProduto'] ?>">
                        </div>
                    </form>
                <?php } ?>

<?php            
                /***** SELECT *****/
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
*/                
                            ?> <form method="post" action="classificados.php"> <?php
                            echo "<td>";
                                echo '<button type="submit" name="updateId">Atualizar</buttom>';
                                echo '<input type="hidden" name="idProduto" value="'.$linha['id'].'">';
                                echo " ".$linha['id'];
                            echo "</td>";
                            echo "<td>";
                                
                                    echo '<button type="submit" name="deleteButton">Excluir</buttom>';
                                    echo '<input type="hidden" name="idProduto" value="'.$linha['id'].'">';
                                    echo " ".$linha['id'];
                            echo "</td>";
                            ?> </form> <?php
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