<?php
/**********************************
 * Created by PhpStorm
 * User: funny
 * Date: 2016/2/22
 * Time: 16:40
 */
class weixin_kefu_api
{
    private $appid;
    private $appsecret;

    //构造函数
    public function __construct($appid,$appsecret)
    {
            $this->appid=$appid;
        $this->appsecret=$appsecret;
    }
    //获取access_token
    public function get_access_token()
    {
        $this->last_time='1456129332';
        $url="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid={$this->appid}&secret={$this->appsecret}";
        $access_token='yn4A3NVE_QS-IUX-BvHBvZkutgv6ieiupItCDIj81OVmOT28NoTwYG9TTe-ywSgPo1cX-Z78IhWq6hzqKx-U6td9cmmBbgO0ijOgw0NOgRw6uW3Mv4jCPBfOOL_X0sioZKVbABAPAL';
        if(time()>($this->last_time +7200))
        {
            $url="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid={$this->appid}&secret={$this->appsecret}";
            $access_token_Arr=$this->https_request($url);
            $this->last_time=time();
            return $access_token_Arr['access_token'];
        }
        return $access_token;
    }
    //https请求
    protected function https_request($url,$data = null)
    {
        $ch=curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        if(!empty($data))
        {
            curl_setopt($ch,CURLOPT_POST,1);//模拟post
            curl_setopt($ch,CURLOPT_POSTFIELDS,$data);//post内容

        }
        $output=curl_exec($ch);
        curl_close($ch);
        $output=json_decode($output,true);
        return $output;
    }
    //添加客服
    public function addKefu($data)
    {
        $access_token=$this->get_access_token();
        $url="https://api.weixin.qq.com/customservice/kfaccount/add?access_token={$access_token}";
        return $this->https_request($url,$data);
    }
}


 