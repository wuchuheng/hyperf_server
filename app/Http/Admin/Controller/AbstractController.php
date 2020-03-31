<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf-cloud/hyperf/blob/master/LICENSE
 */

namespace App\Http\Admin\Controller;

use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Contract\ResponseInterface;
use Psr\Container\ContainerInterface;

abstract class AbstractController
{
    /**
     * @Inject
     * @var ContainerInterface
     */
    protected $Container;

    /**
     * @Inject
     * @var RequestInterface
     */
    protected $Request;

    /**
     * @Inject
     * @var ResponseInterface
     */
    protected $Response;

    /**
     * 格式化数据响应.
     * @param mixed ... $data, $code, $msg
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function responseSuccessData(...$data)
    {
        return $this->Response->json([
            'msg' => $data[2] ?? 'success',
            'data' => $data[0],
            'code' => $data[1] ?? 200,
        ]);
    }
}
