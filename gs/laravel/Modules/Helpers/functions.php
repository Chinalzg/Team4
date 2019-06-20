<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/6/12 0012
 * Time: 9:05
 */
function flash_msg($flag,$message){
    session()->flash('err_flash',true);
    session()->flash('err_flash_flag',$flag);
    session()->flash('err_flash_msg',$message);
}