<title>Main | Vinil</title>
<div class="container">
        <div class="row">
<?php
    foreach($data as $record)	
    {
        echo '
        <div class="col-sm-4">
        <a href="index.php?action=short&product='.$record['ID'].'"><img src= "images/'.$record['paperback'].'.jpg" width="150px" height="150px"></a>
            <h3>'.$record['name'].' - '.$record['price'].'$</h3>        
            <p>'.$record['artist'].'</p>
            <p>'.$record['description'].'</p>
            <a href="index.php?action=order&product='.$record['ID'].'">Order</a>
          </div>
          <br>
          
          ';
    }
?>
            </div>
        </div>
        
        <!-- <td>'.$record['recordyear'].'</td>
        <td>'.$record['releaseyear'].'</td>
        <td>'.$record['appearencedate'].'</td>
        <td>'.$record['aviability'].'</td>
        <td>'.$record['genre'].'</td>
        <td>'.$record['price'].'</td>
        <td>'.$record['recordstype'].'</td>
        <td>'.$record['duration'].'</td> -->