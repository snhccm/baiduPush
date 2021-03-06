<?php
namespace snhccm\baiduPush;

/**
 * 表示一个http访问异常,该异常由客户端调用http功能时产生.一般表示网络访问存在异常
 */
class HttpException extends Exception {
    /**
     * Constructor
     * @param string $msg
     * @param int $code
     */
    function __construct($message, $code) {
        parent::__construct($message, $code);
    }
}