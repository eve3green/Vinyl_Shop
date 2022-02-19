<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cabinet | Vinil</title>
</head>
<body>
        <?php
        if(!isset($_SESSION['user'])){
            header('Location:index.php?action=log');
        }

        if($_SESSION['user']['Admin'] == 2) echo 'Hello admin '.$_SESSION['user']['Name'].' - <a href="index.php?action=new">Add new record to the list</a><br>';
        ?>
        <h2>All changes will be saved after logout!</h2>
    <form action="" method="post">
        <label for="mail">E-Mail - </label> <input type="text" name="mail" value="<?php echo $_SESSION['user']['Email']; ?>"> <br>
        <label for="sname">Surname - </label> <input type="text" name="sname" value="<?php echo $_SESSION['user']['Surname']; ?>"><br>
        <label for="name">Name - </label> <input type="text" name="name" value="<?php echo $_SESSION['user']['Name']; ?>"><br>
        <label for="fname">Father`s Name - </label> <input type="text" name="fname" value="<?php echo $_SESSION['user']['FName']; ?>"><br>
        <label for="tnumber">Telephone Number - </label> <input type="text" name="tnumber" value="<?php echo $_SESSION['user']['tnumber']; ?>"><br>
        <label for="sa">Shipping Adress - </label> <input type="text" name="sa" value="<?php echo $_SESSION['user']['ShippingAdress']; ?>"><br>
        <label for="st">Shipping Type - </label> 
        <select name="st" value="<?php echo $_SESSION['user']['ShippingType']; ?>">
        <option value="Home Shipping">Home Shipping</option>
        <option value="By yourself">By yourself</option>
        <option value="Local Post Office">Local Post Office</option>
        <br>
        <input type="hidden" name="form-submitted" value="1" />
        <p></p> <input type="submit" value="Update"></p>
    </form>

    <a href="index.php?action=logout">LogOut</a> </br>
    <a href="index.php?action=deleteacc">DELETE ACCOUNT</a>

</body>
</html>
