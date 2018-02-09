<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
session_start();

/*if(isset($_SESSION['usr_id'])) {
    header("Location: login.php");
}*/

include_once 'dbconnect.php';

$sql = 'SELECT 	residentID, firstname, lastname, email, phonenumber FROM address';
   //mysql_select_db('test_db');
   $retval = mysql_query( $sql, $conn );
   
   if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }
   
   while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
      echo "Resident ID :{$row['residentID']}  <br> ".
         "FIRST NAME : {$row['firstname']} <br> ".
         "LAST NAME : {$row['lastname']} <br> ".
         "EMAIL : {$row['email']} <br> ".
          "PHONE NUMBER : {$row['phonenumber']} <br> ".
         "--------------------------------<br>";
   }
   
   echo "Fetched data successfully\n";
   
   mysql_close($conn);

?>
</body>
</html>