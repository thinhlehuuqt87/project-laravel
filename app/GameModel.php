<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GameModel extends Model
{
    private $gamers;

    public function __construct() {
        $this->gamers[] = array("name" => "Chim sẻ đi nắng", "adress" => "Đan Phượng, Hà Tây", "city" => "Hà Nội");
        $this->gamers[] = array("name" => "Hồng Anh", "adress" => "Việt Trì, Phú Thọ", "city" => "Phú Thọ");
        $this->gamers[] = array("name" => "Gunny", "adress" => "Nhổn, Hà Nội", "city" => "Hà Nội");
        $this->gamers[] = array("name" => "Bibi", "adress" => "Hà Nội", "city" => "Hà Nội");
        $this->gamers[] = array("name" => "Văn Sự", "adress" => "Hoằng Hóa, Thanh Hóa", "city" => "Thanh Hóa");
    }

    public function getAllGamers() {
        return $this->gamers;
    }

    public function getGamerByName($gamerName) {
        $key = array_search($gamerName, array_column($this->gamers, 'name'));
        return $this->gamers[$key];
    }

    public function getGamersByCity($cityName) {
        $keys = array_keys(array_column($this->gamers, 'city'), $cityName);
        $cityarray = array();
        foreach ($keys as $value) {
            $cityarray[] = $this->gamers[$value];
        }
        return $cityarray;
    }

    public function addGamer($name, $adress, $city) {
        $this->gamers[] = array("name" => $name, "adress" => $adress, "city" => $city);
    }
}
