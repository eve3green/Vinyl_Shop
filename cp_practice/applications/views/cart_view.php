
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart | Vinil</title>
</head>
<body>
    <h1>Cart</h1>
        <table>
            
            <?php
                if(isset($_SESSION['cart']))
                { 
                    echo '
                        <tr>
                            <th>Paperback</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Count</th>
                            <th>Total</th>
                            <th></th>
                            <th></th>
                        </tr>
                    ';
                        foreach($_SESSION['cart'] as $item)
                        echo '
                        <tr>
                            <th><img src="images/'.$item['paperback'].'.jpg" width="50px" height="50px"></th>
                            <th>'.$item['name'].'</th>
                            <th>'.$item['price'].'</th>
                            <th>'.$item['count'].'</th>
                            <th>'.$item['count']*$item['price'].'</th>
                            <th><a href="index.php?action=drop&product='.$item['id'].'">Drop from cart </a></th>
                            <th><a href="index.php?action=order&product='.$item['id'].'"> Add one more</a></th>
                        </tr>
                        ';
                    
                    
                } else echo "Cart is empty";
            ?>
        </table>
        <a href="index.php?action=clear">Clear Cart</a>
</body>
</html>

