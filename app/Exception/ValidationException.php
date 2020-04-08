<?php

/**
 * 验证异常
*/
namespace App\Exception;


class ValidationException extends AbstractException
{
    public $code = 401;

    public $msg = '验证出错';
}
