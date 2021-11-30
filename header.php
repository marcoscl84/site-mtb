<?php $url_base = "http://localhost/apresenta-bikes"; ?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
 
<header style="margin:0px; z-index: 999">
    <div class="row flex-wrap" style="background-color: #00D9A3;">
       
        <div class="col-md-2">
            <a class="logo" href="<?php echo $url_base ?>/index.php">
                <img src="<?php echo $url_base ?>/imagens/logo4984199.png" width="200" alt="mtblogo">
            </a>
        </div>
 
        <div class="col-md-10">
            <nav class="botoes navbar justify-content-end mt-3">
                <a href="<?php echo $url_base ?>/paginas/oqueeomtb.php">O que é o MTB</a>
                <a href="<?php echo $url_base ?>/paginas/fotos.php">Fotos</a>
                <a href="<?php echo $url_base ?>/paginas/videos.php">Vídeos</a>
                <a href="<?php echo $url_base ?>/paginas/monteasuabike.php">Monte a sua bike</a>
                <a href="<?php echo $url_base ?>/paginas/classificados.php">Classificados</a>
                <a href="<?php echo $url_base ?>/paginas/login.php">Login</a>
               
                <!-- LOGOUT
                <div class="logout">
                    <button type="submit">LOGOUT</buttom>
                    <input type="hidden" name="enviaLogout" value="deslogado">
                </div>
                -->
            </nav>
        </div>
    </div>
</header>