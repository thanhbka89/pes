<?php

namespace App\Http\Controllers;

class WelcomeController extends Controller
{

  public function index()
     {
         //Tạo mảng và gán giá trị
         $lists = array(
           'Laravel 5',
           'PHP',
           'Framework'
         );
         \Log::debug($lists); //Sử dụng hàm debug để hiển thị giá trị trong file log
         return view('welcome'); //Trả về view 'welcome'
    }
    
  public function ddFunction()
     {
         //Khai báo mảng dữ liệu
         $lists = array(
             'Language'=>[
                 'PHP',
                 'Javascript',
                 'HTML',
                 'NodeJS'
             ],
             'Framework'=>[
                 'Laravel 5',
                 'Yii',
                 'Phalcon'
             ]
         );
         dd($lists); //Sử dụng hàm dd để kiểm tra dữ liệu mảng
    }
}
