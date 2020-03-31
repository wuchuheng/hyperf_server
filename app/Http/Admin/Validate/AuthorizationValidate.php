<?php
/**
 * 授权验证器
 * Author Wuchuheng<wuchuheng@163.com>
 * Licence MIT
 * DATE 2020/3/18
 */

namespace App\Http\Admin\Validate;

class AuthorizationValidate extends AbstractValidate
{

    /**
     * 定义验证的规则
     */
    protected function rules(): array
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
     * 定义消息
     */
    protected function messages(): array
    {
        return [];
    }
}