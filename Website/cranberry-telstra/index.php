<!DOCTYPE html>
<html>
<title>Cranberry</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
<link rel="stylesheet" href="css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5 {font-family: "Poppins", sans-serif}
body {font-size: 16px;}
img {margin-bottom: -8px;}
.mySlides {display: none;}
</style>
<body class="w3-content w3-black" style="max-width:1500px;">


<!-- Header with Slideshow -->
<header class="w3-display-container w3-center">
  <div style=width:inherit; class="mySlides w3-animate-opacity">
    <!--<PageMap>
    <DataObject type="thumbnail">
      <Attribute name="src" value="ThickTree.jpg"/>
      <Attribute name="width" value="100"/>
      <Attribute name="height" value="130"/>
    </DataObject>
    </PageMap>-->
    <img class="w3-image" src="ThickTree.jpg" alt="Image 1" width=100%s height="1000">
    <div class="w3-display-middle w3-padding w3-hide-small" style="width:35%">
      <div class="w3-black w3-opacity w3-hover-opacity-off w3-padding-large w3-round-large">
        <h1 class="w3-xlarge w3-text-white"><b>Predator</b></h1>
        <hr class="w3-opacity">
        <p>One Step Process</p>
      </div>
    </div>
  </div>
  <div class="mySlides w3-animate-opacity">
    <img class="w3-image" src="drono.jpg" alt="Image 2" width=100% height="1000">
    <div class="w3-display-middle w3-padding w3-hide-small" style="width:35%">
      <div class="w3-black w3-opacity w3-hover-opacity-off w3-padding-large w3-round-large">
        <h1 class="w3-xlarge">Smart Design</h1>
        <hr class="w3-opacity">
        <p>Customize photos as you go</p>
        </div>
    </div>
  </div>
   <div class="mySlides w3-animate-opacity">
    <img class="w3-image" src="babypig.jpg" alt="Image 3" width=100% height="1000">
    <div class="w3-display-middle w3-padding w3-hide-small" style="width:35%">
      <div class="w3-black w3-opacity w3-hover-opacity-off w3-padding-large w3-round-large">
        <h1 class="w3-xlarge">Smart Design</h1>
        <hr class="w3-opacity">
        <p>Customize photos as you go</p>
        </div>
    </div>
  </div>
  <a class="w3-button w3-black w3-display-right w3-margin-right w3-round w3-hide-small w3-hover-light-grey" onclick="plusDivs(1)">Take Tour <i class="fa fa-angle-right"></i></a>
  <a class="w3-button w3-block w3-black w3-hide-large w3-hide-medium" onclick="plusDivs(1)">Take Tour <i class="fa fa-angle-right"></i></a>
</header>
<!-- End Defaults-->






<!-- 1st Section -- The editable Section------------------------------------------------------------------ -->
<div class="w3-padding-64 w3-white">
  <div class="w3-row-padding">
    <div class="w3-col.s12 l8 m6">
      <?php $key = "AIzaSyAHOq3rbK1N-LM0-s0Q7p1SM0t7qjBImzs";?>
      <div style=width:inherit;>
        <iframe
          width="100%"
          height="450"
          frameborder="0" style="border:0"
          src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAHOq3rbK1N-LM0-s0Q7p1SM0t7qjBImzs
            &q=Melbourne+Victoria" allowfullscreen>
        </iframe>
      </div>  
    </div>
<!-- The End of Section -->

<!-- 2nd Section -- The editable Section------------------------------------------------------------------ -->
<div class="w3-padding-64 w3-light-grey">
  <div class="w3-row-padding">
    <div class="w3-col 14 m8">

      <h1 class="w3-jumbo"><b>Wild Pigs</b></h1> <!-- Place the header here-->
      <h1 class="w3-xxxlarge w3-text-green"><b>One the most adaptive pests</b></h1> <!-- Place the sub-header here-->

      <!-- Content in here-->
      <p><span class="w3-xlarge">Use it like a pro.</span> Best way to enforce democracy</p>
    </div>
        <!-- Content end here-->


    <!-- Place the image here twice-->
    <div class="w3-col l4 m8">
      <img src="wild-pigs.jpg" class="w3-image w3-right w3-hide-small" width="795" height="425"><!--width="335" height="471" -->
      <div class="w3-center w3-hide-large w3-hide-medium">
        <img src="wild-pigs.jpg" class="w3-image w3-margin-top" width="335" height="471">
      </div>
    </div>
  </div>
</div>
<!-- The End of Section -->

<!-- 3rd Section -- The editable Section------------------------------------------------------------------ -->
<div class="w3-padding-64 w3-white">
  <div class="w3-row-padding">
    <div class="w3-col.s6 14 m8">

      <h1 class="w3-jumbo"><b>Wild Pigs of Fukushima</b></h1> <!-- Place the header here-->
      <h1 class="w3-xxxlarge w3-text-green"><b>Surburban Pests</b></h1> <!-- Place the sub-header here-->

      <!-- Content in here-->
      <div style=width:inherit; class="w3-center vid-container">
      <iframe width=100% height=100% src="https://www.youtube.com/embed/1FpnZ3ggUq8" frameborder="0" allowfullscreen></iframe>
      </div>
    </div>
        <!-- Content end here-->
  </div>
</div>
<!-- The End of Section -->


<!-- Defaults-->

<!-- Footer -->
<footer class="w3-container w3-padding-32 w3-light-grey w3-center w3-xlarge">
  <!--<div class="w3-section">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
  </div> -->
  <p class="w3-medium">Powered by <a href="https://cloud.google.com/" target="_blank" class="w3-hover-text-green">Google Cloud Platform</a></p>
</footer>

<script>
// Slideshow
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}
</script>

</body>
</html>
