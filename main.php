<?php
require_once __DIR__ . '/Helpers/DB.php';

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

require_once __DIR__ . '/Models/post.php';
require_once __DIR__ . '/Models/media.php';

$media_1 = new Media('photo', 'path/5a984076-6618-4672-b1db-2b38e05b3cf9.jpg', '2024-05-03 09:51:04', NULL);
$media_2 = new Media('video', 'path/be5d5545-0bde-42ea-9534-8949b5913d97.mp4', '2024-05-03 09:51:05', NULL);

$post_1 = new Post('Finalmente si parte! Destinazione vacanze', '2022-11-02 01:55:02', '["mare", "estate", "vacanze", "relax", "spiaggia"]', '2024-05-03 09:50:53', NULL, [$media_1, $media_2]);
$post_2 = new Post('Una giornata di sole sulla spiaggia', '2022-09-15 08:25:46', '["mare", "sole", "spiaggia", "relax"]', '2024-05-03 09:50:53', NULL, [$media_1]);

$posts = [$post_1, $post_2];    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <?php foreach($posts as $post) : ?>
        <div class="container">
            <h2> <?= $post->getTitle() ?> </h2>
            <h3> <?= $tags->getTags() ?> </h3>
            <h4> <?= $created_at->getCreated_at() ?> </h4> 
            <p> <?= $media->getMedia->getType() ?>, <?= $media->getMedia->getPath() ?> </p>   
        </div>
        <?php endforeach; ?>
</body>
</html>

