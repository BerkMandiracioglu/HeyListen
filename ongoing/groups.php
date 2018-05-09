<?php
	include_once('server.php');
	session_start();
	
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
<div class="alert alert-success">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>Success!</strong>
    <form>
        <div class="input-group">

            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input id="grup" type="text" class="form-control" name="email" placeholder="Group-Name">
        </div>

    </form>
</div>
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

    <h1>Ýrem Ural</h1>
    <br>
    <div class="btn-group">
        <button type="button" class="btn btn-primary">Invite</button>
        <button type="button" class="btn btn-success">Follow <span class="glyphicon glyphicon-send "></span></button>

    </div>
    <br>
    <ul class="nav nav-tabs">
        <li><a href="http://dijkstra.ug.bcc.bilkent.edu.tr/~arkin.yilmaz/DB/overview.php">Overview</a></li>
        <li ><a href="http://dijkstra.ug.bcc.bilkent.edu.tr/~arkin.yilmaz/DB/playlists.php">Playlists</a></li>
        <li class="active"><a href="http://dijkstra.ug.bcc.bilkent.edu.tr/~arkin.yilmaz/DB/following.php">Groups</a></li>
        <li ><a href="http://dijkstra.ug.bcc.bilkent.edu.tr/~arkin.yilmaz/DB/following.php">Following</a></li>
        <li><a href="http://dijkstra.ug.bcc.bilkent.edu.tr/~arkin.yilmaz/DB/follower.php">Follower</a></li>
    </ul>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Name </th>
            <th>Admin </th>
            <th> <span class="glyphicon glyphicon-plus dropdown-toggle" data-toggle="dropdown"> Create Group</span></th>

        </tr>
        </thead>
        <tbody>
        
            <?php
			$query = "(select g1.ID, g1.name, g1.admin
					  from groups g1
					  where g1.admin = '".$_SESSION['name']."')
					  union
					  (select g2.ID, g2.name, g2.admin
					  from invite_user m, groups g2
					  where m.receiver = '".$_SESSION['name']."'
					  and m.groupID = g2.ID
					  and m.decision = 1)";
			$resultOfQuery = mysqli_query($database, $query);
			while( $row = mysqli_fetch_assoc($resultOfQuery) )
			{ ?> 
			<tr> 
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['admin']; ?></td>

			<td>
			<div class="dropdown">
			<span class="glyphicon glyphicon-option-horizontal dropdown-toggle" data-toggle="dropdown"></span>

			<ul class="dropdown-menu">
			<li><a href="#">View Playlist <span class="glyphicon glyphicon-fire "></span></a></li>
			<li><a href="#">Share <span class="glyphicon glyphicon-fire "></span></a></li>
			<li><a href="#">Share in Group <span class="glyphicon glyphicon-fire "></span></a></li>
			<li><a href="#">Delete <span class="glyphicon glyphicon-fire "></span></a></li>
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