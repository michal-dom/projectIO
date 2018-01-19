<?php
/**
 * Created by PhpStorm.
 * User: Michał Domagała
 * Date: 2018-01-19
 * Time: 15:35
 */

require_once ('./entities/Entity.php');

abstract class EntityFactory
{
    abstract public function createObject(array $row):Entity;
}