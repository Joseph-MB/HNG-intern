<?php
error_reporting(0);

	require_once('connect.php');

?>
<!DOCTYPE html>
<html>
<head>
<style>
table {
    width:50%;
    margin: auto;
}
form{
	width: 145px;
}
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
    text-align: left;
}
table#t01 tr:nth-child(even) {
    background-color: #eee;
}
table#t01 tr:nth-child(odd) {
   background-color:#fff;
}
table#t01 th	{
    background-color: black;
    color: white;
}
</style>
</head>
<body>
	<form action="index.php" method="POST">
		  Name:<br>
		  <input type="text" name="name" placeholder="Enter Name">
		  <br>
		  <input type="submit" value="Submit">
	</form> 


<br>
<!-- CODE TO SUBMIT TO DB -->
<?php 
	$name= $_POST["name"];
	$sth=$dbh->prepare("INSERT INTO user (name) VALUES (?)") ;
	$sth-> execute(array($name));
 ?>



<!-- CODE TO READ FROM DB -->
 <?php
	 $sth =$dbh->prepare("SELECT * FROM user ");
				$sth->execute();
				$row = $sth->fetchALL(PDO::FETCH_ASSOC);?>
					<div id="profile">
		<table id="displayprofile"><tr><th>Name</th></tr>
		<?php 
		foreach ($row as $key) {?>
		<tr><td><?php echo $key["name"];?></td>
		 </tr>
				<?php } ?>

				


		</table>


    	
	


</body>
</html>



