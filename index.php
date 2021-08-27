<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table><tr>
        <th>id</th>
        <th>name</th>
        <th>age</th>
        <th>salary</th>
        <th>delete</th>
    </tr>
    <?php 
    $pdo  = new PDO('mysql:host=localhost;dbname=worlers;charset=utf8', 'mysql', 'user');
    $pdo ->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if(isset($_GET['del'])){ 
    $del = $_GET['del'];
    $query = "DELETE from workers WHERE id = $del";
    $result2=$pdo->query($query);
      }


    ?>
   
        <?php
        try{
            $pdo  = new PDO('mysql:host=localhost;dbname=worlers;charset=utf8', 'mysql', 'user');
            $pdo ->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * from workers";
            $result = $pdo->query($sql);
             foreach($result as $row){
                 $data .='<tr>';
                 $data .='<td>'.$row['id'].'</td>';
                 $data .='<td>'.$row['name'].'</td>';

                 $data .='<td>'.$row['age'].'</td>';

                 $data .='<td>'.$row['salary'].'</td>';
                 $data .='<td><a href = "?del='.$row['id'].'">удалить</a></td>';
                 $data .='</tr>';
            }
            echo $data;    
        }
        catch(PDOException $e){
            echo 'cannot connect';
        }
        ?>
</table>
</body>
</html>