<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function checkRole(){
        echo "<br>2. MainController@checkRole";
        echo "<br> Main Controller: checkRole function";
        echo "<br> Thuc hien sau khi qua bo loc Middleware va truoc khi gui HTTP response";
    }
    public function showNews($news_string_id){
        $news_id_arr =  explode('-', $news_string_id);
        $news_id    = end($news_id_arr);
        $news_title  =   'Baif viet laravel voi ID la '.$news_id;
       return view('fontend.news-detail')->with(['news_id'=> $news_id, 'news_title'=>$news_title]);
    }
    public function getUserInfo(Request $request){
        $ip_address = $request->ip();
        echo '<br>Địa chỉ IP người dùng: ' . $ip_address;

        $server_address = $request->server('SERVER_ADDR');
        echo '<br>Địa chỉ IP máy chủ: ' . $server_address;

        $url_referer = $request->server('URL_REFERER');
        echo '<br>Đường dẫn xuất phát: ' . $url_referer;

        $user_agent = $request->header('User-Agent');
        echo '<br> Thông tin về trình duyệt:' . $user_agent;
    }
}
