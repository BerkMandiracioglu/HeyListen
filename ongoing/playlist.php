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
            <li ><a href="#">Songs</a></li>
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
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> </a></li>
            <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
        </ul>
    </div>
</nav>
<div class="container">

    <h1><?php echo $_GET['name']; ?></h1>
    <br>
    <h2>Creator: <?php echo $_GET['creator']; ?></h2>

    <br>
		<div class="dropdown">
		<span class="glyphicon glyphicon-lock dropdown-toggle" data-toggle="dropdown"> Make private</span>
			<ul class="dropdown-menu">
			<li><form >
			<div class="container top7">
                    <label class="radio-inline"><input type="radio" name="radio">Private</label>
                    <label class="radio-inline"><input type="radio" name="radio">Public</label>
            </div>
			</form></li>
			</ul>
		</div>
    </br>
	<br>
    <form>
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Filter" name="filter">
            <div class="input-group-btn">
                <button class="btn btn-default" type="submit">
                    <i class="glyphicon glyphicon-search"></i>
                </button>
            </div>
        </div>
    </form>
    </br>


    <table class="table table-hover">
        <thead>
        <tr>
            <th>Title</th>
            <th>Artist / Band</th>
            <th>Album</th>
			

            <th><span class="glyphicon glyphicon-time"></span></th>
            <th>Price</th>

        </tr>
        </thead>
        <tbody>
			<?php
				$query = "select
						  t.name as title,
						  D.name as artistname,
						  B.name as albumname,
						  t.duration,
						  t.price
						from
						  song_album A,
						  items B,
						  has_Song C,
						  artist D,
						  (
							select
							  I.name,
							  S.duration,
							  S.ID,
							  I.price
							from
							  playlist_includes P,
							  song S,
							  items I
							where
							  I.ID = S.ID
							  and P.songID = S.ID
							  and P.username = '".$_SESSION['name']."'
							  and P.name = '".$_GET['name']."' 
						  ) t
						where
						  t.ID = A.songID
						  and B.ID = A.albumID
						  and C.songID = t.ID
						  and D.ID = C.artistID";
				$resultOfQuery = mysqli_query($database, $query);
				while( $row = mysqli_fetch_assoc($resultOfQuery) )
				{ ?> 
					<tr> 
					<td><?php echo $row['title']; ?></td>
					<td><?php echo $row['artistname']; ?></td>
					<td><?php echo $row['albumname']; ?></td>
					<td><?php echo $row['duration']; ?></td>

			
						<td><div class="dropdown">
					<span class="glyphicon glyphicon-shopping-cart dropdown-toggle" data-toggle="dropdown"> <?php echo $row['price']; ?>$</span>
					<ul class="dropdown-menu">
						<li><form >
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Name:" name="credit">
							<div class="input-group-btn">
								<button class="btn btn-default" type="submit">
									<i class="glyphicon glyphicon-tags"></i>
								</button>
							</div>
						</div>
					</form></li>
						<li><form >
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Credit-Card No:" name="credit">
								<div class="input-group-btn">
									<button class="btn btn-default" type="submit">
										<i class="glyphicon glyphicon-credit-card"></i>
									</button>
								</div>
							</div>
						</form></li>
						<li><form >
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Expiration Date:" name="credit">
								<div class="input-group-btn">
									<button class="btn btn-default" type="submit">
										<i class="glyphicon glyphicon-calendar"></i>
									</button>
								</div>
							</div>
						</form></li>
						<li><form >
							<div class="input-group">
								<input type="text" class="form-control" placeholder="CVC No:" name="credit">
								<div class="input-group-btn">
									<button class="btn btn-default" type="submit">
										<i class="glyphicon glyphicon-barcode"></i>
									</button>
								</div>
							</div>
						</form></li>
						<li><button type="button" class="btn btn-default">Submit</button></li>
					</ul>
				</div>
				</td>
					<td>
						<div class="dropdown">
							<span class="glyphicon glyphicon-option-horizontal dropdown-toggle" data-toggle="dropdown"></span>

							<ul class="dropdown-menu">
								<li><a href="#">View Artist / Band</a></li>
								<li><a href="#">View Album</a></li>
								<li><a href="#">Add to Playlist</a></li>
								<li><a href="#">Remove <span class="glyphicon glyphicon-share "></span></a> </li>
								<li><a href="#">Share <span class="glyphicon glyphicon-share "></span></a> </li>
								<li><a href="#">Share in Group <span class="glyphicon glyphicon-share "></span></a> </li>
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