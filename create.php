<!DOCTYPE html>
<html>
<head>
	<title>Create Reminder</title>
</head>
<body>
<?php
if($_POST){
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "Eventreg";
$remmsg = $_POST["remmsg"];
$timing = $_POST["timing"];

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
			}
if (empty($remmsg)){
echo "Reminder Message is empty.Fill in the reminder message\n";
 				 } ?>

<br>

 <?php
if (empty($timing)){
echo "The time is empty.Fill in the time\n";
 					} ?><br>

<div style="margin-top:5%;margin-left:28%;text-align:left;border-radius:5px;width:300px;border :5px solid #e00c2e;height:auto;background-color:rgb(249,249,249);padding:20px;">



<?php
$sql = "INSERT INTO reg(remmsg,timing)
VALUES (\"$remmsg\", \"$timing\")";
if (!(empty($remmsg))&&!(empty($timing))){
	if(mysqli_query($conn, $sql)){
    echo nl2br("New reminder is created\n\n");
     $last_id = $conn->insert_id;
     $sql1="SELECT * FROM reg WHERE id=\"$last_id\"";
     $result = $conn->query($sql1);
     if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {?>
    <b><?php
        echo nl2br("Message: ". $row["remmsg"]."\n\n"." Time: ". $row["timing"]);

    									 }
								}
else {
    echo "0 reminders";
	 }
?>
  </b><form method="POST" action="update.php">
			<input type="submit" name="p" value="Update" style="margin:10px;padding: 10px;">
		</form>
		<form method="POST" action="view.php">
			<input type="submit" name="q" value="Delete reminder" style="margin:10px;padding: 10px;">
		</form>
</div>





<?php
								 }
														   }
else {
    echo "Cant create reminder : " . $sql . "<br>" . mysqli_error($conn);
	 }
}
else { ?>

<div style="margin-top:5%;margin-left:28%;text-align:left;border-radius:5px;width:300px;border :5px solid #e00c2e;height:auto;background-color:rgb(249,249,249);">
  <p style="text-align: center;margin-top: 10px;padding-top: 10px;">Register for YD-2018</p><br>
	<form method="POST" action="create.php" style="margin:0px;padding: 10px;"><br>
	   Reminder Message :<br>
		<input type="text" name="remmsg" style="margin:0px;padding: 10px;"><br><br>
		Time :<br>
		<input type="text" name="timing" style="margin:0px;padding: 10px;"><br><br>

		<input type="submit" name="create" value=" Create" style="margin:0px;padding: 10px;"><br><br>
	</form>
</div>

<?php } ?>


</body>
</html>
