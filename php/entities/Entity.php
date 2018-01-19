<?php
/**
 * Created by PhpStorm.
 * User: Michał Domagała
 * Date: 2018-01-19
 * Time: 18:34
 */

abstract class Entity
{
    private $id;

    abstract public function getJson(): string;

    public function setId(int $id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    public function getClass():string {
        return self::class;
    }

}