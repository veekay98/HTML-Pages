<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php if($_POST){?>
<div style="margin-top:5%;margin-left:28%;text-align:left;border-radius:5px;width:300px;border :5px solid #e00c2e;height:auto;background-color:rgb(249,249,249);padding:20px;">

			<?php
			$servername = "localhost";
			$username = "root";
			$password = "root";
			$dbname = "Eventreg";
			$remmsg = $_POST["remmsg"];
			$timing = $_POST["time"];


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


			if (!empty($user)){
			$sql1 = "UPDATE reg SET name=\"$remmsg\" WHERE id=$p1";
 				 			  }
 				 		else{
 			$sql1 = "UPDATE reg SET name=\"$rem1\" WHERE id=$p1";
 				 		}
 			if (!empty($email)){
			$sql2 = "UPDATE reg SET  email=\"$timing\" WHERE id=$p1";
 				 			  }
 				 		else{
 			$sql2 = "UPDATE reg SET  email=\"$time1\" WHERE id=$p1";
 				 			}

 			if (($conn->query($sql1) === TRUE)&&($conn->query($sql2) === TRUE)&&($conn->query($sql3) === TRUE)&&($conn->query($sql4) === TRUE)){
 				echo nl2br("Updated reminder successfully\n\n");
 			}
 			else{ echo "Updation error : ".$conn->error;}
    			$query = "SELECT max(id) FROM reg";
    			$result1 = $conn->query($query);
				$value = $result1->fetch_array(MYSQLI_NUM);
				$p1=$value[0];
     			$sql="SELECT * FROM reg WHERE id=$p1";
     			$result = $conn->query($sql);
     			if ($result->num_rows > 0) {
    			// output data of each row
    			while($row = $result->fetch_assoc()) {?>
    			<b><?php
        		echo nl2br("Reminder Message: ". $row["remmsg"]."\n\n"." Time : ". $row["timing"]);
        											 }
    									 	}
										}
?></b></div>
</body>
</html>
