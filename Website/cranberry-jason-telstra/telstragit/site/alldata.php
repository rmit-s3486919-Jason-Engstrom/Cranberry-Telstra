<!doctype html>
<body>
<?php
$dsn = getenv('MYSQL_DSN');
$user = getenv('MYSQL_USER');
$password = getenv('MYSQL_PASSWORD');
$db = new PDO($dsn, $user, $password);
if (!$db) {
    echo "Error: Unable to connect to MySQL.<br>";
    echo "Debugging errno: " . mysqli_connect_errno() . "<br>";
    echo "Debugging error: " . mysqli_connect_error() . "<br>";
    exit;
}
$results = $db->query('SELECT * FROM locs');
echo "<table border=1>";
echo "<tr><td>Device Name</td><td>Timestamp</td><td>Latitude</td><td>Longitude</td><td>Associated Image</td><td>Primary Key</td></tr>";
while($row = $results->fetch())
{
	echo "<tr>";
	echo "<td>".$row['devNm']."</td><td>".$row['time']."</td><td>".$row['lat']."</td><td>".$row['lng']."</td><td>".$row['img']."</td><td>".$row['id']."</td>";
	echo "</tr>";
}
echo "</table>";
//Select Database
//$db_selected = mysql_select_db('predator', $conn);
//if (!$db_selected) {
//   die ('Can\'t use db : ' . mysql_error());
//}
//Perform Query
$result = mysql_query("SELECT * FROM locs;");
//Show Results
while ($row = mysql_fetch_assoc($result)) {
    echo "<tr><td align=left>" . $row['name'] . "</td>";
    echo "<td align=center class=addCommas>" . $row['size'] . "</td></tr>";
}
echo "</table>";
?>

</body>
</html>