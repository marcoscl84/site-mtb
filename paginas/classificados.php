<?php session_start(); ?>
 
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

<body>
    <!-- CABEÇALHO -->
    <div class="cabecalho">
        <?php include "../header.php"; ?>
    </div>
    <br>
    <div class="corpoPag">
<?php include "../db-conexao/dbConnect.php"; ?>   

<?php            
            /* SELECT TABELA PRODUTOS */
            echo "<div class='container'>";

                if(isset($_SESSION['username'])){ ?>
                    <div class="d-flex justify-content-center" style="margin-top: 15px">
                        <a href="<?php echo $url_base ?>/paginas/classificados-usuario.php" class="btn btn-secondary">Meus anúncios</a>
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
    </div>
</body>