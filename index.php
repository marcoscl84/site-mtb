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
    $_SESSION['senha'] = $_REQUEST['senha'];
    $usernameLogin = $_SESSION['username'];
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
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <link rel="stylesheet" href="../main.css"/>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <script>

        $('.carousel').carousel({
            interval: 2000
        })
        
    </script>
 
    <link rel="stylesheet" href="main.css"/>
 
    <title>MTB World</title>
</head>

<body class="bgimg-fixed d-flex flex-wrap">    

    <div class="cabecalho" style="width:120%;">
        <?php include "header.php"; ?>
    </div>
        
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

        <div class="index-vid">
            <iframe width="100%" height="450px" 
            src="https://www.youtube.com/embed/X723bYcMtXI" title="YouTube video player" 
            frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; 
            gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>

        <div class="spacetoshow-bgimage-fixed"></div>
    
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
    
        <?php include "footer.php"; ?>
    </div>
</body>
</html>