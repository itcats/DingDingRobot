<?php
/**
 * @Created by PhpStorm
 * @Author  : itcats(364280595@qq.com)
 * @Date    :   2019年11月26日15:49:26
 */

namespace Itcats\DingtalkSDK;

/**
 * Class Dingtalk
 * @package Itcats\DingtalkSDK
 */
class Dingtalk
{
    /**
     * 钉钉机器人webhoot
     * @var string
     */
    protected $web_hook = '';

    /**要被at人的电话号码
     * @var array
     */
    protected $at_mobiles = array();

    /**
     * 是否全部at，true，false
     * @var string
     */
    protected $is_at_all = '';

    public function __construct($web_hook = '', $at_mobiles = array(), $is_at_all = true)
    {
        if (!empty($web_hook)) {
            $this->web_hook = $web_hook;
        }
        $this->at_mobiles = $at_mobiles;
        $this->is_at_all  = $is_at_all;
    }

    /**
     * 发送机器人消息
     * @param string $msg
     * @return mixed|string
     */
    public function sendTextMsg($msg = '')
    {
        if (empty($msg)) {
            return 'no msg!';
        }
        $data = array(
            'msgtype' => 'text',
            'text'    => array('content' => $msg),
            'at'      => array('atMobiles' => $this->at_mobiles, 'isAtAll' => $this->is_at_all),
        );

        $result = $this->_sendPost($data);
        return $result;
    }


    /**
     * 请求函数
     * @param $data
     * @return mixed
     */
    private function _sendPost($data)
    {
        $ch      = curl_init($this->web_hook);
        $payload = json_encode($data);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

}
