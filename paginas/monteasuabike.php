<?php

if(isset($_REQUEST['envia'])){
    
    $rdMod = $_REQUEST['rdModalidade'];
    $rdMarca = $_REQUEST['rdMarca'];
    $rdTipo = $_REQUEST['rdTipo'];
 
    require("dbConnect.php");
 
    $bikeSelectNoBanco = mysqli_query($conexao, "SELECT * FROM 'bike' WHERE 
    id_modalidade = $rdMod AND id_marca = $rdMarca AND id_tipo = $rdTipo");
} 
?>

<head>
    <link rel="stylesheet" href="../main.css"/>
</head>
<body>
    <?php include "../header.php"; ?>
    <div class="container-wout-header">
        <br>
        <form method="$_REQUEST">
            <div class="seleciona-modalidade">
                <input name="rdModalidade" value="1" type="radio">XCO</input>
                <input name="rdModalidade" value="2" type="radio">Enduro</input>
                <input name="rdModalidade" value="3" type="radio">Downhill</input>
                <input name="rdModalidade" value="4" type="radio">E-MTB</input>
            </div>
            <br>
            <div class="seleciona-marca">
                <img src="<?php echo $url_base ?>/imagens/scott-sports-vector-logo.jpg" alt="Scott" style="width:100px"/>
                <img src="<?php echo $url_base ?>/imagens/Specialized-logo-85B2A87B61-seeklogo.jpg" alt="SPZ" style="width:100px"/>
                <img src="<?php echo $url_base ?>/imagens/cannondale-4c046f61-d1f7-4446-b2a6-d7fef877b85e.jpg" alt="Cannondale" style="width:100px"/>
                <img src="<?php echo $url_base ?>/imagens/TREK-logo-A449338C0F-seeklogo.jpg" alt="Trek" style="width:100px"/>
                <br>
                <input name="rdMarca" value="1" type="radio">Scott</input>
                <input name="rdMarca" value="2" type="radio">Specialized</input>
                <input name="rdMarca" value="3" type="radio">Cannodale</input>
                <input name="rdMarca" value="4" type="radio">Trek</input>
            </div>
            <br>
            <div class="seleciona-tipo">
                <img src="<?php echo $url_base ?>/imagens/posters-bicycle-types-vector-illustration.jpg" alt="FullSuspension" style="width:100px"/>
                <img src="<?php echo $url_base ?>/imagens/posters-bicycle-types-vector-illustration ht.jpg" alt="HardTail" style="width:100px"/>
                <br>
                <input name="rdTipo" value="1" type="radio">Full Suspension</input>
                <input name="rdTipo" value="2" type="radio">Hard tail</input>
            </div>

            <input type="submit" id="envia" value="Enviar"/>            
        </form>
        
        <!-- Exibe dados da busca no banco -->
        <?php 
            if(isset($bikeSelectNoBanco)){
                echo $bikeSelectNoBanco;
            }
        ?>

        <br>
        <?php include "../footer.php"; ?>
    </div>
</body>