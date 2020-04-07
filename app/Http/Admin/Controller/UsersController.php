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

class UsersController extends AbstractController
{

    public function showMe()
    {
        return $this->responseSuccessData([
            'id' => 1,
            'nickname' => 'admin',
            'role' => 'admin',
            'roles' => ['admin'],
            'username' => 'admin'
        ]);

    }
}