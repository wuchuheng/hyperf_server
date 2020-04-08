<?php
/**
 * 授权
 * Author Wuchuheng<wuchuheng@163.com>
 * Licence MIT
 * DATE 2020/3/18
 */

namespace App\Http\Admin\Controller;

use Couchbase\RegexpSearchQuery;
use Phper666\JwtAuth\Jwt;
use Psr\Container\ContainerInterface;
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
     */
    public function store(AuthorizationValidation $AuthorizationValidation)
    {
        $AuthorizationValidation->scene('authorization')->goCheck();
//        $userData = [
//            'uid' => 1,
//            'username' => 'xx',
//        ];
//        $token = (string) $this->Jwt->getToken($userData);
//
//
//        return $this->responseSuccessData([
//            'token' => $token
//        ]);

    }
}
