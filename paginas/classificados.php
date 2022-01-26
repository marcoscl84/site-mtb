<?php session_start(); ?>

<head>
    <link rel="stylesheet" href="../main.css"/>

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<!--
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
-->
</head> 
 
<body>
    <!-- CABEÇALHO -->
    <div class="cabecalho">
        <?php include "../header.php"; ?>
    </div>
 
<?php include "../db-conexao/dbConnect.php"; ?>   

<?php            
            /* SELECT TABELA PRODUTOS */
            echo "<div class='container'>";

                if(isset($_SESSION['username'])){ ?>
                    <div class="d-flex justify-content-center" style="margin-top: 15px">
                        <a href="<?php echo $url_base ?>/paginas/classificados-usuario.php" class="btn btn-info">Meus anúncios</a>
                    </div>
                <?php } ?>

<?php
                $classificBusca = mysqli_query($conexao, "SELECT * FROM produto ORDER BY tipo");
                echo "<h1 style='text-align:center; font-family: Copperplate Gothic, Helvetica, sans-serif; margin:20px 0px 20px'>CLASSIFICADOS</h1>";
                echo "<table class='table'>";
                    echo '<thead class="table-dark">';

                            echo "<th class='col-4'>PRODUTO</th>";
                            echo "<th class='col-4'>MARCA</th>";
                            echo "<th class='col-4'>DESCRIÇÃO</th>";

                    echo "</thead>";

                    while($linha = mysqli_fetch_assoc($classificBusca)) {
                        echo "<tr>";
                            $idProd = (int)$linha['id'];
                            $id_usuario = (int)$linha['id_usuario'];
                            $tipo = $linha['tipo'];
                            $marca = $linha['marca'];
                            $descricao = $linha['descricao'];

                            echo "<td class='col-4'>" . $tipo . "</td>";
                            echo "<td class='col-4'>" . $marca . "</td>";
                            echo "<td class='col-4'>" . $descricao . "</td>";
                        echo "</tr>";
                    } ?>
                </table>
            </div>
        </div>
    </div>
    <br>
    <!-- RODAPÉ -->
    <?php include "../footer.php"; ?>

</body>