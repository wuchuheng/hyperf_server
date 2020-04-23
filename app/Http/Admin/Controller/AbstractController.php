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

use App\Model\UserModel;
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
     * @Inject()
     * @var UserModel
     */
    protected $UserModel;

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

    /**
     * 成功响应消息.
     * @param string $msg
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function responseSuccessMsg(string $msg = 'Success')
    {
        return $this->Response->json([
            'msg' => $msg,
            'data' => [],
            'code' =>  200,
        ]);
    }

    /**
     * 失败数据格式
     * @param string $msg
     * @return mixed
     */
    public function responseFailDate(string $msg = '')
    {
        return $this->Response->json([
            'msg' => $msg ?? 'fails',
            'data' => [],
            'code' => 401,
        ]);
    }

    /**
     * 获取用户信息.
     * @return mixed
     */
    public function user(): UserModel
    {
        $token = str_replace('Bearer ', '',  $this->Request->header('Authorization'));
        [ , $user_info ] = explode('.', $token);
        $UserInfo = json_decode(base64_decode($user_info));
        $User = $this->UserModel->where('id', '=', $UserInfo->uid)->first();
        return $User;
    }
}
