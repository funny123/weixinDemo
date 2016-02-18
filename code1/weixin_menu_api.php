<?php
/**********************************
 * Created by PhpStorm
 * User: funny
 * Date: 2016/2/15
 * Time: 16:13
 */
//自定义菜单
class Weixin_menu_api
{
    private $appid;
    private $appsecret;
    //构造函数
    public function __construct($appid,$appsecret){
        $this->appid=$appid;
        $this->appsecret=$appsecret;

    }
    //获取access_token
    public function get_access_token()
    {
        $this->last_time=1455526349;
        $access_token="yn4A3NVE_QS-IUX-BvHBveNhOtcq-KJmB8xELU3_k7V5CJqvIRPS3lNCCG1oNZOS3za3irVVIGxNx0u_Jrkz9b-C6Bvmb6AUn1289zDng0uAXwbdzCZZwRcLQpBNonWYEAUbAFAZVP";

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
    //创建菜单
    public function menu_create($data)
    {
        $access_token=$this->get_access_token();
        $url="https://api.weixin.qq.com/cgi-bin/menu/create?access_token={$access_token}";
        return $this->https_request($url,$data);
    }
    //查询菜单
    public function menu_select()
    {
        $access_token=$this->get_access_token();
        $url="https://api.weixin.qq.com/cgi-bin/menu/get?access_token={$access_token}";
        return $this->https_request($url);
    }
    //删除菜单
    public function menu_delete()
    {
        $access_token=$this->get_access_token();
        $url="https://api.weixin.qq.com/cgi-bin/menu/delete?access_token={$access_token}";
        return $this->https_request($url);
    }
}

?>