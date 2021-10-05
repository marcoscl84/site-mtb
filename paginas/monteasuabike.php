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
    <?php include "../header.php"; ?>
    <div class="container-wout-header">
        <br>
        
        <form method="$_REQUEST">
            <div class="seleciona-itens">
                <select class="seleciona-modalidade" id="mod" onchange="opcaoOculta()">
                    <option>MODALIDADE:</option>
                    <option name="rdModalidade" value="1">XCO</option>
                    <option name="rdModalidade" value="2">Enduro</option>
                    <option name="rdModalidade" value="3">Downhill</option>
                    <option name="rdModalidade" value="4">E-MTB</option>
                </select>

                <select class="seleciona-marca" id="marc">
                                <!--
                                <img src="<?php //echo $url_base ?>/imagens/scott-sports-vector-logo.jpg" alt="Scott" style="width:100px"/>
                                <img src="<?php //echo $url_base ?>/imagens/Specialized-logo-85B2A87B61-seeklogo.jpg" alt="SPZ" style="width:100px"/>
                                <img src="<?php //echo $url_base ?>/imagens/cannondale-4c046f61-d1f7-4446-b2a6-d7fef877b85e.jpg" alt="Cannondale" style="width:100px"/>
                                <img src="<?php //echo $url_base ?>/imagens/TREK-logo-A449338C0F-seeklogo.jpg" alt="Trek" style="width:100px"/>
                                <br>
                                -->
                    <option>MARCA:</option>
                    <option name="rdMarca" value="1">Scott</option>
                    <option name="rdMarca" value="2">Specialized</option>
                    <option name="rdMarca" value="3">Cannondale</option>
                    <option name="rdMarca" value="4">Trek</option>
                </select>

                <select class="seleciona-tipo" id="tip" style="display:none;" onchange="opcaoOculta()">
                                <!--
                                <img src="<?php //echo $url_base ?>/imagens/posters-bicycle-types-vector-illustration.jpg" alt="FullSuspension" style="width:100px"/>
                                <img src="<?php //echo $url_base ?>/imagens/posters-bicycle-types-vector-illustration ht.jpg" alt="HardTail" style="width:100px"/>
                                <br>
                                -->
                    <option>TIPO:</option>
                    <option name="rdTipo" value="1">Full Suspension</option>
                    <option name="rdTipo" value="2">Hard Tail</option>                    
                </select>                       
            </div>    
            
            <div class="submit-botao">
                <input type="submit" id="envia" value="Enviar"/>
            </div>   

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