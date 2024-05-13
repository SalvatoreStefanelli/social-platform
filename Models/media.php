<?php
class Media {
    public function __construct(public $type, public $path, public $created_at, public $updated_at)
    {
        $this->type = $type;
        $this->path = $path;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }

    public function getType() {
        return $this->type;
    }

    public function getPath() {
        return $this->path;
    }

    public function getCreated_at() {
        return $this->created_at;
    }

    public function getUpdated_at() {
        return $this->updated_at;
    }
}

$media_1 = new Media('photo', 'path/5a984076-6618-4672-b1db-2b38e05b3cf9.jpg', '2024-05-03 09:51:04', NULL);
$media_2 = new Media('video', 'path/be5d5545-0bde-42ea-9534-8949b5913d97.mp4', '2024-05-03 09:51:05', NULL);
var_dump($media_1, $media_2);