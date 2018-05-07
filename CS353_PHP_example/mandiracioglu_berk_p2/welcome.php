
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
session_start();


// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing your profile page!";
         
         echo "<br>";
}
else {
    unset( $_SESSION['message'] );
    // Makes it easier to read
    $name = $_SESSION['name'];

}


     
          // Display message the need for login
          if ( isset($_SESSION['message']) )
          {
              echo "<div class=\"alert alert-warning\">
                    <strong>Warning!</strong> ".$_SESSION['message'].
                    "</div>";
             
              // Don't annoy the user with more messages upon page refresh
            
          }
            
           else{
            echo "<div class=\"container-fluid\">
    <div class=\"jumbotron\">
        <h1 style=\"color:teal;\">WELCOME ".strtoupper($name)."</h1>
        <p>This is your account information page</p>
 <li><a href=\"logout.php\"><span class=\"glyphicon glyphicon-log-in\"></span> Logout</a></li>
    </div>
    ";
    echo "<br>";
              echo "<h1>Accounts:</h1>";
              echo "<br>";
              echo "<table class=\"table table-hover\"><thead>
              <tr>
               <th>aid</th>
              <th>Branch</th>
              <th>Balance</th>
              <th>Open Date</th>

              </tr>
             </thead>
              <tbody>";
              global $conn;
              $sql = "SELECT a.aid, a.branch, a.balance, a.openDate  FROM account a, owns o where o.aid = a.aid and o.cid ='".$_SESSION['cid']."'";
              echo "<br>";
             
              $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                 
      // output data of each row
                while($row = $result->fetch_assoc()) {
                  echo "<tr >";
                  echo "<td>" . $row["aid"]. " </td> " ."<td>". $row["branch"]."</td>" ."<td> " . $row["balance"]. "</td>"."<td> " . $row["openDate"];
                  echo  "</td>".
                  "<td> <a href=\"delete.php?id='".$row[ "aid"]."'\">Delete</a></td>";
                  echo "</tr>";
                    }

                }
                echo "  </tbody></table></div>";

                echo "<br>";
                echo "<ul class=\"pager\">
                    <li><a href=\"moneytransfer.php\">Money Transfer</a></li>
           
                      </ul>";



            
          }
          
          ?>
          
          
          
          
          
        

   
    

</body>
</html>
