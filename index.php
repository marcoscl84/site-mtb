<?php
session_start();
 
if(isset($_REQUEST['logout'])){
    session_unset();
    session_destroy();
}
 
// LOGIN
if(isset($_REQUEST['loginButton'])){
    include "db-conexao/dbConnect.php";
   
    // RECEBE USER E SENHA INSERIDOS
    $_SESSION['username'] = $_REQUEST['username'];
    $usernameLogin = $_SESSION['username'];
 
    $confereUser = "";
    $verificaUsuario = mysqli_query($conexao, "SELECT * FROM usuario WHERE username='".$usernameLogin."'");
    while($line = $verificaUsuario->fetch_assoc()){
        $confereUser = $line['username'];
    }
    if($confereUser != ""){
        $_SESSION['senha'] = $_REQUEST['senha'];
        $senhaLogin = md5($_SESSION['senha']);
   
        // BUSCA SENHA REFERENTE AO USUÁRIO INSERIDO
        $querySenha = "SELECT senha FROM usuario WHERE username='".$usernameLogin."'";
        $senhaBanco = mysqli_query($conexao, $querySenha);
        while($row = $senhaBanco->fetch_assoc()){
            $pswrd = $row['senha'];
        }
   
        // COMPARA SENHAS E CRIA VARIÁVEL DE SESSÃO COM ID DO USUÁRIO
        if($senhaLogin == $pswrd){
            if($selectIdUser = mysqli_query($conexao, "SELECT id FROM usuario WHERE username='".$usernameLogin."'")){
                while($row = $selectIdUser->fetch_assoc()){
                    $idUser = $row['id'];
                    $_SESSION['idUser'] = $idUser;
                }
            }
        } else {
            session_unset();
            session_destroy();
            ?> <script> alert("Oooops! Usuário ou senha incorreto..."); </script> <?php
        }
    } else {
        session_unset();
        session_destroy();
        ?> <script> alert("Oooops! Usuário não existe..."); </script> <?php
    }
}
 
?>
 
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <style type="text/css">
        .corpoPag{
            margin-top: 290px;
        }
 
        @media (min-width: 538px){
            .corpoPag{
                margin-top: 240px;
            }        
        }
 
        @media (min-width: 913px){
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
    </style>
    <script>
 
        $('.carousel').carousel({
            interval: 2000
        })
       
    </script>
 
    <title>MTB World</title>
</head>
 
<body class="bgimg-fixed d-flex flex-wrap">    
   
    <!-- CABEÇALHO -->
    <?php include "header.php"; ?>
    
    <div class="corpoPag">
        <!-- SLIDES -->
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="border-bottom:white solid 5px;">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img class="d-block w-100" src="imagens/DSCN0747-2.jpg" alt="Primeiro Slide">
                </div>
                <div class="carousel-item">
                <img class="d-block w-100" src="imagens/20210408_174856_HDR-2.jpg" alt="Segundo Slide">
                </div>
                <div class="carousel-item">
                <img class="d-block w-100" src="imagens/20200808_162240-2.jpg" alt="Terceiro Slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Anterior</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Próximo</span>
            </a>
        </div>
    
        <div class="container-wout-slides-header-index">
    
            <!-- VIDEO -->
            <div class="index-vid">
                <iframe width="100%" height="450px"
                src="https://www.youtube.com/embed/X723bYcMtXI" title="YouTube video player"
                frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media;
                gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
    
            <!-- ESPAÇO VAZIO COM IMAGEM DE FUNDO -->
            <div class="spacetoshow-bgimage-fixed"></div>
    
            <!-- LINKS PARCEIROS -->
            <div class="websites">
                <a class="links" href="https://www.roadtripmtb.com.br" target="_blank">
                    <img src="<?php echo $url_base ?>/imagens/IMG-20210719-WA0006.jpg" width="100" alt="roadtripmtb">
                </a>
    
                <a class="links" href="https://www.vitalmtb.com" target="_blank">
                    <img src="<?php echo $url_base ?>/imagens/s900_pof.jpg" width="100" alt="vitalmtb">
                </a>
    
                <a class="links" href="https://www.pinkbike.com" target="_blank">
                    <img src="<?php echo $url_base ?>/imagens/pink-bike-logo.png" width="100" alt="pinkbike">
                </a>        
            </div>
    
            <!-- RODAPÉ -->
            <?php include "footer.php"; ?>
        
        </div>
    </div>
</body>
</html>