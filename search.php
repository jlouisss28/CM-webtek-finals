<?php 

include("usrconnect.php");

$custo_id = $_POST["custo_id"];

@$sql = mysql_query("SELECT * FROM customer
WHERE custo_id = '".$custo_id."';");

@$numrows = mysql_num_rows($sql);

@$rows = mysql_fetch_array($sql);

if($numrows>1){
echo "<script>alert('You have duplicate accounts. Contact the company immediately');</script>";
}
else{
echo "<center><table></center>";
echo "<tr>";
	echo "<th>Customer ID</th>";
	echo "<th>First Name</th>";
	echo "<th>Last Name</th>";
	echo "<th>Action</th>";
	echo "<tr>";
			echo "<td>" . $rows['custo_id'] . "</td>";
			echo "<td>" . $rows['custo_fn'] . "</td>";
			echo "<td>" . $rows['custo_ln'] . "</td>";
			echo "<td>" . '<div id="site_content"><a href="update.php">EDIT<a></div>';
		echo "</tr>";
}


mysql_close();



?>