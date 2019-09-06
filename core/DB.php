<?php
/**
 * Created by PhpStorm.
 * User: asperapablo
 * Date: 06/09/19
 * Time: 11:30
 */

class DB {
    protected $db;
    private $dbHost = 'localhost';
    private $dbName = 'mercado';
    private $dbUser = 'postgres';
    private $dbPass = 'postgres';

    public function __construct()
    {
        try{
            $this->db = new PDO("pgsql:dbname=$this->dbName;
                           host=$this->dbHost;
                           user=$this->dbUser;
                           password=$this->dbPass");

            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch (\PDOException $e){
            echo $e->getMessage();
            die();
        }
    }

    protected function exec($sql)
    {
        try{
            $stmt = $this->db->prepare($sql);
            return $stmt->execute();
        }catch (\PDOException $e){
            echo $e->getMessage();
            die();
        }
    }

    protected function select($sql, $multiple = true)
    {
        try{
            $stmt = $this->db->prepare($sql);
            $stmt->execute();

            if($multiple){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }else{
                return $stmt->fetch(PDO::FETCH_ASSOC);
            }
        }catch (\PDOException $e){
            echo $e->getMessage();
            die();
        }
    }
}