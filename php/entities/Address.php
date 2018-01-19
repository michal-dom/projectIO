<?php
/**
 * Created by PhpStorm.
 * User: Michał Domagała
 * Date: 2018-01-19
 * Time: 20:35
 */

class Address extends Entity
{

    private $id_address;
    private $country;
    private $voivodeship;
    private $city;
    private $district;
    private $street;
    private $number;
    private $coords;

    public function __construct(int $id_address, string $country, string $voivodeship,
                                string $city, string $district, string $street, int $number, Coordinates $coords){
        $this->id_address = $id_address;
        $this->country = $country;
        $this->voivodeship = $voivodeship;
        $this->city = $city;
        $this->district = $district;
        $this->street = $street;
        $this->number = $number;
        $this->coords = $coords;
    }


    public function getJson(): string{
        // TODO: Implement getJson() method.
        $struct = array(
            "id" => $this->id_address,
            "country" => $this->country,
            "voivodeship" => $this->voivodeship,
            "city" => $this->city,
            "district" => $this->district,
            "street" => $this->street,
            "number" => $this->number,
            "coords" => $this->coords
        );
        return json_encode($struct);

    }


}