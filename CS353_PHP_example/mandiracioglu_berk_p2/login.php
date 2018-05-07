

<!DOCTYPE html>
<html lang="en">
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

<?php require 'login_first.php'; ?>
<div class="container-fluid">
    <div class="jumbotron">
        <h1 style="color:teal;">Bilkenter Bank</h1>
        <p>Welcome to Bilkenter Bank. Please Login to continue further</p>

    </div>


    <div class="container">
        
        
         

                <div class="row">
                    <blockquote>
                        <p>Your Money is safe with us !</p>
                        <footer>-Bilkenter Bank Co-founder: Berk Mandiracioglu</footer>
                    </blockquote>
                </div>

                <div  class="row top15">

              <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

Name: <span class="error"><font color="red"> * <?php echo $nameErr;?></font></span>
<input type="text" class="form-control" name="name">

<br><br>
Password:<span class="error"><font color="red">* <?php echo $cidErr;?></font></span>
<input type="password" class="form-control" name="cid">

<br><br>
<span class="error"> <?php echo $notfoundErr;?></span>
<br><br>
<input type="submit" name="submit" value="Submit"> 

<br><br>
</form>
  
   
        </div>
    </div>
    <ul class="pager">
  <li><a href="#">Previous</a></li>
  <li><a href="#">Next</a></li>
</ul>

</div>






</body>
</html>

