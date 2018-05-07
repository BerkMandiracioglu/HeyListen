
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
              global $conn;
            echo "<div class=\"container-fluid\">
    <div class=\"jumbotron\">
        <h1 style=\"color:teal;\">WELCOME ".strtoupper($name)."</h1>
        <p>This is money transfer section where you can transfer money</p>
         <li><a href=\"logout.php\"><span class=\"glyphicon glyphicon-log-in\"></span> Logout</a></li>
    </div>
    ";
              echo "<br>";

              echo"<form class=\"form-inline\"   action=\"moneytransfer.php\" method=\"post\">
              <div class=\"form-group\">
              <label for=\"focusedInput\">fromAccount</label>
              <input name = \"fromAccount\" class=\"form-control\" id=\"focusedInput\" type=\"text\">
    
              </div> 
              
              <div class=\"form-group\">
              <label for=\"focusedInput\">toAccount</label>
              <input name = \"toAccount\" class=\"form-control\" id=\"focusedInput\" type=\"text\">
    
              </div> 

              <div class=\"form-group\">
              <label for=\"focusedInput\">transferAmount</label>
              <input name = \"transferAmount\" class=\"form-control\" id=\"focusedInput\" type=\"text\">
    
              </div>  
              <input type=\"submit\" name=\"submit\" value=\"Submit\"> 

              </form>";

              if($_SERVER["REQUEST_METHOD"] == "POST"){
                  
                  $flag1 = true;
                  $flag2 = true;
                  $flag3 = true;
                 
                      if (empty($_POST["fromAccount"])) {
                        echo "<div class=\"alert alert-danger\">
                            <strong> Warning! </strong> You should enter an account in fromAccount input
                          </div>";
                        $flag1 = false;

                      } if(empty($_POST["toAccount"])) {
                         echo "<div class=\"alert alert-danger\">
                            <strong> Warning! </strong> You should enter an account in toAccount input
                          </div>";
                        $flag2 = false;
                      }
                      if(empty($_POST["transferAmount"])) {
                         echo "<div class=\"alert alert-danger\">
                            <strong> Warning! </strong> You should enter an amount of money
                          </div>";
                        $flag3 = false;
                      }
                      if($flag3 &&$flag2&&$flag1){
                          $fromAccount = $_POST["fromAccount"];
                          $toAccount = $_POST["toAccount"];
                          $transferAmount = $_POST["transferAmount"];
                          $sql = "select a.aid, a.branch, a.balance, a.openDate from account a,  owns o where o.aid = a.aid and a.aid = '".$fromAccount ."' and o.cid ='".$_SESSION['cid']."'";
                          
                          echo"<br>";
                          $result = $conn->query($sql);
                          $row = $result->fetch_assoc();
                          
                          $balanceOld = $row["balance"];
                          if($transferAmount<=$balanceOld){
                            if($result->num_rows > 0){
                             
                               $row = $result->fetch_assoc();
                               
                                $sql = "select a.aid, a.branch, a.balance, a.openDate from account a,  owns o where o.aid = a.aid and a.aid = '".$toAccount ."'";
                                $result = $conn->query($sql);
                                 if($result->num_rows > 0){
                                  
                                 echo "<br>";
                                 
                                  $sql = "update account set balance = balance - ".$transferAmount." where aid='".$fromAccount."'";
                                 
                                  echo "<br>";
                                  $conn->query($sql);
                               
                                  $sql = "update account set balance= balance + ". $transferAmount." where aid='".$toAccount."'";
                                  $conn->query($sql);
                                 }
                                 else{
                                  echo "<div class=\"alert alert-danger\">
                                      <strong> Error! </strong> toAccount does not exist check again
                                     </div>";
                                 }
                                
                            }
                            else{
                              echo "<div class=\"alert alert-danger\">
                              <strong> Error! </strong> fromAccount does not exist or does not belong to you check again
                              </div>";
                            }


                          }
                          else{

                            echo "<div class=\"alert alert-danger\">
                              <strong> Error! </strong> You account balance cannot handle this amount of money transaction!!!
                              </div>";
                          }
                            


                      
                          }
                    
              }
              echo "<h1>Your Accounts:</h1>";
              
              echo "<table class=\"table table-bordered\"><thead>
              <tr>
               <th>aid</th>
              <th>Branch</th>
              <th>Balance</th>
              <th>Open Date</th>

              </tr>
             </thead>
              <tbody>";
            
              $sql = "SELECT a.aid, a.branch, a.balance, a.openDate  FROM account a,  owns o where o.aid = a.aid and o.cid  = '".$_SESSION['cid']."'";
              echo "<br>";
              
             
              $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                 
      // output data of each row
                while($row = $result->fetch_assoc()) {
                  echo "<tr >";
                  echo "<td>" . $row["aid"]. " </td> " ."<td>". $row["branch"]."</td>" ."<td> " . $row["balance"]. "</td>"."<td> " . $row["openDate"];
                  echo  "</td>";
                  echo "</tr>";
                    }

                }
                echo "  </tbody></table></div>";

                echo "<br>";
              echo "<h1>Other Accounts:</h1>";
              
              echo "<table class=\"table table-bordered\"><thead>
              <tr>
               <th>aid</th>
              <th>Branch</th>
              <th>Balance</th>
              <th>Open Date</th>

              </tr>
             </thead>
              <tbody>";
              global $conn;
              $sql = "select a1.aid , a1.branch, a1.balance, a1.openDate
                    from account a1 where a1.aid not in (SELECT a.aid FROM account a, owns o where o.aid = a.aid and o.cid = '".$_SESSION['cid']."')";
              echo "<br>";
             
             
              $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                 
      // output data of each row
                while($row = $result->fetch_assoc()) {
                  echo "<tr >";
                  echo "<td>" . $row["aid"]. " </td> " ."<td>". $row["branch"]."</td>" ."<td> " . $row["balance"]. "</td>"."<td> " . $row["openDate"];
                  echo  "</td>";
                  echo "</tr>";
                }

                }
                echo "  </tbody></table></div>";
                echo "<ul class=\"pager\">
                    <li><a href=\"welcome.php\">Go Back</a></li>
           
                      </ul>";



            
          }
          
          ?>
          
          
          
          
          
        

   
    

</body>
</html>
