<?php
session_start();
class model_records extends model
{
    function get_all()
    {
        
        $result = $this->mysqli->query("SELECT * FROM records");
        $data = array();
        while( $row = $result->fetch_array() ){
        $data[] = $row;
        }
        $result->close();
        
        return $data;
    }

    function get_one($id)
    {
        $result = $this->mysqli->query("SELECT R.ID, R.name as name, R.artist, R.description, R.paperback, R.recordyear, R.releaseyear, R.appearencedate, R.aviability, g.name as genreV, R.price, rt.name as recordstypeV, R.duration  FROM records AS R RIGHT JOIN genre g ON g.ID = R.genre LEFT JOIN recordstype rt ON rt.ID = R.recordstype WHERE R.ID = $id");
        $data = array();
        while( $row = $result->fetch_array() ){
        $data[] = $row;
        }
        $result->close();
        return $data;
    }

    public function insert($name, $artist, $desc, $paperback, $recyear,$relyear, $aviability, $genre, $price, $rtype, $duration)
	{
		$this->mysqli->query("INSERT INTO records (ID, name, artist, description, paperback, recordyear, releaseyear, appearencedate, aviability, genre, price, recordstype, duration)
		VALUES (NULL, $name, $artist, $desc, $paperback, $recyear,$relyear, current_timestamp(), $aviability, $genre, $price, $rtype, $duration)");
	}

    public function update($mail, $sname,$name,$fname,$tnumber,$sa,$st)
    {
        $id = $_SESSION['user']['ID'];
        $this->mysqli->query("UPDATE `users` SET `Email` = $mail, `tnumber` = $tnumber, `Surname` = $sname, `Name` = $name, `FName` = $fname, `ShippingAdress` = $sa, `ShippingType` = $st WHERE users.ID = $id");
    }

    public function delete_record($id)
    {
        $this->mysqli->query("DELETE from `records` WHERE records.ID = $id"); 
    }

    public function edit_record($id)
    {
        $this->mysqli->query("UPDATE `records` SET  WHERE records.ID = $id");
    }

    public function add_cart($data)
    {
        foreach($data as $r)
        $id = $r['ID'];
        $record = $this->mysqli->query("SELECT * FROM `records` WHERE `ID` = $id");
        $data = mysqli_fetch_assoc($record);

            $count = $_SESSION['cart'][$id]['count']; if(empty($count)) $count = 1;
            if($id == $_SESSION['cart'][$id]['id']) $_SESSION['cart'][$id]['count'] = $count+=1; 
        
            $_SESSION['cart'][$id] = [
                "id" => $id,
                "name" => $data['name'],
                "artist" => $data['artist'],
                "paperback" => $data['paperback'],
                "price" => $data['price'],
                "count" => $count,
                "aviability" =>$data['aviability']  
            ];
            header('Location:index.php?action=cart');
    }

    public function drop_cart($data)
    {
        foreach($data as $r)
        $id = $r['ID'];

        unset($_SESSION['cart'][$id]);
        header('Location:index.php?action=cart');
    }

    public function reg($login, $email, $password)
    {
        $this->mysqli->query("INSERT INTO `users` (`ID`, `Login`, `Password`, `Email`, `tnumber`, `Surname`, `Name`, `FName`, `Avatar`, `UsersType`, `RegistrationDate`, `DeletionDate`, `ShippingAdress`, `ShippingType`, `Sex`) VALUES (NULL, $login, $password, $email, '1', 'f', 'f', 'f', 'f', '2', current_timestamp(), '9999-12-30', 'f', 'f', 'f') ");
    }

    public function log($login, $password)
    {
        $checkUser = $this->mysqli->query("SELECT * FROM `users` WHERE `Login` = $login AND `Password` = $password");
        if(mysqli_num_rows($checkUser) > 0)
        {
            $user = mysqli_fetch_assoc($checkUser);
            $_SESSION['user'] = [
                "ID" => $user['ID'],
                "Admin"=>$user['UsersType'],
                "Surname"=>$user['Surname'],
                "Name"=>$user['Name'],
                "FName"=>$user['FName'],
                "tnumber"=>$user['tnumber'],
                "ShippingAdress"=>$user['ShippingAdress'],
                "ShippingType"=>$user['ShippingType'],
                "Email" => $user['Email']
            ];

            //print_r($_SESSION['user']['Email']);

           header('Location:index.php?action=user');
        } else {
            die("Wrong login or password");
        }
    }

    public function deleteAcc()
    {
        $id = $_SESSION['user']['ID'];
        $this->mysqli->query("DELETE FROM `users` WHERE `ID` = $id");
    }
}
?>
<!-- INSERT INTO `records` 
(`ID`, `name`, `artist`, `description`, `paperback`, `recordyear`, `releaseyear`, `appearencedate`, `aviability`, `genre`, `price`, `recordstype`, `duration`) 
VALUES (NULL, 'Queen', 'Queen', 'first album of the famous band', 'folder1', '1986-11-11', '1986-12-12', current_timestamp(), '5', '3', '250.99', '1', '250'); -->