<?php
/**********************************
 * Created by PhpStorm
 * User: funny
 * Date: 2016/2/15
 * Time: 15:52
 */
require('weixin_base_api.php');

define("TOKEN",'weixin');

$wechat=new Wechat_base_api();

if(!isset($_GET['echostr']))
{
    //调用响应消息函数
    $wechat->responseMsg();
}
else
{
    //实现网址接入
    $wechat->valid();
}
?>
 