<?php

$con=mysqli_connect('127.0.0.1','root','','sad0206');

// Check connection
if (mysqli_connect_errno()) {
	echo "<script>alert('".mysqli_connect_error()."');</script>";
}

?>