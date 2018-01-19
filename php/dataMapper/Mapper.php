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
    protected $factory;

    public function __construct(EntityFactory $factory = null){
        $reg = Connection::getInstance();
        $this->pdo = $reg->getPdo();
        $this->factory = $factory;
    }

    public function find(int $id):Entity{
        $this->selectStmt()->execute([$id]);
        $row = $this->selectStmt()->fetch();
        if(!is_array($row)){
            return null;
        }
        $this->selectStmt()->closeCursor();
        if(!isset($row['id'])){
            return null;
        }
        $object = $this->factory->createObject($row);
        return $object;

    }

    public function findAll():Collection{
        $this->selectAllStmt()->execute([]);
        return $this->getCollection($this->selectAllStmt()->fetchAll());
    }


    public function insert(Entity $object){
        $this->doInsert($object);
    }

    abstract protected function selectStmt(): \PDOStatement;
    abstract protected function selectAllStmt(): \PDOStatement;
    abstract protected function getCollection(array $raw): Collection;
    abstract protected function doInsert(Entity $object);
    abstract public function update(Entity $object);
    abstract protected function targetClass():string;

}