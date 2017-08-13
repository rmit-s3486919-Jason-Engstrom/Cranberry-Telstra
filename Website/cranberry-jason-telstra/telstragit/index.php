  <!DOCTYPE html>
  <html>
  <title> Cranberry </title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
  <link rel="stylesheet" href="css/topnav.css">
  <style>
  body,h1,h2,h3,h4,h5,html{font-family: "Candara", sans-serif; height: 100%}
  @media only screen and (max-width: 769px){
    body{font-size: 15px;}
  }
  @media only screen and (min-width: 768px){
    body{font-size: 20px;}
  }
  /*body {font-size: 20px;}*/
  img {margin-bottom: -8px;}
  .mySlides {display: none;}
  #map {
          height:450px;
        }
        
    table, th, td {
      border: 1px;
    }
    table{
      width: 100%
    }
  </style>
  <body class="w3-content w3-white" style="max-width: 100%">

  <!-- Header with Slideshow -->
  <header class="w3-display-container w3-center w3-width-def">

    <!--New code-->
    <div class="topnav" style=width:inherit; id="myTopnav">
      <a href="https://cranberry-telstra.appspot.com">Home</a>
      <!--<a href="site/test.html.twig">Test</a>
      <a href="site/testCode.php">Test Code</a>-->
      <!--<a href="site/test2.php">Test2</a>
      <a href="site/test3.php">Test3</a>
      <a href="site/test4.php">Test4</a>
      <a href="site/test5.php">Test5</a>-->
    <a href="site/alldata.php">Data</a>
    </div>
    <!--End of New Code-->

    <div style=width:inherit; class="mySlides w3-animate-opacity">
      <!--<PageMap>
      <DataObject type="thumbnail">
        <Attribute name="src" value="ThickTree.jpg"/>
        <Attribute name="width" value="100"/>
        <Attribute name="height" value="130"/>
      </DataObject>
      </PageMap>-->

      <img class="w3-image" src="Cranberry Logo_3_PagePoster_2.jpg" alt="Image 1" width=100% height="1000">
      <div class="w3-display-middle w3-padding w3-hide-small" style="width:35%">
        <!----<div class="w3-black w3-opacity w3-hover-opacity-off w3-padding-large w3-round-large">
          <h1 class="w3-xlarge w3-text-white"><b>Cranberry</b></h1>
          <hr class="w3-opacity">
          <p>Presenting</p>
        </div>---->
      </div>
    </div>
    <!----div class="mySlides w3-animate-opacity">
      <img class="w3-image" src="drono.jpg" alt="Image 2" width=100% height="1000">
      <!--div class="w3-display-middle w3-padding w3-hide-small" style="width:35%">
        <div class="w3-black w3-opacity w3-hover-opacity-off w3-padding-large w3-round-large">
          <h1 class="w3-xlarge">Smart Design</h1>
          <hr class="w3-opacity">
          <p>Customize photos as you go</p>
        </div>
      </div---->
    </div-->
    <!----div class="mySlides w3-animate-opacity">
      <img class="w3-image" src="babypig.jpg" alt="Image 3" width=100% height="1000">
      <!--div class="w3-display-middle w3-padding w3-hide-small" style="width:35%">
        <div class="w3-black w3-opacity w3-hover-opacity-off w3-padding-large w3-round-large">
          <h1 class="w3-xlarge">Smart Design</h1>
          <hr class="w3-opacity">
          <p>Customize photos as you go</p>
        </div>
      </div---->
    </div---->
    <!----a class="w3-button w3-black w3-display-right w3-margin-right w3-round w3-hide-small w3-hover-light-grey" onclick="plusDivs(1)">Take Tour<i class="fa fa-angle-right"></i></a>
    <a class="w3-button w3-block w3-black w3-hide-large w3-hide-medium" onclick="plusDivs(1)">Take a Tour<i class="fa fa-angle-right"></i></a-->
  </header>
  <!-- End Defaults-->




  <!-- Predator Heading-------------------------------------------------------------------------------------- -->
  <!--<div class="w3-padding-32 w3-light-grey">
    <div class="w3-row-padding">
      <div class="w3-col 14 m12">
        <h1 class="w3-xxxlarge w3-text-center"><b>Predator</b></h1> --> <!-- Place the header here--> <!--
        <h1 class="w3-xxlarge w3-text-green w3-text-center"><b>Pest Surveillance System for the Public</b></h1> --> <!-- Place the sub-header here--> <!--
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
    </div>
  </div> -->
  <!-- Content end here-->
  <!-- 1st Section -- The editable Section------------------------------------------------------------------ --
  <div class="w3-padding-small w3-white">
    <div class="w3-row-padding">
      <div class="w3-col.s12 l8 m6">
      <h1 class="w3-jumbo w3-text-center"><b>Heat Map</b></h1>
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
    </div>
  </div>
  -- The End of Section -->

  <!--Hot Mapping Action!!!!!!!!!!!!!!!!-->
  <?php
    $dsn = getenv('MYSQL_DSN');
    $user = getenv('MYSQL_USER');
    $password = getenv('MYSQL_PASSWORD');
    $db = new PDO($dsn, $user, $password);
    $results = $db->query('SELECT * FROM locs');

    $count = 0;

    // while($row = $results->fetch())
    // {
      // echo $row['devNm']."<br>";
    // }
  ?>
<!--------------------------------------------------------------------------------------------------------- -->
  <div class="w3-showdesk parallax1"></div>
<!--------------------------------------------------------------------------------------------------------- -->
  <div class="w3-padding-32 w3-light-grey">
    <div class="w3-row-padding">
      <div class="w3-col l12 m12">

        <!-- --h1 class="w3-showdesk w3-xxxlarge w3-text-center"><b>Predator</b></h1-- --> <!-- Place the header here-->
        <!-- --h1 class="w3-showmob w3-xlarge w3-text-center"><b>Predator</b></h1-- --> <!-- Place the header here-->

        <center><img src="Predator_Logo-1.png" class="w3-image" width="50%" height="100%"></center>

        <h1 class="w3-showdesk w3-xxlarge w3-text-green w3-text-center"><b>Pest Surveillance System for the Public</b></h1> <!-- Place the sub-header here-->
        <h1 class="w3-showmob w3-large w3-text-green w3-text-center"><b>Pest Surveillance System for the Public</b></h1> <!-- Place the sub-header here-->

         <p class="w3-showdesk w3-text-center">Predator is a fully automated surveillance system aimed at easing the pain of dealing with pests. Our product seeks to innovate the monitoring of pests via the use of small computers in the field that link up to a website in the cloud. A small computer in the field is placed and is able to detect movement of pests. This information is beamed to the website and the farmer is able to easily see movements of pests on a heat map. Additionally, the farmer is also give an image at the moment movement is detected.</p>
         <p class="w3-showmob w3-justify">Predator is a fully automated surveillance system aimed at easing the pain of dealing with pests. Our product seeks to innovate the monitoring of pests via the use of small computers in the field that link up to a website in the cloud. A small computer in the field is placed and is able to detect movement of pests. This information is beamed to the website and the farmer is able to easily see movements of pests on a heat map. Additionally, the farmer is also give an image at the moment movement is detected. </p>

      </div>
    </div>
  </div>
<!------------------------------------------------------------------------------------------------------------>
  <div class="w3-showdesk parallax1"></div>
<!--------------------------------------------------------------------------------------------------------- -->
  <div class="w3-padding-32">
    <div class="w3-row-padding">
      <div class="w3-col l12 m12">
        <h1 class="w3-showdesk w3-xxxlarge w3-text-center"><b>Heat Map</b></h1>
        <h1 class="w3-showmob w3-xlarge w3-text-center"><b>Heat Map</b></h1>

        <h1 class="w3-showdesk w3-xxlarge w3-text-green w3-text-center"><b>Pest Activity</b></h1>
        <h1 class="w3-showmob w3-large w3-text-green w3-text-center"><b>Pest Activity</b></h1>

        <p class="w3-showdesk w3-text-center">Location of all documented locations of pests, detected using the Predator system</p>
         <p class="w3-showmob w3-justify">Location of all documented locations of pests, detected using the Predator system</p>

          <?php $key = "AIzaSyDYpvxR5SPOZYgXDS8NuVr2ySrRW2kdPDg";?>
            <div id="map";></div>
              <script>
              // This example requires the Visualization library. Include the libraries=visualization
                // parameter when you first load the API. For example:
                // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=visualization">

                var map, heatmap;
              // var latlng = [<?php
                      // while($row = $results->fetch())
                      // {
                        // if ($count != 0)
                        // {
                          // echo ",";
                        // }
                        // echo "\"" . $row['lat'] . "\",";
                        // echo "\"" . $row['lng'] . "\"";
                        // $count++;
                      // }
                    // ?>];

                function initMap() {
                  map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 4,
                    center: {lat: -25.693, lng: 145.914},
                    mapTypeId: 'satellite'
                  });

                  heatmap = new google.maps.visualization.HeatmapLayer({
                    data: getPoints(),
                    map: map
                  });
                }

                // Heatmap data: 500 Points
                function getPoints() {
                  return [<?php
                    while($row = $results->fetch())
                    {
                      if ($count != 0)
                      {
                        echo ", ";
                      }
                      echo "new google.maps.LatLng(" . $row['lat'] . "," . $row['lng'] . ")";
                      $count++;
                    }
                  ?>];
                }
              </script>
    </div>
    </div>
  </div>

  <script async defer
          src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDYpvxR5SPOZYgXDS8NuVr2ySrRW2kdPDg&libraries=visualization&callback=initMap">
  </script>

  <!-- 2nd Section -- The editable Section------------------------------------------------------------------ -->
  <div class="w3-padding-small">
    <div class="w3-row-padding">
      <div class="w3-col l12 m12">

        <h1 class="w3-showdesk w3-xxxlarge w3-text-center"><b>How does it work?</b></h1> <!-- Place the header here-->
        <h1 class="w3-showmob w3-xlarge w3-text-center"><b>How does it work?</b></h1> <!-- Place the header here-->

          <!-- Content end here-->
        <p class="w3-justify">Predator will monitor the surrounding area using an array of Detection Units. Once it has detected the presence of an intruding pest, the Detection Unit will update it's location and place the whereabouts online!</p>


   <div class="w3-padding-small">
      <div class="w3-row-padding">
        <div class="w3-col-con-1">
          <div class="w3-text-center w3-center1 w3-showdesk">
            <h1 class="w3-xxlarge w3-text-green"><b>Pest in the Area?</b></h1>
            <p>The Detection Unit will detect for a presence of an intruding pest</p>
          </div>
        </div>
        <di class="w3-col-con-2">
                    <img src="Stage 1-2-01.jpg" class="w3-image w3-showdesk" width="100%" height="100%">
        </div>

        <div class="w3-showmob w3-text-center">
          <h1 class="w3-large w3-text-green"><b>Pest in the Area?</b></h1>
          <p>The Detection Unit will detect for a presence of an intruding pest</p>
          <img src="Stage 1-2-01.jpg" class="w3-image" width="100%" height="100%">
        </div>

      </div>
    </div>


   <div class="w3-padding-small">
      <div class="w3-row-padding">
        <div class="w3-col-con-1">
          <div class="w3-col l12 m12 w3-text-center w3-showdesk">
            <img src="Stage 2-2-01_.jpg" class="w3-image" width="100%" height="100%">
          </div>
        </div>
        <div class="w3-col-con-2">
          <div class="w3-center1 w3-showdesk">
            <h1 class="w3-xxlarge w3-text-green"><b>Message the Predator Access Point</b></h1>
            <p>Location and an image of the pest is sent to the Predator Access Point</p>
          </div>
        </div>
          <div class="w3-showmob w3-text-center">
            <h1 class="w3-large w3-text-green"><b>Message the Predator Access Point</b></h1>
            <p>Location and an image of the pest is sent to the Predator Access Point</p>
            <img src="Stage 2-2-01_.jpg" class="w3-image" width="100%" height="100%">
          </div>
      </div>
    </div>


   <div class="w3-padding-small">
      <div class="w3-row-padding">
        <div class="w3-col-con-1">
          <div class="w3-text-center w3-center1 w3-showdesk">
            <h1 class="w3-xxlarge w3-text-green"><b>Upload to Database</b></h1>
            <p>The data is then uploaded to the central database</p>
          </div>
        </div>
        <div class="w3-col-con-2 w3-showdesk">
          <img src="Stage 3-2-01.jpg" class="w3-image" width="100%" height="100%">
        </div>
        <div class="w3-showmob w3-text-center">
          <h1 class="w3-large w3-text-green"><b>Upload to Database</b></h1>
          <p>The data is then uploaded to the central database</p>
          <img src="Stage 3-2-01.jpg" class="w3-image" width="100%" height="100%">
        </div>
      </div>
    </div>


   <div class="w3-padding-small">
      <div class="w3-row-padding">
        <div class="w3-col-con-1">
          <div class="w3-col l12 m12 w3-text-center w3-showdesk">
            <img src="Stage 4-01.png" class="w3-image" width="100%" height="100%">
          </div>
        </div>
        <div class="w3-col-con-2">
          <div class="w3-center1 w3-showdesk">
            <h1 class="w3-xxlarge w3-text-green"><b>Access from the Website</b></h1>
            <p>Data from the database is displayed on the homepage</p>
          </div>
        </div>
          <div class="w3-showmob w3-text-center">
            <h1 class="w3-large w3-text-green"><b>Access from the Website</b></h1>
            <p>Data from the database is displayed on the homepage</p>
            <img src="Stage 4-01.png" class="w3-image" width="100%" height="100%">
          </div>
      </div>
    </div>

   <div class="w3-padding-small">
      <div class="w3-row-padding">
        <div class="w3-col-con-1">
          <div class="w3-text-center w3-center1 w3-showdesk">
            <h1 class="w3-xxlarge w3-text-green"><b>Access to the User</b></h1>
            <p>The user now has access to the location and an image of the intruding pest</p>
          </div>
        </div>
        <div class="w3-col-con-2 w3-showdesk">
          <img src="Stage 5-01.png" class="w3-image" width="100%" height="100%">
        </div>
        <div class="w3-showmob w3-text-center">
          <h1 class="w3-large w3-text-green"><b>Access to the User</b></h1>
          <p>The user now has access to the location and an image of the intruding pest</p>
          <img src="Stage 5-01.png" class="w3-image" width="100%" height="100%">
        </div>
      </div>
    </div>

  <!-----div class="w3-padding-small">
    <div class="w3-row-padding">
      <div class="w3-col l12 m12 w3-text-center">
        <h1 class="w3-xxlarge w3-text-green w3-text-center"><b>This All Looks Like This</b></h1>
        <center><img src="System Diagram_3-01.png" class="w3-image w3-right" max-width="100%" height="100%"></center>
      </div>
    </div>
  </div---->
        <!-----p>2. Send to Master</p>
        <p>3. Upload to Cloud</p>
        <p>4. User Access</p---->
           <!----div class="w3-col l12 m12">
            <table align="right">
              <tr>
                <td>1. Detect</td>
                <td>2. Send to Master</td>
                <td>3. Upload to Cloud</td>
                <td>4. User Access</td>
              </tr>
            </table>
          </div----->


      <!-- Place the image here twice-->


       <!----center><div class="w3-col l12 m8">
        <p>First step: The Node detects the presence of a pest.</p>
        <p>Second step: The Node sends image and location data to the Master Node.</p>
        <p>Third step: The Master Node uploads the data to the Cranberry homepage.</p>
        <p>Fourth step: The User accesses image and location data from the Webpage.</p>
        </div></center---->
    </div>
  </div>
  <!-- The End of Section -->

  <!-- 3rd Section -- The editable Section------------------------------------------------------------------ -->
  <!--div class="w3-padding-small w3-white">
    <div class="w3-row-padding">
      <div class="w3-col.s6 14 m8">

        <h1 class="w3-showdesk w3-xxxlarge"><b>Wild Pigs of Fukushima</b></h1>
        <h1 class="w3-showmob w3-xlarge"><b>Wild Pigs of Fukushima</b></h1>

        <h1 class="w3-showdesk w3-xxlarge w3-text-green"><b>Surburban Pests</b></h1>
        <h1 class="w3-showmob w3-large w3-text-green"><b>Surburban Pests</b></h1>

        <div style=width:inherit; class="w3-center vid-container">
        <iframe width=100% height=100% src="https://www.youtube.com/embed/1FpnZ3ggUq8" frameborder="0" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </div---->


  <!-- About Us---------------------------------------------------------------------------------------------- -->
  <div class="w3-padding-small w3-light-grey">
    <div class="w3-row-padding">
      <div class="w3-col m12">

        <h1 class="w3-showdesk w3-xxxlarge w3-text-center"><b>About</b></h1> <!-- Place the header here-->
        <h1 class="w3-showmob w3-xlarge w3-text-center"><b>About</b></h1> <!-- Place the header here-->

        <h1 class="w3-showdesk w3-xxlarge w3-text-green w3-text-center"><b>Cranberry</b></h1> <!-- Place the sub-header here-->
        <h1 class="w3-showmob w3-xlarge w3-text-green w3-text-center"><b>Cranberry</b></h1> <!-- Place the sub-header here-->

        <div class="w3-padding-32 w3-light-grey">
          <p class="w3-showdesk w3-text-center">Cranberry is a team taking part in the Telstra Innovation Challenge. We consist of Electrical engineering, Computer Science and Business students from RMIT.  We are a team keen to improve farming and to aid farmers with real world problems they are facing. Our team is focused on assisting farmers with the problematic issues regarding pests. We have designed a technological solution to the mentioned problem; to innovate the farming experience.</p>
          <p class="w3-showmob w3-justify">Cranberry is a team taking part in the Telstra Innovation Challenge. We consist of Electrical engineering, Computer Science and Business students from RMIT.  We are a team keen to improve farming and to aid farmers with real world problems they are facing. Our team is focused on assisting farmers with the problematic issues regarding pests. We have designed a technological solution to the mentioned problem; to innovate the farming experience.</p>
        </div>
      </div>
    </div>
  </div>
  <!-- Content end here-->

  <!-- Meet the Team-->
  <div class="w3-padding-small w3-kight-grey">
    <div class="w3-row-padding">
      <div class="w3-col m12">

        <h1 class="w3-showdesk w3-xxxlarge w3-text-center"><b>Meet the Team</b></h1>
        <h1 class="w3-showmob w3-xlarge w3-text-center"><b>Meet the Team</b></h1>

        <div class="w3-showdesk">
          <table style="width:100%">
            <tr>
              <th><img src="http://cranberry-telstra.appspot.com/Photo-33.jpg" class="w3-image" width="50%" height="50%"></th>
              <th><img src="http://cranberry-telstra.appspot.com/Photo-23.jpg" class="w3-image" width="50%" height="50%"></th>
              <th><img src="http://cranberry-telstra.appspot.com/Photo-13.jpg" class="w3-image" width="50%" height="50%"></th>
              <th><img src="http://cranberry-telstra.appspot.com/Photo-43.jpg" class="w3-image" width="50%" height="50%"></th>
            </tr>
            <tr>
              <th><p>Aditya Prabhakara</p><a href="https://www.linkedin.com/in/aditya-prabhakara-b27270ab/"><p>LinkedIn</p></th>
              <th><p>Blake Zahra</p><a href="https://www.linkedin.com/in/blake-zahra-83792010a/"><p>LinkedIn</p></th>
              <th>Jason Engstrom</th>
              <th><p>Sachith Sirimanna</p><a href="https://www.linkedin.com/in/sachithsirimanna/"><p>LinkedIn</p></th>
            </tr>
          </table>
        </div>
        <div class="w3-showmob">
          <table style="width:85%">
            <tr>
              <th>
                <img src="http://cranberry-telstra.appspot.com/Photo-33.jpg" class="w3-padding-16 w3-image w3-left" width="35%" height="35%">
              </th>
              <th>
                <p class="nowrap">Aditya Prabhakara</p>
                <a href="https://www.linkedin.com/in/aditya-prabhakara-b27270ab/"><p>LinkedIn</p>
              </th>
            </tr>
            <tr>
              <th>
                <img src="http://cranberry-telstra.appspot.com/Photo-23.jpg" class="w3-padding-16 w3-image w3-left" width="35%" height="35%">
              </th>
              <th>
                <p class="nowrap">Blake Zahra</p>
                <a href="https://www.linkedin.com/in/blake-zahra-83792010a/"><p>LinkedIn</p>
              </th>
            </tr>
            <tr>
              <th>
                <img src="http://cranberry-telstra.appspot.com/Photo-13.jpg" class="w3-padding-16 w3-image w3-left" width="35%" height="35%">
              </th>
              <th>
                <p class="nowrap">Jason Engstrom</p>
              </th>
            </tr>
            <tr>
              <th>
                <img src="http://cranberry-telstra.appspot.com/Photo-43.jpg" class="w3-padding-16 w3-image w3-left" width="35%" height="35%">
              </th>
              <th>
                <p class="nowrap">Sachith Sirimanna</p>
                <a href="https://www.linkedin.com/in/sachithsirimanna/"><p>LinkedIn</p>
              <th>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- Content end here-->


  <!-- Contact----------------------------------------------------------------------------------------------- -->
  <div class="w3-padding-small">
    <div class="w3-row-padding">

      <div class="w3-col m12">

        <h1 class="w3-showdesk w3-xxxlarge w3-text-center"><b>Contact Us</b></h1> <!-- Place the header here-->
        <h1 class="w3-showmob w3-xlarge w3-text-center"><b>Contact Us</b></h1> <!-- Place the header here-->

        <div class="w3-padding-32 w3-col-con-1">
          <div class="w3-col l12 m12">

            <h2 class="w3-showdesk w3-text-center w3-xxxlarge l4 w3-text-green">Facebook</h2>
            <h2 class="w3-showmob w3-text-center w3-xlarge l4 w3-text-green">Facebook</h2>

            <a href="https://www.facebook.com/cranberryrmit/"><center><img src="FB-f-Logo__blue_1024.png" class="w3-image" width="25%" height="100%"></center></a>

            <p class="w3-text-center w3-padding-small">Like us on Facebook</p>

          </div>
        </div>

        <div class="w3-padding-32 w3-col-con-2">
          <div class="w3-col l12 m12">

            <h2 class="w3-showdesk w3-text-center w3-xxxlarge l4 w3-text-green">Twitter</h2>
            <h2 class="w3-showmob w3-text-center w3-xlarge l4 w3-text-green">Twitter</h2>

            <a href="https://twitter.com/CranberryRMIT"><center><img src="Twitter_Logo_White_On_Blue.png" class="w3-image" width="25%" height="100%"></center></a>

            <p class="w3-text-center w3-padding-small">Follow us on Twitter</p>

          </div>
        </div>

      </div>

    </div>
  </div>
  <!-- Content end here-->

  <!-- ---------------------------The End of Section------------------------------------------------------ -->





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
