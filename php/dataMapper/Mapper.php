<?php
/**
 * Created by PhpStorm.
 * User: Michał Domagała
 * Date: 2018-01-17
 * Time: 08:26
 */
require_once ('Connection.php');
require_once ('./entities/Entity.php');


abstract class Mapper{
    protected $pdo;

    public function __construct(){
        $reg = Connection::getInstance();
        $this->pdo = $reg->getPdo();
    }

    public function find(int $id):Entity{
        $this->selectStmt()->execute([$id]);
        $row = $this->selectStmt()->fetch();
        if(is_array($row)){
            return null;
        }
        $this->selectStmt()->closeCursor();
        if(!isset($row['id'])){
            return null;
        }
        $object = $this->createObject($row);
        return $object;

    }

    public function createObject(array $row): Entity{
        $object = $this->doCreateObject($row);
        return $object;
    }

    public function insert(Entity $object){
        $this->doInsert($object);
    }

    abstract protected function selectStmt(): \PDOStatement;
    abstract protected function doCreateObject(array $row): Entity;
    abstract protected function doInsert(Entity $object);
    abstract public function update(Entity $object);
    abstract protected function targetClass():string ;

}