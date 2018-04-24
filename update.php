<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


  <?php if($_POST) {?>

     <div style="margin-top:5%;margin-left:28%;text-align:left;border-radius:5px;width:300px;border :5px solid #e00c2e;height:auto;background-color:rgb(249,249,249);">

  		<p style="margin-left:10px;"> Edit to change existing reminders </p>

			<?php
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
    	$sql2 = "SELECT * FROM reg WHERE id=$p1";
    	$result = $conn->query($sql2);

     if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {?>
	<form method="POST" action="update2.php" style="margin:0px;padding: 10px;">
	   Reminder Message : <?php echo $row["remmsg"] ?> <br>

		<input type="text" name="remmsg" style="margin:0px;padding: 10px;"><br><br>
		Timing :<?php echo $row["timing"] ?><br>
		<input type="text" name="time" style="margin:0px;padding: 10px;"><br><br>

		<input type="submit" name="Enter" value=" Enter" style="margin:0px;padding: 10px;"><br><br>
	</form>
</div>



</body>
</html>
