<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="main.css"/>

    <script>
        var slideIndex = 1;
        showSlides(slideIndex);
 
        // Next/previous controls
        function plusSlides(n) {
        showSlides(slideIndex += n);
        }
 
        // Thumbnail image controls
        function currentSlide(n) {
        showSlides(slideIndex = n);
        }
 
        function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += "active";
        }
 
        ///////

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

    <title>Mundo das bikes</title>
</head>
<body>
    <?php include "header.php"; ?>
    <hr>
    
    <!-- Slideshow container -->
    <div class="slideshow-container">

        <!-- Full-width images with number and caption text -->
        <div class="mySlides fade">
            <img src="imagens/DSCN0747-2.jpg" style="width:100%">
        </div>

        <div class="mySlides fade">
            <img src="imagens/20210408_174856_HDR-2.jpg" style="width:100%">
        </div>

        <div class="mySlides fade">
            <img src="imagens/20200808_162240-2.jpg" style="width:100%">
        </div>

        <!-- Next and previous buttons -->
        <a class="prev" onclick="plusSlides(-1)">❮</a>
        <a class="next" onclick="plusSlides(1)">❯</a>
    </div>
    <br>

    <!-- The dots/circles -->
    <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
    </div>

    <hr>
    <?php include "footer.php"; ?>
</body>
</html>