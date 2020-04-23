<?php
/**
 * 授权验证器
 * Author Wuchuheng<wuchuheng@163.com>
 * Licence MIT
 * DATE 2020/3/18
 */

namespace App\Http\Admin\Validation;

class AuthorizationValidation extends AbstractValidation
{

    /**
     * 设置规则
     */
    protected function setRules(): array
    {
        return [
            'username' => [
                'required'
            ],
            'password' => [
                'required'
            ]
        ];
    }

    /**
     * 设置消息
     */
    protected function setMessages(): array
    {
        return [];
    }

    /**
     *  设置场景名
     */
    protected function setScene(): array
    {
        return [
            'authorization' => [
                'username',
                'password'
            ]
        ];
    }

    /**
     * 场景附加验证
     * 对指定的场景附加验证规则
     */
    protected function setSceneExtendRules(): array
    {
        return [];
    }
}
