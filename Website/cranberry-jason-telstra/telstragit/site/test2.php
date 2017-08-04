<?php
echo "<!doctype html>";
echo "<body>";
echo "<h3>Results from Google Cloud SQL</h3>";
echo "<table class=simpletable border=1>";
echo "<tr><th align=left>Star Name</th><th>(x) times larger than the Sun</th></tr>";
//This is an example PHP page that connects to Google Cloud SQL databases from an App Engine application
/*
Connect to Cloud SQL
  Usage: Update the connection string with your connection information
    -Replace "project_id" with the Project ID of your Cloud SQL Project
    -Replace "demo-db" with the name of your instance in Cloud SQL
    -Replace "root" with your user name
*/
//:/cloudsql/cranberry-telstra:cranberrydatabase
//104.198.234.164
echo "before mysql_connect\n";
$dsn = getenv('MYSQL_DSN');
$conn = mysqli_connect("/cloudsql/cranberry-telstra:us-central1:cranberrydatabase", "root", "B3_0ur_lord!", "predator");
echo "after mysql_connectt\n";
if (!$conn) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
echo "after if\n";
//Select Database
//$db_selected = mysql_select_db('predator', $conn);
if (!$db_selected) {
    die ('Can\'t use db : ' . mysql_error());
}
//Perform Query
$result = mysql_query("SELECT * FROM locs;");
//Show Results
while ($row = mysql_fetch_assoc($result)) {
    echo "<tr><td align=left>" . $row['name'] . "</td>";
    echo "<td align=center class=addCommas>" . $row['size'] . "</td></tr>";
}
echo "</table>";
?>


<!-- Style the results table -->
<style type="text/css">
h3 {font-family:verdana;font-size:24px;color:#181C26;}
table.simpletable {font-family:verdana;font-size:15px;color:#40434A;border-width:1px;border-color:#778AB8;border-collapse:collapse;}
table.simpletable th {border-width: 1px;padding: 10px;border-style: solid;border-color:#778AB8;background-color:#dedede;}
table.simpletable td {border-width: 1px;padding: 10px;border-style: solid;border-color: #778AB8;background-color: #ffffff;}
</style>

<!-- Add commas to numbers appearing in the table cell with the attribute 'class=addCommas'-->
<script type="text/javascript">
function formatNumberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
var elements = document.querySelectorAll('td.addCommas');
var i;
for (i in elements) {
   if(elements[i].innerHTML != undefined) {
         elements[i].innerHTML = formatNumberWithCommas(elements[i].innerHTML);
   }
}
</script>

</body>
</html>