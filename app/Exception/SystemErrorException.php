<?php
/**
 * 系统内部异常
 * Author Wuchuheng<wuchuheng@163.com>
 * Licence MIT
 * DATE 2020/3/18
 */

namespace App\Exception;

use App\Http\Admin\Validation\AbstractValidation;
use Hyperf\Server\Exception\ServerException;

class SystemErrorException extends AbstractException
{
    protected $code = 500;

    protected $msg = '系统内部出错';
}
