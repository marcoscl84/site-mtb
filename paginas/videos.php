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

    footer .footer{
        text-align: center;
        height: fit-content;
        font-family: Arial, Helvetica, sans-serif;
        background-color: white;
        width: 100%;  
    }

    .videos-container > .container-iframe-youtube {
        position: relative;
        display: block;
        margin-left: auto;
        margin-right: auto;
        top: 20px;
        border: 3px;
        border-color: rgb(148, 113, 113);
        border-style:solid;
        border-bottom-right-radius: 15px;
        border-bottom-left-radius: 15px;
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
    }
</style>

<body>
    <div class="cabecalho">
        <?php include "../header.php"; ?>
    </div>
    <br><br>

    <div class="corpoPag">

        <div class="videos-container">
                
            <iframe class="container-iframe-youtube" width="70%" height="70%" 
            src="https://www.youtube.com/embed/V7bHM9Q9leo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <br>
            <br>
            <iframe class="container-iframe-youtube" width="70%" height="70%" 
            src="https://www.youtube.com/embed/hXLi1ncc-Do" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <br>
            <br>
            <iframe class="container-iframe-youtube" width="70%" height="70%" 
            src="https://www.youtube.com/embed/V7bHM9Q9leo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <br>
            <br>
            
            <br>
            <?php include "../footer.php"; ?>
        </div>    
    </div>
</body>