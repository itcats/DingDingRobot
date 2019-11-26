# DingDingRobot
钉钉机器人webhook

使用方法：
```php
 include_once 'vendor/autoload.php';
 
/**
 * 必填
 * 钉钉机器人的webhook地址
 */
 $web_hook = '';
 
/**
 * 选填
 * 需要被通知人的手机号（可在钉钉上查看）
 */
 $at_mobiles = array();
 
/**
 * 选填
 * 是否全部被@，默认为true
 */
 $is_at_all = true;
 
 $robot = new Itcats\DingtalkSDK\Dingtalk($web_hook);
 $txt   = 'hello itcats!';
 $robot->sendTextMsg($txt);
```
