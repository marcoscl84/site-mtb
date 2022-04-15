<?php $url_base = "http://localhost/apresenta-bikes"; ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet" href="main.css"/>
 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
 
    <style>
        .headerAll{
            position: fixed;
            width: 100%;
            margin:0px;
            z-index: 999;
        }
        .headerAll .botoes{
            font-size: 20px;
            font-family: Copperplate Gothic, Helvetica, sans-serif;
        }
        .headerAll a:hover{
            color: black;
            text-decoration: none;  
        }
        .headerAll .botoes a:link, a:visited {
            /* background-color: #00D9A3; */
            color: white;
            padding: 10px 15px;
            text-align: center;
            text-decoration: none;
            transition: all 0.5s;
        }
 
        @media (max-width: 913px){
            .headerAll{
                position: absolute;
            }      
        }
 
        @media (min-width: 1130px){
            .headerAll{
                height: 112px;
                transition: all 0.2s;
                position: fixed;
            }
            .fx .headerAll{
                height: 65px;
            }        
        }
 
    </style>
 
</head>
 
<header class="d-flex flex-wrap">
    <div class="row flex-wrap headerAll menu" style="background-color: #00D9A3; border-bottom: white solid 5px; width:100%;">
       
        <!-- LOGOTIPO -->
        <div class="col-lg-2 col-12">
            <div class="d-flex justify-content-center">
                <a href="<?php echo $url_base ?>/index.php">
                    <img src="<?php echo $url_base ?>/imagens/logo4984199.png" class="imgLogo" width="200" alt="mtblogo">
                </a>
            </div>
        </div>
 
        <!-- LINKS -->
        <div class="col-lg-10 col-12 flex-wrap">
            <nav class="botoes navbar justify-content-center justify-content-lg-end mt-3" id="nav">
                <a href="<?php echo $url_base ?>/paginas/oqueeomtb.php">O que é o MTB</a>
                <a href="<?php echo $url_base ?>/paginas/fotos.php">Fotos</a>
                <a href="<?php echo $url_base ?>/paginas/videos.php">Vídeos</a>
                <a href="<?php echo $url_base ?>/paginas/monteasuabike.php">Monte a sua bike</a>
                <a href="<?php echo $url_base ?>/paginas/classificados.php">Classificados</a>
               
                <!-- LINK LOGIN -->
                <?php if(!isset($_SESSION['username'])){ ?>
                    <a href="<?php echo $url_base ?>/paginas/login.php">Login</a>
                <?php } ?>
 
                <!-- LINK LOGOUT -->
                <?php if(isset($_SESSION['username'])){ ?>
                    <a href="<?php echo $url_base ?>/index.php?logout=endsession">Logout</a>              
                <?php } ?>      
            </nav>
        </div>
    </div>
</header>
 
        <script>
       
            (function(){
                var $menu = document.querySelector('.menu');
                var img = document.querySelector('.imgLogo');
                var nav = document.querySelector('#nav');
               
                window.addEventListener('scroll', setupNav);
               
                function setupNav(){
                    var posYScroll = getYscroll()
                   
                    if(posYScroll > 200 && !hasClassFx()){
                        console.log('adiciona');
                        document.body.classList.add('fx');
                       
                    }
                   
                    if(posYScroll <= 200 && hasClassFx()) {
                        console.log('remove');
                        document.body.classList.remove('fx');
                       
                    }
 
                    if(posYScroll > 200){
                        img.style.cssText = 'height: 60px;' + 'width: auto;' + 'transition: all 0.2s;';
                        nav.style.cssText = 'transition: all 0.2s;';
                        document.getElementById('nav').className='botoes navbar justify-content-center justify-content-lg-end';
                    } else {    
                        img.style.cssText = 'height: 107px;' + 'width: auto;' + 'transition: all 0.2s;';
                        nav.style.cssText = 'transition: all 0.2s;';
                        document.getElementById('nav').className='botoes navbar justify-content-center justify-content-lg-end mt-3';
                    }
                }
               
                function getYscroll(){
                    return window.pageYOffset;
                }
               
                function hasClassFx(){
                    return !!document.querySelector('.fx')
                }
            })()
       
        </script>