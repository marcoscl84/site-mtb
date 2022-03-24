<?php session_start(); 
$url_base = "http://localhost/apresenta-bikes";
?>

<body>
    <div class="cabecalho">
        <?php include "../header.php"; ?>
    </div>

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
</body>