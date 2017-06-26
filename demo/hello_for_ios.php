<?php
require '../vendor/autoload.php';

use snhccm\baiduPush\PushService;

$config     = [
    'key'       => '',
    'secret'    => '',
    'options'   => ''
];

// 创建SDK对象.
$sdk = new PushService($config['key'],$config['secret'],$config['options']);

$channelId = '';

// message content.
$message = array (
    'aps' => array (
        // 消息内容
        'alert' => "hello, this message from baidu push service.", 
    ), 
);

// 设置消息类型为 通知类型.
$opts = array (
    'msg_type' => 1,        // iOS不支持透传, 只能设置 msg_type:1, 即通知消息.
    'deploy_status' => 1,   // iOS应用的部署状态:  1：开发状态；2：生产状态； 若不指定，则默认设置为生产状态。
);

// 向目标设备发送一条消息
$rs = $sdk -> pushMsgToSingleDevice($channelId, $message, $opts);

// 判断返回值,当发送失败时, $rs的结果为false, 可以通过getError来获得错误信息.
if($rs === false){
   print_r($sdk->getLastErrorCode()); 
   print_r($sdk->getLastErrorMsg()); 
}else{
    // 将打印出消息的id,发送时间等相关信息.
    print_r($rs);
}

echo "done!";
 