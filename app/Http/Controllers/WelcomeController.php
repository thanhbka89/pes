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

  public function collect($value='')
  {
    //$exampleArray = ['php', 'java', 'ruby', 'ios'];
    $exampleArray = [
        [
            'place_name' => 'example name_1',
            'distance' => 500
        ],
        [
            'place_name' => 'example name_2',
            'distance' => 400
        ],
        [
            'place_name' => 'example name_3',
            'distance' => 300
        ],
        [
            'place_name' => 'example name_4',
            'distance' => 600
        ]
    ];
    $collection = collect($exampleArray);
    $result = $collection->filter(function ($val, $key) {
        return $val['distance'] <= 500;
    });

    var_dump($result);
    die;

    return $collection;
  }

  public function exception($value='')
  {
      try {
          echo $this->inverse(5) . '<br/>';
          echo $this->inverse(0) . '<br/>';
      } catch (\Exception $e) {
          echo 'Caught exception: ',  $e->getMessage(), '<br/>';
      }

      // Continue execution
      echo "Hello World\n";
  }

  public function inverse($value='')
  {
    if (!$value) {
        throw new \Exception('Division by zero.');
    }
    return 1/$value;
  }

}
