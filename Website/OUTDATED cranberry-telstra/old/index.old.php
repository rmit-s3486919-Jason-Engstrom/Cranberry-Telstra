<?php
session_start();
$counter = "test3";
echo('
<html>
<title>Cranberry</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="stylesheets/style.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<style>
body,h1 {font-family: "Raleway", sans-serif}
body, html {height: 100%}
.bgimg {
    background-image: url("/images/predator.jpg");
    position: 0 0;
    min-height: 100%;
    background-position: center;
    background-size: cover;
}
</style>
<body>

<div class="bgimg w3-display-container w3-animate-opacity w3-text-white">
  <div class="w3-display-topleft w3-padding-large w3-xlarge"  style="background-color:black;">
    '.$counter.'
  </div>
  <div class="w3-display-middle" style="background-color:black;">
    <h1 class="w3-jumbo w3-animate-top">COMING SOON</h1>
    <hr class="w3-border-grey" style="margin:auto;width:40%">
    <p class="w3-large w3-center">35 days left</p>
  </div>
  <div class="w3-display-bottomleft w3-padding-large">
    &copy; '.date("Y").' Copyright.
  </div>
</div>

</body>
</html>
	');
?>