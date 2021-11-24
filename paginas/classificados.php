<head>
    <link rel="stylesheet" href="../main.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
                        <div class="formulario-insercao d-grid gap-0 col-6 mx-auto">
                            <h2 style="font-family:Copperplate Gothic; text-align:center;">INSIRA OS DADOS DO PRODUTO</h2>
                           
                            <div class="form-floating mb-3">
                                <input type="text" name="tipo" class="form-control" id="floatingInput" placeholder="TIPO">
                                <label>Tipo</label><br>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="marca" class="form-control" id="floatingInput" placeholder="MARCA">
                                <label>Marca</label><br>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="descricao" class="form-control" id="floatingInput" placeholder="DESCRIÇÃO">
                                <label>Descrição</label><br>
                            </div>
                            <div class="d-grid gap-2 col-4 mx-auto">                              
                                <button type="submit" class="btn btn-outline-dark">Enviar</button>
                                <input type="hidden" name="cadastraProduto" value="cadastra">
                            </div>
                        </div>
                    </form>
                <?php } ?>
               
                <!-- UPDATE -->
                <?php if(isset($_REQUEST['updateId'])){ ?>  
                    <form method="post" action="classificados.php">
                        <?php $idProd = $_REQUEST['idProduto']; ?>
                       
                        <div class="formulario-insercao">
                            <h2 style="font-family:Copperplate Gothic; text-align:center;">ATUALIZAR DADOS</h2>
                           
                            <input type="text" name="tipo">
                            <label>Tipo</label><br>
                            <input type="text" name="marca">
                            <label>Marca</label><br>
                            <input type="text" name="descricao">
                            <label>Descrição</label><br>
                           
                            <button type="submit" name="updateForm">Enviar</button>
                            <input type="hidden" name="idProduto" value="<?php echo $_REQUEST['idProduto'] ?>">
                        </div>
                    </form>
                <?php } ?>
 
<?php            
                /***** SELECT *****/
                $classificBusca = mysqli_query($conexao, "SELECT * FROM produto ORDER BY tipo");
                echo "<h1 style='text-align:center; font-family: Copperplate Gothic, Helvetica, sans-serif;'>CLASSIFICADOS</h1>";
                echo "<table class='table'>";
                    echo '<thead class="table-dark">';
                        echo "<th class='col-2'></th>";
                        echo "<th class='col-2'>PRODUTO</th>";
                        echo "<th class='col-2'>MARCA</th>";
                        echo "<th class='col-2'>DESCRIÇÃO</th>";
                        echo "<th class='col-1'></th>";
                        echo "<th class='col-1'></th>";
                        echo "<th class='col-2'></th>";
                        
                    echo "</thead>";
 
                    while($linha = mysqli_fetch_assoc($classificBusca)) {
                        echo "<tr>";
                            $idProd = (int)$linha['id'];
                            $id_usuario = (int)$linha['id_usuario'];
                            $tipo = $linha['tipo'];
                            $marca = $linha['marca'];
                            $descricao = $linha['descricao'];
 
                            echo "<td class='col-2'></td>";
                            echo "<td class='col-2'>" . $tipo . "</td>";
                            echo "<td class='col-2'>" . $marca . "</td>";
                            echo "<td class='col-2'>" . $descricao . "</td>";
                           
/*                              echo "<td>";
                                // ao clicar deve receber o telefone do proprietário em um modal
                                echo "<button name='interesse'>Estou interessado</buttom>";
                            echo "</td>";
*/                
                            ?> <form method="post" action="classificados.php"> <?php
                            echo "<td class='col-1'>";
                                echo '<button type="submit" name="updateId" class="btn btn-secondary">Atualizar</buttom>';
                                echo '<input type="hidden" name="idProduto" value="'.$linha['id'].'">';
                            echo "</td>";
                            echo "<td class='col-1'>";
                                echo '<button type="submit" name="deleteButton" class="btn btn-secondary">Excluir</buttom>';
                                echo '<input type="hidden" name="idProduto" value="'.$linha['id'].'">';
                            echo "</td>";
                            ?> </form> <?php
                            echo "<td class='col-2'></td>";
                            
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