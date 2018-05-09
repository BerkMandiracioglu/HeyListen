<?php

	include_once('server.php'); 
	session_start();

	
	if( isset( $_POST['registerbutton']) )
	{
		
	}	
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
            <li class="active"><a href="#"><span class="glyphicon glyphicon-user"></span> </a></li>
            <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
        </ul>
    </div>
</nav>

<!-- Left-aligned -->


<div class="container">
    <h1>Your Profile</h1>
    <br>
    <div class="dropdown">
        <span class="glyphicon glyphicon-cog dropdown-toggle" data-toggle="dropdown"> Privacy Settings</span>
        <ul class="dropdown-menu">
            <li><form >
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Enter Username:" name="credit">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit">
                            <i class="glyphicon glyphicon-ok"></i>
                        </button>
                    </div>
                </div>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Old Password:" name="credit">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit">
                            <i class="glyphicon glyphicon-ok"></i>
                        </button>
                    </div>
                </div>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="New Password:" name="credit">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit">
                            <i class="glyphicon glyphicon-ok"></i>
                        </button>
                    </div>
                </div>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Confirm New Password:" name="credit">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit">
                            <i class="glyphicon glyphicon-ok"></i>
                        </button>
                    </div>
                </div>
            <li><button type="button" class="btn btn-default">Update Password</button></li>
                <span class="glyphicon glyphicon-lock ">
                    <label class="checkbox-inline"><input type="checkbox" value="">Private</label>
                    <label class="checkbox-inline"><input type="checkbox" value="">Public</label>
                </span>
            </form>
            </li>
        </ul>
    </div>

    <br>
    <ul class="nav nav-tabs">

        <li class="active"><a href="#">Overview</a></li>
        <li><a href="http://dijkstra.ug.bcc.bilkent.edu.tr/~iremural/deneme/playlists.php">Playlists</a></li>
        <li><a href="#">Groups</a></li>
        <li ><a href="http://dijkstra.ug.bcc.bilkent.edu.tr/~iremural/deneme/following.php">Following</a></li>
        <li><a href="http://dijkstra.ug.bcc.bilkent.edu.tr/~iremural/deneme/follower.php">Follower</a></li>
    </ul>
    <h2>Your Activity</h2>
    <br>

    <!-- Left-aligned media object -->
    <div class="container-fluid"  >
        <div class = "row">
            <div class="col-sm-3">
                <img src="welcomeImage.jpg" style="width:100%">
            </div>

            <div class="col-sm-9">
                <h4 class="media-heading">You followed Arkın</h4>

            </div>

        </div>

    </div>


    <hr>

    <!-- Right-aligned media object -->



    <div class="container-fluid"  >


        <div class = "row">
            <div class="col-sm-3">
                <img src="Get_Lucky.jpg"  style="width:100%">
            </div>


            <div class="col-sm-9">
                <h4 class="media-heading">You shared Get Lucky</h4>
                <table class="table table-hover">
                    <thead>
                    <tr>

                        <th>Title</th>
                        <th>Artist / Band</th>
                        <th>Album</th>
                        <th></th>
                        <th><span class="glyphicon glyphicon-time"></span></th>

                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Get Lucky</td>
                        <td>Daft Punk</td>
                        <td>Get Lucky</td>
                        <td><div class="dropdown">
                            <span class="glyphicon glyphicon-shopping-cart dropdown-toggle" data-toggle="dropdown"> 2$</span>
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
                            <div class="dropup">
                                <span class="glyphicon glyphicon-option-horizontal dropdown-toggle" data-toggle="dropdown"></span>

                                <ul class="dropdown-menu">
                                    <li><a href="#">View Artist / Band</a></li>
                                    <li><a href="#">View Album</a></li>
                                    <li><a href="#">Add to Playlist</a></li>
                                    <li><a href="#">Share <span class="glyphicon glyphicon-share "></span></a> </li>
                                </ul>
                            </div>
                        </td>
                        <td>4.01</td>


                    </tr>
                    </tbody>
                </table>
                <span class="glyphicon glyphicon-thumbs-up"></span>
                <span class="glyphicon glyphicon-thumbs-up"></span>
                <span class="glyphicon glyphicon-thumbs-down"></span>
                <span class="glyphicon glyphicon-comment"></span>




            </div>

        </div>




    </div>

</div>



</body>
</html>