<?php
 
if(isset($_REQUEST['envia'])){
   
    $rdMod = $_REQUEST['rdModalidade'];
    $rdMarca = $_REQUEST['rdMarca'];
    $rdTipo = $_REQUEST['rdTipo'];
 
    if($rdTipo == ''){
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
 
<?php session_start(); 
$url_base = "http://localhost/apresenta-bikes";
?>


    <script>
        function opcaoOculta(){
            if(document.getElementById("mod").value == '1'){
                document.getElementById("mod").style.display = 'flex';
                document.getElementById("tip").style.display = 'flex';  
                document.getElementById("tip").required = true;
            }
            if(document.getElementById("mod").value != '1'){
                document.getElementById("mod").style.display = 'flex';
                document.getElementById("tip").style.display = 'none';    
            }
        }
    </script>

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

        select {
            position: relative;
            font-family: Copperplate Gothic, Helvetica, sans-serif;
            font-size: 15px;
            width: 200px;
            height: 40px;
            text-align: center;
            background-color: 00D9A3;
            color: white;
            top: 0px;
            bottom: 10px;
            left: 0;
            right: 0;
            z-index: 99;
            cursor: pointer;
            border: solid black 1px;
            margin-bottom: 20px;
        
        }
        
        .seleciona-itens {
            width: auto;
            background: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center
        }
        
        .seleciona-modalidade .seleciona-marca .seleciona-tipo {
            height: auto;
        }
        
        select:hover {
            box-shadow: 4px 4px 8px black;
            transition-duration: 1s;
        }
        
        .submit-botao {
            text-align: center;
        }
    </style>

<body>
    <?php include "../header.php"; ?>
    <br><br>

    <div class="corpoPag">
        <form method="post" action="monteasuabike.php">
            <div class="seleciona-itens" style="margin-bottom:15px; margin-top: 25px">
                <select required class="seleciona-modalidade" name="rdModalidade" id="mod" onchange="opcaoOculta()" style="margin-bottom:15px">
                    <option value="">MODALIDADE:</option>
                    <option value="1">XCO</option>
                    <option value="2">Enduro</option>
                    <option value="3">Downhill</option>
                    <option value="4">E-MTB</option>
                </select>

                <select required class="seleciona-marca" name="rdMarca" id="marc" style="margin-bottom:15px">
                            
                    <option value="">MARCA:</option>
                    <option value="1">Scott</option>
                    <option value="2">Specialized</option>
                    <option value="3">Cannondale</option>
                    <option value="4">Trek</option>
                </select>

                <select class="seleciona-tipo" name="rdTipo"  id="tip" style="display:none;" onchange="opcaoOculta()" style="margin-bottom:15px">
                    <option value="">TIPO:</option>
                    <option value="1">Full Suspension</option>
                    <option value="2">Hard Tail</option>                    
                </select>                      
            </div>    
            
            <div class="submit-botao">
                <input type="submit" name="envia" id="envia" value="Enviar"/>
            </div>  

        </form>
        
        <!-- Exibe dados da busca no banco -->
        <?php if(isset($bke)){ ?>
                
            <div class="divImgBke" style="border:white solid 15px;">
                <img class="imgBke" src="<?php echo $bke; ?>" style="max-width:800px;
                display:block; margin-left: auto; margin-right: auto;"/>
            </div>        
        <?php } ?>
        <br>
        <?php include "../footer.php"; ?>
    </div>
</body>