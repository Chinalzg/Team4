<?php
/**
 * Created by PhpStorm.
 * User: 贾鑫晨
 * Date: 2019/5/28
 * Time: 11:33
 */

/**
 * 为API接口注册Uri
 */

//用户换取Token码
Route::resource("getToken",   "api/Basic");


//用户登录
Route::rule("user", "api/Login/doLogin", "POST");
//查询某一用户信息
Route::rule("user/:Appid/:token/:user_id", "api/User/oneUser", "GET");
//关注用户
Route::rule("user", "api/User/attenUser",   "PUT");
//取消关注用户
Route::rule("user", "api/User/unattenUser", "DELETE");
//查询某用户关注的用户的数量
Route::rule("user", "api/User/attenNums",   "PATCH");
//查询某用户被关注的数量(有多少粉丝)
Route::rule('fans/:Appid/:token/:user_id', "api/User/fansNums",    "GET");


//获取文章数据
Route::rule("article/:Appid/:token/:page/:nums/:cateid",    "api/Article/getArticle",   "GET");
//添加文章
Route::rule("article",    "api/Article/addArticle",   "POST");
//更新文章信息
Route::rule("article",  "api/Article/updateArticle",    "PUT");
//删除文章
Route::rule("article",  "api/Article/deleteArticle",    "DELETE");
//审核文章
Route::rule("article",  "api/Article/checkArticle",     "PATCH");


//获取评论信息
Route::rule("comm/:Appid/:token/:article_id/:nums", "api/Comm/getComm", "GET");
//发表评论
Route::rule("comm", "api/Comm/addComm", "POST");

//上传友情链接
Route::rule("link",   "api/Link/addLink", "POST");
//删除友情链接
Route::rule('link', "api/Link/deleteLink",  "DELETE");
//获取友情链接分页
Route::rule("link/:Appid/:token/:page/:nums", "api/Link/getLink", "GET");

//查询分类信息
Route::rule("cate/:Appid/:token", "api/Cate/getCate", "GET");

//发送验证码
Route::rule("sendnode/:user_phone","api/User/sendNote","GET");

//注册接口
Route::rule("account","api/User/account","POST");
//获取个人的博文
Route::rule('person_article/:Appid/:token/:user_id',"api/Article/personArtice","GET");