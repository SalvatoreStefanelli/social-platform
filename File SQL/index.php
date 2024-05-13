<?php 
require_once __DIR__ . '/../env.php';
require_once __DIR__ . '/../Helpers/DB.php';

define('DB_SERVERNAME', 'localhost:3306');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'social-platform');
$connection = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME); 

if($connection && $connection->connect_error) {     
    echo 'Database Connection Railed'; 
    die;} 
    
//var_dump($connection);

$sql = "SELECT `users`.`id`, `users`.`username`, COUNT(`likes`.`user_id`) AS `numb_likes_received`
        FROM `users` 
        LEFT JOIN `likes` ON `users`.`id` = `likes`.`user_id` 
        GROUP BY `users`.`id`, `users`.`username`
        ORDER BY `numb_likes_received` DESC";

    $result = $connection->query($sql);
    //var_dump($result); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social-platform</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body class="bg-primary">

    <div class="container p-5">

        <h1 class="d-flex justify-content-center text-light">USERS WITH THE NUMBER OF LIKES RECEIVED</h1>
        
        <?php            
            if ($result->num_rows > 0) :

                while ($row = $result->fetch_assoc()) : ?>            
                    
                <div class="row">
                    <div class="col-6 pe-1 col-6 text-center text-warning"><?= $row['username'] ?></div>
                    <div class="col-6"><?= $row['numb_likes_received'] ?> <span>&#128077;</span>
                    </div>                    
                </div>
                

                <?php endwhile;
            endif; ?>

    </div>


</body>
</html>





