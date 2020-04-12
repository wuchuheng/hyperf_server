<?php
/**
 * 授权
 * Author Wuchuheng<wuchuheng@163.com>
 * Licence MIT
 * DATE 2020/3/18
 */

namespace App\Http\Admin\Controller;

use App\Model\UserModel;
use Couchbase\RegexpSearchQuery;
use Phper666\JwtAuth\Jwt;
use Psr\Container\ContainerInterface;
use Laminas\Stdlib\RequestInterface;
use App\Http\Admin\Validation\AuthorizationValidation;

class AuthorizationsController extends AbstractController
{
    /**
     * @var Jwt
     */
    private $Jwt;

    public function __construct(Jwt $Jwt)
    {
        $this->Jwt = $Jwt;
    }

    /**
     * 登录
     * @param AuthorizationValidation $AuthorizationValidation
     * @param UserModel $UserModel
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function store(
        AuthorizationValidation $AuthorizationValidation,
        UserModel $UserModel
    )
    {
        $User = $UserModel->where('username', '=', $this->Request->input('username'))
            ->where('password', '=', bcrypt($this->Request->input('password')))
            ->first();
        if (!$User) {
            return $this->responseFailDate('账号或密码错误');
        } else {
            $token = (string)$this->Jwt->getToken([
                'uid' => $User->id,
                'username' => $User->username,
            ]);
            return $this->responseSuccessData([
                'token' => $token
            ]);
        }
    }
}
