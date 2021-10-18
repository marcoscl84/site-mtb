<?php

if(isset($_REQUEST['envia'])){
    
    $rdMod = $_REQUEST['rdModalidade'];
    $rdMarca = $_REQUEST['rdMarca'];
    $rdTipo = $_REQUEST['rdTipo'];

    if($rdTipo == 0){
        $rdTipo = 1;
    } 

    include "../db-conexao/dbConnect.php";
 
    $bikeSelectNoBanco = mysqli_query($conexao, "SELECT foto FROM bike WHERE 
    id_modalidade = $rdMod AND id_marca = $rdMarca AND id_tipo = $rdTipo");

    while($bikeShow = mysqli_fetch_assoc($bikeSelectNoBanco)){
        $bke = "http://localhost/apresenta-bikes/".$bikeShow['foto'];
    }
} 

?>

<head>
    <link rel="stylesheet" href="../main.css"/>
    <script>
        function opcaoOculta(){
            if(document.getElementById("mod").value == '1'){
                document.getElementById("mod").style.display = 'flex';
                document.getElementById("tip").style.display = 'flex';    
            }
            if(document.getElementById("mod").value != '1'){
                document.getElementById("mod").style.display = 'flex';
                document.getElementById("tip").style.display = 'none';    
            }
        }
    </script>
</head>
<body>
    <div class="cabecalho">
        <?php include "../header.php"; ?>
    </div>
    <div class="container-wout-header">
        <br>
       
        <form method="post" action="monteasuabike.php">
            <div class="seleciona-itens">
                <select class="seleciona-modalidade" name="rdModalidade" id="mod" onchange="opcaoOculta()">
                    <option>MODALIDADE:</option>
                    <option value="1">XCO</option>
                    <option value="2">Enduro</option>
                    <option value="3">Downhill</option>
                    <option value="4">E-MTB</option>
                </select>

                <select class="seleciona-marca" name="rdMarca" id="marc">
                            
                    <option>MARCA:</option>
                    <option value="1">Scott</option>
                    <option value="2">Specialized</option>
                    <option value="3">Cannondale</option>
                    <option value="4">Trek</option>
                </select>

                <select class="seleciona-tipo" name="rdTipo"  id="tip" style="display:none;" onchange="opcaoOculta()">
                                
                    <option value="0">TIPO:</option>
                    <option value="1">Full Suspension</option>
                    <option value="2">Hard Tail</option>                    
                </select>                       
            </div>    
            
            <div class="submit-botao">
                <input type="submit" name="envia" id="envia" value="Enviar"/>
            </div>   

        </form>
        
        <!-- Exibe dados da busca no banco -->
        <?php 
            if(isset($bke)){
                ?> 
                <div class="container-imgBke">
                    <div class="divImgBke" style="border:white solid 15px;"> 
                        <img class="imgBke" src="<?php echo $bke; ?>" style="max-width:800px; 
                        display:block; margin-left: auto; margin-right: auto;"/>
                    </div>
                </div>
                <?php
            } 
        ?>
        
        <br>
        <?php include "../footer.php"; ?>
    </div>
</body>