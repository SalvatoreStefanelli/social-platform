<?php
class Post
{
    public function __construct(public $title, public $date, public $tags, public $created_at, public $updated_at, public $media = [])
    {
        $this->title = $title;
        $this->date = $date;
        $this->tags = $tags;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
        $this->media = $media;
    }

    public function getTitle() {
        return $this->date;
    }

    public function getDate() {
        return $this->date;
    }

    public function getTags() {
        return $this->tags;
    }

    public function getCreated_at() {
        return $this->created_at;
    }

    public function getUpdated_at() {
        return $this->updated_at;
    }

    public function getMedia() {
        return $this->media;
    }
}

$post = new Post('Finalmente si parte! Destinazione vacanze', '2022-11-02 01:55:02', '["mare", "estate", "vacanze", "relax", "spiaggia"]', '2024-05-03 09:50:53', NULL, '[$media_1, $media_2]');
var_dump($post);
?>
