<?php
/**
 * Created by PhpStorm
 * Author Wuchuheng<wuchuheng@163.com>
 * Licence MIT
 * DATE 2020/4/18
 */

namespace App\Http\Admin\Validation;


use mysql_xdevapi\Exception;

class PermissionesValidation extends AbstractValidation
{

    /**
     * 设置规则
     */
    protected function setRules(): array
    {
        return [
            'name' => [
                'required'
            ],
            'slug' => [
                'required'
            ],
            'pid' => [
                'required',
            ],
            'http_method' => [
                'required'
            ],
            'http_path' => [
                'required'
            ],
            'test' => [
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
     * 场景附加验证
     * 对指定的场景附加验证规则
     */
    protected function setSceneExtendRules(): array
    {
        return [
            'add_permission' => [
                'name' => [
                    'unique:admin_permissiones,name'
                ],
                'slug' => [
                    'unique:admin_permissiones,slug'
                ]
            ]
        ];
    }

    /**
     *  设置场景名
     */
    protected function setScene(): array
    {
        return [
            'add_permission' => [
                'pid',
                'name',
                'slug'
            ]
        ];
    }
}
