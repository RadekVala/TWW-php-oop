<?php

namespace App\Database;

use PDO;
use PDOException;

/**
 * Connection class
 */
class Connection {
    
    private static $instance = null;
       
    /**
     * getInstance
     *
     * @return PDO or false
     */
    public static function getInstance(): PDO|false {
        if(null === self::$instance){
            try {
                //pripojeni k DB 
                //zmenit IP na IP, kde běží DEV server, port zanechat
                self::$instance = new PDO('mysql:host=192.168.224.1:5000;dbname=database_name', 'root', 'i57z9*UIuJQ!');
                //hlaseni chyb DB
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            } catch (PDOException $e){
                //odchytime vyjimku a vypiseme chybu pripojeni
                echo 'Error: '.$e->getMessage();
                return false;
            }
        }

        return self::$instance;

    }
}