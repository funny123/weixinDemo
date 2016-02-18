<?php
/**********************************
 * Created by PhpStorm
 * User: funny
 * Date: 2016/2/15
 * Time: 16:44
 */
 require('weixin_menu_api.php');

$weixin_menu =new Weixin_menu_api('wx6e090e3708211f6d','80719b785ac8b5fabf3fcf347189d266');
//echo $weixin_menu->get_access_token();
$arr=<<<EOF
{
    "button": [
        {
            "name": "扫码",
            "sub_button": [
                {
                    "type": "scancode_waitmsg",
                    "name": "扫码带提示",
                    "key": "rselfmenu_0_0",
                    "sub_button": [ ]
                },
                {
                    "type": "scancode_push",
                    "name": "扫码推事件",
                    "key": "rselfmenu_0_1",
                    "sub_button": [ ]
                }
            ]
        },
        {
            "name": "发图",
            "sub_button": [
                {
                    "type": "pic_sysphoto",
                    "name": "系统拍照发图",
                    "key": "rselfmenu_1_0",
                   "sub_button": [ ]
                 },
                {
                    "type": "pic_photo_or_album",
                    "name": "拍照或者相册发图",
                    "key": "rselfmenu_1_1",
                    "sub_button": [ ]
                },
                {
                    "type": "pic_weixin",
                    "name": "微信相册发图",
                    "key": "rselfmenu_1_2",
                    "sub_button": [ ]
                }
            ]
        },
        {
            "name": "发送位置",
            "type": "location_select",
            "key": "rselfmenu_2_0"
        },
        {
           "type": "media_id",
           "name": "图片",
           "media_id": "MEDIA_ID1"
        },
        {
           "type": "view_limited",
           "name": "图文消息",
           "media_id": "MEDIA_ID2"
        }
    ]
}
EOF;
$weixin_menu->menu_create($arr);

