<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <script>
        
        var slideIndex = 1;
        showSlides(slideIndex); 
 
        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            
            // determina que ao estourar o array por um lado, irá para a outra ponta.
            if (n > slides.length) {slideIndex = 1} 
            if (n < 1) {slideIndex = slides.length} 
 
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }

            slides[slideIndex-1].style.display = "block";
            dots[slideIndex-1].className += "active";
        }
 
        // Automatic Slideshow
        
        var slideIndex = 0;
        showSlides();
 
        function showSlides() {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) {slideIndex = 1}
 
            slides[slideIndex-1].style.display = "block";
            setTimeout(showSlides, 5000); // Change image every 5 seconds
        }
        
    </script>
 
    <link rel="stylesheet" href="main.css"/>
 
    <title>Mundo das bikes</title>
</head>
<body class="bgimg-fixed" onload="showSlides(slideIndex = 0)">
    <?php include "header.php"; ?>
    
    <!-- Slideshow container -->
    <div class="slideshow-container" style="z-index: 992">
        <!-- Full-width images -->
        <div class="mySlides fade">
            <img src="imagens/DSCN0747-2.jpg" style="width:100%">
        </div>

        <div class="mySlides fade">
            <img src="imagens/20210408_174856_HDR-2.jpg" style="width:100%">
        </div>

        <div class="mySlides fade">
            <img src="imagens/20200808_162240-2.jpg" style="width:100%">
        </div>
    </div>

    <div class="container-wout-header-index">
 
        <div class="index-vid">
            <iframe width="100%" height="600px" 
            src="https://www.youtube.com/embed/X723bYcMtXI" title="YouTube video player" 
            frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
 
        <div class="spacetoshow-bgimage-fixed"></div>
        
        <div class="websites">
            websites <br>
            websites <br>
            websites <br>
            websites <br>
            <!--colocar ícones acessíveis aos sites com seus logos -->
        </div>
       
        <?php include "footer.php"; ?>
    </div>
    
</body>
</html>