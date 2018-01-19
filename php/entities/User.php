<?php
/**
 * Created by PhpStorm.
 * User: Michał Domagała
 * Date: 2018-01-19
 * Time: 15:41
 */

class User extends Entity{

    private $id_user;
    private $login;
    private $password;

    public function __construct(int $id, string $login, string $password){
        $this->id_user = $id;
        $this->login = $login;
        $this->password = $password;
    }


    public function getJson(): string
    {
        // TODO: Implement getJson() method.
        $struct = array(
            "id" => $this->id_user,
            "login" => $this->login,
            "password" => $this->password
        );
        return json_encode($struct);
    }
}