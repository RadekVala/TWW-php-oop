<?php

namespace App\Models;

use PDO;
use PDOException;
use App\Database\Connection;

class Contact {
    
    /**
     * ORM promenne, vlastnosti tridy
     */
    private $id;
    private $name;
    private $surname;
    private $email;
    private $phone;
    private $mobile;
    private $address;

      
    /**
     * __get ziskani vlastnosti objektu napr.: $instance->Surname
     *
     * @param  mixed $strName
     * @return void
     */
    public function __get($strName){

        switch ($strName) {
            case 'Id':
                return $this->id;
                break;

            case 'Name':
                return $this->name;
                break;

            case 'Surname':
                return $this->surname;
                break;

            case 'Email':
                return $this->email;
                break;
        }
    }

    //setter - nastaveni vlastnosti objektu    
    /**
     * __set - nastaveni vlastnosti objektu, napr.: $instance->Email = 'example@test.com'   
     *
     * @param  mixed $strName
     * @param  mixed $mixValue
     * @return void
     */
    public function __set($strName, $mixValue){

        switch($strName){

            case 'Name':
                $this->name = $mixValue;
                break;

            case 'Surname':
                $this->surname = $mixValue;
                break;

            case 'Email':
                $this->email = $mixValue;
                break;
        }

    }
    
    /**
     * delete - maze existujici instanci z DB
     *
     * @return bool
     */
    public function delete(): bool {

        //ziska objekt pro pripojeni k DB
        $db = Connection::getInstance();

        //maze instanci
        $stmt = $db->prepare('DELETE FROM contacts WHERE id=:id');

        if ($stmt->execute(array(':id'=>$this->id))){
            return true;
        }
        return false;

    }
    
    /**
     * load- nacte jeden radek z databaze a namapuje na tridu Contact, vytvori tedy jeji realnou instanci
     *
     * @param  mixed $intId
     * @return Contact|null
     */    
    
    public static function load(int $intId): self|null {

        //ziska objekt pro pripojeni k DB
        $db = Connection::getInstance();

        //statement - dotaz nad DB
        $stmt = $db->prepare('SELECT * FROM contacts WHERE id = :id');
        $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);
        //provedeme pripraveny dotaz
        $stmt->execute(array(':id' => $intId));

        $instance = $stmt->fetch();
        if(!$instance) {
            return null;
        } 
        return $instance;
    }

        
    /**
     * loadAll - nacte všechny kontakty z DB tabulky, vrati formou pole
     *
     * @return array
     */
    public static function loadAll() : array{

        //ziska objekt pro pripojeni k DB
        $db = Connection::getInstance();

        //pole pro objekty
        $arrObjects = []; // array()

        $stmt = $db->query('SELECT * FROM contacts');
        // ORM - object relation mapping
        $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);

        while($Contact = $stmt->fetch()){
            array_push($arrObjects, $Contact);
        }

        return $arrObjects;
    }
    
    /**
     * save - ulozi instanci perzistentne do DB
     *
     * @return int
     */
    public function save(): int {
         //ziska objekt pro pripojeni k DB
         $db = Connection::getInstance();

        try {
            $stmt = $db->prepare('INSERT INTO contacts (name, surname, email, phone, mobile, address) VALUES (:name,:surname,:email,:phone,:mobile,:address)');
            $stmt->execute(array(
                ':name' => $this->name,
                ':surname' => $this->surname,
                ':email' => $this->email,
                ':phone' => $this->phone,
                ':mobile' => $this->mobil,                    
                ':address' => $this->address
             ));

            return $db->lastInsertId();

        } catch (PDOException $e){
            echo 'Error: '.$e->getMessage();
        }

    }
}