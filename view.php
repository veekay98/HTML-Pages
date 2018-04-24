<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<div style="margin-top:5%;margin-left:28%;text-align:left;border-radius:5px;width:300px;border :5px solid #e00c2e;height:auto;background-color:rgb(249,249,249);padding:20px;">

<?php
if($_POST){
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "Eventreg";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
					  }
	$query = "SELECT max(id) FROM reg";
	$result = $conn->query($query);
	$value = $result->fetch_array(MYSQLI_NUM);
	$p1=$value[0];
	$sql5="SELECT * FROM reg WHERE id=$p1";
     			$result5 = $conn->query($sql5);
     			if ($result5->num_rows > 0) {
    			// output data of each row
    			while($row = $result5->fetch_assoc()) {
    				$rem1=$row["remmsg"];
    				$time1=$row["timing"];

    												 }
    										}

    $sql2 = "DELETE FROM reg WHERE id=$p1";
	if ($conn->query($sql2) === TRUE) {
    echo "The reminder with id no : ".$p1." and message: ".$rem1." deleted successfully";
									  }
	else {
    echo "Error deleting reminder: " . $conn->error;
		 }
}
?>

</div>


</body>
</html>
