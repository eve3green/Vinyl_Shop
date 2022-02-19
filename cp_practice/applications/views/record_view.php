<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php foreach($data as $record) echo $record['name']?> | Vinil</title>
</head>
<body>
    <?php
    foreach($data as $record){
        echo  '
        <img src= "images/'.$record['paperback'].'.jpg" width="150px" height="150px">
        <a href="index.php?action=order&product='.$record['ID'].'">Order</a>
        <h1>'.$record['name'].'</h1>
        <p> by '.$record['artist'].'</p>
        <p> Description: '.$record['description'].'</p>
        <p> Year of Record: '.$record['recordyear'].'</p>
        <p> Year of Release: '.$record['releaseyear'].'</p>
        <p> Date of Appearence in Store: '.$record['appearencedate'].'</p>
        <p> Aviability: '.$record['aviability'].'</p>
        <p> Genre: '.$record['genreV'].'</p>
        <p> Price: '.$record['price'].'</p>
        <p> Type of Record: '.$record['recordstypeV'].'</p>
        <p> Duration in seconds: '.$record['duration'].'</p> ';

        if(isset($_SESSION['user']))
        if($_SESSION['user']['Admin'] == 2) echo '<a href="index.php?action=edit&product='.$record['ID'].'">Edit</a> <br> <a href="index.php?action=delete&product='.$record['ID'].'">Delete</a>';
    }
    ?>
</body>
</html>