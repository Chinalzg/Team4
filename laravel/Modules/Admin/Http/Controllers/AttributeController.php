<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Model\Goods;
use App\Http\Requests\StoreBlogPost;

class AttributeController extends Controller
{
    /**
     * Undocumented function
     * 添加属性
     * @return void
     */
    public function attribute()
    {
        $model = new Goods();

        $list = $model->category();

        return view('admin::attribute', ['list'=>$list]);
    }
    /**
     * Undocumented function
     * 添加属性处理方法
     * @return void
     */
    public function attributeCheck(StoreBlogPost $request)
    {
        $validated = $request->validated();
     
        $data = $_POST;
        // var_dump($data);die;
        $model = new Goods();

        $result = $model->attributeCheck($data);

        if($result){

            echo "<script>alert('属性添加成功');location.href='goods';</script>";

        }else{

            echo "<script>alert('属性添加失败')</script>";

        }
    }
    /**
     * Undocumented function
     *添加属性
     * @return void
     */
    public function attributeValue()
    {

        $model = new Goods;

        $list = $model->attributeValue();

        return view('admin::attributeValue', ['list'=>$list]);
    }
    
    public function attributeValueCheck()
    {
        $data = $_POST;

        $model = new Goods;

        $result = $model->attributeValueCheck($data);

        if($result){

            echo "<script>alert('属性值添加成功');location.href='attributeValue';</script>";

        }else{

            echo "<script>alert('属性值添加失败')</script>";

        }
        
    }
    /**
     * Undocumented function
     *属性列表
     * @return void
     */
    public function attributeList()
    {
        $model = new Goods;

        $list = $model->attributeList();

        return view('admin::attributeList', ['list'=>$list]);
    }
    /**
     * Undocumented function
     *属性删除
     * @return void
     */
    public function attributeListDelete()
    {
        $id = $_GET['id'];

        $model = new Goods;

        $result = $model->attributeListDelete($id);

        if($result){

            return 1;

        }else{

            return 0;
            
        }

    }
    /**
     * Undocumented function
     *修改属性
     * @return void
     */
    public function attributeListUpdate()
    {
        $id = $_GET['id'];
        // var_dump($id);die;
        $model = new Goods;

        $result = $model->attributeListUpdatec($id);

        $list = $model->category();

        return view('admin::attributeListUpdate', ['list'=>$list,'result'=>$result]);
    }
    /**
     * Undocumented function
     *修改属性检测
     * @return void
     */
    public function attributeUpdateCheck()
    {
        $data = $_POST;

        $id = $_POST['id'];

        $model = new Goods;

        $result = $model->attributeUpdateCheck($data,$id);
        
        if($result){

            echo "<script>alert('属性修改成功');location.href='attributeList';</script>";

        }else{

            echo "<script>alert('属性修改失败')</script>";

        }
    }
    /**
     * Undocumented function
     *属性值列表
     * @return void
     */
    public function attributeValueList()
    {
        $model = new Goods;

        $list = $model->attributeval();

        return view('admin::attributeValueList', ['list'=>$list]);
    }
    /**
     * Undocumented function
     *属性值删除
     * @return void
     */
    public function attributeValueDelete()
    {
        $id = $_GET['id'];

        $model = new Goods;

        $result = $model->attributeValueDelete($id);

        if($result){

            return 1;

        }else{

            return 0;
            
        }

    }
    /**
     * Undocumented function
     * 属性值修改
     * @return void
     */
    public function attributeValueUpdate()
    {
        $id = $_GET['id'];
        
        $model = new Goods;

        $list = $model->attributeValue();

        $result = $model->attributevalU($id);

        return view('admin::attributeValueUpdate', ['list'=>$list,'result'=>$result]);
    }
    /**
     * Undocumented function
     *属性值修改检测
     * @return void
     */
    public function attributeValueUpdatec()
    {
        $data = $_POST;

        $id = $_POST['id'];
        // var_dump($data);die;

        $model = new Goods;

        $result = $model->attributeValueUpdatec($data,$id);

        if($result){

            echo "<script>alert('属性值修改成功');location.href='attributeValueList';</script>";

        }else{

            echo "<script>alert('属性值修改失败')</script>";

        }
        
    }
}