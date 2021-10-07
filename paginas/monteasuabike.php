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
    <?php include "../header.php"; ?>
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
                                <!--
                                <img src="<?php //echo $url_base ?>/imagens/scott-sports-vector-logo.jpg" alt="Scott" style="width:100px"/>
                                <img src="<?php //echo $url_base ?>/imagens/Specialized-logo-85B2A87B61-seeklogo.jpg" alt="SPZ" style="width:100px"/>
                                <img src="<?php //echo $url_base ?>/imagens/cannondale-4c046f61-d1f7-4446-b2a6-d7fef877b85e.jpg" alt="Cannondale" style="width:100px"/>
                                <img src="<?php //echo $url_base ?>/imagens/TREK-logo-A449338C0F-seeklogo.jpg" alt="Trek" style="width:100px"/>
                                <br>
                                -->
                    <option>MARCA:</option>
                    <option value="1">Scott</option>
                    <option value="2">Specialized</option>
                    <option value="3">Cannondale</option>
                    <option value="4">Trek</option>
                </select>

                <select class="seleciona-tipo" name="rdTipo"  id="tip" style="display:none;" onchange="opcaoOculta()">
                                <!--
                                <img src="<?php //echo $url_base ?>/imagens/posters-bicycle-types-vector-illustration.jpg" alt="FullSuspension" style="width:100px"/>
                                <img src="<?php //echo $url_base ?>/imagens/posters-bicycle-types-vector-illustration ht.jpg" alt="HardTail" style="width:100px"/>
                                <br>
                                -->
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
                <script>
                    function modal("janModal", "imgModal", "btModal"){
                        var modalJan=document.getElementById("janModal");
                        var modalImg=document.getElementById("imgModal");
                        var modalBt=document.getElementById("btModal");

                        modalJan.style.display="block";
                        modalImg.src=<?php echo $bke ?>;
                        modalBt.onclick=funtion(){
                            modalJan.style.display="none";
                        }
                    }
                </script>
                <div id="janModal" onload='modal("janModal", "imgModal", "btModal")'>         
                    <span id="btModal">X</span>
                    <img id="imgModal" src="<?php echo $bke ?>" style="max-height:500px;"/>
                </div>
                <?php
            }
        ?>
        
        <br>
        <?php include "../footer.php"; ?>
    </div>
</body>