<?php

	include_once('server.php'); 
	session_start();

	$query = "select name,time from playlist where username='".$_SESSION['name']."'";   
	$resultOfQuery = mysqli_query($database, $query);
	
	
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">HeyListen</a>
        </div>
        <ul class="nav navbar-nav">
            <li ><a href="#">Main Page</a></li>
            <li >

                <a href="#">Discover</a>
            </li>
            <li><a href="#">Songs</a></li>
            <li><a href="#">Albums</a></li>
            <li><a href="#">PlayLists</a></li>


        </ul>
        <form class="navbar-form navbar-left" action="/action_page.php">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search" name="search">
                <div class="input-group-btn">
                    <button class="btn btn-default" type="submit">
                        <i class="glyphicon glyphicon-music"></i>
                    </button>
                </div>
            </div>
        </form>
        <ul class="nav navbar-nav navbar-right">
            <li ><a href="#"><span class="glyphicon glyphicon-user"></span> </a></li>
            <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
        </ul>
    </div>
</nav>
<div class="container">

    <h1>İrem Ural</h1>
    <br>
    <div class="btn-group">
        <button type="button" class="btn btn-primary">Invite</button>
        <button type="button" class="btn btn-success">Follow <span class="glyphicon glyphicon-send "></span></button>

    </div>
    <br>
    <ul class="nav nav-tabs">
        <li><a href="http://dijkstra.ug.bcc.bilkent.edu.tr/~iremural/deneme/overview.php">Overview</a></li>
        <li><a href="http://dijkstra.ug.bcc.bilkent.edu.tr/~iremural/deneme/playlists.php">Playlists</a></li>
        <li><a href="#">Groups</a></li>
        <li class="active"><a href="#">Following</a></li>
        <li><a href="http://dijkstra.ug.bcc.bilkent.edu.tr/~iremural/deneme/follower.php">Follower</a></li>
    </ul>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Username <span class="glyphicon glyphicon-user"></span></th>
            <th></th>

        </tr>
        </thead>
        <tbody>
		<?php
					$query = "select followed_id from follow_user where follower_id='".$_SESSION['name']."'";   
					$query = "select followed_id from follow_user where follower_id='".$_SESSION['name']."'";   
					$resultOfQuery = mysqli_query($database, $query);
					while( $row = mysqli_fetch_assoc($resultOfQuery) )
					{ ?>		
						<tr> 
							<td><?php echo $row['followed_id']; ?></td>
							<td>
							<div class="dropdown">
							<span class="glyphicon glyphicon-option-horizontal dropdown-toggle" data-toggle="dropdown"></span>

								<ul class="dropdown-menu">
									<li><a href="#">Follow <span class="glyphicon glyphicon-send "></span></a></li>
	
								</ul>
							</div>
							</td>
						</tr>
				<?php } ?>
	

        </tbody>
    </table>
</div>
</body>
</html>