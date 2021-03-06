<?php session_start(); 
$url_base = "http://localhost/apresenta-bikes";
?>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- link para fazer efeito ao clicar nos inputs -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <style type="text/css">
        .corpoPag{
            margin-top: 290px;
        }
 
        @media (min-width: 538px){
            .corpoPag{
                margin-top: 240px;
            }        
        }
 
        @media (min-width: 950px){
            .corpoPag{
                margin-top: 180px;
            }        
        }
 
        @media (min-width: 991px){
            .corpoPag{
                margin-top: 135px;
            }        
        }
 
        @media (min-width: 1099px){
            .corpoPag{
                margin-top: 110px;
            }        
        }

        footer .footer{
            text-align: center;
            height: fit-content;
            font-family: Arial, Helvetica, sans-serif;
            background-color: white;
            width: 100%;  
        }
    </style>
</head> 


<?php
 
    include "../db-conexao/dbConnect.php";

    if(isset($_SESSION['username'])){
        $usuarioLogado = $_SESSION['idUser'];
        
        // INSERT
        if(isset($_REQUEST['cadastraProduto'])){
            $tipo = $_REQUEST['tipo'];
            $marca = $_REQUEST['marca'];
            $descricao = $_REQUEST['descricao'];
        
            $sqlInsert = "INSERT INTO produto (tipo, marca, descricao, id_usuario)
                        VALUES ('$tipo', '$marca', '$descricao', '$usuarioLogado')";
            mysqli_query($conexao, $sqlInsert);
            
            $maxId = mysqli_query($conexao, "SELECT MAX(ID) FROM produto");
            while($line = $maxId->fetch_assoc()){
                $lastId = $line['MAX(ID)'];
            }

            $sqlInsertProdUserTable = "INSERT INTO `usuario_produto`(`id_usuario`, `id_produto`) 
                        VALUES ($usuarioLogado, $lastId)";
            if (mysqli_query($conexao, $sqlInsertProdUserTable)) {
                ?> <script> alert("Registro criado!"); </script> <?php
            } else {
                ?> <script> alert("Oooops! N??o deu certo..."); </script> <?php
            }
        }
    
        // UPDATE
        if(isset($_REQUEST['updateForm'])){
            $idProd = $_REQUEST['idProduto'];
            $tipo = $_REQUEST['tipo'];
            $marca = $_REQUEST['marca'];
            $descricao = $_REQUEST['descricao'];

            $sqlTesteUserProd = "SELECT T3.id
                        FROM usuario T3
                        INNER JOIN usuario_produto T2 
                        ON T3.id = T2.id_usuario    
                        INNER JOIN produto T1 
                        ON T1.id = T2.id_produto
                        WHERE T1.id = $idProd";
            $sqlTesteUserProd = mysqli_query($conexao, $sqlTesteUserProd);
            while($row = $sqlTesteUserProd->fetch_assoc()){
                $idLogado = $row['id'];
            }

            if(isset($idLogado)){
                if($idLogado == $usuarioLogado){
                    $sqlUpdate = "UPDATE `produto` SET `tipo`='$tipo',
                    `marca`='$marca',`descricao`='$descricao' WHERE id=$idProd";
                    mysqli_query($conexao, $sqlUpdate);
                    ?> <script> alert("Registro alterado!"); </script> <?php
                } 
            } else {
                ?> <script> alert("Este produto n??o pode ser alterado!") </script> <?php
            }    
        }

        // DELETE
        if(isset($_REQUEST['acao'])){
            if($_REQUEST['deletar'] == 'excluir'){
                $idDelete = $_REQUEST['acao'];
                
                $sqlTesteUserProd = "SELECT T3.id
                        FROM usuario T3
                        INNER JOIN usuario_produto T2 
                        ON T3.id = T2.id_usuario    
                        INNER JOIN produto T1 
                        ON T1.id = T2.id_produto
                        WHERE T1.id = $idDelete";
                $sqlTesteUserProduto = mysqli_query($conexao, $sqlTesteUserProd);
                while($row = $sqlTesteUserProduto->fetch_assoc()){
                    $idLogado = $row['id'];
                }
                
                if(isset($idLogado)){
                    if($idLogado == $usuarioLogado){
                        $sqlDelete = "DELETE FROM produto WHERE id=$idDelete";
                        mysqli_query($conexao, $sqlDelete);
                        ?> <script> alert("Registro Exclu??do!"); </script> <?php
                    } 
                } else {
                    ?> <script> alert("Este produto n??o pode ser exclu??do!"); </script> <?php
                }  
            }  
        }
    }

?>
<body>
    <div class="cabecalho">
        <?php include "../header.php"; ?>
    </div>
    <br> 

    <div class="corpoPag">
        <div class="tabela-classificados">  

            <!-- VISUALIZAR TODOS OS AN??NCIOS -->
            <?php if(isset($_SESSION['username'])){ ?>
                <div class="d-flex justify-content-center" style="margin: 20px 0px;">
                    <a href="<?php echo $url_base ?>/paginas/classificados.php" class="btn btn-secondary">Ver todos os an??ncios</a>
                </div>
            <?php } ?>
            
            <!-- INSERT -->
            <?php if(isset($_SESSION['username'])){ 
                if(!isset($_REQUEST['updateId'])){ ?>      
            
                    <form method="post" action="classificados-usuario.php">
                        <div class="row">
                            <div class="formulario-insercao d-grid gap-0 col-10 col-sm-6 mx-auto" style="padding:20px; box-shadow: 10px 10px 10px 8px #00D9A3; border-radius:10px;">
                                <h2 style="font-family:Copperplate Gothic; text-align:center; margin:20px;">QUER VENDER MAIS? <br>cadastre aqui</h2>
                            
                                <div class="form-floating mb-0">
                                    <input type="text" name="tipo" class="form-control" id="floatingInput" placeholder="TIPO">
                                    <label>Tipo</label><br>
                                </div>
                                <div class="form-floating mb-0">
                                    <input type="text" name="marca" class="form-control" id="floatingInput" placeholder="MARCA">
                                    <label>Marca</label><br>
                                </div>
                                <div class="form-floating mb-0">
                                    <input type="text" name="descricao" class="form-control" id="floatingInput" placeholder="DESCRI????O">
                                    <label>Descri????o</label><br>
                                </div>
                                <div class="d-grid gap-2 col-4 mx-auto" style="margin:20px;">                              
                                    <button type="submit" class="btn btn-outline-dark">Enviar</button>
                                    <input type="hidden" name="cadastraProduto" value="cadastra">
                                </div>
                            </div>
                        </div>
                    </form>
                <?php } ?>
            
        
                <!-- UPDATE -->
                <?php if(isset($_REQUEST['updateId'])){ ?>  
                    <form method="post" action="classificados-usuario.php">
                        <?php $idProd = $_REQUEST['idProduto']; ?>
                        <div class="row">
                            <div class="formulario-insercao d-grid gap-0 col-10 col-sm-6 mx-auto" style="padding:20px; box-shadow: 10px 10px 10px 8px #00D9A3; border-radius:10px;">
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
                                    <input type="text" name="descricao" class="form-control" id="floatingInput" placeholder="DESCRI????O">
                                    <label>Descri????o</label><br>
                                </div>
                            
                                <div class="d-grid gap-2 col-4 mx-auto" style="margin:20px;">
                                    <button type="submit" class="btn btn-outline-dark" name="updateForm">Enviar</button>
                                    <input type="hidden" name="idProduto" value="<?php echo $_REQUEST['idProduto'] ?>">
                                </div>
                            </div>
                        </div>
                    </form>
                <?php }

                /* SELECT USU??RIO LOGADO */
                echo "<div class='container'>";
                    $classificBusca = mysqli_query($conexao, "SELECT * FROM produto WHERE id_usuario=$usuarioLogado ORDER BY tipo");
                    echo "<h1 style='text-align:center; font-family: Copperplate Gothic, Helvetica, sans-serif; margin:30px 0px 20px'>SEUS AN??NCIOS</h1>";
                    echo "<table class='table'>";
                        echo '<thead class="table-dark">';
                        
                            echo "<th>PRODUTO</th>";
                            echo "<th>MARCA</th>";
                            echo "<th>DESCRI????O</th>";
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
                                        
                                // UPDATE BUTTON
                                if(isset($_SESSION['username'])){ 
                                    if(isset($_SESSION['idUser'])){ ?>
                                        <form method="post" action="classificados-usuario.php"> <?php     
                                            echo "<td>";
                                                echo '<button type="submit" name="updateId" class="btn btn-secondary btn-sm" 
                                                data-toggle="modal" data-target="#modalExemplo">Atualizar</buttom>';
                                                echo '<input type="hidden" name="idProduto" value="'.$linha['id'].'">';
                                            echo "</td>";
                                        ?> </form> <?php 
                                    }
                                }

                                // DELETE BUTTON
                                if(isset($_SESSION['username'])){
                                    if(isset($_SESSION['idUser'])){
                                        echo "<td>";
                                            ?> <form method="get" action="classificados-usuario.php">
                                                <a class="btn btn-danger btn-sm" href="classificados-usuario.php?acao=<?php echo $idProd ?>&deletar=excluir" 
                                                onclick="return confirm('Tem certeza que deseja excluir seu an??ncio?');">Excluir</a> 
                                            </form>
                                        </td>
                                    <?php } 
                                } ?>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            <?php } ?>
        </div>
    </div>
    <br>
    <?php include "../footer.php"; ?>

</body>