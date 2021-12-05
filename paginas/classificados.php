<head>
    <link rel="stylesheet" href="../main.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
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
    if(isset($_REQUEST['acao'])){
        if($_REQUEST['deletar'] == 'excluir'){
            $idDelete = $_REQUEST['acao'];

            $sqlDelete = "DELETE FROM produto WHERE id=$idDelete";
            if (mysqli_query($conexao, $sqlDelete)) {
                ?> <script> alert("Registro Excluído!"); </script> <?php
            } else {
                ?> <script> alert("oooops! Registro não excluído"); </script> <?php
            }  
        }  
    }

?>
 
        <div class="corpo-classificados">
            <div class="tabela-classificados">  
               
                <!-- INSERT -->
                <?php if(!isset($_REQUEST['updateId'])){ ?>      
               
                    <form method="post" action="classificados.php">
                        <div class="formulario-insercao d-grid gap-0 col-6 mx-auto" style="padding:20px; box-shadow: 10px 10px 8px #00D9A3; border-radius:10px;">
                            <h2 style="font-family:Copperplate Gothic; text-align:center; margin:20px;">INSIRA OS DADOS DO PRODUTO</h2>
                           
                            <div class="form-floating mb-0">
                                <input type="text" name="tipo" class="form-control" id="floatingInput" placeholder="TIPO">
                                <label>Tipo</label><br>
                            </div>
                            <div class="form-floating mb-0">
                                <input type="text" name="marca" class="form-control" id="floatingInput" placeholder="MARCA">
                                <label>Marca</label><br>
                            </div>
                            <div class="form-floating mb-0">
                                <input type="text" name="descricao" class="form-control" id="floatingInput" placeholder="DESCRIÇÃO">
                                <label>Descrição</label><br>
                            </div>
                            <div class="d-grid gap-2 col-4 mx-auto" style="margin:20px;">                              
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
                       
                        <div class="formulario-insercao d-grid gap-0 col-6 mx-auto" style="padding:20px; box-shadow: 10px 10px 8px #00D9A3; border-radius:10px;">
                            <h2 style="font-family:Copperplate Gothic; text-align:center; margin:20px;">ATUALIZE OS DADOS DO PRODUTO</h2>
                           
                            <div class="form-floating mb-0">
                                <input type="text" name="tipo" class="form-control" id="floatingInput" placeholder="TIPO">
                                <label>Tipo</label><br>
                            </div>
                            <div class="form-floating mb-0">
                                <input type="text" name="marca" class="form-control" id="floatingInput" placeholder="MARCA">
                                <label>Marca</label><br>
                            </div>
                            <div class="form-floating mb-0">
                                <input type="text" name="descricao" class="form-control" id="floatingInput" placeholder="DESCRIÇÃO">
                                <label>Descrição</label><br>
                            </div>
                           
                            <div class="d-grid gap-2 col-4 mx-auto" style="margin:20px;">
                                <button type="submit" class="btn btn-outline-dark" name="updateForm">Enviar</button>
                                <input type="hidden" name="idProduto" value="<?php echo $_REQUEST['idProduto'] ?>">
                            </div>
                        </div>
                    </form>
                <?php } ?>
 
           
                <!-- SELECT -->
                <div class="container">
 
<?php                
                    $classificBusca = mysqli_query($conexao, "SELECT * FROM produto ORDER BY tipo");
                    echo "<h1 style='text-align:center; font-family: Copperplate Gothic, Helvetica, sans-serif; margin:30px 0px 20px'>CLASSIFICADOS</h1>";
                    echo "<table class='table'>";
                        echo '<thead class="table-dark">';
                           
                            echo "<th>PRODUTO</th>";
                            echo "<th>MARCA</th>";
                            echo "<th>DESCRIÇÃO</th>";
                            echo "<th></th>";
                            echo "<th></th>";
                           
                        echo "</thead>";
 
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
                                    // UPDATE BUTTON
                                    echo "<td>";
                                        echo '<button type="submit" name="updateId" class="btn btn-secondary" 
                                        data-toggle="modal" data-target="#modalExemplo">Atualizar</buttom>';
                                        echo '<input type="hidden" name="idProduto" value="'.$linha['id'].'">';
                                    echo "</td>";
                                ?> </form> <?php
 
                                // DELETE BUTTON
                                echo "<td>";
?>                                  <form method="get" action="classificados.php">
                                        <a class="btn btn-danger" href="classificados.php?acao=<?php echo $idProd ?>&deletar=excluir" 
                                        onclick="return confirm('Tem certeza que deseja excluir seu anúncio?');">Excluir</a> 
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>

                </div>
            </div>
        </div>
        <br>
        <?php include "../footer.php"; ?>
    </div>
</body>