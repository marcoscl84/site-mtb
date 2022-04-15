<?php session_start(); 
$url_base = "http://localhost/apresenta-bikes";
?>

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
    
    .thumbnail{
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: center;
        margin-top: 50px;
    }
 
    .fotos img {
        max-width: 100%;
        display: flexbox;
        width: 350px;
        margin: 20px;
    }
 
    .fotos img {
    -webkit-transition: all 1s ease;
    /* Safari and Chrome */
    -moz-transition: all 1s ease;
    /* Firefox */
    -o-transition: all 1s ease;
    /* IE 9 */
    -ms-transition: all 1s ease;
    /* Opera */
    transition: all 1s ease;
}
 
    .fotos:hover img {
        -webkit-transform: scale(1.5);
        /* Safari and Chrome */
        -moz-transform: scale(1.5);
        /* Firefox */
        -ms-transform: scale(1.5);
        /* IE 9 */
        -o-transform: scale(1.5);
        /* Opera */
        transform: scale(1.5);
        border: solid white 10px;
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
    <div class="cabecalho">
        <?php include "../header.php"; ?>
    </div>
    <br><br>
    <div class="corpoPag">
        <div class="thumbnail">
            <div class="fotos">
                <img src="../imagens/henrique-avancini-termina-mountain-bike-em-13-lugar-566188-article.jpg" alt="imagem" />
            </div>
            <div class="fotos">
                <img src="../imagens/dh-vallnord-world-cup-qualifying-loic-bruni.jpg" alt="imagem" />
            </div>
            <div class="fotos">
                <img src="../imagens/s1600_EWS_Les_Orres_2019EWS_Les_Orres_2019_W0A5574_557024.jpg" alt="imagem" />
            </div>
            <div class="fotos">
                <img src="../imagens/Enduro-World-Series-2019-in-Zermatt_front_magnific.jpg" alt="imagem" />
            </div>
            <div class="fotos">
                <img src="../imagens/are-you-ready-to-rampage.jpg" alt="imagem" />
            </div>
            <div class="fotos">
                <img src="../imagens/11025002-w1920.jpg" alt="imagem" />
            </div>
            <div class="fotos">
                <img src="../imagens/brasil_olimpiadas_1024x576_26072021053909.jpg" alt="imagem" />
            </div>
            <div class="fotos">
                <img src="../imagens/20190622_160001 (1).jpg" alt="imagem" />
            </div>
            <div class="fotos">
                <img src="../imagens/s1600_Untitled_1_404901.jpg" alt="imagem" />
            </div>
            <div class="fotos">
                <img src="../imagens/64a8a20be4.jpg" alt="imagem" />
            </div>
            <br>  
        </div>
        <?php include "../footer.php"; ?>
    </div>
</body>