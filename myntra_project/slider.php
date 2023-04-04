<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/myntra.css">
    <link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>firstpage</title>

  </head>
  <body>
 
 <!-- slider html code  -->
 <div class="slideshow-container">

<!-- images are added for the slider  -->
<div class="mySlides fade">
  <img class="slideimg" src="images/banner-1.webp">
</div>

<div class="mySlides fade">
  <img class="slideimg" src="images/banner-2.webp">
</div>

<div class="mySlides fade">
  <img class="slideimg" src="images/banner-3.webp">
</div>

<div class="mySlides fade">
  <img class="slideimg" src="images/banner-4.webp">
</div>

<div class="mySlides fade">
  <img class="slideimg" src="images/banner-5.webp">
</div>
</div>

<br>

<!-- nevigation dots  -->
<div style="text-align:center">
<span class="dot"></span>
<span class="dot"></span>
<span class="dot"></span>
<span class="dot"></span>
<span class="dot"></span>

</div>
<script>
let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>
</body>
</html>
