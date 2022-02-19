<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="styles/style.css">

</head>
<body class="primary">
<div class="container secondary"> 
        <div class="row align-items-center">
            <div class="jumbotron col" >
                <h1>Spinning Records</h1>
                <p>Records in old fashioned paperbacks</p> 
            </div>
            <div class="col-6" >
				<a href="index.php"><img src="images/spinning.gif" class="rounded mx-auto d-block" alt="" width="200px" height="200px"></a>
            </div>
            <div class="col" >
              <ul>
                <li><a href="index.php?action=log">Login/Register</a></li>
                <li><a href="index.php?action=cart">Cart</a></li>
                <li><a href="index.php?action=user">Profile</a></li>
                <li><a href="index.php?action=logout">Logout</a></li>
              </ul>
          </div>
        </div>
    </div>

<hr>

<?php include 'applications/views/'.$content_view; ?>
<div class="footer">
			<div class="container">
				<div class="row">
        <p class="pull-left">Copyright © 2022 Грабовський_КП All rights reserved.</p>
				</div>
			</div>
		</div>
</body>
</html>