
<!DOCTYPE html>
<html >
<head>
   <meta charset="UTF-8">
    <title>Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  

</head>

<body>

<?php
require 'db_access.php';
/* Displays user information and some useful messages */

global $conn;
if(!empty($_GET['id'])) {
  $aid= trim($_GET['id']);
  $sql = "delete from owns where aid = ".$aid;
  $result = $conn->query($sql);
  $sql = "delete from account where aid = ".$aid;
 
  $result = $conn->query($sql);
  if($result) {
    echo "<div class=\"alert alert-success\">
          <strong>You have succesfully deleted you account: ".$aid."</strong> ".$_SESSION['message'].
          "</div>";
	echo "<br>";
	echo "<a href=\"welcome.php\"><button type=\"button\" class=\"btn btn-primary btn-block\">Go Back</button></a>";
    

  }

}
?>
</body>
</html>