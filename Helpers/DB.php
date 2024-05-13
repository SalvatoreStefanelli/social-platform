<?php
require_once __DIR__ . '/../env.php';

class DB
{
    public static function connect()
    {
        $connection = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME); 

        if($connection && $connection->connect_error) { 
                 echo 'Database Connection Railed'; 
                 die;
        }
        
        return $connection;
    }

    public static function close_connection($connection)
    {
      $connection->close();
    }
}