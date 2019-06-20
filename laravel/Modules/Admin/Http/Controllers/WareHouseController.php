<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Admin\Model\House;
use Modules\Admin\Http\Requests\StoreBlogPost;
class WareHouseController extends Controller
{
  public function house()
  {
      $key = $_POST['key'] ?? '';

      if ($key){

          $house = new House();

          $data = $house -> houseSelect($key);

          return view('admin::house' , ['data' => $data]);
      }else{
          $house = new House();

          $data = $house -> house();

          return view('admin::house' , ['data' => $data]);
      }

  }

  public function houseCreate()
  {
          $house = new House();

          $data = $house -> china();

          return view('admin::houseCreate' , ['data' => $data]);

  }

  public function houseSave()
  {
      if ($_POST) {

          $data = $_POST;
       
          

          $house = new House();

          $data = $house->houseInsert($data);
        
          if ($data) {
              return redirect('admin/house');

          } else {

              echo "添加失败";
          }
      }
  }

  public function houseShow()
  {
      $id = $_GET['id'];

      $house = new House();

      $data = $house -> houseShow($id);

       if ($data == '此仓库未启用')
       {
        echo "<script>alert('此仓库未启用');history.back();</script>";

       }else{

           return view('admin::houseshow' ,['data' => $data]);
       }

  }



  public function houseUpdate()
  {
      if ($_POST)
      {
          $data = $_POST;

          $house = new House();

          $res = $house -> houseUpdate($data);

          if (!$res)
          {
             return redirect('admin/house');

          }else{
              echo 2;
          }

      }else{

          $id = $_GET['id'];

          $house = new House();

          $data = $house -> houses();

          $res = $house -> houseFind($id);

          return view('admin::houseUpdate' , ['data' => $data , 'res' => $res]);
      }


  }

  public function houseNumber()
  {
      $data = $_GET;

      $house = new House();

      $data = $house -> houseNumber($data);

      return $data;

  }

  public function houseStop()
  {
      $house = new House();

      $data = $house -> houseStop();

     return view('admin::housestop' , ['data' => $data]);
  }

  public function houseStatusUpdate()
  {
       $id = $_GET['id'];

      $house = new House();

      $house -> statusUpdate($id);

      return "已启用";
  }

    public function houseStatusUpdates()
    {
        $id = $_GET['id'];

        $house = new House();

        $house -> statusUpdates($id);

        return "已停用";
    }

    public function houseDelete()
    {
        $id = $_GET['id'];

        $house = new House();

        $house -> houseDelete($id);

        return "已删除";
    }

}