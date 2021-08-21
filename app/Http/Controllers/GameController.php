<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GameModel;

class GameController extends Controller
{
    private $data;
    private $model;

    public function handle() {
        $this->model = new GameModel();

        // Luôn lấy dữ liệu tất cả các game thủ và đưa vào thuộc tính data
        $this->assign("gamers", $this->model->getAllGamers());

        // Tùy thuộc vào đường dẫn lấy các danh sách game thủ theo bộ lọc
        if (isset($_SERVER['PATH_INFO'])) {
            // Ví dụ: index.php/PageController/getPersonByName/Chim sẻ đi nắng
            // Convert chuỗi ký tự thành mảng, giá trị thứ 2 của mảng chứa action, giá trị thứ 3 chứa thông tin của action
            $pathinfo = explode("/", $_SERVER['PATH_INFO']);

            switch ($pathinfo[2]) {
                case "getGamerByName";
                    // $arr[3]="Chim sẻ đi nắng"
                    $this->getGamerByName(urldecode(trim($pathinfo[3])));
                    break;
                case "getGamersByCity":
                    // $arr[3]="Hà Nội"
                    $this->getGamersByCity(urldecode(trim($pathinfo[3])));
                    break;
                default:
                    $this->display("./View.php");
            }
        } else {
            $this->display("./View.php");
        }
    }

    public function getGamerByName($name) {
        $this->assign("gamer", $this->model->getGamerByName($name));
        $this->display(".fontend/View.php");
    }

    public function getGamersByCity($city) {
        $this->assign("gamersInCities", $this->model->getGamersByCity($city));
        $this->display("./View.php");
    }

    private function assign($key,$value){
        $this->data[$key]=$value;
    }

    private function display($htmlPage){
        extract($this->data);
        include_once $htmlPage;
    }

}
