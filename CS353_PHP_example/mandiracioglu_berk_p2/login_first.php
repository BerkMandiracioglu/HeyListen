
<?php

// Check connection
require 'db_access.php';

session_start();

function checkUser($cid, $name) {
global $conn;
    $sql = "SELECT cid, name FROM customer where lower(cid) =" .$cid ." and lower(name) ='".$name."'";



    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
	
    // output data of each row
    return true;
	} else {
    	return false;
	}	
    
}





// define variables and set to empty values
$notfoundErr=$name = $cid = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$flag1 = true;
	$flag2 = true;

	if (empty($_POST["name"])) {
    $nameErr = "Name is required";
    $flag1 = false;

  } if(empty($_POST["cid"])) {
     $cidErr = "password is required";
       $flag2 = false;
  }
  if($flag2&&$flag1){

  
  	$name = test_input($_POST["name"]);
  	$cid = test_input($_POST["cid"]);
  	if(checkUser($cid,$name)){
      $_SESSION['name'] = $name;
      $_SESSION['cid'] = $cid;
      $_SESSION['logged_in'] = true;
  		 
//You need to redirect
	     header("Location: welcome.php"); /* Redirect browser */
 	  
	     end();
 
  	}
  	else{
  		$notfoundErr = "There is no customer swith specified information";
  	}
  	

  }

 

  
 
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  $data = strtolower($data);
  return $data;
}
?>
