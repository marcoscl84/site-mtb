<?php

if(isset($_REQUEST['envia'])){
    $rdMod = $_REQUEST['rdModalidade'];
    $rdMarca = $_REQUEST['rdMarca'];
    $rdTipo = $_REQUEST['rdTipo'];

    //ajustar array com as variáveis a serem comparadas no laço for
    $modalidade = array("xco", "enduro", "downhill", "emtb");
    $marca = array("scott", "specialized", "cannondale", "trek");
    $tipo = array("FS", "HT");

    $modSize = count($modalidade);
    $marSize = count($marca);
    $tipSize = count($tipo);

    

    for($i=0; $i<=$modSize; $i++){
        for($j=0; $j<=$marSize; $j++){
            for($k=0; $k<=$tipSize; $k++){
                if($modalidade[i] == $rdMod && $marca[j] == $rdMarca && $tipo[k] == $rdTipo) {
                    // criar busca no banco de imagens para vincular ao resultado 
                }
            }
        }
    }
    

} 

?>

<?php $url_base = "http://localhost/apresenta-bikes"; ?>

<head>
    <link rel="stylesheet" href="../main.css"/>
</head>
<body>
    <?php include "../header.php"; ?>
    <div class="container-wout-header">
        <br>
        <form method="$_REQUEST">
            <div class="seleciona-modalidade">
                <input name="rdModalidade" id="xco" type="radio">XCO</input>
                <input name="rdModalidade" id="enduro" type="radio">Enduro</input>
                <input name="rdModalidade" id="downhill" type="radio">Downhill</input>
                <input name="rdModalidade" id="emtb" type="radio">E-MTB</input>
            </div>
            <br>
            <div class="seleciona-marca">
                <img src="<?php echo $url_base ?>/imagens/scott-sports-vector-logo.jpg" alt="Scott" style="width:100px"/>
                <img src="<?php echo $url_base ?>/imagens/Specialized-logo-85B2A87B61-seeklogo.jpg" alt="SPZ" style="width:100px"/>
                <img src="<?php echo $url_base ?>/imagens/cannondale-4c046f61-d1f7-4446-b2a6-d7fef877b85e.jpg" alt="Cannondale" style="width:100px"/>
                <img src="<?php echo $url_base ?>/imagens/TREK-logo-A449338C0F-seeklogo.jpg" alt="Trek" style="width:100px"/>
                <br>
                <input name="rdMarca" id="scott" type="radio">Scott</input>
                <input name="rdMarca" id="specialized" type="radio">Specialized</input>
                <input name="rdMarca" id="cannondale" type="radio">Cannodale</input>
                <input name="rdMarca" id="trek" type="radio">Trek</input>
            </div>
            <br>
            <div class="seleciona-tipo">
                <img src="<?php echo $url_base ?>/imagens/posters-bicycle-types-vector-illustration.jpg" alt="FullSuspension" style="width:100px"/>
                <img src="<?php echo $url_base ?>/imagens/posters-bicycle-types-vector-illustration ht.jpg" alt="HardTail" style="width:100px"/>
                <br>
                <input name="rdTipo" id="FS" type="radio">Full Suspension</input>
                <input name="rdTipo" id="HT" type="radio">Hard tail</input>
            </div>

            <input type="submit" id="envia" value="Enviar"/>
            
        </form>
        <!-- colocar aqui a lógica em php pra receber a resposta -->
        
        <br>
        <?php include "../footer.php"; ?>
    </div>
</body>