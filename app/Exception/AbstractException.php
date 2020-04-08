<?php

/**
 * Author Wuchuheng<root@wuchuheng.com>
 * Licence MIT
 * DATE 2020-04-09 05:12
 */

namespace App\Exception;

use Hyperf\Server\Exception\ServerException;

class AbstractException extends ServerException
{
    /**
     * 错误信息
     * @var string
     */
    protected  $msg = '';

    /**
     *  错误码
     * @var int
     */
     protected $code = 200;

    /**
     * 初始化参数
     * AbstractException constructor.
     * @param array|null $exception_info
     */
    public function __construct(?array $exception_info = [])
    {
        if (is_array($exception_info) && array_key_exists('msg', $exception_info)) {
            $this->msg = $exception_info['msg'];
        }
        if (is_array($exception_info) && array_key_exists('code', $exception_info)) {
            $this->code = $exception_info['code'];
        }
        if (is_string($exception_info)) {
            $this->msg = $exception_info;
        }
    }

}
